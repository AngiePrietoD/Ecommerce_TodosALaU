<?php

namespace App\Http\Livewire\Admin\Clientes;

use App\Models\User;
use App\Traits\WithSorting;
use Illuminate\Database\QueryException;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use AuthorizesRequests;
    use WithPagination;
    use WithSorting;

    public $search;
    public int $byId;
    protected $queryString = ['search'];
    public int $confirmando;

    public function delete(User $user): void
    {
        $this->confirmando = $user->id;
    }

    public function confirmed(User $user)
    {
        try {
            $user->delete();
        } catch (QueryException $e) {
            return redirect()->to(route("admin.clientes.index"))
                ->with('flash.bannerStyle', 'danger')
                ->with('flash.banner', 'Para poder eliminar un cliente, antes debe eliminar todos los paquetes asociados.');
        }
    }

    public function render()
    {
        $this->authorize('isadmin');

        $usersQ = User::where('id', '<>', 1)->orderBy($this->sortBy, $this->sortDirection);

        if (User::where('id', '<>', 1)->find($this->search)) {
            $usersQ->find($this->search);
        } else {
            $usersQ->where('name', 'like', '%' . $this->search . '%')
                ->orWhere('lastname', 'like', '%' . $this->search . '%')
                ->orWhere('email', 'like', '%' . $this->search . '%')
                ->orWhere('phone', 'like', '%' . $this->search . '%');
        }

        $users = $usersQ->paginate(50);

        return view('livewire.admin.clientes.index', compact('users'));
    }
}
