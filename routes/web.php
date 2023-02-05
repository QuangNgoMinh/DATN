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
    Route::get('/student', Student::class)->name('students');
    Route::get('/issue-book', IssueBook::class)->name('issue_book');
    Route::get('/report', Report::class)->name('report');
    Route::get('/setting', Setting::class)->name('setting');
});


Route::group(['middleware' => 'guest'], function () {
    Route::get('/', Login::class)->name('login');
});
