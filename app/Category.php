<?php

namespace App;
use App\Produit;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable=[
        'name' , 'slug' , 'description'
    ];

    public function produits(){
        return $this->hasMany(Produit::class);
    }
}
