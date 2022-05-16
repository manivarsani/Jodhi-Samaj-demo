<?php

namespace Database\Factories;

use App\Models\BookSocity;
use Illuminate\Database\Eloquent\Factories\Factory;

class BookSocityFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = BookSocity::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'familyname' => $this->faker->word,
        'startingdate' => $this->faker->word,
        'endingdate' => $this->faker->word,
        'totaldaybook' => $this->faker->word,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
