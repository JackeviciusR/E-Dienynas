<?php

namespace Database\Factories;

use App\Models\Model;
use App\Models\School;
use Illuminate\Database\Eloquent\Factories\Factory;

class SchoolFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = School::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name() . ' gymnasium ',
            'city' => $this->faker->city(),
            'address'=>$this->faker->address(),
            'created_at'=> now(),
            'updated_at'=> now(),
        ];
    }
}
