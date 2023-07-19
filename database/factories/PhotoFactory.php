<?php

namespace Database\Factories;

use App\Models\Package;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Photo>
 */
class PhotoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            
            'filename' => 'fotos/201-tarta-con-forma-de-paquete-de-amazon.png',
            'package_id' => $this->faker->randomElement(Package::all())['id'],
        ];
    }
}
