<?php

namespace Database\Factories;

use App\Models\Magasin;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class MagasinFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Magasin::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $libelle = $this->faker->unique()->word();
        return [
            'referenceMagasin' => $this->faker->text(25),
            'libelleMagasin' => $libelle,
            'slug' => Str::slug($libelle),
            'adresse' => $this->faker->text(100),
            'ville' => $this->faker->text(100),
            'CP' => $this->faker->numberBetween(10000,99999)
        ];
    }
}
