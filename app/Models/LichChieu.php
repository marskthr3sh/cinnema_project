<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LichChieu extends Model
{
    use HasFactory;

    protected $table = 'lich_chieus';

    protected $fillable = [
        'id_phim',
        'id_phong',
        'gio_bat_dau',
        'gio_ket_thuc',
        'trang_thai',
    ];
}
