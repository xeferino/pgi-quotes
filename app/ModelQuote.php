<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ModelQuote extends Model
{
    protected $table = "quotes";

    protected $fillable = ["persons_id", "title", "description", "type", "date", "observation", "status"];
}
