<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\PurchaseHistory;

class PurchaseHistoryFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = PurchaseHistory::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'buyer' => $this->faker->name,
            'description' => $this->faker->text,
            'address' => $this->faker->address,
            'unit_price' => $this->faker->randomFloat(),
            'amount' => $this->faker->randomFloat(),
            'provider' => $this->faker->text,
        ];
    }
}
