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
      return Seance::with('formation')->get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    { $request->validate([
        'formation_id' => 'exists:formations.id',
       // 'nom_seance' => 'required ',
       // 'date'=>'after:tomorrow'
     ]);
    $newSeance = new Seance() ;
   $newSeance->nom_seance = $request->seance["nom_seance"];
   $newSeance->date = $request->seance["date"];
   $newSeance->temps_fin = $request->seance["temps_fin"];
   $newSeance->temps_debut = $request->seance["temps_debut"];
   $newSeance->temps_debut = $request->seance["formation_id"];  
   $newSeance->save() ;
   if($newSeance){
    return $this->refresh();
}
  // return $newSeance ; 
 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $seance=Seance::find($id);
        return response()->json($seance);
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
          $seance=Seance::find($id);
          $seance->nom_seance =$request->seance["nom_seance"];
          $seance->date =$request->seance["date"];;
          $seance->temps_debut =$request->seance["temps_debut"];
          $seance->temps_fin =$request->seance["temps_fin"];
          $seance->save();
          if($seance){
               return $this->refresh();
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
        $existingSeance = Seance::findorfail($id);
        if ($existingSeance ) {
            $existingSeance->delete();
            return "Seance supprimé" ;
        }
        else{
            return "Seance non trouvé" ;
        }

    }

    private function validationRules()
    {
        return [
            'formation_id' => ['required|exists:formations,id'] ,
            'date'=>['required|date |after:now']    ,
          //  'nom_seance' => 'required'
          'nom_seance' => ['required']

            ];
    }

private function refresh(){
    $seance = Seance::orderBy('created_at','DESC');
    return response()->json($seance);
}

}


