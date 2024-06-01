<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VeXemPhim extends Model
{
    use HasFactory;

    protected $table  = 've_xem_phims';

    protected $fillable = [
        'id_lich_chieu',
        'so_ghe',
        'ma_ve',
        'gia_ve',
        'tinh_trang',
        'id_don_hang',
    ];

    // Do thằng code/ phân tích hệ thống nó quy ước => Không đúng/Không sai
    CONST VE_KHONG_THE_BAN  = -1;
    CONST VE_CO_THE_BAN     =  0;
    CONST VE_DANG_GIU_CHO   =  1;
    CONST VE_DA_BAN         =  2;
}
