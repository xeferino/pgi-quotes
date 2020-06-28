<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SeccionModel;
use App\RolSeccionModel;

class SeccionController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
    }
    
	public function newSeccion(){
    	return view('admin.user.create-seccion');
    }

    public function saveSeccion(Request $request){
    	SeccionModel::create([
    		'nombre_seccion'=>$request['nombre_seccion'],
    		'tipo'=>$request['tipo'],
    		'ruta'=>$request['ruta']
    	]);

    	return redirect('/dash/seccion/list');
    }
    public function listSeccion(){
    	$secciones = SeccionModel::all();
    	return view('admin.user.list-seccion', compact('secciones'));
    }

    //methods ajax
    public function getSeccionAjax($id){
        $seccion = SeccionModel::find($id);
        $seccion_find=NULL;

        if(!empty($seccion)){
            $seccion_find=$seccion;
        }else{
            $seccion_find=0;
        }

        return json_encode($seccion_find);
    }

    public function editSeccionAjax($id, Request $request){
        $seccion = SeccionModel::find($id);
        $seccion->nombre_seccion = $request->nombreSeccion;
        $seccion->tipo = $request->tipo;
        $seccion->ruta = $request->ruta;
        $seccion->save();
        return json_encode(1);
    }

    public function getCountRolSeccion($id){
        $rol_secciones = RolSeccionModel::where('seccion_id','=',$id)->get();
        return json_encode(count($rol_secciones));
    }

    public function deleteSeccionAjax($id){
        $rol_secciones = RolSeccionModel::where('seccion_id','=',$id)->get();

        foreach ($rol_secciones as $rol_seccion) {
            $rol_seccion->delete();
        }

        $seccion = SeccionModel::find($id);
        $seccion->delete();

        return json_encode(1);
    }
}
