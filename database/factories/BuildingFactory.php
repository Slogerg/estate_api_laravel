<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Building>
 */
class BuildingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->text(),
            'location' => $this->faker->text(15),
            'price' => $this->faker->numberBetween('100','250000'),
            'category_id' => $this->faker->numberBetween('1','5'),
            'description'=>$this->faker->paragraph(),
        ];
    }
}
