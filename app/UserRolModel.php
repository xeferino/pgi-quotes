<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserRolModel extends Model
{
    protected $table = "users_rol";

    protected $fillable = ['user_id', 'rol_id'];
}
