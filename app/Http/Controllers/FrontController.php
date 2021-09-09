<?php

namespace App\Http\Controllers;

use App\Category;
use App\Produit;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function index(){

$categories = Category::with(['produits', 'produits.produitImages'])
->orderBy('id' , 'desc')
->get();
        return response()->json($categories);


}
}
