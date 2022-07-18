<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Cosmetic;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Cosmetic>
 */
class CosmeticFactory extends Factory
{
    protected $model = Cosmetic::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->unique()->randomElement(['Fresh Faced', 'Magic Makeup', 'Brilliant Beauty', 'Lovely Looks', 'Face First', 'Angle Angels', 'Natural Makeup', 'Stunning Operation', 'Full Coverage', 'Fresh Glow', 'Glow Up' ]),
            'year' => $this->faker->dateTimeBetween($startDate = '-3 years', $endDate = 'now', $timezone = null),
            'code'=> $this->faker->unique()->numberBetween(1000,9999),
            'brand' => $this->faker->numberBetween(1,6),
            'price'=>  $this->faker->numberBetween(70,340)
            //
        ];
    }
}
