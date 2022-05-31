<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Formation;
use App\Models\Resource;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;

class RessourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
        $request->validate($this->validationrules(),$this->validationurl());
      //  return file_get_contents($_FILES['url']['tmp_name']);
      $ressource=new Resource();
      if ($request->hasFile('url')) {
        $image = Storage::disk('public')->put('support', $request->file('url'));
        $ressource->url = $image;
    }
        $ressource->titre=$request->titre;
       // $ressource->url=file_get_contents($_FILES['url']['tmp_name']);
        $ressource->formation_id=$request->formation_id;
        $ressource->save();
       return $ressource;

    }
    public function url(Request $request)
    {
        
    return   $request->validate($this->validationurl());

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
     $formation=Formation::find($id);
    
return $formation->ressources()->get();
     
    }
    public function upload($id)
    {
     $ressourse=Resource::find($id);
     $extension = pathinfo(storage_path('public/'.$ressourse->url), PATHINFO_EXTENSION);
   
     $headers = array(

        'Content-Type: application/'.$extension,
      );
    return Storage::download('public/'.$ressourse->url,$ressourse->titre,$headers);
    // $ressourse=Storage::path($ressourse->path);
    
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
        //
    }
    private function validationrules()
    {    
        return [
            'titre' => 'required|min:5|max:15',
            'formation_id' => 'required|exists:Formations,id',
             
        ];
    }
    private function validationurl()
    {    
        return [
              'url'=>'file|max:20480'
        ];
    }
}
