<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PHPOpenSourceSaver\JWTAuth\Facades\JWTAuth;
use App\Events\ItemCreated;

class ItemApiController extends Controller
{
    public function index()
    {
       $items = Item::where('user_id', auth()->id())->get();
        // $newToken = JWTAuth::refresh(JWTAuth::getToken());

        return response()->json([
            'status' => 'success',
            'items' => $items,
            // 'token' => $newToken,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string',
            'description' => 'required',
        ]);

        //    dd( $request->subcategories);

        $item = new Item();
        $item->title = $request->title;
        $item->description = $request->description;
        $item->status = "pending";
        $item->user_id = Auth::user()->id;

        // dd($item);
        $item->save();      
        return response()->json([
            'status' => 'success',
            'items' => $item,
        ]);

    }

    public function edit(string $id)
    {
        $item = Item::findOrFail($id);

        return response()->json([
            'item' => $item,
        ]);
    }
    public function update(Request $request, string $id)
    {
        $request->validate([
            'title' => 'required|string',
            'description' => 'required',
        ]);

        $item = Item::findOrFail($id);
        $item->title = $request->title;
        $item->description = $request->description;
        $item->status = "pending";
        $item->user_id = Auth::user()->id;


        $item->update();
        return response()->json([
            'status' => 'success',
            'items' => $item,
        ]);

    }

    public function destroy(string $id)
    {
        $item = Item::findOrFail($id);
        $item->delete();
        return response()->json([
           'status' => 'success',
        ]);

    }

    public function updateItemStatus(Request $request, $id)
{
    // Retrieve the item by ID
    $item = Item::find($id);

    // Check if item exists and is in 'pending' status
    if ($item && $item->status === 'pending') {
        // Get 'action' value from request (should be 'approve' or 'reject')
        $action = $request->input('action');

        // Update status based on the action value
        if ($action === 'approve') {
            $item->status = 'approved';
        } elseif ($action === 'reject') {
            $item->status = 'rejected';
        } else {
            return response()->json([
                'status' => 'fail',
                'message' => 'Invalid action.'
            ], 400);
        }

        // Save the updated item
        $item->save();

        return response()->json([
            'status' => 'success',
            'message' => 'Item status updated successfully.'
        ]);
    } else {
        return response()->json([
            'status' => 'fail',
            'message' => 'Item not found or already processed.'
        ], 404);
    }
}


}
