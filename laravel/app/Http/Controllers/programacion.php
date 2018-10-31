<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Programacion;

class ProgramacionController extends Controller
{
    public function getProgramacion(){
            $programacion= Programacion::all();
            //return view('programacion.programacion',['nombre'=>'Enrique']);
            //return view('programacion.programacion',['programacion'=>$programacion,'nombre'=>'Enrique']);
            //var_dump($programacion);
            return view('programacion.programacion',compact('programacion'));
    }

    public function formCrear(){
        $programacion=[];
        return view('programacion.crear');
    }
    public function guardar(Request $request){
        $programacion = new Programacion();
        $programacion->lenguaje =$request->lenguaje;
        $programacion->descripcion =$request->descripcion;
        $programacion->imagen =$request->imagen;
        $programacion->url =$request->url;
        $programacion->autor =$request->autor;

        $programacion->save();
        $programacion = programacion::all();
        return view('programacion.programacion',compact('programacion'));
        //return redirect
    }

    /*Metodo eliminar con parametro {id} */
    public function eliminar($id){
        $programacion = Programacion::find($id);
        $programacion->delete();

        /*$programacion = Programacion::all();*/
        return redirect('programacion');
    }

    public function getFormEdit($id){
        /*return view('programacion.crear');*/
        $programacion = Programacion::find($id);
        return view('programacion.editar',compact('programacion'));
    }

    public function update(Request $request, $id){
        
        $programacion = Programacion::find($id);

        $programacion->lenguaje =$request->lenguaje;
        $programacion->descripcion =$request->descripcion;
        $programacion->imagen =$request->imagen;
        $programacion->url =$request->url;
        $programacion->autor =$request->autor;

        $programacion->update(); 

        return redirect('programacion');
    }
}
