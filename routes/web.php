<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DomainController;

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
    return view('welcome');
});

Route::prefix('admin')->group(function () {
    Route::get('/', function(){
        return view('admin.index');
    })->name('admin');

    /*  Category routes
    *   @Create category
    *   @Edit category
    *   @delete category
    */
    Route::prefix('category')->group(function(){
        Route::get('/',function(){
            return view('admin.category');
        })->name('category');
    });

    /**  Domain routes
    *   @Read domain
    *   @Create domain
    *   @Edit domain
    *   @delete domain
    */
    Route::prefix('domain')->group(function(){
        Route::get('/',[DomainController::class,'read_domain'])->name('readDomain');
        Route::post('create',[DomainController::class,'create_domain'])->name('createDomain');
        Route::get('delete/{id}',[DomainController::class,'delete_domain'])->name('deleteDomain');

    });
});

