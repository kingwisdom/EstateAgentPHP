<?php

use App\Http\Controllers\PagesController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\PropertyController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ForgotPasswordController;

Route::get('/',[PagesController::class, 'index']);
Route::get('/property-details/{slug}',[PagesController::class, 'show'])->name('property.show');
Route::get('/post-details/{slug}',[PagesController::class, 'show_post'])->name('blog.show');
Route::get('/all-properties',[PagesController::class, 'all_property'])->name('all_property');
Route::get('/all_posts',[PagesController::class, 'all_post'])->name('blog.all_post');
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

    //blog post
    Route::get('admin/post', [BlogController::class, 'index'])->name('blog.index');
    Route::post('admin/blog/create', [BlogController::class, 'store'])->name('blog.create');
    Route::get('admin/{slug}/blog', [BlogController::class, 'edit'])->name('blog.edit');
    Route::patch('admin/blog/{id}', [BlogController::class, 'update'])->name('post.update');
    Route::delete('admin/blog/{id}', [BlogController::class, 'destroy'])->name('post.delete');

});

// forgot password
// Route::get('forget-password', [ForgotPasswordController::class, 'showForgetPasswordForm'])->name('forget.password.get');
// Route::post('forget-password', [ForgotPasswordController::class, 'submitForgetPasswordForm'])->name('forget.password.post'); 
// Route::get('reset-password/{token}', [ForgotPasswordController::class, 'showResetPasswordForm'])->name('reset.password.get');
// Route::post('reset-password', [ForgotPasswordController::class, 'submitResetPasswordForm'])->name('reset.password.post');
 Route::post('request-email', [ForgotPasswordController::class, 'postEmailPassword'])->name('requestemail');
 Route::get('reset-password', [ForgotPasswordController::class, 'Reset_Password'])->name('resetpassword');
 Route::post('reset-password', [ForgotPasswordController::class, 'Post_Reset_Password'])->name('postresetpassword');


Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
