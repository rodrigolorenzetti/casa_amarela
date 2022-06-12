<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\LoginAdmin;
use App\Http\Controllers\Admin\Dashboard;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\PageHomeController;
use App\Http\Controllers\Admin\PartnerController;


/*RealtorController
|--------------------------------------------------------------------------
| API 
|--------------------------------------------------------------------------
|
| Insira aqui as rotas do gestor
|
*/

Route::namespace("Admin")
    ->group(function () {

        Route::prefix('content-adm')->group(function () {
            Route::any('/', [LoginAdmin::class, 'index'])->name('login.page');
        });
        Route::any('/loginAdmin', [LoginAdmin::class, 'login']);
        Route::any('/logoutAdmin', [LoginAdmin::class, 'logout'])->name("admin.logout");

        Route::middleware('auth.user')->group(function () {

            Route::prefix('content-adm')->group(function () {
                Route::any('/dashboard', [Dashboard::class, 'index']);

                // Gestores
                Route::any('/lista-gestores', [AdminController::class, 'index'])->name("admin.list");
                Route::any('/adicionar-gestor', [AdminController::class, 'create'])->name("admin.add");
                Route::any('/editar-gestor/{id}', [AdminController::class, 'edit'])->name("admin.edit");

                // PageHome
                Route::any('/editar-conteudo-home', [PageHomeController::class, 'index']);
                // Route::any('/editar-galeria-home', [PageHomeController::class, 'editPhotos']);

                // Partner
                Route::any('/lista-parceiros', [PartnerController::class, 'index'])->name("partner.list");
                Route::any('/adicionar-parceiro', [PartnerController::class, 'create'])->name("partner.add");
                Route::any('/editar-parceiro/{id}', [PartnerController::class, 'edit'])->name("partner.edit");
            });

            // Gestores
            Route::any('/addAdmin', [AdminController::class, 'store']);
            Route::any('/changeAdmin', [AdminController::class, 'update']);
            Route::any('/deleteAdmin', [AdminController::class, 'updateStatus']);
            Route::any('/deleteMultipleAdmin', [AdminController::class, 'updateMultipleStatus']);

            // Partner
            Route::any('/addPartner', [PartnerController::class, 'store']);
            Route::any('/changePartner', [PartnerController::class, 'update']);
            Route::any('/deletePartner', [PartnerController::class, 'updateStatus']);
            Route::any('/deleteMultiplePartner', [PartnerController::class, 'updateMultipleStatus']);

            // PageHome

            Route::any('/changePageHome', [PageHomeController::class, 'update']);
        });
    });
