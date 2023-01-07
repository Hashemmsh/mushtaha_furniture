<?php

use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\SiteController;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

Route::prefix(LaravelLocalization::setLocale())->group(function(){

    Route::prefix('admin')->name('admin.')->middleware(['auth' , 'check_user'])->group(function(){
        Route::get('/' , [AdminController::class, 'index'])->name('index');

        ///////////////////Route Categories/////////////////////////////////////
        Route::get('categories/trash' , [CategoryController::class , 'trash'])->name('categories.trash');
        Route::get('categories/{id}/restore' , [CategoryController::class , 'restore'])->name('categories.restore');
        Route::get('categories/{id}/forcedelete' , [CategoryController::class , 'forcedelete'])->name('categories.forcedelete');
        Route::resource('categories',CategoryController::class);

        ////////////////////////////////////// Route Products //////////////////////////////////
        Route::get('products/trash' , [ProductController::class , 'trash'])->name('products.trash');
        Route::get('products/{id}/restore' , [ProductController::class , 'restore'])->name('products.restore');
        Route::get('products/{id}/forcedelete' , [ProductController::class , 'forcedelete'])->name('products.forcedelete');
        Route::resource('products',ProductController::class);

        ////////////////////////////////////// Route Posts //////////////////////////////////
        Route::get('posts/trash' , [PostController::class , 'trash'])->name('posts.trash');
        Route::get('posts/{id}/restore' , [PostController::class , 'restore'])->name('posts.restore');
        Route::get('posts/{id}/forcedelete' , [PostController::class , 'forcedelete'])->name('posts.forcedelete');
        Route::resource('posts',PostController::class);

    });

    Route::get('/',[SiteController::class , 'index'])->name('site.index');
    Route::get('/category' ,[SiteController::class , 'category'])->name('site.category');
    Route::get('/product' ,[SiteController::class , 'product'])->name('site.product');
    // Route::view('/','Welcome')->name('site.index');


    Auth::routes();

    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::view('not-allowed', 'not_allowed');
});
