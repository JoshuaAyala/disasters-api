<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DisasterType;

class DisasterTypeController extends Controller
{
    public function index() {
        try {
            //Query all dame levels
            $disaster_type = DisasterType::get();

            //return json response
            return response()->json($disaster_type);
        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }

    public function store(Request $request) {
        try {
            if(!$request->has('name')) {
                return response()->json(['error' => 'Name Required']);
            }

            $number = $request->input('number', 1);

            $data = $request->all();

            //Query all dame levels
            $disaster_type = DisasterType::create();

            //return json response
            return response()->json($disaster_type);
        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }
}
