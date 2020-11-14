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
    Route::get('/', function(){ return view('admin.index'); })->name('admin');

    /**  Domain routes
    *   @Read domain
    *   @Create domain
    *   @Edit domain
    *   @delete domain
    */
    Route::prefix('domain')->group(function(){
        Route::get('/',[DomainController::class,'read_domain'])->name('readDomain');
        Route::get('/read-sidebar-domain-and-categories',[DomainController::class,'read_sidebar_domain_categoroes'])->name('readSidebarDomainAndCategories');
        Route::post('create',[DomainController::class,'create_domain'])->name('createDomain');
        Route::get('delete/{id}',[DomainController::class,'delete_domain'])->name('deleteDomain');
        Route::get('edit/{id}',[DomainController::class,'edit_domain'])->name('editDomain');
        Route::post('update/',[DomainController::class,'update_domain'])->name('updateDomain');
    });

    /**  Category routes
    *   @Read category
    *   @Create category
    *   @Edit category
    *   @delete category
    */
    Route::prefix('category')->group(function(){
        Route::get('/', function(){ return view('admin.category'); });
        Route::get('/',[CategoryController::class,'read_category'])->name('readCategory');
        Route::post('create',[CategoryController::class,'create_category'])->name('createCategory');
        Route::get('delete/{id}',[CategoryController::class,'delete_category'])->name('deleteCategory');
        Route::get('edit/{id}',[CategoryController::class,'edit_category'])->name('editCategory');
        Route::post('update/',[CategoryController::class,'update_category'])->name('updateCategory');
    });
});

