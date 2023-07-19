<?php

namespace App\Http\Livewire;

use App\Models\City;
use App\Models\Department;
use Livewire\Component;

class Ciudades extends Component
{
    public $cities = [];
    public $departments = [];
    public string $department_id;
    public string $city_id;
    

    public function rules(): array
    {
        return [
            'city_id' => 'required|integer',
        ];
    }

    public function messages(): array
    {
        return [];
    }
    public function updatedDepartmentId(string $value)
    {
        $this->cities = Department::find($value)->cities;
    }

    public function mount()
    {
        $this->departments = Department::all();
    }

    public function render()
    {
        $departments = Department::all();
        return view(
            'livewire.ciudades',
            compact(
                'departments',
            )
        );
    }
}
