<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\RolModel;
use App\UserRolModel;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    

    public function index(){
    	return view('admin.index');
    }

    public function newUser(){
    	return view('admin.user.create-user');
    }

    public function saveUser(Request $data){
    	User::create([
            'name' => $data['name'] ,
            'username' => $data['username'] ,
            'email' => $data['email'] ,
            'password' => bcrypt($data['password']) 
        ]);

        return redirect('/dash/user/list');
    }

    public function listUser(){
    	$users = User::all();
        $roles = RolModel::all();
        $users_rol = UserRolModel::all();
    	return view('admin.user.list-user', compact('users','roles','users_rol'));
    }

    //methods ajax
    public function toAssignRolUserAjax(Request $request, $id){
        UserRolModel::create([
            'user_id'=>$id,
            'rol_id'=>$request['idRol']
        ]);

        return json_encode(1);
    }

    public function getRolUserAjax($id){
        $user = User::find($id);
        $user_rol_array = NULL;

        if(!empty($user)){
            $user_rol = UserRolModel::where('user_id','=',$id)->first();
            if($user_rol){
                $rol = RolModel::where('id','=',$user_rol->rol_id)->first();
                if($rol){
                    $user_rol_array = [$user, $rol];
                }else{
                    $user_rol_array = 0;
                }
            }else{
                $user_rol_array = 0;
            }
        }else{
            $user_rol_array = 0;
        }
        
        return json_encode($user_rol_array);
    }

    public function updateRolUserAjax(Request $request, $id){
        $user_rol = UserRolModel::where('user_id','=',$id)->first();
        $user_rol->rol_id = $request->idRol;
        $user_rol->save();
        return json_encode(1);
    }

    public function getUserAjax($id){
        $user = User::find($id);
        $user_find=NULL;

        if(!empty($user)){
            $user_find=$user;
        }else{
            $user_find=0;
        }

        return json_encode($user_find);
    }

    public function editUserAjax(Request $request, $id){
        $user = User::find($id);

        if(!empty($user)){
            $user->name = $request->name;
            $user->username = $request->username;
            $user->email = $request->email;
            if($request->pass!=""){
                $user->password = bcrypt($request->pass);
            }
            
            $user->save();
            return json_encode(1);
        }else{
            return json_encode(0);
        }
    }

    public function deleteUserAjax($id){
        $user = User::find($id);

        if(!empty($user)){
            $user_rol = UserRolModel::where('user_id','=', $id)->first();
            if(!empty($user_rol)){
                $user_rol->delete();
                $user->delete();
                return json_encode(1);
            }else{
                $user->delete();
                return json_encode(1);
            }
        }else{
            return json_encode(0);
        }
    }

    
}
