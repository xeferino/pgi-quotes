<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RolModel extends Model
{
    protected $table = "roles";

    protected $fillable = ["nombre_rol"];
}
