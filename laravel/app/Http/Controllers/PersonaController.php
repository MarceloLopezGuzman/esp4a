<?php

namespace App\Http\Controllers;

use App\Persona;
use Illuminate\Http\Request;

class PersonaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getPersona()
    {
        $persona = Persona::all();

        return view('persona.persona',compact('persona'));

        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function formCrear()
    {
        $persona=[];
        return view('persona.crear');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function guardar(Request $request)
    {
        $persona = new Persona();

        $persona->nombre= $request->nombre;
        $persona->apellido_p =$request->apellido_p;
        $persona->apellido_m =$request->apellido_m;
        $persona->correo =$request->correo;
        $persona->telefono =$request->telefono;
        $persona->genero =$request->genero;
    
        $persona->save();
        $persona = persona::all();
        return view('persona.persona',compact('persona'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\persona  $persona
     * @return \Illuminate\Http\Response
     */
    public function show(persona $persona)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\persona  $persona
     * @return \Illuminate\Http\Response
     */
    public function getFormEdit($id) /*persona $persona */
    {
        $persona = Persona::find($id);
        return view('persona.editar',compact('persona'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\persona  $persona
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) /*Request $request, persona $persona */
    {
        $persona = Persona::find($id);

        $persona->nombre= $request->nombre;
        $persona->apellido_p =$request->apellido_p;
        $persona->apellido_m =$request->apellido_m;
        $persona->correo =$request->correo;
        $persona->telefono =$request->telefono;
        $persona->genero =$request->genero;
    
        $persona->update(); 
        return redirect('persona');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\persona  $persona
     * @return \Illuminate\Http\Response
     */
    public function eliminar($id) /*persona $persona */
    {
        $persona = Persona::find($id);
        $persona->delete();
    
        return redirect('persona');
    } 

    /**Esta es la que conecta con Angular */
    public function index(){
        return persona::all();
    }
    
}
