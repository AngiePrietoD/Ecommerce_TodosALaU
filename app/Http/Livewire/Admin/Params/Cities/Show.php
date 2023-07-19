<?php

namespace App\Http\Livewire\Admin\Cities;

use App\Models\City;
use Livewire\Component;

class Show extends Component
{
    public City $city;

    public function delete()
    {
        $this->city->delete();

        return redirect()->to(route("admin.cities.index"));
    }

    public function render()
    {
        return view('livewire.admin.cities.show');
    }
}
