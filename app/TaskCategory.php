<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TaskCategory extends Model
{
    //
    function tasks(){
        return $this->hasMany('App\Task','category_id');
    }
}
