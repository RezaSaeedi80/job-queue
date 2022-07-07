<?php

use App\Jobs\TestJob;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/films/{page}', function ($page) {
    return Http::get("http://moviesapi.ir/api/v1/movies?page={$page}")->json();
});
Route::get('films/{name}/{page}', function ($name, $page) {
    return Http::get("http://moviesapi.ir/api/v1/movies?q={$name}&page={$page}")->json();
});


require __DIR__.'/auth.php';
