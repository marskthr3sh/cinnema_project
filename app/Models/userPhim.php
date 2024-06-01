<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class userPhim extends Model
{
    use HasFactory;
    protected $table = 'user_phims';

    protected $fillable = [
        'id_user',
        'id_phim',
        'rap_chieu',
        'khung_gio_chieu',
        'phong_chieu',
        'so_ghe',
        'gia_tien',
    ];
}
