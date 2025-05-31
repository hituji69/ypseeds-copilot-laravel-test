<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Property;
use App\Helpers\Common;

class ListController extends Controller
{
    public function show($area)
    {
        $properties = Property::where('area', $area)->get();
        
        return view('property.list', compact('properties', 'area'));
    }
}
