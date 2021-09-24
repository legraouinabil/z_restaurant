<?php

namespace App\Http\Controllers;

use App\Produit;
use Facade\FlareClient\Http\Response;
use Illuminate\Http\Request;

class ProduitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $produits = Produit::select(
            'id','title','description','price','underline_Pice','promotion','category_id')
        ->orderBy('id' , 'desc')
        ->get();
        foreach($produits as $produit){
           // $post->setAttribute('path' , '/post/'. $post->slug);
            $produit->setAttribute('category', $produit->category);
        }
        return response()->json($produits);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->validate($request,[
            'title'=>'string|required',
            'description'=>'string|required',
            'price'=>'integer|required',
            'underline_Pice'=>'string|required',
            'promotion'=>'integer|nullable',
            'category_id'=>'bail|required|exists:categories,id',
           
        ]);
        $prod = Produit::create([
            'title' => $request->title,
            'description' => $request->description,
            'price' => $request->price,
            'underline_Pice' => $request->underline_Pice,
            'promotion' => $request->promotion,
            'category_id' => $request->category_id
        ]);
        return response()->json($prod);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $produit = Produit::find($id);
        return response()->json([
            'id' => $produit->id,
            'title' => $produit->title,
            'description' => $produit->description,
            'price' => $produit->price,
            'underline_Pice' => $produit->underline_Pice,
            'category' =>$produit->category->name,
            'promotion' => $produit->promotion,
            'created_at' => $produit->created_at,
            'produitImages' => $produit->produitImages,
           

        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $prod = Produit::find($id);
        $this->validate($request,[
            'title'=>'string|required',
            'description'=>'string|required',
            'price'=>'integer|required',
            'underline_Pice'=>'string|required',
            'promotion'=>'integer|required',
            'category_id'=>'bail|required|exists:categories,id',
           
        ]);
        $prod->update([
            'title' => $request->title,
            'description' => $request->description,
            'price' => $request->price,
            'underline_Pice' => $request->underline_Pice,
            'promotion' => $request->promotion,
            'category_id' => $request->category_id
        ]);
        return response()->json($prod);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $produit=Produit::findOrFail($id);
        $produit->delete();
        return response()->json([
            'message' => 'produit supprimer avec succes'
        ]);
    }
}
