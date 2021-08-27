<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
   
    protected $fillable = [
        'qteProduct',
        'produit_id',
        'clientName',
        'clientTel' ,
        'clientAddresse',
        'ville',
        'codePostal',
        'status',
        
    ];

    public function produit(){
        return $this->belongsTo(Produit::class);
    }
}
