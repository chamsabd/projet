<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Formateurex;
use Illuminate\Http\Request;

class FormateurexController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Formateurex::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        //$request->validate($this->validationRules());

        $newformateurex=new Formateurex();
        $newformateurex->ncin=$request->formateurex["ncin"];
        $newformateurex->email=$request->formateurex["email"];
        $newformateurex->nom=$request->formateurex["nom"];
        $newformateurex->prenom=$request->formateurex["prenom"]; 
        $newformateurex->specialite=$request->formateurex["specialite"];

        $newformateurex->save();  
     return $newformateurex;
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
       // $request->validate($this->validationRules());
        $existingformateurex=Formateurex::find($id);
        if($existingformateurex){
        $request->validate($this->validationRules());
        $existingformateurex->ncin=$request->ncin;
        $existingformateurex->email=$request->email;
        $existingformateurex->nom=$request->nom;
        $existingformateurex->prenom=$request->prenom;
        $existingformateurex->specialite=$request->specialite;
        $existingformateurex->save();
        return $existingformateurex;

        }
        return "formateur not found";

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $existingformateurex = Formateurex::find($id);

        if($existingformateurex){
            $existingformateurex->delete();
            return "Formateurex successfully deleted.";
           // return $this->refresh() ;
        }

        return "Formateurex not found.";

    }

    private function validationRules()
    {    
        return [
            'ncin' => 'required|integer|between:0,10',
           // 'email' => 'required|email',
            'nom' => 'required|min:5|max:15',
            'prenom' => 'required|min:5|max:15',
            'specialite' => 'required|min:5|max:15',
            
        ];
    }


}
