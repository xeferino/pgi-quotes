<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\EnvioDoc;

use App\DocTypeModel;
use App\DocumentModel;

class DocumentController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function crear(){
    	$tipos_doc = DocTypeModel::all();
    	return view('procesos.document.crear', compact('tipos_doc'));
    }

    public function listDocument(){
    	$documentos = DocumentModel::where('user_id','=',Auth::user()->id)->get();
    	$doctypes = DocTypeModel::all();
    	return view('procesos.document.list', compact('documentos','doctypes'));
    }

    public function editDocument($user, $slug){
        $documento = DocumentModel::where('slug','=',$slug)->first();
        $tipos_doc = DocTypeModel::all();
        return view('procesos.document.edit', compact('documento','tipos_doc'));
    }

    public function createTypeDoc(){
    	return view('admin.doc.create-type');
    }

    public function saveTypeDoc(Request $request){
    	DocTypeModel::create([
    		'name'=>$request->name
    	]);
    }

    //ajax methods
    public function saveDoc(Request $request){
    	DocumentModel::create([
            'tipo_id'=>$request->tipoDoc,
            'user_id'=>$request->userDoc,
    		'nombre_documento'=>$request->nameDoc,
    		'slug'=>$request->slug,
    		'contenido_documento'=>$request->contenido
    	]);
    	
    	return json_encode(1);
    }

    public function saveDataDoc(Request $request){

        DocumentModel::create([
            'nro_doc'=> $request->nroDoc,
            'destinatario'=> $request->destinatario,
            'tipo_id'=>$request->tDoc,
            'asunto'=> $request->asunto,
            'referencia'=> $request->referencia,
            'user_id'=>$request->userDoc,
            'nombre_documento'=>$request->nameDoc,
            'slug'=>$request->slug,
            'contenido_documento'=>$request->contenido,
            'state'=>0
        ]);

        $documento = DocumentModel::all()->last();

        return json_encode($documento);
    }

    public function saveDocAfter($id, Request $request){
        if($request->correo){
            $documento = DocumentModel::find($id);
            $documento->contenido_documento = $request->contenido;
            $documento->save();

            $documento_after_save = DocumentModel::find($id);

            Mail::to($request->correo)->send(new EnvioDoc($documento_after_save,"Mensaje de Notificación de Documento enviado desde Sistema PGI"));

            return json_encode(1);
        }else{
            $documento = DocumentModel::find($id);
            $documento->contenido_documento = $request->contenido;
            $documento->save();

            return json_encode(1);
        }

        return json_encode($request->correo);
        
    }

    public function saveDocEdit($id, Request $request){

        $documento = DocumentModel::find($id);
        $documento->tipo_id = $request->tipoDoc;
        $documento->user_id = $request->userDoc;
        $documento->nombre_documento = $request->nameDoc;
        $documento->slug = $request->url;
        $documento->contenido_documento = $request->contenido;
        $documento->save();
        
        return json_encode(1);
    }

    public function ajaxGetDoc($user){
        $documentos = DocumentModel::where('user_id','=',$user)->get();
        return json_encode($documentos);
    }

    public function ajaxGetDocId($id){
        $documento = DocumentModel::find($id);
        return json_encode($documento);
    }

    public function ajaxGetDocAll(){
        $documentos = DocumentModel::all();
        return json_encode($documentos);
    }
}
