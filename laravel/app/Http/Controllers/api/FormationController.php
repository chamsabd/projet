<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Mail\mail as MailMail;
use App\Models\Formation;
use App\Models\User;

use App\Models\Formateurex;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;
use PhpParser\Node\Stmt\TryCatch;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

use Illuminate\Mail\Mailable;

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

   public function participantindex()
    {
        $formations=Formation::with('responsable','formateur','formateurexterne')->get();
         $formations_dem=User::find(9)->demandes; //Auth::id()
        
foreach ($formations as $key => $formation) {
    $formation->send=true;
    $formation->accepted=false;
    foreach ($formations_dem as $key => $formation_dem) {
      if ($formation->id==$formation_dem->id) {
        $formation->send=false;
        $formation->accepted=$formation_dem->pivot->accepted;
        break;
              }
     
     
     
    }
   
}
        return $formations;
    }
        /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function responsableindex()
    {
       // return Formation::with('responsable','formateur','formateurexterne')->where('responsable_id', Auth::id())->get();

       return Formation::with('responsable','formateur','formateurexterne')->where('responsable_id',9)->get();

    }
  
       /**s
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function formateurindex()
    {

        return Formation::with('responsable','formateur','formateurexterne')->where('formateur_id',9)->get();
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    { 
      
       
       // return $request;
         $request->validate($this->validationRules());
        $formation=new Formation();
        $formation->titre=$request->titre;
        $formation->date_debut=$request->date_debut;
        $formation->date_fin=$request->date_fin;
        $formation->etat=$request->etat;
        if ($request->description) {
      $formation->description=$request->description;
        }
       $formation->responsable_id=$request->responsable_id;
        $formation->nbr_place=$request->nbr_place;
        $formation->prix=$request->prix;
        $formation->save();  
   return $formation;
     
     
      
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
        $request->validate($this->validationRules());
        $formation=Formation::findorfail($id);
        if($formation){
            $formation->titre=$request->titre;
            $formation->date_debut=$request->date_debut;
            $formation->date_fin=$request->date_fin;
           
            if ($request->description) {
          $formation->description=$request->description;
            }
           $formation->responsable_id=$request->responsable_id;
            $formation->nbr_place=$request->nbr_place;
            $formation->prix=$request->prix;
            $formation->etat=$request->etat; 
        $formation->update();
        return $formation;}
        return 'data not found';

    }
    public function updateFormateur(Request $request, $id )
    {
       // $User=User::where('id','=',$id)->first();
       // $Formateurex=Formateurex::where('nom','=',$nom)->first();
       // dd($utilisateur->id);

        $formation=Formation::find($id);
        if($formation){
        $formation->formateur_id=$request->id;
       // $formation->formateurexterne_id=$Formateurex->id;
        $formation->save();
        return response()->json([
            'message' => 'Update Success',
            'id' => $formation->id,
            'attributes' => $formation
        ], 201);
    } else {
        return response()->json([
            "formateur non trouvée"
        ], 404);
    }
        /*Formation::where('id', $id)->update({
            'formateur' => $request->formateur,
        })*/


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
    public function test()
    {
       $details=[
           'title'=>'mail from iset',
           'body' =>'test est'
       ];
       Mail::to("isetbizerteformation@gmail.com")->send(new testMail($details));
   
        }
        
    
    private function validationRules()
    {    
        return [
            'titre' => 'required|min:5|max:15',
            'nbr_place' => 'required|integer|between:10,30',
              'description'=>'max:100',
              'responsable_id' => 'required|exists:Users,id',
              'date_debut' => 'required|date_format:Y-m-d|before_or_equal:date_fin',
              'date_fin' => 'required|date_format:Y-m-d|after_or_equal:date_debut',
              'prix'=>'min:0',
              'etat'=>'required'
        ];
    }
}
