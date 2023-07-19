<?php

namespace App\Http\Livewire;

use App\Models\Package;
use App\Models\Transport;
use App\Traits\WithSorting;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use Livewire\Component;
use Livewire\WithPagination;

class Despachado extends Component
{
    use AuthorizesRequests;
    use WithPagination;
    use WithSorting;

    public string $estado = "recibidos";

    protected $listeners = ['changeEstado' => 'cambiarEstado'];

    public function cambiarEstado(string $estado) {
        $this->estado = $estado;
    }

    public function dropTransport(Package $package)
    {
        $package->transport_id = 0;
        $package->save();
    }

    public function setTransport(Package $package, Transport $transport)
    {
        $package->transport_id = $transport->id;
        $package->save();
    }


    public function render(Request $request)
    {
        $transports = Transport::orderBy('id', 'asc')->get();
        $packages = $request->user()->packages()->paginate(50);
        
        return view(
            'livewire.despachado',
            compact('packages', 'transports')
        );
    }
}
