<?php

namespace App\Http\Controllers;

use App\Models\Hospital;

class HospitalController extends Controller
{
    public function index()
{
    $search = request('search');

    $hospitals = Hospital::when($search,function($query) use($search){

        $query->where('name','like',"%$search%")
              ->orWhere('address','like',"%$search%");
    })->get();

    return view('hospitals',compact('hospitals'));
}
}