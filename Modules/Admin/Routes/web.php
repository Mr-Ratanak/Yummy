<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Modules\Admin\Http\Controllers\AboutUsController;
use Modules\Admin\Http\Controllers\CategoryController;
use Modules\Admin\Http\Controllers\ChefController;
use Modules\Admin\Http\Controllers\ClientController;
use Modules\Admin\Http\Controllers\CompanyController;
use Modules\Admin\Http\Controllers\EventController;
use Modules\Admin\Http\Controllers\FeatureController;
use Modules\Admin\Http\Controllers\GalleryController;
use Modules\Admin\Http\Controllers\MenuController;
use Modules\Admin\Http\Controllers\PageController;
use Modules\Admin\Http\Controllers\SocialController;
use Modules\Admin\Http\Controllers\UserController;

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

Route::prefix('admin')->group(function() {
    Route::get('/', 'AdminController@index');

    Route::resource('user', UserController::class)->except('destroy','show');
    Route::get('user/logout',[UserController::class,'logout'])->name('user.logout');
    Route::get('user/delete/{id}',[UserController::class,'delete'])->name('user.delete');
    Route::get('user/edit/{id}',[UserController::class,'edit'])->name('user.edit');
    Route::get('user/reset_password',[UserController::class,'reset_password'])->name('user.reset_password');
    Route::post('user/save',[UserController::class,'save'])->name('user.save');

    //company route
    Route::get('company',[CompanyController::class,'index'])->name('company.index');
    Route::get('company/edit{id}',[CompanyController::class,'edit'])->name('company.edit');
    Route::post('company/save',[CompanyController::class,'save'])->name('company.save');

    //category route
    Route::resource('category', CategoryController::class)->except('destroy','show');
    Route::get('category/create',[CategoryController::class,'create'])->name('category.create');
    Route::get('category/delete{id}',[CategoryController::class,'delete'])->name('category.delete');
    Route::get('category/edit{id}',[CategoryController::class,'edit'])->name('category.edit');

    //social route
    Route::resource('social',SocialController::class)->except('destroy','show');
    // Route::get('social/index',[SocialController::class,'delete'])->name('social.delete');
    Route::get('social/eidt{id}',[SocialController::class,'edit'])->name('social.edit');
    Route::get('social/delete{id}',[SocialController::class,'delete'])->name('social.delete');

    //About_us route
    Route::resource('about_us',AboutUsController::class)->except('destroy','show');
    Route::get('about_us/delete{id}',[AboutUsController::class,'delete'])->name('about_us.delete');
    Route::get('about_us/edit{id}',[AboutUsController::class,'edit'])->name('about_us.edit');
    
    //gallery
    Route::resource('gallery',GalleryController::class)->except('destroy','show');
    Route::get('gallery/create',[GalleryController::class,'create'])->name('gallery.create');
    Route::get('gallery/delete{id}',[GalleryController::class,'delete'])->name('gallery.delete');
    Route::get('gallery/edit{id}',[GalleryController::class,'edit'])->name('gallery.edit');

    //event
    Route::resource('event',EventController::class)->except('destroy','show');
    Route::get('event/create',[EventController::class,'create'])->name('event.create');
    Route::get('event/delete{id}',[EventController::class,'delete'])->name('event.delete');
    Route::get('event/edit{id}',[EventController::class,'edit'])->name('event.edit');

    //chefs
    Route::resource('chef',ChefController::class)->except('destroy','show');
    Route::get('chef/create',[ChefController::class,'create'])->name('chef.create');
    Route::get('chef/delete{id}',[ChefController::class,'delete'])->name('chef.delete');
    Route::get('chef/edit{id}',[ChefController::class,'edit'])->name('chef.edit');

    //features
    Route::resource('feature',FeatureController::class)->except('destroy','show');
    Route::get('feature/create',[FeatureController::class,'create'])->name('feature.create');
    Route::get('feature/delete{id}',[FeatureController::class,'delete'])->name('feature.delete');
    Route::get('feature/edit{id}',[FeatureController::class,'edit'])->name('feature.edit');

    //page_info
    Route::resource('page_info', PageController::class)->only('index','edit','update');
    Route::get('page_info/edit{id}',[PageController::class,'edit'])->name('page_info.edit');

    //menu
    Route::resource('menu',MenuController::class)->except('destroy','show');
    Route::get('menu/delete{id}',[MenuController::class,'delete'])->name('menu.delete');
    Route::get('menu/edit{id}',[MenuController::class,'edit'])->name('menu.edit');
    
    //client
    Route::resource('client', ClientController::class)->except('destroy','show');
    Route::get('client/create',[ClientController::class,'create'])->name('client.create');
    Route::get('client/delete{id}',[ClientController::class,'delete'])->name('client.delete');
    Route::get('client/edit{id}',[ClientController::class,'edit'])->name('client.edit');


});
