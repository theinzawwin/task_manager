<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InputTestController extends Controller
{
    //
    public function checkInput(Request $request){
        $method = $request->method();
        $foods= $request->input('foods');
        foreach($foods as $f){
            echo 'Food Name'.$f;
        }
        //echo 'Method '.$method;
        if ($request->isMethod('post')) {
            //
        }
        //return $request->input('name').'Age is '.$request->input('age').'Gender '.$request->input('gender').' Foods'.$foods;
        return response()->json($foods);
    }
}
