<?php

namespace App\Http\Controllers;

use App\Models\FoundItem;
use Illuminate\Http\Request;
use App\Models\FoundItemDescription;

class FounditemDescriptionController extends Controller
{
    public function create()
    {
        // You can retrieve any necessary data for the form here
        $foundItems = FoundItem::all();

        return view('founditemdescription.create', compact('foundItems'));
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
        $foundItemDescription = FoundItemDescription::create([
            'category' => $request->input('category'),
            'dateFound' => $request->input('dateFound'),
            'Color' => $request->input('Color'),
            'Model' => $request->input('Model'),
            'found_item_id' => $request->input('found_item_id'),
        ]);

        // Redirect to the create page with a success message
        return redirect()->route('founditemdescription.create')->with('success', 'Found item description reported successfully!');
    }

}

