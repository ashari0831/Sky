<?php

namespace Database\Factories;

use App\Models\risk;
use Illuminate\Database\Eloquent\Factories\Factory;

class RiskFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = risk::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'dept_name' => $this->faker->name(),
            'age'=> 45,
        ];

        //after that we need tiker and
        // \app\models\modelName::factory()->create();   or
        // \app\models\modelName::factory()->count(numberOfRows)->create();
    }
}
