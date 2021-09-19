<?php

namespace App\Http\Controllers;

use App\Category;
use App\Produit;
use Hamcrest\Core\HasToString;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category = Category::select( 'name','id')
        ->orderBy('id' , 'desc')
        ->paginate(100);
        foreach($category as $c) {
            $c->setAttribute('count', count($c->produits));
        }
        return response()->json($category);
        
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
           
           
        ]);
        $cat = Category::create([
            'name' => $request->name,
     

        ]);
        return response()->json($cat);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data['category']=Category::find($id);
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
         $category=Category::findOrFail($id);
        $this->validate($request,[
            'name'=>'string|required',
           
           
        ]);
        $category->update([
            'name' => $request->name,
          

        ]);
        return response()->json($category);
       
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
        $category=Category::findOrFail($id);
        $category->delete();
        return response()->json([
            'message' => 'category supprimer avec succes'
        ]);
    }
}
