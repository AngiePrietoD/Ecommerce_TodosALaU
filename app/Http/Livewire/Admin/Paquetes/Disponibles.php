<?php

namespace App\Http\Livewire\Admin\Paquetes;

use App\Models\Package;
use App\Models\User;
use App\Notifications\EntregadoNotification;
use App\Traits\WithSorting;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Livewire\Component;
use Livewire\WithPagination;

class Disponibles extends Component
{
    use AuthorizesRequests;
    use WithPagination;
    use WithSorting;

    public User $user;
    public $search;
    protected $queryString = ['search'];

    public function delete(Package $package): void
    {
        $package->delete();
    }

    public function entregar(Package $package): void
    {
        $package->package_status_id = 5;
        $package->delivered_at = now();
        $package->save();

        $package->user->notify(new EntregadoNotification($package));
    }

    public function updatedSearch(string $value)
    {
        $packages = Package::latest()->paginate(50);
        //->where('title', 'like', '%'.$this->search.'%')
    }

    public function mount(User $user)
    {
        $this->user = $user;
    }

    public function render()
    {
        $this->authorize('isadmin');

        $query = Package::select('packages.*')
            ->join('users', 'users.id', '=', 'packages.user_id')
            ->join('dispatches', 'dispatches.id', '=', 'packages.dispatch_id')
            ->where('package_status_id', 4)
            //            ->whereNull('packages.transport_id')
            //            ->whereNull('packages.repack_id')
            ->whereNested(
                fn ($q)  => $q
                    ->where('tracking', 'like', '%' . $this->search . '%')
                    ->orWhere('name', 'like', '%' . $this->search . '%')
                    ->orWhere('lastname', 'like', '%' . $this->search . '%')
            );

        if (is_int($this->user->id)) {
            $query->where('user_id', $this->user->id);
        }

        $packages = $query->orderBy($this->sortBy, $this->sortDirection)->paginate(50);
        return view('livewire.admin.paquetes.disponibles', compact('packages'));
    }
}
