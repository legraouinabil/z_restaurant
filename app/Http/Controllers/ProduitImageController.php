<?php

namespace App\Http\Controllers;

use App\Produit_Image;
use Illuminate\Http\Request;

class ProduitImageController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $images = Produit_Image::all();
        // foreach($images as $image){
            // // $post->setAttribute('path' , '/post/'. $post->slug);
            //  $image->setAttribute('produit', $image->produit);
        // }
        return response()->json($images);
        
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
            'name'=>'string|required',
            'produit_id'=>'bail|required|exists:produits,id',
           
        ]);
        $image = Produit_Image::create([
            'image' => $request->image,
            'produit_id' => $request->produit_id

        ]);
        return response()->json($image);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data['image']=Produit_Image::find($id);
        return response()->json($data);
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
         $image=Produit_Image::findOrFail($id);
        $this->validate($request,[
            'image'=>'string|required',
            'produit_id'=>'bail|required|exists:produits,id',
           
        ]);
        $image->update([
            'image' => $request->image,
            'produit_id' => $request->produit_id
           

        ]);
        return response()->json($image);
       
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
        $image=Produit_Image::findOrFail($id);
        $image->delete();
        return response()->json([
            'message' => 'image supprimer avec succes'
        ]);
    }
}
