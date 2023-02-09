<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Disaster;

class DisastersController extends Controller
{
    public function index() {
        try {
            //Query all dame levels
            $disaster = Disaster::get();

            //return json response
            return response()->json($disaster);
        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }

    public function show(Disaster $disaster){
        return view('disasters.show', compact('disaster'));
    }

    public function store(Request $request) {
        try {
            $disaster = new Disaster();
            $disaster->fill($request->all());
            $disaster->save();

            foreach ($request->damage_levels as $service_id => $level) {
                $damage_level = new DamageLevel();
                $damage_level->service_id = $service_id;
                $damage_level->level = $level;
                $disaster->damage_levels()->save($damage_level);
            }
        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }

    public function update(Request $request, Disaster $disaster){
        $disaster->fill($request->all());
        $disaster->save();

        foreach ($request->damage_levels as $service_id => $level) {
            $damage_level = $disaster->damage_levels()->where('service_id', $service_id)->first();
            if ($damage_level) {
                $damage_level->level = $level;
                $damage_level->save();
            } else {
                $damage_level = new DamageLevel();
                $damage_level->service_id = $service_id;
                $damage_level->level = $level;
                $disaster->damage_levels()->save($damage_level);
            }
        }
    }
}
