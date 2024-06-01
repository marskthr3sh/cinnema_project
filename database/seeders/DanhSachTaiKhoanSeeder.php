<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DanhSachTaiKhoanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        {

            DB::table('danh_sach_tai_khoans')->delete();

            DB::table('danh_sach_tai_khoans')->truncate();

            DB::table('danh_sach_tai_khoans')->insert([
                [
                    'ho_va_ten'         =>"Admin",
                    'email'             =>"admin@master.com",
                    'password'          =>"123456",
                    'so_dien_thoai'     =>"0333314445",
                    'ngay_sinh'         =>"2001-05-04",
                    'dia_chi'           =>"Đà Nẵng",
                    'is_block'          =>random_int(0, 1),
                    'tinh_trang'        =>random_int(0, 1),

                ],
                [
                    'ho_va_ten'         =>"Nguyễn Quốc Long",
                    'email'             =>"quoclongdng@gmail.com",
                    'password'          =>"123456",
                    'so_dien_thoai'     =>"0412331132",
                    'ngay_sinh'         =>"2000-11-22",
                    'dia_chi'           =>"Đà Nẵng",
                    'is_block'          =>random_int(0, 1),
                    'tinh_trang'        =>random_int(0, 1),

                ],
                [
                    'ho_va_ten'         =>"Lê Thanh Trường",
                    'email'             =>"thanhtruong@gmail.com",
                    'password'          =>"123456",
                    'so_dien_thoai'     =>"0413421322",
                    'ngay_sinh'         =>"2001-10-12",
                    'dia_chi'           =>"Đà Nẵng",
                    'is_block'          =>random_int(0, 1),
                    'tinh_trang'        =>random_int(0, 1),

                ],
                [
                    'ho_va_ten'         =>"Võ Đình Quốc Huy",
                    'email'             =>"vodinhquochuy@gmail.com",
                    'password'          =>"123456",
                    'so_dien_thoai'     =>"0321313122",
                    'ngay_sinh'         =>"2001-03-12",
                    'dia_chi'           =>"Đà Nẵng",
                    'is_block'          =>random_int(0, 1),
                    'tinh_trang'        =>random_int(0, 1),

                ],
                [
                    'ho_va_ten'         =>"Phùng Văn Mạnh",
                    'email'             =>"phungvanmanh@gmail.com",
                    'password'          =>"123456",
                    'so_dien_thoai'     =>"0931333312",
                    'ngay_sinh'         =>"2001-03-01",
                    'dia_chi'           =>"Đà Nẵng",
                    'is_block'          =>random_int(0, 1),
                    'tinh_trang'        =>random_int(0, 1),

                ],
            ]);

        }
    }
}
