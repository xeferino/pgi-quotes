<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DocumentModel extends Model
{
    protected $table = "documentos";

    protected $fillable = [ 'nro_doc', 'destinatario', 'tipo_id', 'asunto', 'referencia', 'user_id', 'nombre_documento', 'slug', 'contenido_documento','state'];
}
