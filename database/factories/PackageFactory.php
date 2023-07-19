<?php

namespace Database\Factories;

use App\Models\PackageStatus;
use App\Models\PackageType;
use App\Models\Shipper;
use App\Models\Transport;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Package>
 */
class PackageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'alto' => $this->faker->numberBetween(2, 30),
            'ancho' => $this->faker->numberBetween(2, 30),
            'largo' => $this->faker->numberBetween(2, 30),
            'peso' => $this->faker->numberBetween(2, 30),
            'tracking' => $this->faker->unique()->ean13(),
            'notas' => $this->faker->paragraph(),
            'user_id' => $this->faker->numberBetween(2, 4),
            'package_type_id' => $this->faker->randomElement(PackageType::all())['id'],
            'shipper_id' => $this->faker->randomElement(Shipper::all())['id'],
            'package_status_id' => 1,
            'transport_id' => null,
            'dispatch_id' => null,
            'dispatched_at' => null,
            'delivered_at' => null,
        ];
    }

    public function preparados(): Factory
    {
        return $this->state(function (array $attributes) {

            return [
                'transport_id' => $this->faker->randomElement(Transport::all())['id'],
                'package_status_id' => 2,
            ];
        });
    }

    public function enviados(): Factory
    {
        return $this->state(function (array $attributes) {

            return [
                'transport_id' => $this->faker->randomElement(Transport::all())['id'],
                'package_status_id' => 3,
                'dispatched_at' => now(),
            ];
        });
    }

    public function entregados(): Factory
    {
        return $this->state(function (array $attributes) {

            return [
                'delivered_at' => now(),
                'package_status_id' => 5,
            ];
        });
    }
    /*
    public function despachado(): array
    {
        return [
            'alto' => $this->faker->numberBetween(2, 30),
            'ancho' => $this->faker->numberBetween(2, 30),
            'largo' => $this->faker->numberBetween(2, 30),
            'peso' => $this->faker->numberBetween(2, 30),
            'tracking' => $this->faker->unique()->ean13(),
            'notas' => $this->faker->paragraph(),
            'package_type_id' => $this->faker->randomElement(PackageType::all())['id'],
            'user_id' => $this->faker->randomElement(User::all())['id'],
            'shipper_id' => $this->faker->randomElement(Shipper::all())['id'],
            'transport_id' => $this->faker->randomElement(Transport::all())['id'],
            'dispatch_id' => null,
            'repack_id' => null,
            'received_at' => now(),
            'dispatched_at' => null,
            'delivered_at' => null,
        ];
    }
    */
}
