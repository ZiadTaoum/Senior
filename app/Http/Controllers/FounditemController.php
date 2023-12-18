<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Image;
use App\Models\Address;
use App\Models\Category;
use App\Models\FoundItem;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class founditemController extends Controller
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

        return view('founditem.create', compact('addresses', 'categories','users'));
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
        ]);

        // dd($request->all()); 

        // $image = Image::create([
        //     'image_url' => $request->file('image')->store('images')
        // ]);
        
        // Store the image in the 'images' table
        $image = new Image;
        $path = $request->file('image')->store('public/found-items');
        $path = str_replace('public/', '', $path);
        $image->image_url = $path;
        
        $image->save();
        // Create a new FoundItem record
        $foundItem = new FoundItem;
        $foundItem->item_name = $request->input('item_name');
        $foundItem->address_id = $request->input('address_id');
        $foundItem->category_id = $request->input('category_id');
        $foundItem->user_id = $request->input('user_id');
        $foundItem->status = $request->input('status');
        $foundItem->image_id = $image->id; // Set the image_id foreign key
        $foundItem->save();

        //TODO create description
        // FounditemDescriptionController::store();

        // Redirect to the create page with a success message
        return redirect()->route('founditem.create')->with('success', 'Found item reported successfully!');
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
