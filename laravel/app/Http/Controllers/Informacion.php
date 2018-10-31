<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Informacion;
use DB;

class InformacionController extends Controller  /*Los Controladores puede agrupar las peticiones HTTP relacionada con la manipulación lógica en una clase.*/
{
    public function getInformacion(){
        $informacion = Informacion::all();
        return $informacion;

    }


    public function getInformacionById($id){
        return Informacion::where('id',$id)->get();
    }

    public function update(){
        $informacion = Informacion::find(3);
        $informacion->descripcion = 'Nueva descripcion';
        $informacion->save();
        return $informacion;
    }

    public function create(){
        $informacion = new Informacion;  // este es una variable la cual se esta haciendo un Objeto
        $informacion->descripcion = 'mi primer insert';
        $informacion->autor = 'Marcelo';
        $informacion->save();
        }


    public function destroy($id){
        $informacion = Informacion::findOrFail($id);
        $informacion->delete();
        return redirect()->route('informacions.index');

    }

    /*
    Este es la que esta Bien
        public function delete($id){
        $informacion=Informacion::find($id);
        $informacion->delete();
    }
    */
}
