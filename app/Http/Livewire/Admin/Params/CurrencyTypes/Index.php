<?php

namespace App\Http\Livewire\Admin\CurrencyTypes;

use App\Models\CurrencyType;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public function delete(CurrencyType $currencyType): void
    {
        $currencyType->delete();
    }

    public function render()
    {
        $cities = CurrencyType::latest()->paginate();
        return view('livewire.admin.cities.index', compact('cities'));
    }
}
