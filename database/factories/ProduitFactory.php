<?php

namespace Database\Factories;

use App\Models\Produit;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ProduitFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Produit::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $libelle = $this->faker->unique()->word();
        return [
            'reference' => $this->faker->text(25),
            'libelleProduit' =>  $libelle,
            'slug' => Str::slug($libelle),
            'prix' =>  $this->faker->randomFloat(3, 0, 99999.99),
            'description' =>  $this->faker->text(300)
        ];
    }
}
