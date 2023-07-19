<?php

namespace App\Http\Livewire\Cliente;

use App\Models\Package;
use App\Models\Repack;
use App\Models\Transport;
use App\Traits\WithSorting;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use Livewire\Component;
use Livewire\WithPagination;

class Transito extends Component
{
    use AuthorizesRequests;
    use WithPagination;
    use WithSorting;

    public User $user;
    public string $estado = "recibidos";
    public array $packagesIds = [];
    public bool $selected;
    public bool $prepare = false;
    public $transportId;

    public function dropTransport(Package $package)
    {
        $package->transport_id = NULL;
        $package->save();
        $this->emit('notifyMe', 'Se requiere que defina un tipo de transporte para poder enviarle su paquete.');
    }

    public function setTransport(Package $package, Transport $transport)
    {
        $package->transport_id = $transport->id;
        $package->save();
        $this->emit('notifyMe', 'Ha seleccionado enviar el paquete mediante transporte ' . $transport->name);
    }

    public function rules(): array
    {
        return [];
    }

    public function render(Request $request)
    {
        $transports = Transport::orderBy('id', 'asc')->get();

        $packages = $request->user()->packages()
            ->where('package_status_id', 3)
            ->whereNotNull('dispatch_id')
            ->paginate(50);
       
        return view(
            'livewire.cliente.transito',
            compact('packages', 'transports')
        );
    }
}
