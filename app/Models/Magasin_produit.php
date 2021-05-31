<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Magasin_produit extends Model
{
    use HasFactory;
    
    protected $fillable = ['produit_id','magasin_id','limiteStockAlerte','quantiteStock']; 

    public function produits(){
        return $this->hasMany(Produit::class);
    }
    
    public function magasins(){
        return $this->hasMany(Magasin::class);
    }
}
