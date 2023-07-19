<?php

namespace App\Http\Livewire\Admin\Paquetes;

use App\Models\Dispatch;
use App\Models\Package;
use App\Models\Transport;
use App\Models\User;
use App\Notifications\EnviadoNotification;
use App\Traits\WithSorting;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class Preparados extends Component
{
    use AuthorizesRequests;
    use WithPagination;
    use WithSorting;

    public User $user;
    public Transport $transport;
    public Dispatch $dispatch;

    public $transports;
    public bool $selected;
    public array $packagesIds = [];
    public $search;

    protected $queryString = ['search'];

    public function rules(): array
    {
        return [
            'dispatch.code' => 'required|string|max:255|unique:dispatches,code',
        ];
    }

    public function messages(): array
    {
        return [
            'dispatch.code.required' => __('El número de guia es obligatorio.'),
            'dispatch.code.string' => __('El número de guia debe ser una cadena de texto.'),
            'dispatch.code.max' => __('El número de guia no debe ser mayor a :max caracteres.'),
            'dispatch.code.unique' => __('El número de guia ya está en uso.'),
        ];
    }

    public function prepareEnvio()
    {
        $this->validate();
        $this->dispatch->transport_id = $this->transport->id;
        $this->dispatch->save();

        $packages = Package::whereIn('id', $this->packagesIds);


        $packages->update([
            'dispatch_id' => $this->dispatch->id,
            'package_status_id' => 3
        ]);

        $usersWithPackages = $packages->select('user_id')->distinct();

        foreach ($usersWithPackages->get() as $package) {
            $packages = $package->user->packages()->where('dispatch_id', $this->dispatch->id)->get();
            $package->user->notify(new EnviadoNotification($packages));
        }

        $this->packagesIds = [];
        return redirect()->to(route("admin.preparados.transporte", $this->transport->id))
            ->with('flash.bannerStyle', 'success')
            ->with('flash.banner', 'Los paquetes han sido enviados.');
    }

    public function delete(Package $package): void
    {
        $package->delete();
    }

    public function mount(Transport $transport, Request $request)
    {
        $this->transport = $transport;
        $this->transports = Transport::all();
        $this->dispatch = new Dispatch();
    }

    public function render()
    {
        $this->authorize('isadmin');

        $packages = Package::select('packages.*')
            ->join('users', 'users.id', '=', 'packages.user_id')
            ->where('packages.transport_id', $this->transport->id)
            ->whereNull('packages.dispatch_id')
            ->whereNested(
                fn ($q)  => $q
                    ->where('tracking', 'like', '%' . $this->search . '%')
                    ->orWhere('name', 'like', '%' . $this->search . '%')
                    ->orWhere('lastname', 'like', '%' . $this->search . '%')
            )->orderBy($this->sortBy, $this->sortDirection);

        return view('livewire.admin.paquetes.preparados', compact('packages'));
    }
}
