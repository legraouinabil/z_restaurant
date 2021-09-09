<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
   
    protected $fillable = [
        'qte',
        'produit_id',
        'orderCost',
        'nomComplet',
        'telephone' ,
        'clientAddresse',
        'ville',
        'adressPostal',
        'status',
        
    ];

    public function produit(){
        return $this->belongsTo(Produit::class);
    }
}
