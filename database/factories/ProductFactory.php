<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name'=>'wooden table',
            'price'=> 3,
            'category'=>'tools',
            'description'=>'cool',
            'gallery'=>'/storage/productImages/vhKvU8Hbhk3sQRMq4MYvirJ6WyWtyOmX5E1eiksJ.png',
            'created_at'=>now(),
            'updated_at'=>now(),
            'quantity'=>10,
        ];
    }
}
