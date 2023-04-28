<?php
    use Illuminate\Support\Facades\Route;
    use App\Http\Controllers\AuthentificationController;
    use App\Http\Controllers\DashboardController;
    use App\Http\Controllers\ProfilController;
    
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
        Route::get('/forget-password', 'ouvrirForgetPassword')->middleware("session_exist");
        Route::post('/post-forget-password', 'gestionForgetPassword');
        Route::get('/update-password', 'ouvrirUpdatePassword')->middleware("session_exist");
        Route::post('/post-update-password-forget', 'gestionUpdatePasswordForget');
        Route::get('/logout', 'gestionLogout');
    });

    Route::controller(DashboardController::class)->group(function() {
        Route::get('/dashboard', 'ouvrirDashboard')->middleware("session_not_exist");
    });

    Route::controller(ProfilController::class)->group(function() {
        Route::get('/profil', 'ouvrirProfil')->middleware("session_not_exist");
        Route::get('/edit-photo-profil', 'ouvrirEditProfil')->middleware("session_not_exist");
        Route::post('/update-photo-profil', 'gestionUpdatePhotoDeProfil');
        Route::get('/update-status-profil', 'gestionUpdateStatusDeProfil');
    });
?>
