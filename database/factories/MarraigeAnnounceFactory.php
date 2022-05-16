<?php

namespace Database\Factories;

use App\Models\MarraigeAnnounce;
use Illuminate\Database\Eloquent\Factories\Factory;

class MarraigeAnnounceFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = MarraigeAnnounce::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->word,
        'startingdate' => $this->faker->word,
        'endingdate' => $this->faker->word,
        'timing' => $this->faker->word,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
