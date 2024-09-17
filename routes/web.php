<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DataTableController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NewsController;
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
//     return view('home');
// }); proses-login

//proses login
Route::get('/login', [AuthController::class, 'index'])->name('login');
Route::post('/proses-login', [AuthController::class, 'proses_login'])->name('proses-login');

//proses register
Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/proses-register', [AuthController::class, 'proses_register'])->name('proses-register');

//proses logout
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

//jika ingin menggunakan route group di letakkan pada route group tapi jika per raoute letakkan pada route yang akan di gunakan role
Route::group(['middleware' => 'auth:sanctum'], function () {
    //ini menggunaakan laravel gate
    // Route::get('/dashboard', [HomeController::class, 'dashboard'])->name('dashboard')->middleware('can:view_dashboard');
    // ini menggunakan role/ langsung memanggil permission
    Route::get('/dashboard', [HomeController::class, 'dashboard'])->name('dashboard');
    // ->middleware(['role:admin|write']);

    Route::get('/user', [HomeController::class, 'index'])->name('index');

    Route::get('/create', [HomeController::class, 'create'])->name('create');
    Route::post('/store', [HomeController::class, 'store'])->name('store');

    Route::get('/clientside', [DataTableController::class, 'clientside'])->name('clientside');
    Route::get('/serverside', [DataTableController::class, 'serverside'])->name('serverside');

    Route::get('/update/{id}', [HomeController::class, 'update'])->name('update');
    Route::put('/edit/{id}', [HomeController::class, 'edit'])->name('edit');
    Route::get('/detail/{id}', [HomeController::class, 'detail'])->name('detail');
    Route::delete('/delete/{id}', [HomeController::class, 'delete'])->name('delete');
});
Route::prefix('category')->group(function () {
    Route::get('/index', [CategoryController::class, 'index'])->name('category.index');
    Route::get('/create', [CategoryController::class, 'create'])->name('category.create');
    Route::post('/store', [CategoryController::class, 'store'])->name('category.store');
    // Route::get('/index', 'CategoryController@index')->name('category.index');
    // Add more routes here...
});

Route::prefix('news')->group(function () {
    Route::get('/index', [NewsController::class, 'index'])->name('news.index');
    Route::get('/create', [NewsController::class, 'create'])->name('news.create');
    Route::post('/store', [NewsController::class, 'store'])->name('news.store');
    // Route::get('/index', 'CategoryController@index')->name('category.index');
    // Add more routes here...
});
