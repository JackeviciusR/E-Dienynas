<?php

namespace Database\Factories;

use App\Models\Person;
use Illuminate\Database\Eloquent\Factories\Factory;

class PersonFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Person::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->lastName(),
            'surname' => $this->faker->lastName(),
            'national_identification_number' => $this->faker
                    ->numberBetween(4,5) * 10000000000 + $this->faker
                    ->numberBetween(1, 15) * 100000000 + $this->faker
                    ->numberBetween(1, 12) * 1000000 + $this->faker
                    ->numberBetween(1, 31) * 10000 + $this->faker
                    ->numberBetween(1, 9999),
            'created_at'=> now(),
            'updated_at'=> now(),
        ];
    }
}
