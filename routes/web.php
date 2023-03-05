<?php

use App\Http\Livewire\Author;
use App\Http\Livewire\Book;
use App\Http\Livewire\Dashboard;
use App\Http\Livewire\Category;
use App\Http\Livewire\IssueBook;
use App\Http\Livewire\Login;
use App\Http\Livewire\Publisher;
use App\Http\Livewire\Report;
use App\Http\Livewire\Setting;
use App\Http\Livewire\Student;
use App\Http\Livewire\User;



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

// Route::get('/dashboard', Dashboard::class)->name('dashboard');
// Route::get('/author', Author::class)->name('author');



Route::group(['middleware' => 'auth'], function () {

    Route::get('/dashboard', Dashboard::class)->name('dashboard');
    Route::get('/author', Author::class)->name('author');
    Route::get('/category', Category::class)->name('category');
    Route::get('/publisher', Publisher::class)->name('publisher');
    Route::get('/book', Book::class)->name('book');
    Route::get('/student', Student::class)->name('student');
    Route::get('/issue-book', IssueBook::class)->name('issue_book');
    Route::get('/report', Report::class)->name('report');
    Route::get('/setting', Setting::class)->name('setting');
    Route::get('/admin/user', User::class)->name('admin.user')->middleware('is_admin');
});


Route::group(['middleware' => 'guest'], function () {
    Route::get('/', Login::class)->name('login');
});

use App\Http\Livewire\Std\AuthorStudent;
use App\Http\Livewire\Std\DashboardStudent;
use App\Http\Livewire\Std\BookStudent;
use App\Http\Livewire\Std\CategoryStudent;
use App\Http\Livewire\Std\LoginStudent;
use App\Http\Livewire\Std\PublisherStudent;



// Route::group(['middleware' => 'authstudent'], function () {
    Route::get('std/dashboard', DashboardStudent::class)->name('dashboard-std');
    Route::get('std/author', AuthorStudent::class)->name('author-std');
    Route::get('std/book', BookStudent::class)->name('book-std');
    Route::get('std/category', CategoryStudent::class)->name('category-std');
    Route::get('std/publisher', PublisherStudent::class)->name('publisher-std');
    

    // });


// Route::group(['middleware' => 'gueststudent'], function () {
//     Route::get('/std', LoginStudent::class)->name('login-std');
// });