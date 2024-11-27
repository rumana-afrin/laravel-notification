<?php

namespace App\Http\Controllers\Api\User;

use App\Http\Controllers\Controller;
use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PHPOpenSourceSaver\JWTAuth\Facades\JWTAuth;
use App\Events\ItemCreated;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
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

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
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
        broadcast(new ItemCreated($item));
        return response()->json([
            'status' => 'success',
            'items' => $item,
        ]);

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $item = Item::findOrFail($id);

        return response()->json([
            'item' => $item,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
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

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $item = Item::findOrFail($id);
        $item->delete();
        return response()->json([
           'status' => 'success',
        ]);

    }

  
}
