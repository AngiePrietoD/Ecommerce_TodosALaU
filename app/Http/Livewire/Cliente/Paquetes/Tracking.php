<?php

namespace App\Http\Livewire\Cliente\Paquetes;

use App\Models\Package;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Tracking extends Component
{
    use AuthorizesRequests;

    public Package $package;
    public function mount(Package $package)
    {
        $this->authorize($package);
        $this->package = $package;
    }
    
    public function render()
    {

        $pies = ($this->package->ancho * $this->package->alto * $this->package->largo) / 1728;
        $volumetrico = ($this->package->ancho * $this->package->alto * $this->package->largo) / 166;
        return view(
            'livewire.cliente.paquetes.tracking',
            compact(
                'pies',
                'volumetrico'
            )
        );
    }
}
