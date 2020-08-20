<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Flight;
class FlightsController extends Controller
{
    //
    public function save(){
        return view('flight.create');
    }

    public function store(Request $request){
        $flight = new Flight;

        $flight->name = $request->name;
        $flight->airline= $request->airline;
        $flight->save();
        echo'flight name'.$flight->name;
        return redirect('/flights');
    }

    public function index(){
        return view('flight.index');
    }
}
