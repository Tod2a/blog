<?php

use App\Http\Controllers\{
    Admin\ArticleController as AdminArticleController,
    AboutController,
    ProfileController,
    HomepageController,
    ArticleController
};
use App\Http\Controllers\Admin\UserController;
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

Route::get('/', [HomepageController::class, 'index'])->name('homepage');

Route::get('/articles', [ArticleController::class, 'index'])->name('front.articles.index');
Route::get('/articles/{id}', [ArticleController::class, 'show'])->name('front.articles.show');

Route::middleware('auth')->group(function () {
    // Ajout d'un commentaire
    Route::post('/articles/{article}/comments', [ArticleController::class, 'addComment'])->name('front.articles.comments.add');
    // Suppression d'un commentaire
    Route::delete('/articles/{article}/comments/{comment}', [ArticleController::class, 'deleteComment'])->name('front.articles.comments.delete');
});

Route::get('/about', [AboutController::class, 'index'])->name('about.index');

Route::middleware(['auth'])->prefix('admin')->group(function () {
    //gestion des articles
    Route::resource('articles', AdminArticleController::class);

    //gestion des utilisateurs
    Route::resource('/users', UserController::class);
});

// Gestion du profil utilisateur
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    // On ajoute la route pour la modification de l'avatar
    Route::patch('/profile/avatar', [ProfileController::class, 'updateAvatar'])->name('profile.avatar.update');
});

Route::get('/profile/{user}', [ProfileController::class, 'show'])->name('profile.show');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


require __DIR__ . '/auth.php';
