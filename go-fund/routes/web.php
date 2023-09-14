<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StoryController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::prefix('story')->group(function () {
    Route::get('/', [storyController::class, 'index'])->name('story-index');
    Route::get('/list', [storyController::class, 'list'])->name('story-list');
    Route::post('/', [storyController::class, 'store'])->name('story-store');
    Route::get('/create', [StoryController::class, 'create'])->name('story-create');
    Route::get('/{story}', [storyController::class, 'show'])->name('story-show');
    Route::get('/{story}/edit', [storyController::class, 'edit'])->name('story-edit');
    Route::put('/{story}', [storyController::class, 'update'])->name('story-update');
    Route::delete('/{story}', [storyController::class, 'destroy'])->name('story-destroy');
});

Route::post('/story/{story}/add-to-sum', [StoryController::class, 'addToSum'])->name('add-to-sum');


require __DIR__.'/auth.php';
