<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Produit;
use App\Models\Categorie;
use App\Models\Magasin;
use App\Models\Magasin_produit;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Categorie::factory()
            ->has(Produit::factory()
                ->count(7))
            ->count(10)
            ->create();
        Magasin::factory()
            ->count(15)
            ->create();
        Magasin_produit::factory()
            ->count(20)
            ->create();
    }
}