<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Site\SiteGeralController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Insira todas as rotas do site (rotas do gestor ficam em api.php) 
|
*/

Route::namespace("Site")
    ->group(function () {

        // Rota para a página inicial
        Route::any('/', [SiteGeralController::class, 'index'])->name('home');

        // Rota para doação
        Route::any('/doar', [SiteGeralController::class, 'index'])->name('donation');

        // Rota para a página de planos de doações
        Route::any('planos-de-doacoes', [SiteGeralController::class, 'donation_plans'])->name('donation_plans');

        // Rota para a página institucional
        Route::any('sobre-nos', [SiteGeralController::class, 'about'])->name('about');

        // Rota para a página de contato
        Route::any('contato', [SiteGeralController::class, 'contact'])->name('contact');

        // Rota para a página de voluntariado
        Route::any('voluntariado/{voluntariado}', [SiteGeralController::class, 'volunteering'])->name('volunteering');
    });
