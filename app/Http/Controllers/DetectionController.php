<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Detection;

class DetectionController extends Controller
{
    public function index()
    {
        $detections = Detection::all();
        return view('detection.index', compact('detections'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'camera_id' => 'required|string',
            'plate_number' => 'required|string',
        ]);
        
        $detection = Detection::create([
            'camera_id' => $request->camera_id,
            'plate_number' => $request->plate_number,
            'image' => $request->image,
        ]);
    }
}
