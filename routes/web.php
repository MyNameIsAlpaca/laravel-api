<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Admin\TypeController;
use App\Http\Controllers\Guest\GuestController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\TechnologiesController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::resource('guest/projects', GuestController::class)->names([
    'index' => 'guest.projects.index',
    'create' => 'guest.projects.create',
    'store' => 'guest.projects.store',
    'show' => 'guest.projects.show',
])->parameters([
    'projects' => 'project:slug'
]);


Route::middleware(['auth', 'verified'])->prefix('admin')->group(function () {

    Route::resource('projects', ProjectController::class)->names([
        'index' => 'admin.projects.index',
        'create' => 'admin.projects.create',
        'store' => 'admin.projects.store',
        'show' => 'admin.projects.show',
    ]);
    Route::resource('types', TypeController::class)->names([
        'index' => 'admin.types.index',
        'create' => 'admin.types.create',
        'store' => 'admin.types.store',
        'show' => 'admin.types.show',
    ]);
    Route::resource('technologies', TechnologiesController::class)->names([
        'index' => 'admin.technologies.index',
        'create' => 'admin.technologies.create',
        'store' => 'admin.technologies.store',
        'show' => 'admin.technologies.show',
    ]);
    Route::get('/', [AdminController::class, 'home']);
});


Route::middleware(['auth'])->group(function () {
    Route::get('/admin', function () {
        return view('admin.home');
    })->name('admin');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
