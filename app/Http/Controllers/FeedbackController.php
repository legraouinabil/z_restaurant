<?php

namespace App\Http\Controllers;

use App\Feedback;
use Illuminate\Http\Request;

class FeedbackController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $feedback = Feedback::orderBy('id' , 'desc')
        ->get();
        return response()->json($feedback);
        
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
            'nomComplete'=>'string|required',
            'telephone'=>'string|required',
            'feedbackText'=>'string|required',
           
           
        ]);
        $feedback = Feedback::create([
            'nomComplete' => $request->nomComplete,
            'telephone' => $request->telephone,
            'feedbackText' => $request->feedbackText,
           
        ]);
        return response()->json($feedback);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $feedback = Feedback::findOrFail($id);
        return response()->json([
            'id' => $feedback->id,
            'nomComplete' => $feedback->nomComplete,
            'telephone' => $feedback->telephone,
            'feedbackText' => $feedback->feedbackText,
            'status' => $feedback->status,
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
        $feed = Feedback::findOrFail($id);
            $this->validate($request,[

                'status'=>'required|in:Accepted,Refused,EnTraitment'
                 
            ]);
            $data=$request->all();
            $status=$feed->fill($data)->save();
            if($status){
                return response()->json([
                    $feed,
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
        $feedback=Feedback::findOrFail($id);
        $feedback->delete();
        return response()->json([
            'message' => 'feedback supprimer avec succes'
        ]);
    }
}
