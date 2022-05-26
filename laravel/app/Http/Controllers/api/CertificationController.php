<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Certification;
use Illuminate\Http\Request;

class CertificationController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
  

    public function index(){
         return Certification::with('Formation','user')->get();
       // return response()->json(["redata"=>$certif],200);
    }
    public function destroy($id)
    {
        $certif=Certification::FindOrFail($id);
            $certif->delete();
            return response()->json('Certification supprime avec succes');  
    
        
    }
  

public function update(Request $request, $id)
    {
        $certif=Certification::FindOrFail($id);
        $certif->nom=$request->nom;
        $certif->score=$request->score;
        echo "test". $certif->nom;
        return response()->json('Certification modifie avec succes');  
    }

}
  /*  public function store(Request $request)
    {
        $certif=new Certification();
        $certif->user_id=$request->user_id;
        $certif->formation_id=$request->formation_id;
        $certif->save();
        return response()->json('Certification ajoute avec succes');  
    }
    public function show($id)
    {
        $certif=Certification::FindOrFail($id);
        return response()->json($certif);  
    }
*/



