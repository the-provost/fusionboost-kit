<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Support;

class SupportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Support::where("status", "issued")->latest('id')->get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
        	"user_id" => ["required", "integer"],
        	"name" => ["required", "string"],
        	"email" => ["nullable", "email"],
        	"phone" => ["required", "integer"],
        	"title" => ["required", "string"],
        	"description" => ["required", "string"]
        ]);
        
        Support::create([
        	"user_id" => $request->get("user_id"),
        	"name" => $request->get("name"),
        	"email" => $request->get("email"),
        	"phone" => $request->get("phone"),
        	"title" => $request->get("title"),
        	"description" => $request->get("description"),
        	"status" => "issued"
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
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
    public function update(Request $request)
    {
        $token = Support::where("id", $request->get("id"))->first();
        $token->status = "fixed";
        $token->save();
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
    }
}
