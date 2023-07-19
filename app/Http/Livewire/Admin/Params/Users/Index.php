<?php

namespace App\Http\Livewire\Admin\Users;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public function delete(User $user): void
    {
        $user->delete();
    }

    public function render()
    {
        $users = User::latest()->paginate();
        return view('livewire.admin.users.index', compact('users'));
    }
}
