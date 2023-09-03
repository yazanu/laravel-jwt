<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sender;
use Validator;

class SenderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $senders = Sender::latest()->get();

        return $senders;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'sender_name' => 'required|string',
            'phone_no' => 'required',
            'address' => 'required',
            'branch_id' => 'required'
        ]);

        if($validator->fails()){
            return response()->json([
                'errors' => $validator->errors()
            ]);
        }

        $sender = Sender::create($request->all());

        if($sender){
            return response()->json([
                'success' => true,
                'message' => 'Sender was created.'
            ]);
        }else {
            return response()->json([
                'success' => false,
                'message' => 'Sender was not created.'
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $sender = Sender::findOrFail($id);

        return $sender;
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
        $sender = Sender::where('id', $id)
        ->update($request->all());

        if(!$sender){
            return response()->json([
                'success' => false,
                'message' => 'Sender was not updated.'
            ]);
        }else {
            return response()->json([
                'success' => true,
                'message' => 'Sender was updated.'
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
        if(!Sender::findOrFail($id)->delete()){
            return response()->json([
                'success' => false,
                'message' => 'Sender was not deleted.'
            ]);
        }else {
            return response()->json([
                'success' => true,
                'message' => 'Sender was deleted.'
            ]);
        }
    }
}
