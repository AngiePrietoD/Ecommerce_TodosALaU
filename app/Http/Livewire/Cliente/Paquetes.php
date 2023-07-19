<?php

namespace App\Http\Livewire\Cliente;

use App\Models\Package;
use App\Models\Repack;
use App\Models\Transport;
use App\Traits\WithSorting;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use Livewire\Component;
use Livewire\WithPagination;

class Paquetes extends Component
{
    use AuthorizesRequests;
    use WithPagination;
    use WithSorting;

    public User $user;
    public string $estado = "recibidos";
    public array $packagesIds = [];
    public bool $selected;
    public bool $prepare = false;
    public $transportId;

    public function dropTransport(Package $package)
    {
        $this->authorize('setTransport', $package);
        $package->transport_id = NULL;
        $package->package_status_id = 1;

        $package->save();

        session()->flash('flash.banner', 'Se requiere que defina un tipo de transporte para poder enviarle su paquete.');
    }

    public function setTransport(Package $package, Transport $transport)
    {
        $this->authorize($package);
        $package->transport_id = $transport->id;
        $package->package_status_id = 2;
        $package->save();

        session()->flash('flash.banner', 'Ha seleccionado enviar el paquete ' . $package->tracking . ' mediante transporte ' . $transport->name);
    }

    public function rules(): array
    {
        return [];
    }

    public function render(Request $request)
    {
        $transports = Transport::orderBy('id', 'asc')->get();

        $packages = $request->user()
            ->packages()
            ->whereNull('dispatch_id')
            ->whereIn('package_status_id', [1, 2])
            ->orderBy($this->sortBy, $this->sortDirection)
            ->paginate(50);

        return view(
            'livewire.cliente.paquetes',
            compact('packages', 'transports')
        );
    }
}
