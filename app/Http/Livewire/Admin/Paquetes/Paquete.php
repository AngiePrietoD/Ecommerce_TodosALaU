<?php

namespace App\Http\Livewire\Admin\Paquetes;

use App\Models\Package;
use App\Models\PackageType;
use App\Models\Photo;
use App\Models\Shipper;
use App\Models\User;
use App\Notifications\PackageNotification;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Livewire\Component;
use Livewire\WithFileUploads;
use Ramsey\Uuid\Type\Decimal;

class Paquete extends Component
{
    use AuthorizesRequests;
    use WithFileUploads;

    public $search;
    protected $queryString = ['search'];

    public $fotos = [];
    public User $user;
    public Package $package;
    public $volumen;
    public $pies;
    public $peso;

    public function rules(): array
    {
        return [
            'package.shipper_id' => 'required|string|max:255',
            'package.user_id' => 'required',
            'package.tracking' => 'required|string|max:255',
            'package.package_type_id' => 'required|string|max:255',
            'package.alto' => 'required|string|max:255',
            'package.ancho' => 'required|string|max:255',
            'package.largo' => 'required|string|max:255',
            'package.peso' => 'required|string|max:255',
            'package.notas' => 'nullable',
        ];
    }

    public function messages(): array
    {
        return [
            'package.name.required' => __('El campo nombre es obligatorio.'),
            'package.name.string' => __('El campo nombre debe ser una cadena de texto.'),
            'package.name.max' => __('El campo nombre no debe ser mayor a :max caracteres.'),
            'package.name.unique' => __('El campo nombre ya está en uso.'),
        ];
    }

    public function setUser(User $user)
    {
        $this->user = $user;
        $this->search = $user->name . ' ' . $user->lastname;
        $this->package->user_id = $user->id;
    }

    public function updated()
    {
        $this->pies = ($this->package->ancho * $this->package->alto * $this->package->largo) / 1728;
        $this->volumen = ($this->package->ancho * $this->package->alto * $this->package->largo) / 166;
    }

    public function save()
    {
        $this->validate();
        $this->package->save();

        foreach ($this->fotos as $foto) {
            $filename = $foto->storePubliclyAs('fotos', $this->package->id . "-" . $foto->getClientOriginalName());
            $this->package->photos()->save(new Photo(['filename' => $filename]));
        }

        $this->user->notify(new PackageNotification($this->package));

        return redirect()->to(route("dashboard"))->with('flash.banner', 'Paquete ha sido registrado!');
    }

    public function mount(User $user)
    {
        $this->user = $user;
        $this->package = new Package();
        $this->package->user_id = $this->user->id;
    }

    public function render()
    {

        $users = User::with('packages')->where('name', 'like', '%' . $this->search . '%')
            ->orWhere('lastname', 'like', '%' . $this->search . '%')
            ->get();

        $shippers = Shipper::all();
        $package_types = PackageType::all();
        return view('livewire.admin.paquetes.paquete', compact(
            'package_types',
            'shippers',
            'users'
        ));
    }
}
