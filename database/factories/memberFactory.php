<?php

namespace Database\Factories;

use App\Models\member;
use Illuminate\Database\Eloquent\Factories\Factory;

class memberFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = member::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'firstname' => $this->faker->word,
        'lastname' => $this->faker->word,
        'village' => $this->faker->word,
        'mobileno' => $this->faker->word,
        'image' => $this->faker->word,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
