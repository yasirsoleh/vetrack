<?php

namespace App\Http\Controllers;

use App\Models\Camera;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CameraController extends Controller
{
    public function index()
    {
        if (Auth::check()) {
            $cameras = Camera::all();
            return view('camera.index', compact('cameras'));
        }else{
            return redirect()->route('login');
        }
    }

    public function create()
    {
        if (Auth::check()) {
            return view('camera.create');
        }else{
            return redirect()->route('login');
        }
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'mqtt_topic' => 'required|unique:cameras|max:30',
            'traffic_direction' => 'required',
            'latitude' => 'required',
            'longitude' => 'required',
        ]);

        $camera = Camera::create([
            'name' => $request->name,
            'mqtt_topic' => $request->mqtt_topic,
            'traffic_direction' => $request->traffic_direction,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
        ]);

        return redirect()->route('camera.index');
    }
}
