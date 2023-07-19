<?php

namespace App\Http\Livewire\Admin\Packages;

use App\Models\Package;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public function delete(Package $package): void
    {
        $package->delete();
    }

    public function render()
    {
        $packages = Package::latest()->paginate();
        return view('livewire.admin.packages.index', compact('packages'));
    }
}
