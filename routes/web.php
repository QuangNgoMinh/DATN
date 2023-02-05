<?php

use App\Http\Livewire\Author;
use App\Http\Livewire\Book;
use App\Http\Livewire\Dashboard;
use App\Http\Livewire\Category;
use App\Http\Livewire\IssueBook;
use App\Http\Livewire\Loign;
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

Route::get('/dashboard', Dashboard::class)->name('dashboard');
Route::get('/author', Author::class)->name('author');


