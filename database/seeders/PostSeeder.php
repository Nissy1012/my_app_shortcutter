<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use DateTime;


class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('posts')->insert([
            'user_id' => 1,
            'place' => '目的地',
            'station' => '最寄駅',
            'address' => '住所',
            'body' => '詳細説明',
            'image_path' => '',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
    ]);
    }
}
