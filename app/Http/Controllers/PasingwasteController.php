<?php

namespace App\Http\Controllers;

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



public function PasingData(Request $request)
{
    $validateData = Validator::make($request->all(), [
        'binnie_id' => 'required|numeric',
        'category_id' => 'required|numeric',
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
    if (!$category || !$binnie) {
        return response()->json([
            'status' => false,
            'message' => 'Category or Binnie not found.',
        ], 404);
    }

    // Create waste item
    $waste = WasteItem::create([
        'binnie_id' => $binnie->binnie_id,
        'category_id' => $category->category_id,
    ]);

    return response()->json([
        'status' => true,
        'message' => 'Created Successfully',
        'data' => $waste
    ], 201);
}

}
