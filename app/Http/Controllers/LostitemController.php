<?php

namespace App\Http\Controllers;
use App\Models\Address;
use App\Models\Category;
use App\Models\LostItem;
use App\Models\Image;
use App\Models\User;


use Illuminate\Http\Request;

class lostitemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $addresses = Address::all(); // Retrieve all addresses
        $categories  = Category::all();
        $users  = User::all();

        return view('lostItem.create', compact('addresses', 'categories','users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {


         $request->validate([
             'item_name' => 'required|string|max:255',
             'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
             'address_id' => 'required|exists:addresses,id',
            'category_id' => 'required|exists:categories,id',
             'user_id' => 'required|exists:users,id',
             'status' => 'required|string|max:255',
             'reward' => 'required|string|max:255',
            //'description' => 'required|nullable|exists:description,id',
            //'review_id' => 'sometimes|nullable|exists:review,id',

            
         ]);
        //   dd($request->all()); 
        
        // Store the image in the 'images' table
        $image = new Image;
        $image->image_url = $request->file('image')->store('images');
        $image->save();
        // Create a new lostItem record
        $lostItem = new LostItem;
        $lostItem->item_name = $request->input('item_name');
        $lostItem->address_id = $request->input('address_id');
        $lostItem->category_id = $request->input('category_id');
        $lostItem->user_id = $request->input('user_id');
        $lostItem->status = $request->input('status');
        $lostItem->reward_id = $request->input('reward_id');
        $lostItem->image_id = $image->id; // Set the image_id foreign key
        $lostItem->save();


        // Redirect to the create page with a success message
        return redirect()->route('lostitem.create')->with('success', 'Lost item reported successfully!');
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
