<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Branch;

class BranchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $branches = Branch::latest()->get();

        return $branches;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $branch = Branch::create($request->all());

        if(!$branch){
            return response()->json([
                'success' => false,
                'message' => 'Branch was not created.',
            ]);
        }else {
            return response()->json([
                'success' => true,
                'message' => 'Branch was created.',
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
        $branch = Branch::findOrFail($id);

        return $branch;
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
        $branch = Branch::where('id', $id)
        ->update(['name' => $request->name]);

        if($branch){
            return response()->json([
                'success' => true,
                'message' => 'Branch was updated.'
            ]);
        }else {
            return response()->json([
                'success' => false,
                'message' => 'Branch was not updated.'
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
        if(!Branch::findOrFail($id)->delete()){
            return response()->json([
                'success' => false,
                'message' => 'Branch was not deleted.'
            ]);
        }else {
            return response()->json([
                'success' => true,
                'message' => 'Branch was deleted.'
            ]);
        }
    }
}
