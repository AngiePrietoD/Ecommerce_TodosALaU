<?php

namespace App\Http\Livewire\Admin\Departments;

use App\Models\Department;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public function delete(Department $department): void
    {
        $department->delete();
    }

    public function render()
    {
        $departments = Department::latest()->paginate();
        return view('livewire.admin.departments.index', compact('departments'));
    }
}
