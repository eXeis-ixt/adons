<?php

use App\Http\Controllers\Controller;
use App\Http\Controllers\HomeController;
use App\Livewire\AboutPage;
use App\Livewire\BlogPage;
use App\Livewire\Home;
use App\Livewire\ServicePage;
use App\Livewire\ShowBlog;
use App\Livewire\ShowContactPage;
use App\Livewire\ShowFaqPage;
use App\Livewire\ShowService;
use App\Livewire\TeamPage;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/', [Controller::class, 'index'])->name('home');
Route::get('/', Home::class)->name('home');


Route::get('/service', ServicePage::class)->name('service');
Route::get('service/{services:slug}', [HomeController::class, 'show'])->name('show');
// Route::get('/service/{Services:slug}', [HomeController::class, 'show'])->name('show');
Route::get('/about', AboutPage::class)->name('about');
// Route::get('/about', [Controller::class, 'about'])->name('about');
Route::get('team', TeamPage::class)->name('team');
Route::get('blog', BlogPage::class)->name('blog');
// Route::get('blog/{slug}', ShowBlog::class)->name('show.blog');
Route::get('blog/{blogs:slug}', [HomeController::class, 'blog'])->name('show.blog');
Route::get('faq', ShowFaqPage::class)->name('faq');
Route::get('contact', [HomeController::class, 'contact'])->name('contact');
Route::post('contact', [HomeController::class, 'store'])->name('store');
