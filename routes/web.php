<?php
    use Illuminate\Support\Facades\Route;
    use App\Http\Controllers\AuthentificationController;
    use App\Http\Controllers\DashboardController;
    /*
    |--------------------------------------------------------------------------
    | Web Routes
    |--------------------------------------------------------------------------
    |
    | Here is where you can register web routes for your application. These
    | routes are loaded by the RouteServiceProvider and all of them will
    | be assigned to the "web" middleware group. Make something great!
    |
    */

    Route::controller(AuthentificationController::class)->group(function() {
        Route::get('/', 'ouvrirSignin')->middleware("session_exist");
        Route::post('/post-login', 'gestionLogin');
    });

    Route::controller(DashboardController::class)->group(function() {
        Route::get('/dashboard', 'ouvrirDashboard')->middleware("session_not_exist");
    });
?>
