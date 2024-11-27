<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;

use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Events\ItemCreated;
use App\Events\NewItem;
use App\Models\ItemNotification;
use App\Notifications\NewItemNotification;
use App\Models\User;
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
        $data['items'] = Item::where('user_id', auth()->id())->orderByRaw("
        FIELD(status, 'approved', 'pending', 'rejected') ASC
    ")->get();;

        return view('user.item.index')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['pageTitle'] = "Add Items";
        $data['parentItemShowCalass'] = "Show";
        $data['parentAddItemActiveCalass'] = "Active";

        return view('user.item.create')->with($data);
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

        // Log::info('Item saved and event broadcast triggered.');

        // Notify admins
        $admins = User::where('role', 'admin')->get();
        foreach ($admins as $admin) {
            $admin->notify(new NewItemNotification($item, $admin->id));
        }

        return redirect()->route('items.index')->with('success', CREATED_SUCCESSFULLY);
    }

    /**
     * Display the specified resource.
     */
    public function show(Item $item)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Item $item)
    {
        $data['pageTitle'] = "Edit Items";
        $data['parentItemShowCalass'] = "Show";
        $data['parentAllItemActiveCalass'] = "Active";
        $data['item'] = $item;

        return view('user.item.edit')->with($data);
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

        return redirect()->route('items.index')->with('success', UPDATED_SUCCESSFULLY);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Item $item)
    {
        $item->delete();
        return redirect()->route('items.index')->with('success', DELETED_SUCCESSFULLY);
    }

    //notifications
}
