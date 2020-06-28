<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\ModelPerson;

class PersonController extends Controller
{
    public function createPerson(){
    	return view('admin.people.create-person');
    }

    public function savePerson(Request $data){
    	ModelPerson::create([
            'fullnames' => $data->fullnames,
            'email'     => $data->email,
            'phone'     => $data->phone
        ]);

        return redirect('/dash/people/list');
    }

    public function listPerson(){
        $persons = ModelPerson::all();
    	return view('admin.people.list-persons', compact('persons'));
    }

    public function getPersonAjax($id){
        $person = ModelPerson::find($id);
        $person_find=NULL;

        if(!empty($person)){
            $person_find=$person;
        }else{
            $person_find=0;
        }

        return json_encode($person_find);
    }


    public function editPersonAjax(Request $request, $id){
        $person = ModelPerson::find($id);

        if(!empty($person)){
            $person->fullnames = $request->fullnames;
            $person->email = $request->email;
            $person->phone = $request->phone;        
            $person->save();
            return json_encode(1);
        }else{
            return json_encode(0);
        }
    }

    public function deletePersonAjax($id){
        $person = ModelPerson::find($id);
        if(!empty($person)){
            $delete = $person->delete();
            if($delete){
                return json_encode(1);
            }else{
                return json_encode(0);
            }
        }else{
            return json_encode(0);
        }
    }

}
