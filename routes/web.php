<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DataTableController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\PanduanController;
use App\Http\Controllers\PengelolaController;
use App\Http\Controllers\ViewsController;
use Illuminate\Routing\ViewController;
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
//     return view([ViewsController::class, 'tampilan'], 'tampilan.index');
// }); 

//views user halaman utama
Route::get('/', [ViewsController::class, 'tampilan'])->name('tampilan');
Route::get('/berita', [ViewsController::class, 'berita'])->name('tampilan.berita');
Route::get('/tampilan/deber/detail/{id}', [ViewsController::class, 'show'])->name('tampilan.detail');
Route::get('/struktur', [ViewsController::class, 'struktur'])->name('tampilan.struktur');
Route::get('/panduanp3m', [ViewsController::class, 'panduan'])->name('tampilan.panduan');

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
    Route::prefix('dash')->group(function () {
        Route::get('/dashboard', [MainController::class, 'index'])->name('dash.dashboard');
        Route::get('/create_dash', [MainController::class, 'create_dash'])->name('dash.create_dash');
        Route::post('/buat', [MainController::class, 'buat'])->name('dash.buat');

        Route::get('/edit_dash/{id}', [MainController::class, 'edit_dash'])->name('dash.edit_dash');
        Route::match(['get', 'PUT'], '/up_dash/{id}', [MainController::class, 'up_dash'])->name('dash.up_dash');
        // ->middleware(['role:admin|write']);
    });
    Route::get('/user', [HomeController::class, 'index'])->name('index');

    Route::get('/create', [HomeController::class, 'create'])->name('create');
    Route::post('/store', [HomeController::class, 'store'])->name('store');

    Route::get('/clientside', [DataTableController::class, 'clientside'])->name('clientside');
    Route::get('/serverside', [DataTableController::class, 'serverside'])->name('serverside');

    Route::get('/update/{id}', [HomeController::class, 'update'])->name('update');
    Route::put('/edit/{id}', [HomeController::class, 'edit'])->name('edit');
    Route::get('/detail/{id}', [HomeController::class, 'detail'])->name('detail');
    Route::delete('/delete/{id}', [HomeController::class, 'delete'])->name('delete');

    //kategori
    Route::prefix('category')->group(function () {
        Route::get('/index', [CategoryController::class, 'index'])->name('category.index');

        Route::get('/create', [CategoryController::class, 'create'])->name('category.create');
        Route::post('/store', [CategoryController::class, 'store'])->name('category.store');

        //route edit
        Route::get('/edit/{id}', [CategoryController::class, 'edit'])->name('category.edit');
        Route::match(['get', 'PUT'], '/ubah/{id}', [CategoryController::class, 'ubah'])->name('category.ubah');
        //route delete
        // Add more routes here...
    });
    //berita
    Route::prefix('news')->group(function () {
        Route::get('/pagetitle', 'NewsController@pagetitle')->name('news.pagetitle');

        Route::get('/index', [NewsController::class, 'index'])->name('news.index');
        Route::get('/search', [NewsController::class, 'search'])->name('news.search');
        //route create
        Route::get('/create', [NewsController::class, 'create'])->name('news.create');
        Route::post('/store', [NewsController::class, 'store'])->name('news.store');
        //route edit
        Route::get('/edit/{id}', [NewsController::class, 'edit'])->name('news.edit');
        Route::put('/update/{id}', [NewsController::class, 'update'])->name('news.update');
        //route delete
        Route::get('/delete/{id}', [NewsController::class, 'delete'])->name('news.delete');
        //route detail data
        Route::get('/read/{id}', [NewsController::class, 'read'])->name('news.read');
    });
    Route::prefix('panduan')->group(function () {
        Route::get('/index', [PanduanController::class, 'index'])->name('panduan.index');
        Route::get('/create', [PanduanController::class, 'create'])->name('panduan.create');
        Route::post('/store', [PanduanController::class, 'store'])->name('panduan.store');
        Route::get('/view/{id}', [PanduanController::class, 'view'])->name('panduan.view');
        Route::get('/download/{id}', [PanduanController::class, 'download'])->name('panduan.download');
        // Route::get('/view/{id}', [PanduanController::class, 'view'])->name('panduan.view');

        // Route::get('/download/{generated_name}', function ($filename) {
        //     $path = public_path('uplouds/' . $filename);
        //     // dd($path);
        //     return response()->download($path);
        // })->name('panduan.download');

        // Route::get('/download/{id}', [PanduanController::class, 'download'])->name('panduan.download')->withoutMiddleware('auth');
        // Route::get('/download/{id}', [PanduanController::class, 'download'])->name('panduan.download');
        // Route::get('/index', [PanduanController::class, 'index'])->name('panduan.index');
        // Route::get('/index', [PanduanController::class, 'index'])->name('panduan.index');
    });

    //pengelola p3m
    Route::prefix('pengelola')->group(function () {
        Route::get('/index', [PengelolaController::class, 'index'])->name('pengelola.index');
        Route::get('/create', [PengelolaController::class, 'create'])->name('pengelola.create');
        Route::post('/store', [PengelolaController::class, 'store'])->name('pengelola.store');
        Route::get('/edit/{id}', [PengelolaController::class, 'edit'])->name('pengelola.edit');
        Route::put('/update/{id}', [PengelolaController::class, 'update'])->name('pengelola.update');
        Route::get('/delete/{id}', [PengelolaController::class, 'delete'])->name('pengelola.delete')->withoutMiddleware('auth');
        // //route edit
        // Route::get('/edit/{id}', [CategoryController::class, 'edit'])->name('category.edit');
        // Route::match(['get', 'PUT'], '/ubah/{id}', [CategoryController::class, 'ubah'])->name('category.ubah');
        //route delete
        // Add more routes here...
    });

    //tentang p3m

});
