<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProduitController;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\MagasinController;
use App\Http\Controllers\Magasin_produitController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::resource('produit',ProduitController::class);
Route::resource('categorie',CategorieController::class);
Route::resource('magasin',MagasinController::class);
Route::resource('magasin_produit', Magasin_produitController::class);
Route::get('categorie/{slug}/produits', [ProduitController::class, 'index'])->name('produit.categorie');
Route::get('magasin/{slug}/magasin_produits', [Magasin_produitController::class, 'index'])->name('magasin_produit.magasin');
Route::get('/', function () {
    return view('welcome');
});
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
