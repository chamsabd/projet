<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Resources\demandeResource;
use App\Models\Demande;
use App\Models\Formation;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Mail\mail as IsetMail;
use App\Models\Inscrit;
use Illuminate\Support\Facades\Mail;

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

        $formation=Formation::find($form_id);
       if($formation->responsable_id==9)
        return $formation->demandes()->get();
    else
    return response()->json("vous n'ete pas le responsable de cette formation");  
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
                $Demande->accepted=false;
                $Demande->save();
            // if($Demande->save()){
            //     return response()->json($Demande, 200);
            // } 
            // else{
            //     return response()->json([], 400);
            // }
          //  $Demande=Demande::create([
               // "utilisateur_id"=>Auth::utilisateur()->id(),
           // ]);
           return response()->json($Demande); 
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

    public function accepte( $id)
    {
        //ajouter inscrit
        //nplace-1

        $Demande = Demande::FindOrFail($id);
        if ($Demande) {
        $formation=Formation::FindOrFail($Demande->formation_id);
        if ( $formation->nbr_place>0) {
             $formation->nbr_place=$formation->nbr_place-1;
             $formation->update();
             $inscrit=new Inscrit();
          
              $inscrit->formation_id= $Demande->formation_id;
             $inscrit->user_id= $Demande->user_id;
             $Demande->accepted=true;
             $inscrit->save();
             $Demande->update();
              //  $Demande->delete();
                $details=[
                    'title'=>'demande accepter',
                    'body' =>"felicitation votre demmande au formation ".$formation->titre." a ete accepter aujourd'hui vous ete un participant "
                ];
                Mail::to("chamsabdelwahed42@gmail.com")->send(new IsetMail($details));//Auth::user()->email
           return response()->json('demande accepter'); 
        }
                 return response()->json("il n'ya plus de place ");
        }
        return response()->json("demande n'existe pas  ");
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function refuse($id)
    {
    $Demande = Demande::FindOrFail($id);
  
    if ($Demande) {  
        $formation=Formation::FindOrFail($Demande->formation_id);
        $Demande->delete();
            $details=[
                'title'=>'demande refuser',
                'body' =>'desoler votre demmande au formation '.$formation->titre.' a ete refusser '
            ];
            Mail::to("chamsabdelwahed42@gmail.com")->send(new IsetMail($details));//Auth::user()->email
     return response()->json('demande refuser');  
    }
    return response()->json("demande n'existe pas");    
          
    }
     private function validationRules()
    {
        return [
            'date_demande'=>'date_format:Y-m-d',
            'formation_id'=>'exists:formations,id',
          //  'utilisateur_id'=>'required|exists:utilisateurs,id',
            ];
    }
}
