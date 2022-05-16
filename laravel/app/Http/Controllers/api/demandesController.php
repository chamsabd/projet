<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Resources\demandeResource;
use App\Models\Demande;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
//use Illuminate\Support\Facades\Auth;


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
    // public function getDemande($id)
    // {
    //     $Demande = Demande::FindOrFail($id);
    //     return new demandeResource($Demande);
    // }

    public function getDemandeByFormation($form_id)
    {
        // $Demande = Demande::FindOrFail($id);
        // return new demandeResource($Demande);
        $data = DB::table("formations")
            ->join("demandes", "formations.id", "demandes.formation_id")
            ->where("formations.id", "=", $form_id)
            ->select("formations.titre", "demandes.*")
            ->get();
        return $data;
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
            $old = DB::table("demandes")
                ->where("demandes.formation_id", "=", $request->formation_id)
                ->where("demandes.user_id", "=", 9)
                ->get();
            if(count($old)>0){
                $response = [
                    "success"=> FALSE,
                    "message"=>"Déjà existe demande"
                ];
                return response()->json($response, 400);
            }
           
            $Demande=new Demande();
                $Demande->date_demande=$request ->date_demande;
                $Demande->formation_id=$request->formation_id;
                $Demande->user_id=9;
               
            // if($Demande->save()){
            //     return response()->json($Demande, 200);
            // } 
            // else{
            //     return response()->json([], 400);
            // }
          //  $Demande=Demande::create([
               // "utilisateur_id"=>Auth::utilisateur()->id(),
           // ]);
           return $Demande; 
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
            return response()->json('demande deleted succefuly');  
    }
     private function validationRules()
    {
        return [
            'date_demande'=>'date_format:Y-m-d|date_equals:now',
            'formation_id'=>'exists:users,id',
          //  'utilisateur_id'=>'required|exists:utilisateurs,id',
            ];
    }
}
