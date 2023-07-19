<?php

namespace App\Http\Livewire\Admin\Paquetes;

use App\Models\Dispatch;
use App\Models\Package;
use App\Models\Repack;
use App\Notifications\DisponibleNotification;
use App\Traits\WithSorting;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Pagination\Paginator as PaginationPaginator;
use Livewire\Component;
use Livewire\WithPagination;

class Enviados extends Component
{
    use AuthorizesRequests;
    use WithPagination;
    use WithSorting;

    public Dispatch $dispatch;
    public $dispatchs = [];

    public $search;
    protected $queryString = ['search'];

    public int $confirmando;

    public function recibido(Dispatch $dispatch): void
    {
        $dispatch->received_at = now();
        $dispatch->save();

        $packages = $dispatch->packages();

        $packages->update([
            'package_status_id' => 4
        ]);

        $usersWithPackages = $packages->select('user_id')->distinct();

        foreach ($usersWithPackages->get() as $package) {
            $packages = $package->user->packages()->where('dispatch_id', $dispatch->id)->get();
            $package->user->notify(new DisponibleNotification($packages));
        }
    }

    public function anular(Dispatch $dispatch): void
    {
        $dispatch->received_at = NULL;
        $dispatch->save();
        $dispatch->packages()
            ->update([
                'package_status_id' => 3
            ]);
    }


    public function mount(Dispatch $dispatch)
    {
        $this->dispatch = $dispatch;
        $this->dispatchs = Dispatch::all();
    }

    public function render()
    {
        $this->authorize('isadmin');

        $dispatches = Dispatch::whereNull('received_at')->orderBy($this->sortBy, $this->sortDirection)->paginate(50);
        $theyArrived = Dispatch::whereNotNull('received_at')->orderBy($this->sortBy, $this->sortDirection)->paginate(50);
        return view('livewire.admin.paquetes.enviados', compact('dispatches', 'theyArrived'));
    }
}
