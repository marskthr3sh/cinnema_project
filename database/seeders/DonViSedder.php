<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DonViSedder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        DB::table('don_vis')->delete();

        DB::table('don_vis')->truncate();

        DB::table('don_vis')->insert([
            [
                'ten_don_vi' => 'Gam'//1
            ],
            [
                'ten_don_vi' => 'Chai'//2
            ],
            [
                'ten_don_vi' => 'Lon'//3
            ],
            [
                'ten_don_vi' => 'Ổ'//4
            ],
            [
                'ten_don_vi' => 'Phần'//5
            ],
            [
                'ten_don_vi' => 'Gói'//6
            ],
            [
                'ten_don_vi' => 'Combo'//6
            ]
        ]);
    }
}
