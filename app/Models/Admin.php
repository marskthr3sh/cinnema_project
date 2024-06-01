<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    use HasFactory;
    protected $table = 'admins';
    protected $fillable = [
        'username',
        'email',
        'password',
        'ho_va_ten',
        'id_quyen',
        'ngay_sinh',
        'que_quan',
        'so_dien_thoai',
        'gioi_tinh',
        'cccd',
        'is_block',
        'hash_reset',

    ];
}
