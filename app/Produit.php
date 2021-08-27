<?php

namespace App;
use App\Category;
use Illuminate\Database\Eloquent\Model;

class Produit extends Model
{
    //
    protected $fillable = [
        'title' , 'category_id' , 'price' , 'qte' , 'description' , 'oldprice'
    ];

    public function category(){
        return $this->belongsTo(Category::class);
    }
    public function produitImages(){
        return $this->hasMany(Produit_Image::class);
    }

    public function orders(){
        return $this->hasMany(Order::class);
    }
}
