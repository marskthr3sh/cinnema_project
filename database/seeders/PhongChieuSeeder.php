<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PhongChieuSeeder extends Seeder
{

    public function run(): void
    {
        DB::table('phong_chieus')->delete();

            DB::table('phong_chieus')->truncate();

            DB::table('phong_chieus')->insert([
                [
                    'ten_phong'     =>"DZ FullStack 1",
                    'loai_may_chieu'=> "Optoma UHD40",
                    'tinh_trang'    => rand(0,1),
                    'hang_doc'      => rand(7,10),
                    'hang_ngang'    => rand(7,10),
                    'loai_phong'    => "Phòng 3D",
                ],
                [
                    'ten_phong'     =>"DZ FullStack 2",
                    'loai_may_chieu'=>"Epson EH-TW650",
                    'tinh_trang'    => rand(0,1),
                    'hang_doc'      => rand(7,10),
                    'hang_ngang'    => rand(7,10),
                    'loai_phong'    => "Phòng 2D",
                ],
                [
                    'ten_phong'     =>"DZ FullStack 3",
                    'loai_may_chieu'=>"Epson EH-TW7400",
                    'tinh_trang'    => rand(0,1),
                    'hang_doc'      => rand(7,10),
                    'hang_ngang'    => rand(7,10),
                    'loai_phong'    => "Phòng 3D",
                ],
                [
                    'ten_phong'     =>"DZ FullStack 3",
                    'loai_may_chieu'=>"Optoma UHD65",
                    'tinh_trang'    => rand(0,1),
                    'hang_doc'      => rand(7,10),
                    'hang_ngang'    => rand(7,10),
                    'loai_phong'    => "Phòng IMAX",
                ],
                [
                    'ten_phong'     =>"DZ FullStack 4",
                    'loai_may_chieu'=>"Sony VPL-VW270ES",
                    'tinh_trang'    => rand(0,1),
                    'hang_doc'      => rand(7,10),
                    'hang_ngang'    => rand(7,10),
                    'loai_phong'    => "Phòng 3D",
                ],
                [
                    'ten_phong'     =>"DZ FullStack 5",
                    'loai_may_chieu'=>"Sony VPL-VW270ES",
                    'tinh_trang'    => rand(0,1),
                    'hang_doc'      => rand(7,10),
                    'hang_ngang'    => rand(7,10),
                    'loai_phong'    => "Phòng 2D",
                ],
                [
                    'ten_phong'     =>"DZ FullStack 6",
                    'loai_may_chieu'=>"Sony VPL-VW550ES",
                    'tinh_trang'    => rand(0,1),
                    'hang_doc'      => rand(7,10),
                    'hang_ngang'    => rand(7,10),
                    'loai_phong'    => "Phòng 3D",
                ],
                [
                    'ten_phong'     =>"DZ FullStack 7",
                    'loai_may_chieu'=>"Sony VPL-VW550ES",
                    'tinh_trang'    => rand(0,1),
                    'hang_doc'      => rand(7,10),
                    'hang_ngang'    => rand(7,10),
                    'loai_phong'    => "Phòng IMAX",
                ],
                [
                    'ten_phong'     =>"DZ FullStack 8",
                    'loai_may_chieu'=>"LG CineBeam HU80KSW",
                    'tinh_trang'    => rand(0,1),
                    'hang_doc'      => rand(7,10),
                    'hang_ngang'    => rand(7,10),
                    'loai_phong'    => "Phòng IMAX",
                ],
                [
                    'ten_phong'     =>"DZ FullStack 9",
                    'loai_may_chieu'=>"Nebula Capsule",
                    'tinh_trang'    => rand(0,1),
                    'hang_doc'      => rand(7,10),
                    'hang_ngang'    => rand(7,10),
                    'loai_phong'    => "Phòng 2D",
                ],
                [
                    'ten_phong'     =>"DZ FullStack 10",
                    'loai_may_chieu'=>"Nebula Capsule",
                    'tinh_trang'    => rand(0,1),
                    'hang_doc'      => rand(7,10),
                    'hang_ngang'    => rand(7,10),
                    'loai_phong'    => "Phòng IMAX",
                ],

            ]);
    }
}
