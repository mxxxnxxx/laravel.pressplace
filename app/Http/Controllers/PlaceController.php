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

    public function show($id){
        $place = Place::find($id);
        return view('place.show', ['place' => $place]);
    }
}
