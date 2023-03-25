<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;


class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data= array();
        for($i = 1; $i<= 10; $i++){
            $data[] = [
                'name' => Str::random(13),
                'price' => Str::random(20),
                'intro' => Str::random(40),
                'content' => Str::random(9),
                'images' => Str::random(9),
                'screen' => Str::random(9),
                'color' => Str::random(9),
                'weight' => Str::random(9),
                'amount' => Str::random(9),
                'user_id'=> Str::random(10),

            ];
        }


        DB::table('products')->insert($data);
    }
}
