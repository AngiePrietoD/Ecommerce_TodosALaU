<?php

namespace App\Http\Livewire\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use Livewire\Component;

class Buscador extends Component
{
    public $search;
    protected $queryString = ['search'];
    
    public function render(Request $request)
    {
        $users = User::with('packages')->where('name', 'like', '%' . $this->search . '%')
            ->orWhere('lastname', 'like', '%' . $this->search . '%')
            ->get();
        return view('livewire.admin.buscador', compact('users'));
    }
}
