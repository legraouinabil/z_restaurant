<?php

namespace App\Http\Controllers;

use App\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::select('id, orderCost, qte, produit_id, telephone, adressPostal, ville, zipCode, status')
        ->orderBy('id' , 'desc')
        ->get();
        return response()->json($orders);
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
        $this->validate($request,[
            'orderCost'=>'required',
            'qte'=>'required',
            'nomComplet'=>'string|required',
            'ville'=>'string|required',
            'zipCode'=>'required',
            'telephone'=>'string|required',
            'adressPostal'=>'string|nullable',
            'produit_id'=>'bail|required|exists:produits,id',
           
        ]);
        $order = Order::create([
            'orderCost' => $request->orderCost,
            'qte' => $request->qte,
            'nomComplet' => $request->nomComplet,
            'ville' => $request->ville,
            'zipCode' => $request->zipCode,
            'telephone' => $request->telephone,
            'adressPostal' => $request->adressPostal,
            'produit_id' => $request->produit_id,
        ]);
        return response()->json($order);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $order = Order::find($id);
        return response()->json([
            'id' => $order->id,
            'orderCost' => $order->orderCost,
            'qte' => $order->qte,
            'nomComplet' => $order->nomComplet,
            'telephone' => $order->telephone,
            'adressPostal' =>$order->adressPostal,
            'ville' => $order->ville,
            'zipCode' => $order->zipCode,
            'status' => $order->status,
            'created_at' => $order->created_at
           

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
        $order = Order::findOrFail($id);
        $this->validate($request,[

            'status'=>'required|in:Livré,Annuler,Confirmer,EnTraitment',
             
        ]);
        $data=$request->all();
        $status=$order->fill($data)->save();
        if($status){
            return response()->json([
                $order,
                'succes' => 'status update avec succes'
            ]);

        }
       
        
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
        $order=Order::findOrFail($id);
        $order->delete();
        return response()->json([
            'message' => 'order supprimer avec succes'
        ]);
    }
}
