<?php

use Laravel\Socialite\Facades\Socialite;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DanhSachTaiKhoanController;
use App\Http\Controllers\DichVuController;
use App\Http\Controllers\DonViController;
use App\Http\Controllers\GheChieuController;
use App\Http\Controllers\LichChieuController;
use App\Http\Controllers\LichKhamController;
use App\Http\Controllers\PhimController;
use App\Http\Controllers\PhongChieuController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\SinhVienController;
use App\Http\Controllers\SlideController;
use App\Http\Controllers\thongKeController;
use App\Http\Controllers\TrangChuController;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', [TrangChuController::class, 'home']);


// Route::get('/', [TrangChuController::class, 'index']);
Route::get('/register', [CustomerController::class, 'viewRegister'])->name('register');
Route::post('/register', [CustomerController::class, 'postRegister']);

Route::get('/login', [CustomerController::class, 'viewLogin'])->name('login');
Route::post('/login', [CustomerController::class, 'postLogin']);

Route::get('/logout', [CustomerController::class, 'viewLogout'])->name('logout');

Route::group(['middleware' => 'auth'], function () {
    Route::post('change-password', [CustomerController::class, 'changePassword'])->name('adminChangePassword');
});


Route::group(['middleware' => 'auth'], function () {
    Route::get('/profile', [CustomerController::class, 'viewProfile'])->name('profile');
    Route::post('/profile', [CustomerController::class, 'postProfile']);

    Route::get('/film-detail/{id}', [TrangChuController::class, 'detailPhim']);

    Route::get('/phim-chieu/{id}', [TrangChuController::class, 'phimChieu']);

    Route::get('/search', [TrangChuController::class, 'timKiem'])->name('search');
});



// Route::get('/admin/login' , [AdminController::class , 'viewLogin'])->name('login');
// Route::get('/admin/login' , [AdminController::class , 'postLogin'])->name('login'); jm

// Route::middleware(['auth', 'admin'])->group(function () {
//     Route::get('/admin/login', [AdminController::class, 'viewLogin'])->name('admin.login');
// });
Route::get('admin/login', [AdminController::class, 'showLoginForm'])->name('admin.login');
Route::post('admin/login', [AdminController::class, 'login'])->name('admin.login.post');
Route::get('admin/logout', [AdminController::class, 'logout'])->name('admin.logout');

Route::group(['middleware'=> 'admin'],function () {

    Route::group(['prefix'  =>  '/admin'], function () {
        Route::get('/', [AdminController::class, 'index'])->name('adminLogin');
        // Quản Lý Phim
        Route::group(['prefix'  =>  '/phim'], function () {
            Route::get('/', [PhimController::class, 'phim'])->name('phim');
            Route::post('/', [PhimController::class, 'postphim']);
            Route::delete('/delete/{id}', [PhimController::class, 'delPhim'])->name('delete');
            Route::get('/edit/{id}', [PhimController::class, 'edit'])->name('edit');
            Route::put('/{id}', [PhimController::class, 'update'])->name('update');
        });
        Route::group(['prefix'  =>  '/phong-chieu'], function () {
            Route::get('/', [PhongChieuController::class, 'index']);
            Route::get('/vue', [PhongChieuController::class, 'indexVue']);
        });
        Route::group(['prefix'  =>  '/danh-sach-tai-khoan'], function () {
            Route::get('/', [DanhSachTaiKhoanController::class, 'index']);
            Route::get('/vue', [DanhSachTaiKhoanController::class, 'indexVue']);
        });
        Route::group(['prefix'  =>  '/ghe-chieu'], function () {
            Route::get('/{id_phong}', [GheChieuController::class, 'index']);
        });
        Route::group(['prefix'  =>  '/dich-vu'], function () {
            Route::get('/', [DichVuController::class, 'index']);
        });
        Route::group(['prefix'  =>  '/don-vi'], function () {
            Route::get('/', [DonViController::class, 'index']);
        });
        Route::group(['prefix'  =>  '/lich-chieu'], function () {
            Route::get('/', [LichChieuController::class, 'index']);
        });
        Route::group(['prefix'  =>  '/slide'], function () {
            Route::get('/', [SlideController::class, 'index']);
            Route::get('/vue', [SlideController::class, 'indexVue']);
        });
        Route::group(['prefix'  =>  '/sinh-vien'], function () {
            Route::get('/', [SinhVienController::class, 'index']);
        });

        Route::group(['prefix'  =>  '/lich-kham'], function () {
            Route::get('/', [LichKhamController::class, 'index']);
        });

        Route::group(['prefix' => '/thong-ke'], function () {
            Route::get('/', [AdminController::class, 'thongKe']);
            Route::post('/', [AdminController::class, 'thongKe'])->name('thongKe');
            Route::post('/', [AdminController::class, 'ajaxthongKe'])->name('ajaxthongKe');
        });
        Route::group(['prefix'  =>  '/service'], function () {
            Route::get('/', [AdminController::class, 'service'])->name('service');
            Route::post('/postService', [AdminController::class, 'postService'])->name('postService');
            Route::delete('/delete/{id}', [AdminController::class, 'delService'])->name('delete');
            Route::get('/edit/{id}', [AdminController::class, 'editService'])->name('edit');
            Route::put('/{id}', [AdminController::class, 'updateService'])->name('update');
            Route::post('/status{id}', [AdminController::class, 'statusService'])->name('status');

        });
    });
});
