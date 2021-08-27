<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produit_Image extends Model
{
    
    
    protected $fillable = [
        'image' , 'produit_id' 
    ];
    public function produit(){
        return $this->belongsTo(Produit::class);
    }
}
