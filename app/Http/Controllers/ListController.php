<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Property;

class ListController extends Controller
{
    public function show($area)
    {
        $properties = Property::where('area', $area)->get();
        
        return view('property.list', compact('properties', 'area'));
    }
}
