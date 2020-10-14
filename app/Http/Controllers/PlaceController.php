<?php

namespace App\Http\Controllers;
use App\Place;
use Illuminate\Http\Request;

class PlaceController extends Controller
{
    public function index(){
        $places = Place::all();
        return view('place.top', ['places' => $places]);
    }

    // public function show(){

    //     return view('place.show', ['place' => $place]);
    // }
}
