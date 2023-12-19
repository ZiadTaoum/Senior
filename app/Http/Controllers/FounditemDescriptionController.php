<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\FoundItem;
use Illuminate\Http\Request;
use App\Models\FoundItemDescription;

class FounditemDescriptionController extends Controller
{
    public function create()
    {
        // You can retrieve any necessary data for the form here
        // $foundItems = FoundItem::all();

        // return view('founditemdescription.create', compact('foundItems'));
        // You can retrieve any necessary data for the form here
    $defaultCategory = Category::first(); // Adjust this based on your logic
    $foundItems = FoundItem::all(); // Assuming you need this data as well

    return view('founditemdescription.create', compact('defaultCategory', 'foundItems'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         $request->validate([
            'category' => 'required|string|max:255',
            'dateFound' => 'required|date',
            'Color' => 'required|string|max:255',
            'Model' => 'required|string|max:255',
            'found_item_id' => 'required|exists:found_items,id',
         ]);
         //dd($request->all()); 

        // Create a new FoundItemDescription record
        // $founditemDescription = FounditemDescription::create([
        //     'category' => $request->input('category'),
        //     'dateFound' => $request->input('dateFound'),
        //     'Color' => $request->input('Color'),
        //     'Model' => $request->input('Model'),
        //     'found_item_id' => $request->input('found_item_id'),
        // ]);

        $founditemDescription = new FounditemDescription;
        $founditemDescription->category = $request->input('category');
        $founditemDescription->dateFound = $request->input('dateFound');
        $founditemDescription->Model = $request->input('Model');
        $founditemDescription->Color = $request->input('Color');
        $founditemDescription->found_item_id = $request->input('found_item_id');
        $founditemDescription->save();

        // Redirect to the create page with a success message
        return redirect()->route('report')->with('success', 'Found item reported successfully!');
    }

}

