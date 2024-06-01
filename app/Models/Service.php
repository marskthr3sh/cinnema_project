<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;
    protected $table = 'services';

    protected $fillable = [
        'ten_dich_vu',
        'mo_ta',
        'hinh_anh',
        'gia_ban',
        'tinh_trang',
        'id_don_vi',
    ];
}
