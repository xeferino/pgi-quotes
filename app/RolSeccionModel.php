<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RolSeccionModel extends Model
{
    protected $table = "secciones_rol";

    protected $fillable = ["rol_id", "seccion_id"];
}
