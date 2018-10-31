<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cobranza;
use DB;

class CobranzaController extends Controller
{
    
    public function mostrartodo(){
        
        $cobranza = DB::table('persona')->join('cobranza','cobranza.persona_id','persona.id')
        ->select('persona.nombre','cobranza.monto','cobranza.fecha','cobranza.estatus','cobranza.id')
        ->groupBy('cobranza.id','persona.nombre','cobranza.monto','cobranza.fecha','cobranza.estatus')
        ->orderBy('persona.nombre','cobranza.monto','cobranza.fecha','cobranza.estatus', 'DESC')
        ->get();
        return view('cobranza.cobranza', compact('cobranza'));
        }


public function formCrear(){
    $cobranza=[];
    return view('cobranza.crear');
}
public function guardar(Request $request){
    $cobranza = new Cobranza();
    $cobranza->persona_id= $request->persona_id;
    $cobranza->monto =$request->monto;
    $cobranza->fecha =$request->fecha;
    $cobranza->estatus =$request->estatus;

    /*$listName = DB::table('persona')->join('cobranza','cobranza.persona_id','persona.id')
    ->select('persona.nombre')->groupBy('persona.nombre')->get(); */

    $cobranza->save();
    $cobranza = cobranza::all();
    return view('cobranza.cobranza',compact('cobranza')); /*listName    ESTE IRIA DESPUES DE 'cobranza','listName'*/
    //return redirect
}

/*
public function eliminar($id){
    $cobranza = Cobranza::find($id);
    $cobranza->delete();
    return redirect('cobranza'); 
} */

public function getFormEdit($id){
    /*return view('cobranzas.crear');*/
    $cobranza = Cobranza::find($id);
    return view('cobranza.editar',compact('cobranza'));
}

public function update(Request $request, $id){
    $cobranza = Cobranza::find($id);
    $cobranza->persona_id= $request->persona_id;
    $cobranza->monto =$request->monto;
    $cobranza->fecha =$request->fecha;
    $cobranza->estatus =$request->estatus;
    $cobranza->update(); 
    return redirect('cobranza');
}

}
