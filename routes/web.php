<?php

use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Route;

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

Route::group([], function (Router $router) {
    /*Home*/
    $router->get('/', \App\Http\Controllers\App\Home\ShowController::class)->name('home');

    /*Company*/
    $router->get('company', \App\Http\Controllers\App\Company\ShowController::class)->name('company.show');
    $router->get('company/create', [\App\Http\Controllers\App\Company\CreateController::class, 'create'])->name('company.create');
    $router->post('company/store', [\App\Http\Controllers\App\Company\CreateController::class, 'store'])->name('company.store');
    $router->get('company/{id}/delete', \App\Http\Controllers\App\Company\DeleteController::class)->name('company.delete');
    $router->get('company/{id}/edit', [\App\Http\Controllers\App\Company\EditController::class, 'edit'])->name('company.edit');
    $router->get('company/{id}/update', [\App\Http\Controllers\App\Company\EditController::class, 'update'])->name('company.update');

    /*People*/
    $router->get('people', \App\Http\Controllers\App\People\ShowController::class)->name('people.show');
    $router->get('people/create', [\App\Http\Controllers\App\People\CreateController::class, 'create'])->name('people.create');
    $router->post('people/store', [\App\Http\Controllers\App\People\CreateController::class, 'store'])->name('people.store');
    $router->get('people/{id}/edit', [\App\Http\Controllers\App\People\EditController::class, 'edit'])->name('people.edit');
    $router->post('people/{id}/update', [\App\Http\Controllers\App\People\EditController::class, 'update'])->name('people.update');
    $router->get('people/{id}/delete', \App\Http\Controllers\App\People\DeleteController::class)->name('people.delete');

    /*Address*/
    $router->get('address', \App\Http\Controllers\App\Address\ShowController::class)->name('address.show');
    $router->get('address/create', [\App\Http\Controllers\App\Address\CreateController::class, 'create'])->name('address.create');
    $router->post('address/store', [\App\Http\Controllers\App\Address\CreateController::class, 'store'])->name('address.store');
    $router->get('address/{id}/edit', [\App\Http\Controllers\App\Address\EditController::class, 'edit'])->name('address.edit');
    $router->post('address/{id}/update', [\App\Http\Controllers\App\Address\EditController::class, 'update'])->name('address.update');
    $router->get('address/{id}/delete', \App\Http\Controllers\App\Address\DeleteController::class)->name('address.delete');

    /*Location*/
    $router->get('location', [\App\Http\Controllers\App\Location\ShowController::class, 'index'])->name('location.show');
    $router->get('location/get', [\App\Http\Controllers\App\Location\ShowController::class, 'getLocation'])->name('location.get');

});