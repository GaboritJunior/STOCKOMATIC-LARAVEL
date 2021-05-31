<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produit extends Model
{
    use HasFactory;
    
    protected $fillable=['reference','slug','libelleProduit','prix','description','magasin_id','categorie_id'];
    
    public function categorie(){
        return $this->belongsTo(Categorie::class);
    }
    
    public function magasin_produits(){
        return $this->hasMany(Magasin_produit::class);
    }
   
}
