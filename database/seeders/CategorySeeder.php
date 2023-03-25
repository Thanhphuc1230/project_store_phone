<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            [   
                'name_cate' => 'Menu',
                'parent_id' => 0,
                'link' => null,
               
            ],
            [
                'name_cate' => 'Điện thoại',
                'parent_id' => 1,
                'link' => null,
            ],
            [
                'name_cate' => 'Laptop',
                'parent_id' => 1,
                'link' => null,
            ],
            [
                'name_cate' => 'Macbook',
                'parent_id' => 1,
                'link' => null,
            ],
            [
                'name_cate' => 'Tablet',
                'parent_id' => 1,
                'link' => null,
            ],
            [
                'name_cate' => 'Ipad',
                'parent_id' => 1,
                'link' => null,
            ],
            [
                'name_cate' => 'Phụ kiện',
                'parent_id' => 1,
                'link' => null,
            ],
            [
                'name_cate' => 'iPhone',
                'parent_id' => 2,
                'link' => 'https://www.thegioididong.com/dtdd-apple-iphone'
            ],
            [
                'name_cate' => 'Samsung',
                'parent_id' => 2,
                'link' => 'https://www.thegioididong.com/dtdd-samsung'
            ],
            [
                'name_cate' => 'Oppo',
                'parent_id' => 2,
                'link' => 'https://www.thegioididong.com/dtdd-oppo'
            ],
            [
                'name_cate' => 'Vivo',
                'parent_id' => 2,
                'link' => 'https://www.thegioididong.com/dtdd-vivo'
            ],
            [
                'name_cate' => 'Xiaomi',
                'parent_id' => 2,
                'link' => 'https://www.thegioididong.com/dtdd-xiaomi'
            ],
            [
                'name_cate' => 'Nokia',
                'parent_id' => 2,
                'link' => 'https://www.thegioididong.com/dtdd-nokia'
            ],
            [
                'name_cate' => 'Itel',
                'parent_id' => 2,
                'link' => 'https://www.thegioididong.com/dtdd-itel'
            ],
            [
                'name_cate' => 'Masstel',
                'parent_id' => 2,
                'link' => 'https://www.thegioididong.com/dtdd-masstel'
            ],
            [
                'name_cate' => 'Asus',
                'parent_id' => 3,
                'link' => 'https://www.thegioididong.com/laptop-asus'
            ],
            [
                'name_cate' => 'HP',
                'parent_id' => 3,
                'link' => 'https://www.thegioididong.com/laptop-hp-compaq'
            ],
            [
                'name_cate' => 'Lenovo',
                'parent_id' => 3,
                'link' => 'https://www.thegioididong.com/laptop-lenovo'
            ],
            [
                'name_cate' => 'Dell',
                'parent_id' => 3,
                'link' => 'https://www.thegioididong.com/laptop-dell'
            ],
            [
                'name_cate' => 'Msi',
                'parent_id' => 3,
                'link' => 'https://www.thegioididong.com/laptop-msi'
            ],
            [
                'name_cate' => 'LG',
                'parent_id' => 3,
                'link' => 'https://www.thegioididong.com/laptop-lg'
            ],
            [
                'name_cate' => 'Acer',
                'parent_id' => 3,
                'link' => 'https://www.thegioididong.com/laptop-acer'
            ],
            [
                'name_cate' => 'Macbook Pro',
                'parent_id' => 4,
                'link' => 'https://www.thegioididong.com/laptop-ldp'
            ],
            [
                'name_cate' => 'Tablet Samsung',
                'parent_id' => 5,
                'link' => 'https://www.thegioididong.com/may-tinh-bang-samsung'
            ],
            [
                'name_cate' => 'Tablet Lenovo',
                'parent_id' => 5,
                'link' => 'https://www.thegioididong.com/may-tinh-bang-lenovo'
            ],
            [
                'name_cate' => 'Tablet Huawei',
                'parent_id' => 5,
                'link' => 'https://www.thegioididong.com/may-tinh-bang-huawei'
            ],
            [
                'name_cate' => 'Ipad Apple',
                'parent_id' => 6,
                'link' => 'https://www.thegioididong.com/may-tinh-bang-apple-ipad'
            ],
            [
                'name_cate' => 'Sạc dự phòng',
                'parent_id' => 7,
                'link' => 'https://www.thegioididong.com/sac-dtdd#c=57&o=9&pi=3'
            ],
            [
                'name_cate' => 'Tai nghe Apple',
                'parent_id' => 7,
                'link' => 'https://www.thegioididong.com/tai-nghe-apple'
            ],
            
        ]);
    }
}
