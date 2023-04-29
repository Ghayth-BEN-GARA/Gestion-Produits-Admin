<?php
    use Illuminate\Support\Facades\Route;
    use App\Http\Controllers\AuthentificationController;
    use App\Http\Controllers\DashboardController;
    use App\Http\Controllers\ProfilController;
    use App\Http\Controllers\UserController;
    use App\Http\Controllers\ProduitController;
    
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
        Route::get('/edit-photo-profil', 'ouvrirEditPhotoProfil')->middleware("session_not_exist");
        Route::post('/update-photo-profil', 'gestionUpdatePhotoDeProfil');
        Route::get('/update-status-profil', 'gestionUpdateStatusDeProfil');
        Route::get('/edit-informations-profil', 'ouvrirEditInformationsProfil')->middleware("session_not_exist");
        Route::post('/update-informations-profil', 'gestionUpdateInformationsDeProfil');
        Route::post('/update-password-profil', 'gestionUpdatePasswordDeProfil');
    });

    Route::controller(UserController::class)->group(function() {
        Route::get('/create-user', 'ouvrirCreateUser')->middleware("session_not_super_admin");
        Route::post('/add-user', 'gestionAddUser');
        Route::get('/liste-users-table', 'ouvrirListeUsersTable')->middleware("session_not_super_admin");
        Route::get('/user', 'ouvrirUser')->middleware("session_not_super_admin");
        Route::get('/delete-user', 'gestionDeleteUser');
        Route::get('/edit-user', 'ouvrirEditUser')->middleware("session_not_super_admin");
        Route::post('/update-user', 'gestionUpdateUser');
        Route::get('/liste-users-grid', 'ouvrirListeUsersGrid')->middleware("session_not_super_admin");
    });

    Route::controller(ProduitController::class)->group(function() {
        Route::get('/create-produit', 'ouvrirCreateProduit')->middleware("session_not_super_admin");
        Route::post('/add-produit', 'gestionAddProduit');
        Route::get('/liste-produits', 'ouvrirListeProduits')->middleware("session_not_exist");
        Route::get('/delete-produit', 'gestionDeleteProduit');
        Route::get('/produit', 'ouvrirProduit')->middleware("session_not_exist");
        Route::get('/edit-produit', 'ouvrirEditProduit')->middleware("session_not_super_admin");
        Route::post('/update-produit', 'gestionUpdateProduit');
    });
?>



