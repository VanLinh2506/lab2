<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\Product;

class CategoryProductSeeder extends Seeder
{
    public function run(): void
    {
        // Tạo categories
        $categories = [
            ['name' => 'Điện thoại', 'description' => 'Các sản phẩm điện thoại di động'],
            ['name' => 'Laptop', 'description' => 'Máy tính xách tay các loại'],
            ['name' => 'Phụ kiện', 'description' => 'Phụ kiện điện thoại và máy tính'],
            ['name' => 'Tablet', 'description' => 'Máy tính bảng'],
            ['name' => 'Đồng hồ thông minh', 'description' => 'Smartwatch và thiết bị đeo'],
        ];

        foreach ($categories as $cat) {
            Category::create($cat);
        }

        // Tạo products
        $products = [
            ['name' => 'iPhone 15 Pro Max', 'description' => 'Điện thoại cao cấp từ Apple với chip A17 Pro', 'price' => 29990000, 'quantity' => 50, 'category_id' => 1],
            ['name' => 'Samsung Galaxy S24 Ultra', 'description' => 'Flagship Android với bút S-Pen', 'price' => 27990000, 'quantity' => 30, 'category_id' => 1],
            ['name' => 'Xiaomi 14 Pro', 'description' => 'Điện thoại cao cấp với camera Leica', 'price' => 19990000, 'quantity' => 40, 'category_id' => 1],
            
            ['name' => 'MacBook Pro M3', 'description' => 'Laptop chuyên nghiệp cho developer', 'price' => 45990000, 'quantity' => 20, 'category_id' => 2],
            ['name' => 'Dell XPS 15', 'description' => 'Laptop Windows cao cấp', 'price' => 35990000, 'quantity' => 15, 'category_id' => 2],
            ['name' => 'Asus ROG Zephyrus', 'description' => 'Laptop gaming mỏng nhẹ', 'price' => 42990000, 'quantity' => 12, 'category_id' => 2],
            
            ['name' => 'AirPods Pro 2', 'description' => 'Tai nghe không dây chống ồn', 'price' => 5990000, 'quantity' => 100, 'category_id' => 3],
            ['name' => 'Ốp lưng iPhone 15', 'description' => 'Ốp lưng silicon chính hãng', 'price' => 490000, 'quantity' => 200, 'category_id' => 3],
            ['name' => 'Chuột Logitech MX Master 3', 'description' => 'Chuột không dây cao cấp', 'price' => 2490000, 'quantity' => 80, 'category_id' => 3],
            
            ['name' => 'iPad Pro 12.9', 'description' => 'Máy tính bảng chuyên nghiệp', 'price' => 28990000, 'quantity' => 25, 'category_id' => 4],
            ['name' => 'Samsung Galaxy Tab S9', 'description' => 'Tablet Android cao cấp', 'price' => 19990000, 'quantity' => 18, 'category_id' => 4],
            
            ['name' => 'Apple Watch Series 9', 'description' => 'Đồng hồ thông minh từ Apple', 'price' => 9990000, 'quantity' => 40, 'category_id' => 5],
            ['name' => 'Samsung Galaxy Watch 6', 'description' => 'Smartwatch Android', 'price' => 6990000, 'quantity' => 35, 'category_id' => 5],
        ];

        foreach ($products as $prod) {
            Product::create($prod);
        }
    }
}
