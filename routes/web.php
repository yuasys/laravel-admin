<?php
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
/*
-------------------------------------------------------------------------- 
Web Routes
--------------------------------------------------------------------------

Here is where you can register web routes for your application. These
routes are loaded by the RouteServiceProvider within a group which
contains the "web" middleware group. Now create something great!
ここでは、アプリケーションのWebルートを登録することができます。
これらのルートは、"web "ミドルウェアグループを含むRouteServiceProviderによって読み込まれます。
さあ、素晴らしいものを作りましょう
*/


// ログインしていないと不可にする
Route::middleware('auth')->group(function(){
    // ログイン後の画面
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
});



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

require __DIR__.'/auth.php';
