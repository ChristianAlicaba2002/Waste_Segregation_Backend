<?php

namespace App\Http\Controllers;

use App\Models\Location;
use App\Models\TrashCollected;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
use App\Models\WasteItem;
use Illuminate\Http\Request;
class PasingwasteController extends Controller
{

public function getAllWasteItem()
{
    $allWasteItem = WasteItem::all();
    return response()->json([
        'status' => true,
        'data' => $allWasteItem
    ]);
}



public function PassingData(Request $request)
{
    $validateData = Validator::make($request->all(), [
        'binnie_id' => 'required|numeric',
        'category_id' => 'nullable|numeric',
        'weightRecorded' => 'nullable|numeric'
    ]);

    if ($validateData->fails()) {
        return response()->json([
            'status' => false,
            'message' => $validateData->errors()
        ], 422);
    }

    // Fetch category
    $category = DB::table('waste_category')->where('category_id', $request->category_id)->first();

    // Fetch binnie from different connection
    $binnie = DB::connection('mysql_waste_client')
                ->table('clients')
                ->where('binnie_id', $request->binnie_id)
                ->first();

    // If either category or binnie is not found
    if (!$binnie) {
        return response()->json([
            'status' => false,
            'message' => 'Binnie not found.',
        ], 404);
    }

    //If category_id and WeightRecorded are null
    if($request->category_id == null && $request->weightRecorded == null)
    {
           
        $waste_item = WasteItem::create([
            'binnie_id' => $request->binnie_id,
        ]);

        return response()->json([
            'status' => true,
            'message' => 'Binnie ID Successfully',
            'waste_item' =>  $waste_item
        ]);
        
    }

    //if WeightRecorded is null
    if($request->weightRecorded == null)
    {
    
        $waste_item = WasteItem::create([
            'binnie_id' => $binnie->binnie_id,
            'category_id' => $category->category_id,
        ]);

        return response()->json([
            'status' => true,
            'message' => 'Weight Recorded Successfully',
            'waste_item' =>  $waste_item
        ]);

    }

    //If Category ID is null
    if($request->category_id == null)
    {

        $trash_collected = TrashCollected::create([
            'trash_binnie_id' => $binnie->binnie_id,
            'weightRecorded' =>  $request->weightRecorded
        ]);

        $trash_location = Location::create([
            'binnie_id'=> $binnie->binnie_id,
            'location_name'=> $binnie->city
            
        ]); 
    
        return response()->json([
            'status' => true,
            'message' => 'Trash Collected Successfully',
            'trash_collected' => $trash_collected
        ]);

    }

}

}
