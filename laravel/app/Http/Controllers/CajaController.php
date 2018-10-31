<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cobranza;
use DB;

class CajaController extends Controller
{      

public function formCrear(){
    $caja=[];
    return view('caja.crear');
}
public function guardar(Request $request){
    $caja = new Cobranza();
    $caja->persona_id= $request->persona_id;
    $caja->monto =$request->monto;
    $caja->fecha =$request->fecha;
    $caja->estatus =$request->estatus;
    $caja->save();
    $caja = caja::all();
    return view('caja.caja',compact('caja'));
    //return redirect
}

/*Metodo eliminar con parametro {id} */
/*public function eliminar($id){
    $caja = Cobranza::find($id);
    $caja->delete();
    return redirect('caja');
} */

public function getFormEdit($id){
    $caja = Cobranza::find($id);
    return view('caja.editar',compact('caja'));
}

public function update(Request $request, $id){
    $caja = Cobranza::find($id);
    $caja->persona_id= $request->persona_id;
    $caja->monto =$request->monto;
    $caja->fecha =$request->fecha;
    $caja->estatus =$request->estatus;
    $caja->update(); 
    return redirect('persona');
}

    /*Este es el metodo para visualizar los nombres de las persona en la caja */
    public function getCajaShow($persona_Id){
        $caja = cobranza::where('persona_id', $persona_Id)->get();
        $abono = DB::table('cobranza')->where('estatus','1')->where('persona_id',$persona_Id)->sum('monto');
        $adeudo= DB::table('cobranza')->where('estatus','0')->where ('persona_id',$persona_Id)->sum('monto');
        $nombres = DB::table('persona')->join('cobranza','cobranza.persona_id','persona.id')
        ->select('persona.nombre')->where('persona_id',$persona_Id)->groupBy('persona.nombre')->get();
        return view('caja.caja', compact('caja','abono','adeudo','nombres'));
    }
}
