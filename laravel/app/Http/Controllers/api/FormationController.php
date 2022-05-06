<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Formation;
use Illuminate\Http\Request;

class FormationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return Formation::with('responsable','formateur','formateurexterne')->get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $formation=new Formation();
        $formation->nom_for=$request->nom_for;
        $formation->date_debut=$request->date_debut;
        $formation->description=$request->description;
        
        return $formation->save();
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
        $formation=Formation::find($id);
        if($formation){
        $formation->nom_for=$request->nom_for;
        $formation->date_debut=$request->date_debut;
        $formation->description=$request->description;
        return $formation->save();}
return 'not found';
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $formation=Formation::find($id);
        if($formation){
           $formation->archi=1;
           
            return  $formation->save();;
        }
        return 'not found';
    }
}
