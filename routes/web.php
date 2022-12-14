<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SnackController; 
use App\Http\Controllers\CommentController;
use App\Http\Controllers\StoreController;
use Illuminate\Support\Facades\Route;

//laravel9.*ではコントローラーのuse宣言をする

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


Route::get('/', [SnackController::class, 'index'])->name('snack.index');
Route::get('/snacks/create', [SnackController::class, 'create'])->middleware('auth');
Route::get('/comments/{snack}/create', [CommentController::class, 'create'])->middleware('auth');
Route::get('/snacks/random', [SnackController::class, 'random'])->name('random');
Route::get('/snacks/{snack}', [SnackController::class, 'show']);

Route::middleware('auth')->group(function () {
    Route::get('/snacks/{snack}/edit', [SnackController::class, 'edit']);
    Route::put('/snacks/{snack}', [SnackController::class, 'update']);
    Route::post('/snacks/{snack}', [SnackController::class, 'add']);
    Route::post('/snacks', [SnackController::class, 'store']);
    Route::delete('/snacks/{snack}', [SnackController::class, 'delete']);
});

Route::get('/comments', [CommentController::class, 'index'])->name('comment.index');
Route::get('/comments/bookmarked', [CommentController::class, 'bookmarked'])->name('comment.bookmarked')->middleware('auth');
Route::get('/comments/mycomment', [CommentController::class, 'mycomment'])->name('mycomment');
Route::get('/comments/{comment}', [CommentController::class, 'show']);

Route::middleware('auth')->group(function () {
    Route::get('comments/{comment}/edit', [CommentController::class, 'edit']);
    Route::put('/comments/{comment}', [CommentController::class, 'update'])->name('comment.update');
    Route::post('/comments/{snack}', [CommentController::class, 'store']);
    Route::delete('/comments/{comment}', [CommentController::class, 'delete'])->name('comment.delete');
    Route::post('/comments/{comment}/bookmark', [CommentController::class, 'bookmark'])->name('comment.bookmark');
    Route::post('comments/{comment}/unbookmark', [CommentController::class, 'unbookmark'])->name('comment.unbookmark');
});

Route::get('/stores', [StoreController::class, 'index'])->name('store.index');
Route::get('/stores/create', [StoreController::class, 'create'])->middleware('auth');
Route::get('/stores/{store}', [StoreController::class, 'show']);

Route::middleware('auth')->group(function () {
    Route::get('/stores/{store}/edit', [StoreController::class, 'edit']);
    Route::put('/stores/{store}', [StoreController::class, 'update']);
    Route::post('/stores', [StoreController::class, 'store']);
    Route::delete('/stores/{store}', [StoreController::class, 'delete']);
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


require __DIR__.'/auth.php';
