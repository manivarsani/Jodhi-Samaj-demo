<?php

namespace Database\Factories;

use App\Models\MeetingSchedul;
use Illuminate\Database\Eloquent\Factories\Factory;

class MeetingSchedulFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = MeetingSchedul::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'meetingagenda' => $this->faker->word,
        'date' => $this->faker->word,
        'timing' => $this->faker->word,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
