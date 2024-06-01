<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DanhSachTaiKhoan extends Model
{
    use HasFactory;

    protected $table = 'danh_sach_tai_khoans';

    protected $fillable = [
        'email',
        'password',
        'so_dien_thoai',
        'ngay_sinh',
        'dia_chi',
        'ho_va_ten',
        'is_block',
        'tinh_trang',
    ];
}
