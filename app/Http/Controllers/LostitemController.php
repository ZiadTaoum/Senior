<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Image;
use App\Models\Address;
use App\Models\Category;
use App\Models\LostItem;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        // $categories  = Category::all();
        // $users  = User::all();

        return view('founditem.create', compact('addresses'));
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
            'reward_description' => 'required|string|max:255',
        ]);
 
         // Store the image in the 'images' table
         $image = new Image;
         $path = $request->file('image')->store('public/lost-items');
         $path = str_replace('public/', '', $path);
         $image->image_url = $path;
         $image->save();
         
         // Create a new LostItem record
         $lostItem = new LostItem;
         $lostItem->item_name = $request->input('item_name');
         $lostItem->address_id = $request->input('address_id');
         $lostItem->category_id = $request->input('category_id');
         $lostItem->reward_description = $request->input('reward_description');
         $lostItem->user_id = Auth::id();
         $lostItem->status = 'lost';
         $lostItem->image_id = $image->id; // Set the image_id foreign key
         $lostItem->save();
 
         if ($request->input('submit_type') === 'second_form') {
             // Redirect to the route where the second form is displayed
             return redirect()->route('lostitemdescription.create', ['lost_item_id' => $lostItem->id]);
         }
         
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
