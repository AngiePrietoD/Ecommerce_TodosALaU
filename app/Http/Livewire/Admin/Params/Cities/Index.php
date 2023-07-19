<?php

namespace App\Http\Livewire\Admin\Cities;

use App\Models\City;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public function delete(City $city): void
    {
        $city->delete();
    }

    public function render()
    {
        $cities = City::latest()->paginate();
        return view('livewire.admin.cities.index', compact('cities'));
    }
}
