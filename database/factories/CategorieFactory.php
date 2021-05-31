<?php

namespace Database\Factories;

use App\Models\Categorie;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class CategorieFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Categorie::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $libelle = $this->faker->unique()->word();
        return [
            'referenceCategorie' => $this->faker->text(25),
            'libelleCategorie' => $libelle,
            'slug' => Str::slug($libelle),
            'typeVente' =>  $this->faker->text(100),
            'typeCond' =>  $this->faker->text(100)
        ];
    }
}
