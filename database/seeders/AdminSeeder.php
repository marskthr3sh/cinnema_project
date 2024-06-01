<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('admins')->delete();

        DB::table('admins')->truncate();

        DB::table('admins')->insert([
            [
                'username'          =>  'admin',
                'email'             =>  "admin@master.com",
                'password'          =>  "123456",
                'ho_va_ten'         =>  "Admin",
                'id_quyen'          =>  1,
                'ngay_sinh'         =>  "2001-05-04",
                'que_quan'          =>  "Đà Nẵng",
                'so_dien_thoai'     =>  "0333314445",
                'gioi_tinh'         =>  random_int(0, 1),
                'cccd'              =>  060701023012,
                'is_block'          =>  random_int(0, 1),
            ],
            [
                'username'          =>  'nguyenquoclong',
                'email'             =>  "admin@master.com",
                'password'          =>  "123456",
                'ho_va_ten'         =>  "Nguyễn Quốc Long",
                'id_quyen'          =>  1,
                'ngay_sinh'         =>  "2000-11-22",
                'que_quan'          =>  "Đà Nẵng",
                'so_dien_thoai'     =>  "0412331132",
                'gioi_tinh'         =>  random_int(0, 1),
                'cccd'              =>  060701023232,
                'is_block'          =>  random_int(0, 1),
            ],
            [
                'username'          =>  'lethanhtruong',
                'email'             =>  "thanhtruong@gmail.com",
                'password'          =>  "123456",
                'ho_va_ten'         =>  "Lê Thanh Trường",
                'id_quyen'          =>  2,
                'ngay_sinh'         =>  "2001-10-12",
                'que_quan'          =>  "Đà Nẵng",
                'so_dien_thoai'     =>  "0413421322",
                'gioi_tinh'         =>  random_int(0, 1),
                'cccd'              =>  06051023113,
                'is_block'          =>  random_int(0, 1),
            ],
            [
                'username'          =>  'vodinhquochuy',
                'email'             =>  "vodinhquochuy@gmail.com",
                'password'          =>  "123456",
                'ho_va_ten'         =>  "Võ Đình Quốc Huy",
                'id_quyen'          =>  3,
                'ngay_sinh'         =>  "2001-03-12",
                'que_quan'          =>  "Đà Nẵng",
                'so_dien_thoai'     =>  "0321313122",
                'gioi_tinh'         =>  random_int(0, 1),
                'cccd'              =>  06051023113,
                'is_block'          =>  random_int(0, 1),
            ],
            [
                'username'          =>  'phungvanmanh',
                'email'             =>  "phungvanmanh@gmail.com",
                'password'          =>  "123456",
                'ho_va_ten'         =>  "Phùng Văn Mạnh",
                'id_quyen'          =>  3,
                'ngay_sinh'         =>  "2001-03-01",
                'que_quan'          =>  "Đà Nẵng",
                'so_dien_thoai'     =>  "0931333312",
                'gioi_tinh'         =>  random_int(0, 1),
                'cccd'              =>  06051023133,
                'is_block'          =>  random_int(0, 1),
            ],
        ]);
    }
}
