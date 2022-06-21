<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\LoginAdmin;
use App\Http\Controllers\Admin\Dashboard;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\PageHomeController;
use App\Http\Controllers\Admin\PartnerController;
use App\Http\Controllers\Admin\DonationOptionsController;
use App\Http\Controllers\Admin\SiteConfigurationsController;
use App\Http\Controllers\Admin\VolunteeringController;
use App\Http\Controllers\Admin\AboutGalleryController;


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
                Route::any('/dashboard', [Dashboard::class, 'index'])->name("dashboard");

                // Admin
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

                // DonationOptions
                Route::any('/lista-opcoes-doacao', [DonationOptionsController::class, 'index'])->name("donation_options.list");
                Route::any('/adicionar-opcao-doacao', [DonationOptionsController::class, 'create'])->name("donation_options.add");
                Route::any('/editar-opcao-doacao/{id}', [DonationOptionsController::class, 'edit'])->name("donation_options.edit");

                // SiteConfigurations
                Route::any('/editar-configuracoes-site', [SiteConfigurationsController::class, 'edit'])->name("site_configurations.edit");

                // Volunteering
                Route::any('/lista-voluntariados', [VolunteeringController::class, 'index'])->name("volunteering.list");
                Route::any('/adicionar-voluntariado', [VolunteeringController::class, 'create'])->name("volunteering.add");
                Route::any('/editar-voluntariado/{id}', [VolunteeringController::class, 'edit'])->name("volunteering.edit");

                Route::any('/lista-submissoes-voluntariado/{volunteering_id}', [VolunteeringController::class, 'indexSubmitions'])->name("volunteering.list_submitions");
                Route::any('/visualiza-submissao-voluntariado/{id}', [VolunteeringController::class, 'detailsSubmitions'])->name("volunteering.details_submitions");

                // AboutGallery
                Route::any('/editar-galeria-de-imagens', [AboutGalleryController::class, 'edit'])->name("about_gallery.edit");
            });

            // Admin
            Route::any('/addAdmin', [AdminController::class, 'store']);
            Route::any('/changeAdmin', [AdminController::class, 'update']);
            Route::any('/deleteAdmin', [AdminController::class, 'updateStatus']);
            Route::any('/deleteMultipleAdmin', [AdminController::class, 'updateMultipleStatus']);

            // Partner
            Route::any('/addPartner', [PartnerController::class, 'store']);
            Route::any('/changePartner', [PartnerController::class, 'update']);
            Route::any('/deletePartner', [PartnerController::class, 'updateStatus']);
            Route::any('/deleteMultiplePartner', [PartnerController::class, 'updateMultipleStatus']);

            // DonationOptions
            Route::any('/addDonationOptions', [DonationOptionsController::class, 'store']);
            Route::any('/changeDonationOptions', [DonationOptionsController::class, 'update']);
            Route::any('/deleteDonationOptions', [DonationOptionsController::class, 'updateStatus']);
            Route::any('/deleteMultipleDonationOptions', [DonationOptionsController::class, 'updateMultipleStatus']);

            // SiteConfigurations
            Route::any('/changeSiteConfigurations', [SiteConfigurationsController::class, 'update']);

            // Volunteering
            Route::any('/addVolunteering', [VolunteeringController::class, 'store']);
            Route::any('/changeVolunteering', [VolunteeringController::class, 'update']);
            Route::any('/deleteVolunteering', [VolunteeringController::class, 'updateStatus']);
            Route::any('/deleteMultipleVolunteering', [VolunteeringController::class, 'updateMultipleStatus']);

            Route::any('/deleteVolunteeringSubmition', [VolunteeringController::class, 'updateSubmitionStatus']);
            Route::any('/deleteMultipleVolunteeringSubmition', [VolunteeringController::class, 'updateSubmitionMultipleStatus']);

            // PageHome

            Route::any('/changePageHome', [PageHomeController::class, 'update']);

            // AboutGallery
            Route::any('/addAboutGallery', [AboutGalleryController::class, 'createMultipleImages']);
            Route::any('/updateAboutGalleryAlt', [AboutGalleryController::class, 'updateGalleryImageAlt']);
            Route::any('/deleteAboutGallery', [AboutGalleryController::class, 'updateStatus']);
        });
    });
