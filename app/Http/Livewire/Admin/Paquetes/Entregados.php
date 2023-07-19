<?php

namespace App\Http\Livewire\Admin\Paquetes;

use App\Models\Package;
use App\Traits\WithSorting;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Pagination\Paginator as PaginationPaginator;
use Livewire\Component;
use Livewire\WithPagination;

class Entregados extends Component
{
    use AuthorizesRequests;
    use WithPagination;
    use WithSorting;

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

    public function render()
    {
        $this->authorize('isadmin');

        $packages = Package::select('packages.*')
            ->join('users', 'users.id', 'packages.user_id')
            ->where('package_status_id', 5)
            ->orderBy($this->sortBy, $this->sortDirection)
            ->paginate(50);

        return view('livewire.admin.paquetes.entregados', compact('packages'));
    }
}
