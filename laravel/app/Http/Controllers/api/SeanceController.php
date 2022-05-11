<?php

namespace App\Http\Controllers\api;
use App\Models\Seance;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SeanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      return Seance::with('formation')->get().'\n\t';
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $newSeance = new Seance() ;
 //Seance::create($request->all());
      /* $newSeance = Seance::create([
             'nom_seance' => $request->nom_seance,
             'date' => $request->date,
             'temps_fin' => $request->temps_fin,
             'temps_debut' => $request->temps_debut ,
             'formation_id' => $request->formation_id 
       ]);*/

      $newSeance->nom_seance = $request->seance["nom_seance"];
      $newSeance->date = $request->seance["date"];
      $newSeance->temps_fin = $request->seance["temps_fin"];
      $newSeance->temps_debut = $request->seance["temps_debut"];
      $newSeance->temps_debut = $request->seance["formation_id"];
     // $newSeance->temps_debut = $request->seance["temps_debut"];
     // $newSeance->nom_seance = $request->nom_seance;
     // $newSeance->date = $request->date;
     // $newSeance->temps_fin = $request->temps_fin;
     // $newSeance->temps_debut = $request->temps_debut;
     // $newSeance->temps_debut = $request->formation_id;  
       $newSeance->save() ;
       return $newSeance ; 
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
        $existingSeance = Seance::findorfail($id);
        if ($existingSeance ) {
        $existingSeance->nom_seance=$request->seance["nom_seance"];
        $existingSeance->date=$request->seance["date"];
        $existingSeance->nom_seance=$request->seance["temps_fin"];
        $existingSeance->nom_seance=$request->seance["temps_debut"];
       // $existingSeance->formation_id=$request->seance["formation_id"];
       // $existingSeance->nom_seance=$request->nom_seance;
       // $existingSeance->date=$request->date;
       // $existingSeance->nom_seance=$request->temps_fin;
       // $existingSeance->nom_seance=$request->temps_debut;
       // $existingSeance->save();
        return $existingSeance ;
        }
       else{ return "Seance non trouvé";}
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $existingSeance = Seance::findorfail($id);
        if ($existingSeance ) {
            $existingSeance->delete();
            return "Seance supprimé" ;
        }
        else{
            return "Seance non trouvé" ;
        }

    }
}
