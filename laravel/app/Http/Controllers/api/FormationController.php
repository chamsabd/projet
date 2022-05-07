<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Formation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;

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
        $request->validate($this->validationRules());
        $formation=new Formation();
        $formation->titre=$request->titre;
        $formation->date_debut=$request->date_debut;
        $formation->date_fin=$request->date_fin;
        $formation->etat=0;
        if ($request->description) {
      $formation->description=$request->description;
        }
       
        $formation->nbr_place=$request->nbr_place;
       
        
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
        $formation=Formation::findorfail($id);
        if($formation){
        $formation->nom_for=$request->nom_for;
        $formation->date_debut=$request->date_debut;
        $formation->description=$request->description;
        return $formation->save();}

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
        
    }
    private function validationRules()
    { $day=new Date('y-m-d');
        $day::setMonth($day::getMonth()+1);
        return [
            'title' => ['required', 'min:5', 'max:15'],
            'nbr_place' => ['required', 'min:10', 'max:30'],
            'description'=>'max:100',
            'responsable_id' => 'required|exists:utilisateurs,id',
            'date_debut' => 'required|date_format:y-m-d|before_or_equal:date_fin|after:'.$day,
            'date_fin' => 'required|date_format:y-m-d|after_or_equal:date_debut'
        ];
    }
}
