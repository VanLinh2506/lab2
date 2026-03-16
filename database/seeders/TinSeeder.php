<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TinSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('tin')->insert([
            ['id' => 2, 'tieuDe' => 'Tận cùng nỗi đau', 'tomTat' => 'Tên em là Thanh Trúc. Câu chuyện về em...', 'noiDung' => 'Một ngày giá rét nhất từ đầu mùa đông này tôi đã tìm về bản Bãi Đá...', 'xem' => 500, 'ngayDang' => '2018-12-16', 'idLT' => 12],
            
            ['id' => 3, 'tieuDe' => 'Hình vẽ tiết lộ nội tâm của bạn', 'tomTat' => 'Cùng một hình ảnh nhưng mỗi người nhìn ra một góc khác nhau...', 'noiDung' => 'Nội dung chi tiết hình vẽ...', 'xem' => 100, 'ngayDang' => '2018-12-19', 'idLT' => 9],
            ['id' => 4, 'tieuDe' => 'Bí quyết giúp người nội trợ tiết kiệm chi phí mua sắm', 'tomTat' => 'Tóm tắt bí quyết...', 'noiDung' => 'Nội dung chi tiết...', 'xem' => 120, 'ngayDang' => '2018-12-18', 'idLT' => 9],
            ['id' => 5, 'tieuDe' => 'Hoa Dã Quỳ rạng rỡ núi lửa Chư Đăng Ya', 'tomTat' => 'Tóm tắt hoa dã quỳ...', 'noiDung' => 'Nội dung chi tiết...', 'xem' => 150, 'ngayDang' => '2018-12-18', 'idLT' => 9],
            ['id' => 6, 'tieuDe' => 'Hà Tiên - thành phố lạ lùng', 'tomTat' => 'Tóm tắt Hà Tiên...', 'noiDung' => 'Nội dung chi tiết...', 'xem' => 90, 'ngayDang' => '2018-12-17', 'idLT' => 9],
            ['id' => 7, 'tieuDe' => 'Phật tử tuổi cao vẫn nhiệt tình tiếp sức mùa thi', 'tomTat' => 'Cùng với hàng trăm đoàn viên, thanh niên TP Đà Nẵng...', 'noiDung' => 'Đặc biệt trong số này có nhiều Phật tử tuổi cao...', 'xem' => 80, 'ngayDang' => '2018-12-13', 'idLT' => 9],
            
            ['id' => 8, 'tieuDe' => 'Poet Huu Loan dies at age 95', 'tomTat' => 'Tóm tắt...', 'noiDung' => 'Nội dung...', 'xem' => 300, 'ngayDang' => '2018-12-15', 'idLT' => 1],
            ['id' => 9, 'tieuDe' => 'Vớ "kịch câm" và chai mước', 'tomTat' => 'Tóm tắt...', 'noiDung' => 'Nội dung...', 'xem' => 280, 'ngayDang' => '2018-12-14', 'idLT' => 1],
            ['id' => 10, 'tieuDe' => 'Ký ức thời chiến', 'tomTat' => 'Tóm tắt...', 'noiDung' => 'Nội dung...', 'xem' => 260, 'ngayDang' => '2018-12-13', 'idLT' => 1],
            ['id' => 11, 'tieuDe' => 'Nguyệt thực toàn phần trên thế giới', 'tomTat' => 'Tóm tắt...', 'noiDung' => 'Nội dung...', 'xem' => 240, 'ngayDang' => '2018-12-12', 'idLT' => 2],
        ]);
    }
}