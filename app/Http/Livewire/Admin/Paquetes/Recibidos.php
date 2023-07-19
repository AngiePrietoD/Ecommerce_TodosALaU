<?php

namespace App\Http\Livewire\Admin\Paquetes;

use App\Models\Package;
use App\Models\User;
use App\Traits\WithSorting;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Livewire\Component;
use Livewire\WithPagination;

class Recibidos extends Component
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
            ->where('package_status_id', 1)
            //            ->whereNull('packages.transport_id')
            //            ->whereNull('packages.repack_id')
            ->whereNested(
                fn ($q)  => $q
                    ->where('tracking', 'like', '%' . $this->search . '%')
                    ->orWhere('name', 'like', '%' . $this->search . '%')
                    ->orWhere('lastname', 'like', '%' . $this->search . '%')
            )->orderBy($this->sortBy, $this->sortDirection);

        if (is_int($this->user->id)) {
            $query->where('user_id', $this->user->id);
        }

        $packages = $query->paginate(50);
        return view('livewire.admin.paquetes.recibidos', compact('packages'));
    }
}
