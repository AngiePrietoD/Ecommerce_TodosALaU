<?php

namespace App\Http\Livewire\Cliente;

use App\Models\Package;
use Illuminate\Http\Request;
use Livewire\Component;

class Buscar extends Component
{
    public $search;
    protected $queryString = ['search'];
    public function ir(Package $package)
    {
        //dd($package->packageStatus->path);
        return redirect()->to(route("cliente." . $package->packageStatus->path))
            ->with('flash.bannerStyle', 'success')
            ->with('flash.banner', 'El paquete seleccionado se encuentra en este listado.');
    }
    public function render(Request $request)
    {
        $packages = $request->user()->packages()->with('packageStatus')
            ->where('tracking', 'like',  $this->search . '%')
            ->orderBy('tracking', 'ASC')
            ->get();
        return view('livewire.cliente.buscar', compact('packages'));
    }
}
