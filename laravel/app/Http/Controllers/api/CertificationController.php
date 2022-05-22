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

}
