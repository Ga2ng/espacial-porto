<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Admin\ServiceAdminController;
use App\Http\Controllers\Admin\ProjectAdminController;
use App\Http\Controllers\Admin\BlogAdminController;
use App\Http\Controllers\Admin\TeamAdminController;
use App\Http\Controllers\Admin\ContactAdminController;
use App\Http\Controllers\Admin\AboutAdminController;
use App\Http\Controllers\Admin\ClientAdminController;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/layanan', [ServiceController::class, 'index'])->name('services.index');

Route::get('/proyek', [ProjectController::class, 'index'])->name('projects.index');
Route::get('/proyek/{slug}', [ProjectController::class, 'show'])->name('projects.show');

Route::get('/blog', [BlogController::class, 'index'])->name('blog.index');
Route::get('/blog/{slug}', [BlogController::class, 'show'])->name('blog.show');

Route::get('/tentang-kami', [AboutController::class, 'index'])->name('about.index');

Route::get('/kontak', [ContactController::class, 'index'])->name('contact.index');
Route::post('/kontak', [ContactController::class, 'store'])->name('contact.store');

Route::get('/sitemap.xml', [\App\Http\Controllers\SitemapController::class, 'index'])->name('sitemap');

// Authentication (akses via /login manual di URL)
Route::middleware('guest')->group(function () {
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [LoginController::class, 'login']);
});

Route::post('/logout', [LoginController::class, 'logout'])->name('logout')->middleware('auth');

// Admin area untuk mengelola data landing page
Route::middleware('auth')->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [ServiceAdminController::class, 'index'])->name('dashboard');
    Route::resource('services', ServiceAdminController::class)->except(['show']);
    Route::resource('projects', ProjectAdminController::class)->except(['show']);
    Route::delete('projects/{project}/images/{image}', [ProjectAdminController::class, 'destroyImage'])
        ->name('projects.images.destroy');
    Route::resource('blog', BlogAdminController::class)->except(['show']);
    Route::resource('team', TeamAdminController::class)->except(['show']);
    Route::get('about', [AboutAdminController::class, 'edit'])->name('about.edit');
    Route::post('about', [AboutAdminController::class, 'update'])->name('about.update');
    Route::get('contacts', [ContactAdminController::class, 'index'])->name('contacts.index');
    Route::get('contacts/{contact}', [ContactAdminController::class, 'show'])->name('contacts.show');
    Route::delete('contacts/{contact}', [ContactAdminController::class, 'destroy'])->name('contacts.destroy');
    Route::resource('clients', ClientAdminController::class)->except(['show']);
    Route::get('clients/regencies', [ClientAdminController::class, 'regencies'])->name('clients.regencies');
});
