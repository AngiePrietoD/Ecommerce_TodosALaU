<?php

namespace App\Http\Livewire\Admin\Paquetes;

use App\Models\Package;
use Livewire\Component;

class Tracking extends Component
{
    public Package $package;
    public function mount(Package $package)
    {
        $this->package = $package;
    }

    public function render()
    {
        $pies = ($this->package->ancho * $this->package->alto * $this->package->largo) / 1728;
        $volumetrico = ($this->package->ancho * $this->package->alto * $this->package->largo) / 166;
        return view(
            'livewire.admin.paquetes.tracking',
            compact(
                'pies',
                'volumetrico'
            )
        );
    }
}
