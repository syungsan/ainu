<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ScoreController; // 追加

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

Auth::routes();

// Add user access routes
Route::middleware(['auth', 'user-access:0'])->group(function () {

    Route::get('/home', [App\Http\Controllers\HomeController::class, 'home'])->name('home');

    Route::get('/ainu01/ainu_1', [App\Http\Controllers\Ainu01\Ainu1Controller::class, 'index'])->name('ainu01.ainu_1');
    Route::get('/ainu01/ainu01_today_challenge', [App\Http\Controllers\Ainu01\Ainu01TodayChallengeController::class, 'index'])->name('ainu01.ainu01_today_challenge');

    Route::get('/ainu01/ainu01_today_challenge/create', [App\Http\Controllers\Ainu01\Ainu01TodayChallengeController::class, 'create'])->name('ainu01.ainu01_today_challenge.create');
    Route::post('/ainu01/ainu01_today_challenge/create', [App\Http\Controllers\Ainu01\Ainu01TodayChallengeController::class, 'create'])->name('ainu01.ainu01_today_challenge.create');
    Route::get('/ainu01/ainu01_today_challenge/update', [App\Http\Controllers\Ainu01\Ainu01TodayChallengeController::class, 'update'])->name('ainu01.ainu01_today_challenge.update');
    Route::post('/ainu01/ainu01_today_challenge/update', [App\Http\Controllers\Ainu01\Ainu01TodayChallengeController::class, 'update'])->name('ainu01.ainu01_today_challenge.update');
    Route::get('/ainu01/ainu01_today_challenge/click', [App\Http\Controllers\Ainu01\Ainu01TodayChallengeController::class, 'click'])->name('ainu01.ainu01_today_challenge.click');
    Route::post('/ainu01/ainu01_today_challenge/click', [App\Http\Controllers\Ainu01\Ainu01TodayChallengeController::class, 'click'])->name('ainu01.ainu01_today_challenge.click');

});

// Add admin access routes
Route::middleware(['auth', 'user-access:1'])->group(function () {

    Route::get('/admin/home', [App\Http\Controllers\HomeController::class, 'adminHome'])->name('admin.home');

    Route::resource('/scores/ainu01', App\Http\Controllers\Scores\Ainu01ScoreController::class);
    Route::resource('/scores/ainu02', App\Http\Controllers\Scores\Ainu02ScoreController::class);
});
