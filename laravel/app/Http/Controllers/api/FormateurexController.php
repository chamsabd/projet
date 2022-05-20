<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Formateurex;
use Illuminate\Http\Request;

class FormateurexController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Formateurex::all();
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
        //$request->validate($this->validationRules());

        $newformateurex=new Formateurex();
        $newformateurex->ncin=$request->formateurex["ncin"];
        $newformateurex->email=$request->formateurex["email"];
        $newformateurex->nom=$request->formateurex["nom"];
        $newformateurex->prenom=$request->formateurex["prenom"]; 
        $newformateurex->specialite=$request->formateurex["specialite"];

        $newformateurex->save();  
     return $newformateurex;
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
    public function update(Request $request, $id)
    {
        //
        $existingformateurex=Formateurex::find($id);
        if($existingformateurex){
        $existingformateurex->ncin=$request->formateurex["ncin"];
        $existingformateurex->email=$request->formateurex["email"];
        $existingformateurex->nom=$request->formateurex["nom"];
        $existingformateurex->prenom=$request->formateurex["prenom"];
        $existingformateurex->specialite=$request->formateurex["specialite"];
        $existingformateurex->save();
        return $existingformateurex;

        }
        return "formateur not found";

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
        $existingformateurex = Formateurex::find($id);

        if($existingformateurex){
            $existingformateurex->delete();
            return "Formateurex successfully deleted.";
        }

        return "Formateurex not found.";

    }

}
