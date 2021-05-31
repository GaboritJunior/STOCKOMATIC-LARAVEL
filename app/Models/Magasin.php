<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Magasin extends Model
{
    use HasFactory;
    
    protected $fillable = ['referenceProduit','libelleMagasin','slug','adresse','ville','CP'];
    
    public function magasin_produits(){
        return $this->hasMany(Magasin_produit::class);
    }
    
}
