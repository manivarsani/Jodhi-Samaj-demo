<?php

namespace Database\Factories;

use App\Models\FunctionPublish;
use Illuminate\Database\Eloquent\Factories\Factory;

class FunctionPublishFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = FunctionPublish::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->word,
        'address' => $this->faker->word,
        'startingdate' => $this->faker->word,
        'endingdate' => $this->faker->word,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
