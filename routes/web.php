<?php

use Laravel\Socialite\Facades\Socialite;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DanhSachTaiKhoanController;
use App\Http\Controllers\DichVuController;
use App\Http\Controllers\DonViController;
use App\Http\Controllers\GheChieuController;
use App\Http\Controllers\PhimController;
use App\Http\Controllers\PhongChieuController;
use App\Http\Controllers\SlideController;
use App\Http\Controllers\thongKeController;
use App\Http\Controllers\TrangChuController;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

    // client
Route::get('/', [TrangChuController::class, 'home']);

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

    Route::get('/phim-chieu/{id}', [TrangChuController::class,  'phimChieu']);

    Route::get('/search', [TrangChuController::class, 'timKiem'])->name('search');
});



        /// admin
Route::get('admin/login' , [AdminController::class, 'showLoginForm'])->name('admin.login');
Route::post('admin/login', [AdminController::class, 'login'])->name('admin.login.post');
Route::get('admin/logout', [AdminController::class, 'logout'])->name('admin.logout');

Route::group(['middleware'=> 'admin'],function () {

    Route::group(['prefix'  =>  '/admin'], function () {
        Route::get('/', [AdminController::class, 'index'])->name('adminLogin');
        // Quản Lý Phim
        Route::group(['prefix'  =>  '/phim'], function () {
            Route::get('/', [PhimController::class, 'phim'])->name('phim');
            Route::post('/', [PhimController::class, 'postphim']);
            Route::delete('/delete/{id}', [PhimController::class, 'delPhim'])->name('phim.delete');
            Route::get('/edit/{id}', [PhimController::class, 'edit'])->name('phim.edit');
            Route::put('/{id}', [PhimController::class, 'update'])->name('phim.update');
        });
        // thong-ke
        Route::group(['prefix' => '/thong-ke'], function () {
            Route::get('/', [AdminController::class, 'thongKe'])->name('thongKe');
            Route::post('/', [AdminController::class, 'thongKe'])->name('postThongke');
            Route::post('/', [AdminController::class, 'ajaxthongKe'])->name('ajaxthongKe');
        });
        // Quản lý dịch vụ
        Route::group(['prefix'  =>  '/service'], function () {
            Route::get('/', [AdminController::class, 'service'])->name('service');
            Route::post('/postService', [AdminController::class, 'postService'])->name('postService');
            Route::delete('/delete/{id}', [AdminController::class, 'delService'])->name('service.delete');
            Route::get('/edit/{id}', [AdminController::class, 'editService'])->name('service.edit');
            Route::put('/{id}', [AdminController::class, 'updateService'])->name('service.update');
            // Route::post('/status{id}', [AdminController::class, 'statusService'])->name('status');
        });

        // Quản lý người dùng, cập nhật quyền admin, user
        Route::group(['prefix'  =>  '/user'], function () {
            Route::get('/', [DanhSachTaiKhoanController::class, 'user'])->name('user');
            // Route::get('/edit/{id}', [DanhSachTaiKhoanController::class, 'editUser'])->name('editUser');
            Route::put('/{id}', [DanhSachTaiKhoanController::class, 'updateUser'])->name('updateUser');

        });
        Route::group(['prefix'  =>  '/phong-chieu'], function () {
            Route::get('/', [PhongChieuController::class, 'index']);
            Route::get('/vue', [PhongChieuController::class, 'indexVue']);
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

        Route::group(['prefix'  =>  '/slide'], function () {
            Route::get('/', [SlideController::class, 'index']);
            Route::get('/vue', [SlideController::class, 'indexVue']);
        });

    });

});
