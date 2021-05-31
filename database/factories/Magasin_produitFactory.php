<?php

namespace Database\Factories;

use App\Models\Magasin_produit;
use Illuminate\Database\Eloquent\Factories\Factory;

class Magasin_produitFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Magasin_produit::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'produit_id' => $this->faker->numberBetween(1,50),
            'magasin_id' => $this->faker->numberBetween(1,10),
            'limiteStockAlerte' => $this->faker->numberBetween(1,500),
            'quantiteStock' => $this->faker->numberBetween(1,1000),
        ];
    }
}
