<?php

namespace App\Http\Livewire\Admin\Shippers;

use App\Models\Shipper;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public function delete(Shipper $shipper): void
    {
        $shipper->delete();
    }

    public function render()
    {
        $shippers = Shipper::latest()->paginate();
        return view('livewire.admin.shippers.index', compact('shippers'));
    }
}
