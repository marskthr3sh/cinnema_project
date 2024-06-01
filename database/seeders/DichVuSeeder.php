<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DichVuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('dich_vus')->delete();

        DB::table('dich_vus')->truncate();

        DB::table('dich_vus')->insert([
            [
                'ten_dich_vu' => "Nước Coca-Cola",
                'mo_ta'       => "Nước Coca-Cola là một loại nước ngọt có ga, với vị đặc trưng ngọt, chua và một chút đắng. Đây là một thức uống phổ biến trên toàn thế giới và có hương vị độc đáo, tạo nên một trải nghiệm thưởng thức đặc biệt.",
                'hinh_anh'    => "https://cocacolaweb.fr/wp-content/uploads/2013/07/Coca-Cola-Trademark.jpg",
                'gia_ban'     => 20000,
                'tinh_trang'  => 1,
                'id_don_vi'   => 2,
            ],
            [
                'ten_dich_vu' => "Nước Coca-Cola",
                'mo_ta'       => "Nước Coca-Cola là một loại nước ngọt có ga, với vị đặc trưng ngọt, chua và một chút đắng. Đây là một thức uống phổ biến trên toàn thế giới và có hương vị độc đáo, tạo nên một trải nghiệm thưởng thức đặc biệt.",
                'hinh_anh'    => "https://www.nexpressdelivery.co.uk/img/product/main_697_cokecanpng.png",
                'gia_ban'     => 10000,
                'tinh_trang'  => 1,
                'id_don_vi'   => 3,
            ],
            [
                'ten_dich_vu' => "Bắp rang bơ",
                'mo_ta'       => "Bắp rang bơ có vị giòn, béo ngọt và hương thơm của bơ tạo nên một hương vị hấp dẫn. Món ăn này thường được thưởng thức như một món snack hoặc món kèm trong các bữa ăn.",
                'hinh_anh'    => "https://inthanhmy.com/wp-content/uploads/2018/02/in-hop-bap-rang-bo-4.jpg",
                'gia_ban'     => 50000,
                'tinh_trang'  => 1,
                'id_don_vi'   => 5,
            ],
            [
                'ten_dich_vu' => "Snack",
                'mo_ta'       => "Snack có nhiều hương vị và kiểu dáng khác nhau, từ mặn đến ngọt, từ giòn đến mềm. Chúng thường có một hương vị đặc trưng và đa dạng, tạo ra cảm giác thú vị khi thưởng thức. Snack không chỉ làm giảm cơn đói mà còn mang lại cảm giác sảng khoái và thoải mái.",
                'hinh_anh'    => "https://educatorclips.com/images/snacks-color.jpg",
                'gia_ban'     => 30000,
                'tinh_trang'  => 1,
                'id_don_vi'   => 6,
            ],
            [
                'ten_dich_vu' => "Combo coca-cola + bắp rang",
                'mo_ta'       => "Coca-Cola với hương vị độc đáo, ngọt ngào và sảng khoái sẽ làm dịu cơn khát và mang lại cảm giác thư giãn. Bắp rang giòn rụm, thơm lừng với hương vị bơ ngậy và một chút muối sẽ đem lại trải nghiệm ẩm thực thú vị và hấp dẫn.",
                'hinh_anh'    => "https://inthanhmy.com/wp-content/uploads/2018/02/in-hop-bap-rang-bo-4.jpg",
                'gia_ban'     => 150000,
                'tinh_trang'  => 1,
                'id_don_vi'   => 7,
            ],
            [
                'ten_dich_vu' => "Bánh mỳ ngọt",
                'mo_ta'       => "Bánh mỳ ngọt là một loại bánh có thành phần chính là bột mỳ, đường, men nở và các nguyên liệu khác như trứng, sữa, bơ, vani, hoặc các loại hương liệu. Bánh mỳ ngọt có vị ngọt tự nhiên và có thể có thêm các phụ gia như hạt, hạnh nhân, sô-cô-la hoặc trái cây tạo nên một hương vị đa dạng và phong phú.",
                'hinh_anh'    => "https://maydonggoianthanh.com/public/uploads/images/post/banhmingot%20donggoi(1).jpg",
                'gia_ban'     => 15000,
                'tinh_trang'  => 1,
                'id_don_vi'   => 4,
            ],
        ]);
    }
}
