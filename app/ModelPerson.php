<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ModelPerson extends Model
{
    protected $table = "persons";

    protected $fillable = ["fullnames", "email", "phone"];
}
