<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([

            'uuid' => Str::uuid(),
            'email' => '12admin@gmail.com',
            'password' => bcrypt('123456789'),
            'fullname' => 'Dao Thanh Phuc12',
            'phone' => '017064056461',
            'level' => 1,
            'avatar' => 'https://cdn1.vectorstock.com/i/1000x1000/54/90/administrator-avatar-icon-vector-32095490.jpg'
        ]);
    }
}
