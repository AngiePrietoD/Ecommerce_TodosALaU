<?php

namespace App\Http\Livewire\Admin\Clientes;

use App\Models\Department;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class Edit extends Component
{
    use AuthorizesRequests;

    public User $user;
    public $cities = [];
    public $departments = [];
    public string $department_id;

    public function rules(): array
    {
        return [
            'user.name' => 'required|string|max:255',
            'user.lastname' => 'required|string|max:255',
            'user.address' => 'required|string|max:255',
            'user.city_id' => 'required|integer',
            'user.phone' => 'required|string|max:255',
            'user.email' => 'required|string|max:255|unique:users,email,'.$this->user->id,
        ];
    }

    public function messages(): array
    {
        return [
            'user.name.required' => __('El campo nombres es obligatorio.'),
            'user.name.string' => __('El campo nombres debe ser una cadena de texto.'),
            'user.name.max' => __('El campo nombres no debe ser mayor a :max caracteres.'),
            'user.lastname.required' => __('El campo apellidos es obligatorio.'),
            'user.lastname.string' => __('El campo apellidos debe ser una cadena de texto.'),
            'user.lastname.max' => __('El campo apellidos no debe ser mayor a :max caracteres.'),
        ];
    }

    public function save()
    {
        $this->validate();

        $this->user->password = Hash::make(config('app.key'));
        $this->user->save(); 

        event(new Registered($this->user));

        return redirect()->to(route("admin.clientes.edit", $this->user->id))->with('flash.banner', '¡Los datos de usuario ha sido guardado correctamente!');
    }

    public function updatedDepartmentId(string $value)
    {
        $this->cities = Department::find($value)->cities;
    }
    
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function mount(User $user)
    {
        $this->user = $user;
        $this->departments = Department::all();
        if($user->exists){
            $this->cities = $user->city->department->cities;
            $this->department_id = $user->city->department_id;
        }
    }
    
    public function render()
    {
        $departments = Department::all();        
        return view('livewire.admin.clientes.edit', compact(
            'departments',
        ));
    }
}
