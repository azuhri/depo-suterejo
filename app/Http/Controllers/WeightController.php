<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Weight;

class WeightController extends Controller
{
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'weight' => 'required|numeric',
        ]);

        $weight = Weight::first();
        if (!$weight) {
            $weight = new Weight();
            $weight->weight = $validatedData['weight'];
            $weight->save();
        } else {
            if($validatedData['weight'] > 0) {
                $weight->weight = $validatedData['weight'];
                $weight->update();
            }
        }
        return response()->json($weight, 201);
    }
}
