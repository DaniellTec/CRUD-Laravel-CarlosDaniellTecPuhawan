<?php

namespace App\Http\Controllers;

use App\Models\Anime;
use App\Models\Estudio;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;

class AnimeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        //$datos['animes']=Anime::paginate(3);

        //return view('anime.index',$datos );

        $animes['animes']=Estudio::join("animes","estudios.id","=","animes.estudio_id")->get();
        $estudios['estudios']=Estudio::all();
        return view ('anime.index',$animes, $estudios);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $estudios=Estudio::all();
        return view('anime.create',compact('estudios'));
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
        
        $campos=[
           'Nombre' =>'required|string|max:100',
           'Genero' =>'required|string|max:100',
           'Episodios' =>'required|string|max:100',
           'Temporadas' =>'required|string|max:100',
  
           'Valoracion'=>'required|numeric|between:0,99.99',
           'Foto' =>'required|max:10000|mimes:jpeg,png,jpg',
           'estudio_id'=>'required|numeric|max:9999'
        ];
        $mensaje=[
            'required'=>'El :attribute es requerido',
            'Foto.required'=>'La foto es requerida'
        ];

        $this->validate($request,$campos,$mensaje);



        //$datosAnime = request()->all();
        $datosAnime = request()->except('_token');

        if ($request->hasFile('Foto')) {
            $datosAnime['Foto']=$request->file('Foto')->store('uploads','public');
        }

        Anime::insert($datosAnime);

        // return response()->json($datosAnime);
        return redirect('anime')->with('mensaje','Anime agregado con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Anime  $empleado
     * @return \Illuminate\Http\Response
     */
    public function show(Anime $anime)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Anime  $empleado
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $estudios['estudios']=Estudio::join("animes","estudios.id","=","animes.estudio_id")->get();
        //return response()->json($estudios);
        $anime=Anime::findOrFail($id);
        return view('anime.edit',compact('anime','estudios'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Anime  $empleado
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $campos=[
            'Nombre' =>'required|string|max:100',
           'Genero' =>'required|string|max:100',
           'Episodios' =>'required|string|max:100',
           'Temporadas' =>'required|string|max:100',
          
           'Valoracion'=>'required|numeric|between:0,99.99',
          'estudio_id'=>'required|numeric|max:9999'
            
        ];

        $mensaje=[
            'required'=>'El :attribute es requerido',           
        ];

        if($request->hasFile('Foto')){
            $campos=['Foto'=>'required|max:1000|mimes:jpeg,png,jpg'];
            $mensaje=['Foto.required'=>'La Foto es requerida']; 
        }

        $this->validate($request, $campos, $mensaje);


        $datosAnime = request()->except(['_token','_method']);

        if($request->hasFile('Foto')){
            $anime=Anime::findOrFail($id);

            Storage::delete('public/'.$anime->Foto);

            $datosAnime['Foto']=$request->file('Foto')->store('uploads','public');
        }

        Anime::where('id','=',$id)->update($datosAnime);
        $anime=Anime::findOrFail($id);
        //return view('empleado.edit', compact('empleado') );

        return redirect('anime')->with('mensaje','Anime Modificado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //

        $anime=Anime::findOrFail($id);

        if(Storage::delete('public/'.$anime->Foto)){
           
            Anime::destroy($id);

        }

        return redirect('anime')->with('mensaje','Anime Borrado');
        
    }
}
