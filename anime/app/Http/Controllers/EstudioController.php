<?php

namespace App\Http\Controllers;

use App\Models\Estudio;
use App\Models\Anime;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;

class EstudioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $estudios['estudios']=Estudio::paginate(3);

        return view('estudio.index',$estudios );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('estudio.create');
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
           'Fundador' =>'required|string|max:100',
           'Oficina' =>'required|string|max:100',
           'Website' =>'required|string|max:100',
           'Foto' =>'required|max:10000|mimes:jpeg,png,jpg'

        ];
        $mensaje=[
            'required'=>'El :attribute es requerido',
            'Foto.required'=>'La foto es requerida'
        ];

        $this->validate($request,$campos,$mensaje);



        //$datosEstudio = request()->all();
        $datosEstudio = request()->except('_token');

        if ($request->hasFile('Foto')) {
            $datosEstudio['Foto']=$request->file('Foto')->store('uploads','public');
        }

        Estudio::insert($datosEstudio);

        // return response()->json($datosEstudio);
        return redirect('estudio')->with('mensaje','Estudio agregado con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Estudio  $empleado
     * @return \Illuminate\Http\Response
     */
    public function show(Estudio $estudio)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Estudio  $empleado
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $estudio=Estudio::findOrFail($id);
        return view('estudio.edit',compact('estudio'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Estudio  $empleado
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {
        //
        $campos=[
            'Nombre'=>'required|string|max:100',
            'Fundador' =>'required|string|max:100',
           'Oficina' =>'required|string|max:100',
           'Website' =>'required|string|max:100'
            
        ];

        $mensaje=[
            'required'=>'El :attribute es requerido',           
        ];

        if($request->hasFile('Foto')){
            $campos=['Foto'=>'required|max:1000|mimes:jpeg,png,jpg'];
            $mensaje=['Foto.required'=>'La Foto es requerida']; 
        }

        $this->validate($request, $campos, $mensaje);


        $datosEstudio = request()->except(['_token','_method']);

        if($request->hasFile('Foto')){
            $estudio=Estudio::findOrFail($id);

            Storage::delete('public/'.$estudio->Foto);

            $datosEstudio['Foto']=$request->file('Foto')->store('uploads','public');
        }

        Estudio::where('id','=',$id)->update($datosEstudio);
        $estudio=Estudio::findOrFail($id);
        //return view('empleado.edit', compact('empleado') );

        return redirect('estudio')->with('mensaje','Estudio Modificado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Estudio  $empleado
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //

        $estudio=Estudio::findOrFail($id);
        if(Storage::delete('public/'.$estudio->Foto)){
           
            Estudio::destroy($id);

        }

      
        return redirect('estudio')->with('mensaje','Estudio Borrado');
        
    }
}
