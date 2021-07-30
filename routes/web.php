<?php

use App\Http\Controllers\PagesController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\PropertyController;
use Illuminate\Support\Facades\Route;

Route::get('/',[PagesController::class, 'index']);
Route::get('/product-details/{id}',[PagesController::class, 'show'])->name('property.show');
Route::get('/about',[PagesController::class, 'about'])->name('about');
Route::get('/contact-us',[PagesController::class, 'contact'])->name('contact');

//auth
Route::middleware(['auth:sanctum'])->group(function () {
    Route::get('/user-info',[PropertyController::class, 'index'])->name('property.index');
    Route::get('/create-property',[PropertyController::class, 'create'])->name('property.create');
    Route::post('/store-property',[PropertyController::class, 'store'])->name('property.post');
    Route::get('/property/{item_code}/edit',[PropertyController::class, 'edit'])->name('property.edit');
    Route::patch('/property/{item_code}',[PropertyController::class, 'update'])->name('property.update');
});

 
//Admin
Route::middleware(['is_admin'])->group(function () {
    //Route::get('admin/dashboard', [AdminController::class, 'index'])->name('admin.index')->middleware('is_admin');
    Route::get('admin/dashboard', [AdminController::class, 'index'])->name('admin.index');
    Route::get('admin/users', [AdminController::class, 'all_users'])->name('admin.users');
    Route::get('admin/properties', [AdminController::class, 'all_property'])->name('admin.property');
    
    Route::patch('admin/make/{id}', [AdminController::class, 'make_admin'])->name('make_admin');
    Route::patch('admin/users/{id}', [AdminController::class, 'remove_admin'])->name('remove_admin');

    Route::patch('admin/publish/{id}', [AdminController::class, 'publish'])->name('publish');
    Route::patch('admin/unpublish/{id}', [AdminController::class, 'unpublish'])->name('unpublish');
//category
    Route::get('admin/category', [CategoryController::class, 'index'])->name('category.index');
    Route::post('admin/category/creae', [CategoryController::class, 'store'])->name('category.create');
});


Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
