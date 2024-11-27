<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Events\ItemCreated;
use Illuminate\Support\Facades\Log;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['pageTitle'] = "All Items";
        $data['parentItemShowCalass'] = "Show";
        $data['parentAllItemActiveCalass'] = "Active";
        $data['items'] = Item::orderByRaw("
        FIELD(status, 'pending','approved','rejected') ASC
    ")->get();

        return view('admin.item.index')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['pageTitle'] = "Add Items";
        $data['parentItemShowCalass'] = "Show";
        $data['parentAddItemActiveCalass'] = "Active";

        return view('admin.item.create')->with($data);
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
        return redirect()->route('web/admin.items.index')->with('success', CREATED_SUCCESSFULLY);
    }

    /**
     * Display the specified resource.
     */
    public function show(Item $item) {}

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Item $item)
    {
        $data['pageTitle'] = "Edit Items";
        $data['parentItemShowCalass'] = "Show";
        $data['parentAllItemActiveCalass'] = "Active";
        $data['item'] = $item;

        return view('admin.item.edit')->with($data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Item $item)
    {
        $request->validate([
            'title' => 'required|string',
            'description' => 'required',
        ]);

        $item->title = $request->title;
        $item->description = $request->description;
        $item->status = "pending";
        $item->user_id = Auth::user()->id;


        $item->update();

        return redirect()->route('web/admin.items.index')->with('success', UPDATED_SUCCESSFULLY);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Item $item)
    {
        $item->delete();
        return redirect()->route('web/admin.items.index')->with('success', DELETED_SUCCESSFULLY);
    }

    public function updateItemStatus(Request $request, $id)
    {
        // dd($request->all());
        $item = Item::find($id);

        if ($item && $item->status === 'pending') {
            if ($request->input('action') === 'approve') {
                $item->status = 'approved';
            } elseif ($request->input('action') === 'reject') {
                $item->status = 'rejected';
            }

            $item->save();
            return redirect()->route('web/admin.items.index')->with('success', 'Item status updated successfully.');
        } else {
            return redirect()->back()->with('error', 'Item not found or already processed.');
        }
    }

    public function showItem($id)
    {
        $data['pageTitle'] = "All Items";
        $data['parentItemShowCalass'] = "Show";
        $data['parentAllItemActiveCalass'] = "Active";
        $data['item'] = Item::findOrFail($id);
        return view('admin.item.show')->with($data);
    }
}
