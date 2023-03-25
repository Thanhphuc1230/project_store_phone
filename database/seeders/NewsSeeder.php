<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Text;
class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data= array();
        for($i = 1; $i<= 1000; $i++){
            $data[] = [
                'title' => Str::random(13),
                'intro' => Str::random(20),
                'content' => Str::random(40),
                'author' => Str::random(9)

            ];
        }


        DB::table('news')->insert($data);
    }
}
