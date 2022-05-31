<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Formation;
use App\Models\Inscrit;
use App\Models\User;
use Illuminate\Http\Request;

class InscritController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Inscrit::All();

    }
    public function formationsindex()
    {
       // return Formation::with('responsable','formateur','formateurexterne')->where('responsable_id', Auth::id())->get();
       return Formation::with('inscrits')->where('formations.responsable_id',9)->get();

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validation user id and formation id  sould be in table demmande
        //if exist delet and add to table inscrits
         $user=User::find($request->user_id);
        $user->inscrits()->sync($request->formation_id,['date_inscrit'=>$request->date_inscrit]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $formation= Formation::find($id);
     return $formation->inscrits;
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
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $inscrit=Inscrit::find($id);
        if($inscrit){
            return  $inscrit->destroy();;
        }
    }
}
