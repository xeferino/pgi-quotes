<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SeccionModel;
use App\RolModel;
use App\RolSeccionModel;
use App\UserRolModel;

class RolController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
    }

    public function newRol(){
    	$secciones = SeccionModel::all();
    	return view('admin.user.create-rol', compact('secciones'));
    }

    public function saveRol(Request $request){
    	RolModel::create([
    		'nombre_rol'=>$request['nombre_rol']
    	]);

    	$rol_last = RolModel::all()->last();

    	$secciones = SeccionModel::all();

    	for($i=0; $i<=count($secciones); $i++){
    		$num = (string) $i+1;
    		if($request['seccion_'.$num]=="on"){

    			RolSeccionModel::create([
		    		'rol_id'=>$rol_last['id'],
		    		'seccion_id'=>$secciones[$i]->id
		    	]);
		    	

    		}
    	}

    	return redirect('/dash/rol/list');
    	
    }
    public function listRol(){
    	$roles = RolModel::all();
    	$secciones_rol = RolSeccionModel::all();
        $secciones = SeccionModel::all();
    	return view('admin.user.list-rol', compact('roles','secciones_rol','secciones'));
    }

    //ajax methods
    public function getRolAjax($id){
        $rol = RolModel::find($id);
        $rol_find=NULL;

        if(!empty($rol)){
            $rol_find=$rol;
        }else{
            $rol_find=0;
        }

        return json_encode($rol_find);
    }

    public function getSeccionesRolAjax($id){
        $secciones_rol = RolSeccionModel::where('rol_id','=',$id)->get();
        $secciones = SeccionModel::all();
        $secciones_array = [];
        $i=0;

        foreach ($secciones as $seccion) {
            foreach ($secciones_rol as $seccion_rol) {
                if($seccion_rol->seccion_id==$seccion->id){
                    $secciones_array[$i]=$seccion;
                    $i=$i+1;
                }
            }
        }
        
        return json_encode($secciones_array);
        
        
    }

    public function editRolAjax($id, Request $request){
        $rol_secciones = RolSeccionModel::where('rol_id','=',$id)->get();

        foreach ($rol_secciones as $rol_seccion) {
            $rol_seccion->delete();
        }

        $rol = RolModel::find($id);
        $rol->nombre_rol = $request->nombreRol;
        $rol->save();

        foreach ($request->dataSecciones as $seccion) {
            RolSeccionModel::create([
                'rol_id'=>$id,
                'seccion_id'=>$seccion['id']
            ]);
        }

        return json_encode(1);
    }

    public function getCountRolUserAjax($id){
        $role_users = UserRolModel::where('rol_id','=',$id)->get();
        return json_encode(count($role_users));
    }

    public function deleteRolAjax($id){
        $rol = RolModel::find($id);

        if(!empty($rol)){
            $user_roles = UserRolModel::where('rol_id','=', $id)->get();
            $rol_secciones = RolSeccionModel::where('rol_id','=',$id)->get();

            foreach ($user_roles as $user_rol) {
                $user_rol->delete();
            }

            foreach ($rol_secciones as $rol_seccion) {
                $rol_seccion->delete();
            }

            $rol->delete();
            return json_encode(1);
            
        }else{
            return json_encode(0);
        }
    }
}
