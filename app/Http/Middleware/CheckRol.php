<?php

namespace App\Http\Middleware;

use Closure;
use App\UserRolModel;
use App\RolModel;
use App\RolSeccionModel;
use App\SeccionModel;

class CheckRol
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

        if($request->user()->id!=1){
            $user_rol = UserRolModel::where('user_id','=', $request->user()->id)->first();
            $rol = RolModel::where('id','=',$user_rol->rol_id)->first();
            $roles_seccion = RolSeccionModel::where('rol_id','=',$rol->id)->get();
            $secciones = SeccionModel::all();
            $secciones_ruta = [];
            $i=0;

            foreach ($roles_seccion as $rol_seccion) {
                foreach ($secciones as $seccion) {
                    if($seccion->id==$rol_seccion->seccion_id){
                        $secciones_ruta[$i] = $seccion->ruta;
                        $i=$i+1;
                    }
                }
            }

            $ban=0;
            for ($j=0; $j < count($secciones_ruta); $j++) { 
                if($secciones_ruta[$j]=="/".$request->path()){
                    $ban=$ban+1;
                }else{
                    $ban=$ban+0;
                }
            }

            if($ban==0){
                return abort(403,'No tienes Acceso a esta Sección.');
            }
            
        }


        return $next($request);
        

        

        
    }
}
