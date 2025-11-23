<?php

use App\Http\Controllers\ContactController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Auth;

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

Route::get('/', [ContactController::class, 'index']);

Route::post('/contacts/confirm', [ContactController::class, 'confirm']);

Route::post('/contacts/back', [ContactController::class, 'back']);

Route::post('/contacts', [ContactController::class, 'store']);

Route::middleware(['auth'])->group(function () {
  Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
  Route::get('/admin/search', [AdminController::class, 'search']);

  // 管理画面
  Route::get('/admin/index', [AdminController::class, 'index'])->name('admin.index');

  // 削除
  Route::delete('/admin/contact/{id}', [AdminController::class, 'destroy'])->name('admin.destroy');

  //エクスポート
  Route::get('/admin/export', [AdminController::class, 'export'])->name('admin.export');

  Route::post('/logout', function () {
    Auth::logout();
    return redirect('/login');
  })->name('logout');

});



