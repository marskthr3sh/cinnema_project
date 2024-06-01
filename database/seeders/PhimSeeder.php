<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PhimSeeder extends Seeder
{
    public function run(): void
    {

        DB::table('phims')->delete();

        DB::table('phims')->truncate();

        DB::table('phims')->insert([
            [
                'ten_phim'          => "QUÝ CÔNG TỬ",
                'slug_phim'         => Str::slug('QUÝ CÔNG TỬ'),
                'hinh_anh'          => "https://www.cgv.vn/media/catalog/product/cache/1/image/c5f0a1eff4c394a251036189ccddaacd/p/o/poster_1__3_2.jpg",
                'dao_dien'          => "Park Hoon-jung",
                'dien_vien'         => "Kim Seon-Ho, Kang Tae-Ju, Go Ara, Kang-woo Kim",
                'the_loai'          => "Hành Động",
                'thoi_luong'        => 118,
                'ngon_ngu'          => "Tiếng Hàn - Phụ đề tiếng Việt, tiếng Anh",
                'rated'             => "T18 - PHIM ĐƯỢC PHỔ BIẾN ĐẾN NGƯỜI XEM TỪ ĐỦ 18 TUỔI TRỞ LÊN (18+)",
                'mo_ta'             => "Quý Công Tử xoay quanh người đàn ông bí ẩn được biết đến với tên gọi “Quý Công Tử”. Gã đột nhiên xuất hiện trước mắt Marco, một thanh niên người Philippines mơ ước trở thành vận động viên boxing chuyên nghiệp, lang thang khắp các sàn đấu bất hợp pháp tại đây. Nhằm chi trả cho viện phí của mẹ, Marco đến Hàn Quốc để tìm người cha đã bỏ rơi hai mẹ con cậu từ lâu.",
                'trailer'           => "https://www.youtube.com/embed/ybcWiZOjJj8",
                'bat_dau'           => '2023-05-10',
                'ket_thuc'          => '2023-06-10',
                'hien_thi'          => 1,

            ],
            [
                'ten_phim'          => "FLASH",
                'slug_phim'         => Str::slug('FLASH'),
                'hinh_anh'          => "https://upload.wikimedia.org/wikipedia/vi/8/87/The_Flash_2023_VN_poster.jpg",
                'dao_dien'          => "Andy Muschietti",
                'dien_vien'         => "Ben Affleck, Michael Shannon, Michael Keaton",
                'the_loai'          => "Hành Động, Phiêu Lưu, Thần thoại",
                'thoi_luong'        => 144,
                'ngon_ngu'          => "Tiếng Anh - Phụ đề Tiếng Việt",
                'rated'             => "T16 - PHIM ĐƯỢC PHỔ BIẾN ĐẾN NGƯỜI XEM TỪ ĐỦ 16 TUỔI TRỞ LÊN (16+)",
                'mo_ta'             => "Mùa hè này, đa thế giới sẽ va chạm khốc liệt với những bước chạy của FLASH",
                'trailer'           => "https://www.youtube.com/watch?v=0j_EK9OwNwc",
                'bat_dau'           => '2023-04-12',
                'ket_thuc'          => '2023-06-13',
                'hien_thi'          => 1,

            ],
            [
                'ten_phim'          => "XỨ SỞ CÁC NGUYÊN TỐ",
                'slug_phim'         => Str::slug('XỨ SỞ CÁC NGUYÊN TỐ'),
                'hinh_anh'          => "https://gdtd.1cdn.vn/2023/06/06/xu-so-cac-nguyen-to-7-.jpg",
                'dao_dien'          => "Peter Sohn",
                'dien_vien'         => "Leah Lewis, Mamoudou Athie",
                'the_loai'          => "Gia đình, Hài, Hoạt Hình",
                'thoi_luong'        => 109,
                'ngon_ngu'          => "Tiếng Anh - Phụ đề Tiếng Việt; Lồng tiếng",
                'rated'             => "K - PHIM ĐƯỢC PHỔ BIẾN ĐẾN NGƯỜI XEM DƯỚI 13 TUỔI VÀ CÓ NGƯỜI BẢO HỘ ĐI KÈM",
                'mo_ta'             => "Xứ Sở Các Nguyên Tố từ Disney và Pixar lấy bối cảnh tại thành phố các nguyên tố, nơi lửa, nước, đất và không khí cùng chung sống với nhau. Câu chuyện xoay quanh nhân vật Ember, một cô nàng cá tính, thông minh, mạnh mẽ và đầy sức hút. Tuy nhiên, mối quan hệ của cô với Wade - một anh chàng hài hước, luôn thuận thế đẩy dòng - khiến Ember cảm thấy ngờ vực với thế giới này. Được đạo diễn bởi Peter Sohn, sản xuất bởi Denise Ream",
                'trailer'           => "https://www.youtube.com/watch?v=8qTBWDKtyYU",
                'bat_dau'           => '2023-05-17',
                'ket_thuc'          => '2023-06-20',
                'hien_thi'          => 1,

            ],
            //Đang chiếu
            [
                'ten_phim'          => "TRANSFORMERS: QUÁI THÚ TRỖI DẬY",
                'slug_phim'         => Str::slug('TRANSFORMERS: QUÁI THÚ TRỖI DẬY'),
                'hinh_anh'          => "https://www.cgv.vn/media/catalog/product/cache/1/image/c5f0a1eff4c394a251036189ccddaacd/7/0/700x1000_.jpg",
                'dao_dien'          => "Steven Caple Jr.",
                'dien_vien'         => "Michelle Yeoh, Dominique Fishback, Ron Perlman",
                'the_loai'          => "Hành Động, Khoa Học Viễn Tưởng, Phiêu Lưu",
                'thoi_luong'        =>  127,
                'ngon_ngu'          => "Tiếng Anh - Phụ đề Tiếng Việt",
                'rated'             => "T13 - PHIM ĐƯỢC PHỔ BIẾN ĐẾN NGƯỜI XEM TỪ ĐỦ 13 TUỔI TRỞ LÊN (13+)",
                'mo_ta'             => "Bộ phim dựa trên sự kiện Beast Wars trong loạt phim hoạt hình 'Transformers', nơi mà các robot có khả năng biến thành động vật khổng lồ cùng chiến đấu chống lại một mối đe dọa tiềm tàng.",
                'trailer'           => "https://www.youtube.com/watch?v=lRBA1AKyUaI",
                'bat_dau'           => '2023-06-01',
                'ket_thuc'          => '2023-07-15',
                'hien_thi'          => 1,

            ],
            [
                'ten_phim'          => "TÀ CHÚ CẤM",
                'slug_phim'         => Str::slug('TÀ CHÚ CẤM'),
                'hinh_anh'          => "https://dcine.vn/Areas/Admin/Content/Fileuploads/images/POSTER/tachucamPOSTER-01.jpg",
                'dao_dien'          => "Sophon Sakdaphisit",
                'dien_vien'         => "Nittha Jirayungyurn, Sukollawat Kanaros, Penpak Sirikul",
                'the_loai'          => "Kinh Dị, Tâm Lý",
                'thoi_luong'        =>  122,
                'ngon_ngu'          => "Tiếng Thái - Phụ đề tiếng Việt",
                'rated'             => "T18 - PHIM ĐƯỢC PHỔ BIẾN ĐẾN NGƯỜI XEM TỪ ĐỦ 18 TUỔI TRỞ LÊN (18+)",
                'mo_ta'             => "Phim kể về cặp vợ chồng Ning, Kwin và cô con gái 7 tuổi với tên gọi Ing. Vì khó khăn về tài chính, hai vợ chồng quyết định cho thuê ngôi nhà đang ở và chuyển đến một căn hộ chung cư giá rẻ để sinh sống. Sau khi những người thuê nhà chuyển đến, Ning nhận thấy chồng bắt đầu có những hành vi bất thường. Anh ta trở nên bí mật và thường biến mất khỏi căn hộ và lúc 4 giờ sáng. Kwin thậm chí còn có một hình xăm kỳ lạ ở ngực tựa như ký hiệu đặc biệt của một hội tà giáo bí ẩn.",
                'trailer'           => "https://www.youtube.com/watch?v=0oc92jGXE54",
                'bat_dau'           => '2023-06-04',
                'ket_thuc'          => '2023-07-14',
                'hien_thi'          => 1,

            ],
            [
                'ten_phim'          => "VÚ EM DẠY YÊU",
                'slug_phim'         => Str::slug('VÚ EM DẠY YÊU'),
                'hinh_anh'          => "https://dcine.vn/Areas/Admin/Content/Fileuploads/images/POSTER/vuemdayyeuPOSTER-01.jpg",
                'dao_dien'          => "Gene Stupnitsky",
                'dien_vien'         => "Jennifer Lawrence, Natalie Morales, Ebon Moss-Bachrach",
                'the_loai'          => "Hài",
                'thoi_luong'        =>  103 ,
                'ngon_ngu'          => "Tiếng Anh - Phụ đề Tiếng Việt",
                'rated'             => "T18 - PHIM ĐƯỢC PHỔ BIẾN ĐẾN NGƯỜI XEM TỪ ĐỦ 18 TUỔI TRỞ LÊN (18+)",
                'mo_ta'             => "Không dành cho bé dưới 18!.. Red Band Trailer với Jennifer Lawrence trở lại, nóng bỏng cả mắt trong tựa phim hài-bựa-lầy nhất hè năm nay #NoHardFeelings - VÚ EM DẠY 'YÊU. Duy nhất tại rạp. Dự",
                'trailer'           => "https://www.youtube.com/watch?v=q_XWWWlA39k",
                'bat_dau'           => '2023-06-01',
                'ket_thuc'          => '2023-07-10',
                'hien_thi'          => 1,

            ],
            [
                'ten_phim'          => "MẸ ƠI ĐỪNG KHÓC...",
                'slug_phim'         => Str::slug('MẸ ƠI ĐỪNG KHÓC...'),
                'hinh_anh'          => "https://www.cgv.vn/media/catalog/product/cache/1/image/c5f0a1eff4c394a251036189ccddaacd/4/0/406x600px.jpg",
                'dao_dien'          => "Lee Ho-kyung",
                'dien_vien'         => "Lee Ho-kyung, Lee Ho-kyung, Ebon Moss-Bachrach",
                'the_loai'          => "Phim tài liệu",
                'thoi_luong'        =>  78  ,
                'ngon_ngu'          => "Tiếng Hàn - Phụ đề tiếng Việt",
                'rated'             => "T16 - PHIM ĐƯỢC PHỔ BIẾN ĐẾN NGƯỜI XEM TỪ ĐỦ 16 TUỔI TRỞ LÊN (16+)",
                'mo_ta'             => "Rơi nước mắt cùng những câu chuyện cuối đời từ những người cha, người mẹ và những đứa trẻ đang phải kiên cường bên bờ tuyệt vọng chiến đấu với căn bệnh ung thư. Dù ngắn ngủi đến đâu, giây phút đẹp nhất cuộc đời là khi ta còn được ở bên cạnh người mình yêu thương.",
                'trailer'           => "https://www.youtube.com/watch?v=q_XWWWlA39k",
                'bat_dau'           => '2023-05-28',
                'ket_thuc'          => '2023-07-08',
                'hien_thi'          => 1,

            ],
            [
                'ten_phim'          => "NGƯỜI NHỆN: DU HÀNH VŨ TRỤ NHỆN",
                'slug_phim'         => Str::slug('NGƯỜI NHỆN: DU HÀNH VŨ TRỤ NHỆN'),
                'hinh_anh'          => "https://www.cgv.vn/media/catalog/product/cache/1/image/c5f0a1eff4c394a251036189ccddaacd/r/s/rsz_spiderverse2_poster_4.jpg",
                'dao_dien'          => "Joaquim Dos Santos, Justin K. Thompson, Kemp Powers",
                'dien_vien'         => "Shameik Moore",
                'the_loai'          => "Hành Động, Khoa Học Viễn Tưởng, Phiêu Lưu",
                'thoi_luong'        =>  140,
                'ngon_ngu'          => "Tiếng Anh - Phụ đề Tiếng Việt; Lồng tiếng",
                'rated'             => " K - PHIM ĐƯỢC PHỔ BIẾN ĐẾN NGƯỜI XEM DƯỚI 13 TUỔI VÀ CÓ NGƯỜI BẢO HỘ ĐI KÈM",
                'mo_ta'             => "Miles Morales tái xuất trong phần tiếp theo của bom tấn hoạt hình từng đoạt giải Oscar - Spider-Man: Across the Spider-Verse. Sau khi gặp lại Gwen Stacy, chàng Spider-Man thân thiện đến từ Brooklyn phải du hành qua đa vũ trụ và gặp một nhóm Người Nhện chịu trách nhiệm bảo vệ các vũ trụ song song. Nhưng khi nhóm siêu anh hùng xung đột về cách xử lý một mối đe dọa mới",
                'trailer'           => "https://www.youtube.com/watch?v=SUz8Aw28vrc",
                'bat_dau'           => '2023-05-22',
                'ket_thuc'          => '2023-07-11',
                'hien_thi'          => 1,

            ],
            [
                'ten_phim'          => "PHIM ĐIỆN ẢNH DORAEMON: NOBITA VÀ VÙNG ĐẤT LÝ TƯỞNG TRÊN BẦU TRỜI",
                'slug_phim'         => Str::slug('PHIM ĐIỆN ẢNH DORAEMON: NOBITA VÀ VÙNG ĐẤT LÝ TƯỞNG TRÊN BẦU TRỜI'),
                'hinh_anh'          => "https://cdn.baoquocte.vn/stores/news_dataimages/2023/052023/05/16/in_social/phim-ve-doraemon-nobita-va-nhung-nguoi-ban-se-cong-chieu-tai-viet-nam-20230505163945.jpg?randTime=1687062292",
                'dao_dien'          => "Takumi Doyama",
                'dien_vien'         => "Joaquim Dos Santos, Justin K. Thompson, Kemp Powers",
                'the_loai'          => "Hoạt Hình",
                'thoi_luong'        =>  108 ,
                'ngon_ngu'          => "Tiếng Nhật - Phụ đề Tiếng Việt; Lồng tiếng",
                'rated'             => "P - PHIM ĐƯỢC PHÉP PHỔ BIẾN ĐẾN NGƯỜI XEM Ở MỌI ĐỘ TUỔI.",
                'mo_ta'             => "Phim điện ảnh Doraemon: Nobita Và Vùng Đất Lý Tưởng Trên Bầu Trời kể câu chuyện khi Nobita tìm thấy một hòn đảo hình lưỡi liềm trên trời mây. Ở nơi đó, tất cả đều hoàn hảo… đến mức cậu nhóc Nobita mê ngủ ngày cũng có thể trở thành một thần đồng toán học, một siêu sao thể thao. Cả hội Doraemon cùng sử dụng một món bảo bối độc đáo chưa từng xuất hiện trước đây để đến với vương quốc tuyệt vời này. ",
                'trailer'           => "https://www.youtube.com/watch?v=SthaOnp5uDs",
                'bat_dau'           => '2023-06-01',
                'ket_thuc'          => '2023-07-01',
                'hien_thi'          => 1,

            ],
            // sắp chiếu
            [
                'ten_phim'          => "RUBY THỦY QUÁI TUỔI TEEN",
                'slug_phim'         => Str::slug('RUBY THỦY QUÁI TUỔI TEEN'),
                'hinh_anh'          => "https://cinestar.com.vn/pictures/Cinestar/06-2023/ruby-thuy-quai-tuoi-teen-poster.jpg",
                'dao_dien'          => "Kirk DeMicco, Faryn Pearl",
                'dien_vien'         => " Lana Condor, Knives Out, Toni Collete",
                'the_loai'          => "Gia đình, Phiêu Lưu",
                'thoi_luong'        =>  91  ,
                'ngon_ngu'          => "Tiếng Anh - Phụ đề Tiếng Việt; Lồng tiếng",
                'rated'             => "P - PHIM ĐƯỢC PHÉP PHỔ BIẾN ĐẾN NGƯỜI XEM Ở MỌI ĐỘ TUỔI.",
                'mo_ta'             => "Ruby Thủy Quái Tuổi Teen kể về cô bé Ruby Gillman nhút nhát, tình cờ phát hiện ra mình là một phần của dòng dõi thủy quái hoàng gia huyền thoại. Và kể từ giây phút này, số phận của cô bé dưới đáy đại dương bỗng thay thổi hoàn toàn, cùng với đó là một sứ mệnh lớn hơn tất cả những gì cô từng mơ đến.",
                'trailer'           => "https://www.youtube.com/watch?v=egVsMzVezyg",
                'bat_dau'           => '2023-10-01',
                'ket_thuc'          => '2023-11-10',
                'hien_thi'          => 1,

            ],
            [
                'ten_phim'          => "INDIANA JONES & VÒNG QUAY ĐỊNH MỆNH",
                'slug_phim'         => Str::slug('INDIANA JONES & VÒNG QUAY ĐỊNH MỆNH'),
                'hinh_anh'          => "https://upload.wikimedia.org/wikipedia/vi/4/41/Indianajones5poster.jpg",
                'dao_dien'          => "James Mangold",
                'dien_vien'         => "Boyd Holbrook, Thomas Kretschmann, Mads Mikkelsen, Harrison Ford, Phoebe Waller-Bridge",
                'the_loai'          => "Hành Động, Phiêu Lưu",
                'thoi_luong'        =>  154   ,
                'ngon_ngu'          => "Tiếng Anh - Phụ đề Tiếng Việt",
                'rated'             => "T16 - PHIM ĐƯỢC PHỔ BIẾN ĐẾN NGƯỜI XEM TỪ ĐỦ 16 TUỔI TRỞ LÊN (16+)",
                'mo_ta'             => "Indiana Jones 5 sẽ pha trộn giữa thực tế, hư cấu khi lấy bối cảnh năm 1969, lần này Indiana Jones sẽ đối mặt với Đức quốc xã trong thời gian diễn ra cuộc chạy đua vào không gian.",
                'trailer'           => "https://www.youtube.com/watch?v=RjBcBt4ukCo",
                'bat_dau'           => '2023-09-27',
                'ket_thuc'          => '2023-11-05',
                'hien_thi'          => 1,

            ],
            [
                'ten_phim'          => "CÔ THÀNH TRONG GƯƠNG",
                'slug_phim'         => Str::slug('CÔ THÀNH TRONG GƯƠNG'),
                'hinh_anh'          => "https://upload.wikimedia.org/wikipedia/vi/2/22/B%C3%ACa_ti%E1%BB%83u_thuy%E1%BA%BFt_C%C3%B4_th%C3%A0nh_trong_g%C6%B0%C6%A1ng.jpg",
                'dao_dien'          => "Keiichi Hara",
                'dien_vien'         => "Ami Touma, Takumi Kitamura, Ashida Mana, Minami Takayama, Itagaki Rihito, Naho Yokomizo, Kaji Yuki, Sakura Yoshiyanagi",
                'the_loai'          => "Hoạt Hình",
                'thoi_luong'        =>  116    ,
                'ngon_ngu'          => "Tiếng Nhật - Phụ đề Tiếng Việt",
                'rated'             => "T13 - PHIM ĐƯỢC PHỔ BIẾN ĐẾN NGƯỜI XEM TỪ ĐỦ 13 TUỔI TRỞ LÊN (13+)",
                'mo_ta'             => "Bỗng dưng một ngày nọ, Kokoro - cô bé lớp bảy ngày qua ngày giam mình trong phòng riêng thay vì tới trường sau tổn thương tâm lý - phát hiện tấm gương trong phòng mình phát sáng, bước qua tấm gương, Kokoro nhận ra mình đang ở trong một toà lâu đài cùng sáu người bạn chung hoàn cảnh. Bảy đứa trẻ cô độc buộc phải dấn bước vào một cuộc phiêu lưu kỳ lạ, trước khi đáp án cuối cùng mở ra, gây sững sờ và xúc động tột cùng",
                'trailer'           => "https://www.youtube.com/watch?v=ptK2oXbMIJ0",
                'bat_dau'           => '2023-10-05',
                'ket_thuc'          => '2023-11-05',
                'hien_thi'          => 1,

            ],
            [
                'ten_phim'          => "BÉ TRỨNG: NÁO LOẠN CHÂU PHI",
                'slug_phim'         => Str::slug('BÉ TRỨNG: NÁO LOẠN CHÂU PHI'),
                'hinh_anh'          => "https://www.cgv.vn/media/catalog/product/cache/1/image/c5f0a1eff4c394a251036189ccddaacd/b/_/b_tr_ng_-_700_x_1000_px.jpg",
                'dao_dien'          => "Gabriel Riva Palacio Alatriste, Rodolfo Riva Palacio Alatriste",
                'dien_vien'         => "Bruno Bichir, Maite Perroni, Carlos Espejel",
                'the_loai'          => "Hoạt Hình",
                'thoi_luong'        =>  89  ,
                'ngon_ngu'          => "Lồng tiếng Việt",
                'rated'             => " K - PHIM ĐƯỢC PHỔ BIẾN ĐẾN NGƯỜI XEM DƯỚI 13 TUỔI VÀ CÓ NGƯỜI BẢO HỘ ĐI KÈM",
                'mo_ta'             => "Một chú gà trống dễ thương, tên là Toto, sống yên bình bên chú gà nhỏ Di của mình trong trang trại Pollón nổi tiếng. Dần dần, cả hai nảy sinh tình cảm và giờ đây, họ đã trở thành cha mẹ đáng tự hào của một cặp trứng nhỏ dễ thương tên là Uly và Max, chúng có đặc điểm là rất vàng, khiến chúng trông giống như những “quả trứng vàng”. ",
                'trailer'           => "https://www.youtube.com/watch?v=TpTTKKV5Ado",
                'bat_dau'           => '2023-10-10',
                'ket_thuc'          => '2023-11-20',
                'hien_thi'          => 1,

            ],
            [
                'ten_phim'          => "MA SƠ TRỤC QUỶ",
                'slug_phim'         => Str::slug('MA SƠ TRỤC QUỶ'),
                'hinh_anh'          => "https://www.venuscinema.vn/uploaded/phim/ma%20so%20truc%20quy.jpg",
                'dao_dien'          => "Adrian Garcia Bogliano",
                'dien_vien'         => "María Evoli, Ramón Medína, Pilar Santacruz",
                'the_loai'          => " Kinh Dị",
                'thoi_luong'        =>  102     ,
                'ngon_ngu'          => "Tiếng Tây Ban Nha - Phụ đề Tiếng Việt & Tiếng Anh",
                'rated'             => "T18 - PHIM ĐƯỢC PHỔ BIẾN ĐẾN NGƯỜI XEM TỪ ĐỦ 18 TUỔI TRỞ LÊN (18+)",
                'mo_ta'             => "Ofelia - một nữ tu trẻ vừa đặt chân đến thị trấn San Ramon đã bị ép phải thực hiện buổi lễ trừ tà cho một phụ nữ đang mang thai. Tưởng chừng buổi trục quỷ đã hoàn tất, Ofelia bàng hoàng nhận ra hiện thân quỷ dữ chưa từng biến mất.",
                'trailer'           => "https://www.youtube.com/watch?v=b22qRSdqpXA",
                'bat_dau'           => '2023-10-05',
                'ket_thuc'          => '2023-11-20',
                'hien_thi'          => 1,

            ],
            [
                'ten_phim'          => "QUỶ QUYỆT: CỬA ĐỎ VÔ ĐỊNH",
                'slug_phim'         => Str::slug('QUỶ QUYỆT: CỬA ĐỎ VÔ ĐỊNH'),
                'hinh_anh'          => "https://www.cgv.vn/media/catalog/product/cache/1/image/c5f0a1eff4c394a251036189ccddaacd/i/n/insidious_5_poster_2_1080x1350.jpg",
                'dao_dien'          => "Patrick Wilson",
                'dien_vien'         => "Ty Simpkins, Patrick Wilson, Hiam Abbass, Sinclair Daniel, Andrew Astor, Rose Byrne",
                'the_loai'          => " Kinh Dị",
                'thoi_luong'        =>  102     ,
                'ngon_ngu'          => "Tiếng Anh - Phụ đề Tiếng Việt",
                'rated'             => "T18 - PHIM ĐƯỢC PHỔ BIẾN ĐẾN NGƯỜI XEM TỪ ĐỦ 18 TUỔI TRỞ LÊN (18+)",
                'mo_ta'             => "Phần tiếp theo của loạt phim kinh dị Insidious với sự góp mặt của dàn diễn viên gốc thuộc gia đình Lambert. Câu chuyện xoay quanh quyết định mở ra cánh cửa đỏ và đi sâu vào Cõi Vô Định của Josh (Patrick Wilson) và Dalton (Ty Simpkins) - nay đã trưởng thành - để tiêu diệt một lần và mãi mãi những con quỷ đang ám ảnh cả gia đình mình.",
                'trailer'           => "https://www.youtube.com/watch?v=VJyx2KZ-ILc",
                'bat_dau'           => '2023-10-05',
                'ket_thuc'          => '2023-11-20',
                'hien_thi'          => 1,

            ],
            [
                'ten_phim'          => "NHIỆM VỤ: BẤT KHẢ THI NGHIỆP BÁO PHẦN MỘT",
                'slug_phim'         => Str::slug('NHIỆM VỤ: BẤT KHẢ THI NGHIỆP BÁO PHẦN MỘT'),
                'hinh_anh'          => "https://cinematone.info/public/poster-22/230315193639_posters-mission_impossible__dead_reckoning_part_one_p7RCf.jpg",
                'dao_dien'          => "Christopher McQuarrie",
                'dien_vien'         => "Tom Cruise, Rebecca Ferguson, Vanessa Kirby",
                'the_loai'          => " Hành Động, Phiêu Lưu",
                'thoi_luong'        =>  102     ,
                'ngon_ngu'          => "Tiếng Anh - Phụ đề Tiếng Việt",
                'rated'             => "T18 - PHIM ĐƯỢC PHỔ BIẾN ĐẾN NGƯỜI XEM TỪ ĐỦ 18 TUỔI TRỞ LÊN (18+)",
                'mo_ta'             => "Phần phim thứ 7 của loạt phim Nhiệm Vụ Bất Khả Thi",
                'trailer'           => "https://www.youtube.com/watch?v=AX7lnd9w_yc",
                'bat_dau'           => '2023-10-01',
                'ket_thuc'          => '2023-11-01',
                'hien_thi'          => 1,

            ],
            [
                'ten_phim'          => "MÓNG VUỐT",
                'slug_phim'         => Str::slug('MÓNG VUỐT'),
                'hinh_anh'          => "https://chieuphimquocgia.com.vn/Content/Images/0016552_0.jpeg",
                'dao_dien'          => "Lê Thanh Sơn",
                'dien_vien'         => "Tuấn Trần, Thảo Tâm, Rocker Nguyễn, Gi A Nguyễn, Quốc Khánh, Naomi, Ceri, Hồng Thanh",
                'the_loai'          => "Hồi hộp, Kinh Dị",
                'thoi_luong'        =>  100     ,
                'ngon_ngu'          => "Tiếng Việt - Phụ đề Tiếng Anh",
                'rated'             => "T18 - PHIM ĐƯỢC PHỔ BIẾN ĐẾN NGƯỜI XEM TỪ ĐỦ 18 TUỔI TRỞ LÊN (18+)",
                'mo_ta'             => "Móng Vuốt dẫn dắt câu chuyện đi từ buổi tiệc dã ngoại náo nhiệt của một nhóm bạn đến một kết cục kinh hoàng khi phải đấu tranh sinh tồn với một con ác thú.",
                'trailer'           => "https://www.youtube.com/watch?v=AX7lnd9w_yc",
                'bat_dau'           => '2023-10-01',
                'ket_thuc'          => '2023-11-20',
                'hien_thi'          => 1,

            ],



        ]);

    }
}