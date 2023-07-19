<?php

namespace App\Http\Livewire\Admin\Cities;

use App\Models\City;
use Illuminate\Contracts\Support\Renderable;
use Livewire\Component;
use Livewire\Redirector;

class Form extends Component
{
    public City $city;

    public string $buttonText;

    public function rules(): array
    {
        return [
            'city.name' => 'required|string|max:255|unique:cities,name,' . request()->route('admin.cities'),
        ];
    }

    public function messages(): array
    {
        return [
            'city.name.required' => __('El campo nombre es obligatorio.'),
            'city.name.string' => __('El campo nombre debe ser una cadena de texto.'),
            'city.name.max' => __('El campo nombre no debe ser mayor a :max caracteres.'),
            'city.name.unique' => __('El campo nombre ya está en uso.'),
        ];
    }

    public function delete(City $city)
    {
        $city->delete();

        return redirect()->to(route("admin.cities.index"));
    }

    public function save()
    {
        $this->validate();

        $this->city->save();

        return redirect()->to(route("admin.cities.index"));
    }

    public function render(): Renderable
    {
        return view('livewire.admin.cities.form');
    }
}
