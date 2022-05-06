<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Resources\demandeResource;
use App\Models\Demande;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class demandesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Demande =Demande::all();
        return demandeResource::collection($Demande);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($formation_id)
    {
        $formation = DB::table('formations')
        
        // ->join('formations', 'formations.id', '=', 'demandes.formations_id')
        // ->join('utilisateurs', 'utilisateurs.id', '=', 'demandes.utilisateurs_id')
        // ->select('formations.*','formations.id as form_id','utilisateurs.*','utilisateurs.id as utili_id','demandes.*')
        ->where('id',$formation_id)
        //->get('demandes.*')->first()->id;
        ->get()->first();
        $Demande=Demande::create([
            
            "date_demande"=>new DateTime('now'),
            "formation_id"=>$formation->id,
            "utilisateur_id"=>Auth::utilisateur()->id(),
        ]);
        if($Demande->save()){

            return response()->json($Demande);

     } 
    // $validateData = $request->validate($this->validationRules());
    // Demande::create($validateData);
    // return response()->json('votre demande à été ajouter avec succès!');
   // return redirect()->route('')->with('Createdemande' , 'votre demande à été ajouter avec succès!');
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
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    $Demande = Demande::FindOrFail($id);
            $Demande->delete();
          //  dd($Demande);
            return response()->json('deleted');
            // $Demande = Demande::find($id);
            // $Demande->delete();
   
            // return response()->json('Product successfully deleted!');
    }
    // private function validationRules()
    // {
    //     return [
    //         'date_demande'=>'required',
    //         ];
    // }
}
