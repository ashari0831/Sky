<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            [
                'name'=> 'cooler',
                'price'=> 2000,
                'category'=> 'home tools',
                'description'=> 'very cool',
                'gallery'=> "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcR9MCC91e_sVe2fv2SNWpu2JuODtqrk3cCPJA&usqp=CAU",
            ],[
                'name'=> 'asus laptop',
                'price'=> 1500,
                'category'=> 'laptop',
                'description'=> 'beyond the incridible',
                'gallery'=> "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQMoLzNm9LspLycD6gdtMrAP0nmQGo8Merzxg&usqp=CAU",
            ],
        ]);
    }
}
