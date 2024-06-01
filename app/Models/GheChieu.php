<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GheChieu extends Model
{
    use HasFactory;

    protected $table    =   'ghe_chieus';

    protected $fillable =   [
        'ten_ghe',
        'tinh_trang',
        'gia_mac_dinh',
        'id_phong_chieu',
    ];
}
