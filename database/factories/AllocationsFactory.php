<?php

namespace Database\Factories;

use App\Models\Allocations;
use Illuminate\Database\Eloquent\Factories\Factory;

class AllocationsFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Allocations::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $female = 'F';
        $male = 'M';
        return [
            'index_no' => $this->faker->numberBetween(100, 500),
            'full_name' => $this->faker->name(),
            'sex' => $male,
            'registration_no' =>$this->faker->unique()->numerify('S0601.2016 ####'),
            'collage' => $this->faker->word('Informatics and virtual education'),
            'course' => $this->faker->word('Telecommunications Engineering'),
            'yos' => $this->faker->numberBetween(1,4),
            'ma' => $this->faker->numberBetween(90000, 250000),
            'books_stationary' => $this->faker->numberBetween(90000, 150000),
            'tution_free' => $this->faker->numberBetween(500000, 600000),
            'field' =>$this->faker->numberBetween(100000, 300000),
            'research' =>$this->faker->numberBetween(100000, 300000),
            'srf' => $this->faker->numberBetween(200, 500),
            'total' => $this->faker->numberBetween(700000, 900000)
        ];
    }
}
