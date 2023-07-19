<?php

namespace App\Http\Livewire\Admin\PackageTypes;

use App\Models\PackageType;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public function delete(PackageType $packageType): void
    {
        $packageType->delete();
    }

    public function render()
    {
        $packageTypes = PackageType::latest()->paginate();
        return view('livewire.admin.packageTypes.index', compact('packageTypes'));
    }
}
