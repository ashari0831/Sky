<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class CommentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('comments')->insert([
            [
                 'user_id'=> 1,
                 'object_id'=> 1,
                 'opinion'=> 'it can be better. maybe in the future.',
            ],
            [
                'user_id'=> 1,
                'object_id'=> 1,
                'opinion'=> 'it love it. just buy it',
            ],
        ]);
    }
}
