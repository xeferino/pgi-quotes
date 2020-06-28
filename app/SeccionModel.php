<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SeccionModel extends Model
{
    protected $table = "secciones";

    protected $fillable = ["nombre_seccion", "tipo", "ruta"];
}
