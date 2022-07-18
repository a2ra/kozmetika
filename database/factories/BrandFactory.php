<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Brand;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Brand>
 */
class BrandFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     *
     */
    protected $model = Brand::class;
    public function definition()
    {
        return [
            //
            'name' =>$this->faker->unique()->randomElement([ 'Maybelline', 'Loreal', 'Revlon', 'Revolution', 'Kiko', 'Bourjois']),
            'country' =>$this->faker->randomElement(['DE','FR','AU','BA']),
            'category' =>$this->faker->numberBetween(1,5),
        ];
    }
}
//'Pupa', 'Rare Beauty', 'Este Lauder', 'Essence', 'Catrice', 'Huda Beauty'
