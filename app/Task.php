<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    //
    function category(){
        return $this->belongsTo('App\TaskCategory');
    }
}
