<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Detection;

class RouteController extends Controller
{
    public function index()
    {
        $detections = Detection::all();
        $detections = $detections->unique('plate_number');
        return view('route.index', compact('detections'));
    }

    public function show($plate_number)
    {
        $detections = Detection::where('plate_number', $plate_number)->get();
        //dd($detections);
        return view('route.show', compact('detections'));
    }
}
