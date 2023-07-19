<?php

use App\Http\Controllers\FilesController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\SecurityController;

use App\Http\Livewire\Admin\Clientes\Edit as EditClientes;
use App\Http\Livewire\Admin\Clientes\Index as IndexClientes;
use App\Http\Livewire\Admin\Paquetes\Disponibles as PaquetesDisponibles;
use App\Http\Livewire\Admin\Paquetes\Entregados;
use App\Http\Livewire\Admin\Paquetes\Enviados;
use App\Http\Livewire\Admin\Paquetes\Ficha;
use App\Http\Livewire\Admin\Paquetes\Preparados;
use App\Http\Livewire\Admin\Paquetes\Recibidos;
use App\Http\Livewire\Admin\Paquetes\Reempacar;
use App\Http\Livewire\Admin\Paquetes\Paquete;
use App\Http\Livewire\Admin\Paquetes\Tracking;
use App\Http\Livewire\Cliente\Disponibles;
use App\Http\Livewire\Cliente\Instrucciones;
use App\Http\Livewire\Cliente\Paquetes;
use App\Http\Livewire\Cliente\Paquetes\Tracking as PaquetesTracking;
use App\Http\Livewire\Cliente\Recibido;
use App\Http\Livewire\Cliente\Repacks;
use App\Http\Livewire\Cliente\Transito;
use App\Models\Department;
use App\Models\Package;
use App\Models\User;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Laravel\Fortify\RoutePath;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
email/verify/{id}/{hash}
 verification.verify
 VerifyEmailController@__invoke
 
*/

Route::get('/cities/{department}', function (Department $department) {
    return $department->cities;
})->name('ciudades');
Route::view('/layout', 'layout');
Route::view('/admin', 'admin');
Route::group(['middleware' => config('fortify.middleware', ['web'])], function () {

    $verificationLimiter = config('fortify.limiters.verification', '6,1');
    /*
    Route::get(
        RoutePath::for('verification.verify', '/email/verify/{id}/{hash}'),
        [SecurityController::class, 'verifyEmail']
    )
        ->middleware([
            'throttle:' . $verificationLimiter
        ])
        ->name('verification.verify');
    */
    Route::get('/email/verify/{id}/{hash}', [SecurityController::class, 'verifyEmail'])
        ->middleware([
            //'auth', 
            'signed',
            //            'throttle:' . $verificationLimiter
        ])->name('verification.verify');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {

    Route::redirect('/dashboard', '/');
    Route::get('/', [IndexController::class, 'dashboard'])->name('dashboard');

    Route::get('/images/{type}-{code}.svg', [FilesController::class, 'barcode'])->name('barcode');

    Route::middleware('isclient')->name('cliente.')->group(function () {
        Route::get('/track/{package}', PaquetesTracking::class)->name('tracking');
        Route::get('/instrucciones/{package}', Instrucciones::class)->name('instrucciones');

        Route::get('/paquetico/{user}', Paquete::class)->name('paquetico');
        Route::get('/paquetes', Paquetes::class)->name('paquetes');
        Route::get('/transito', Transito::class)->name('transito');
        Route::get('/disponible', Disponibles::class)->name('disponible');
        Route::get('/recibido', Recibido::class)->name('recibidos');
    });

    Route::middleware('isadmin')->name('admin.')->group(function () {

        Route::prefix('clientes')->name('clientes.')->group(function () {
            Route::get('/', IndexClientes::class)->name('index');
            Route::get('/nuevo', EditClientes::class)->name('nuevo');
            Route::get('/{user}', EditClientes::class)->name('edit')->where('user', '[0-9]+');
        });

        Route::get('/tracking/{package}', Tracking::class)->name('tracking');

        Route::get('/paquete', Paquete::class)->name('paquete.index');
        Route::get('/paquete/{user}', Paquete::class)->name('paquete');
        Route::get('/recibidos', Recibidos::class)->name('recibidos.index');
        Route::get('/recibidos/{user}', Recibidos::class)->name('recibidos.user');
        Route::get('/preparados', Preparados::class)->name('preparados.index');
        Route::get('/preparados/{transport}', Preparados::class)->name('preparados.transporte');
        Route::get('/enviados', Enviados::class)->name('enviados');
        Route::get('/enviados/{dispatch}', Enviados::class)->name('enviados.dispatch');
        Route::get('/disponibles', PaquetesDisponibles::class)->name('disponibles');
        Route::get('/disponibles/{user}', PaquetesDisponibles::class)->name('disponibles.user');
        Route::get('/entregados', Entregados::class)->name('entregados');
    });
    /*
    Route::middleware('isadmin')->name('admin.')->prefix('admin')->group(function () {
        Route::resources([
            'cities' => CityController::class,
            'currency_types' => CurrencyTypeController::class,
            'departments' => DepartmentController::class,
            'packages' => PackageController::class,
            'package_types' => PackageTypeController::class,
            'shippers' => ShipperController::class,
            'transports' => TransportController::class,
            'users' => TransportController::class,
        ]);
    });
    */
});
