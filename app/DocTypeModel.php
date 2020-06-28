<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DocTypeModel extends Model
{
    protected $table = "tipos_documento";

    protected $fillable = ['name'];
}
