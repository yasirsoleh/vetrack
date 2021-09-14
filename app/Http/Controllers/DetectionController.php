<?php

namespace App\Http\Controllers;

use App\Models\Camera;
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

    public function store_from_mqtt($mqtt_topic, $data)
    {
        $camera = Camera::firstWhere('mqtt_topic', $mqtt_topic);
        $detection = Detection::create([
            'camera_id' => $camera->id,
            'plate_number' => $data->plate_number,
        ]);
    }
}
