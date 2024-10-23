<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\{NavController};

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

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('nav', NavController::class);
Route::get('/getNavbarData', [App\Http\Controllers\NavController::class, 'getNavbarData'])->name('nav.getNavbarData');
Route::get('/getMenuData', [App\Http\Controllers\NavController::class, 'getMenuData'])->name('nav.getMenuData');
Route::get('/getSubmenuData', [App\Http\Controllers\NavController::class, 'getSubmenuData'])->name('nav.getSubmenuData');
Route::get('/getMenuDataSelect', [App\Http\Controllers\NavController::class, 'getMenuDataSelect'])->name('nav.getMenuDataSelect');


Route::post('/navbar_update/{id}', [NavController::class, 'updateNavbar'])->name('navbar.update');
Route::post('/menu_update/{id}', [NavController::class, 'updateMenu'])->name('menu.update');
Route::post('/submenu_update/{id}', [NavController::class, 'updateSubmenu'])->name('submenu.update');

