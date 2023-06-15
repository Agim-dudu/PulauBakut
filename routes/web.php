<?php

use App\Http\Controllers\test;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\TestController;
use Laravel\Socialite\Facades\Socialite;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PuzzleController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DataTiketController;
use App\Http\Controllers\MyProfileController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\DataGaleryController;
use App\Http\Controllers\DataPenggunaController;
use App\Http\Controllers\DataFasilitasController;
use App\Http\Controllers\DataFloraFaunaController;

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


Route::get('login/google', [LoginController::class, 'redirectToGoogle'])->name('login.google');
Route::get('auth/google/callback', [LoginController::class, 'handleGoogleCallback']);

Route::get('login/facebook', [LoginController::class, 'redirectToFacebook'])->name('login.facebook');
Route::get('auth/facebook/callback', [LoginController::class, 'handleFacebookCallback']);

Route::get('/login', [LoginController::class, 'show'])->name('login');
Route::post('/login', [LoginController::class, 'auth'])->name('login.auth');

Route::get('/register', [RegisterController::class, 'show'])->name('register');
Route::post('/register', [RegisterController::class, 'store'])->name('register.store');



Route::get('/', [HomeController::class, 'show'])->name('index');

Route::post('/hubungi-kami', [ContactController::class, 'store'])->name('contact.store');    

Route::middleware('auth')->group(function () {
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
    Route::get('puzzle', [PuzzleController::class, 'show'])->name('puzzle');
    Route::get('quiz', [QuizController::class, 'index'])->name('quiz.index');
    Route::post('quiz/submit', [QuizController::class, 'submit'])->name('quiz.submit');
    Route::resource('profile', MyProfileController::class)->name('*','profile');
    Route::get('/order', [OrderController::class, 'index']);
    Route::post('/checkout', [OrderController::class, 'checkout']);
    Route::get('/invoice/{id}', [OrderController::class, 'invoice']);
    Route::post('/orders/{id}/update-status', [OrderController::class, 'updateStatus'])->name('updateStatus');

    Route::group([
        'prefix' => 'admin',
        'middleware' => 'is_admin',
        'as' => 'admin.'
    ], function () {
        Route::resource('data_pengguna', DataPenggunaController::class)->name('*','data_pengguna');

        Route::resource('data_galery', DataGaleryController::class)->name('*','data_galery');

        Route::resource('data_contact', ContactController::class)->name('*','data_contact');

        Route::resource('data_fasilitas', DataFasilitasController::class)->name('*','data_fasilitas');

        Route::resource('data_florafauna', DataFloraFaunaController::class)->name('*','data_florafauna');

        Route::get('data_tiket', [DataTiketController::class, 'show'])->name('data_tiket');

        Route::get('/history', [HistoryController::class, 'index'])->name('history');
    });
});

// Route::get('/feature', function () {
//     return view('feature');
// });
// Route::get('/project', function () {
//     return view('project');
// });
// Route::get('/quote', function () {
//     return view('quote');
// });
// Route::get('/service', function () {
//     return view('service');
// });
// Route::get('/team', function () {
//     return view('team');
// });
// Route::get('/', function () {
//     return view('index');
// });

