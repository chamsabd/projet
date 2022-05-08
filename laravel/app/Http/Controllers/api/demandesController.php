<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Resources\demandeResource;
use App\Models\Demande;

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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

            $Demande=Demande::create([
                
                "date_demande"=>$request ->date_demande,
                "formation_id"=>$request ->formation_id,
                "utilisateur_id"=>$request ->utilisateur_id
               // "utilisateur_id"=>Auth::utilisateur()->id(),
            ]);
            if($Demande->save()){
    
                return response()->json($Demande, 200);
    
            } else{
                return response()->json([], 400);

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
    // private function validationRules()
    // {
    //     return [
    //         'date_demande'=>'required',
    //         ];
    // }
}
