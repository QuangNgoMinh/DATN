<?php
use App\Http\Controllers\Std\LoginController;
use App\Http\Livewire\Std\AuthorStudent;
use App\Http\Livewire\Std\DashboardStudent;
use App\Http\Livewire\Std\BookStudent;
use App\Http\Livewire\Std\CategoryStudent;
use App\Http\Livewire\Std\LoginStudent;
use App\Http\Livewire\Std\PublisherStudent;
use Illuminate\Support\Facades\Route;


// Route::get('std/dashboard', DashboardStudent::class)->name('dashboard-std');
// Route::get('std/author', AuthorStudent::class)->name('author-std');
// Route::get('std/book', BookStudent::class)->name('book-std');
// Route::get('std/category', CategoryStudent::class)->name('category-std');
// Route::get('std/publisher', PublisherStudent::class)->name('publisher-std');

// Route::group(['middleware' => 'authstudent'], function () {

//     Route::get('std/dashboard', DashboardStudent::class)->name('dashboard-std');
//     Route::get('std/author', AuthorStudent::class)->name('author-std');
//     Route::get('std/book', BookStudent::class)->name('book-std');
//     Route::get('std/category', CategoryStudent::class)->name('category-std');
//     Route::get('std/publisher', PublisherStudent::class)->name('publisher-std');
// });


// Route::group(['middleware' => 'gueststudent'], function () {
//     Route::get('/std', LoginStudent::class)->name('login-std');
// });


// Route::get('std-login', [LoginStudent::class, 'login'])->name('std-login');

// Route::group(['prefix' => 'std-login'], function () {

//     Route::get('/dashboard', DashboardStudent::class)->name('std-dashboard');
    
// });  
