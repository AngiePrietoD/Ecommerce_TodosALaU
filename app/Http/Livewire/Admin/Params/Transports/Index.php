<?php

namespace App\Http\Livewire\Admin\Transports;

use App\Models\Transport;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public function delete(Transport $transport): void
    {
        $transport->delete();
    }

    public function render()
    {
        $transports = Transport::latest()->paginate();
        return view('livewire.admin.transports.index', compact('transports'));
    }
}
