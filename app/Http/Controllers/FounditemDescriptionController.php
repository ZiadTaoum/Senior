<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\FoundItem;
use Illuminate\Http\Request;
use App\Models\FoundItemDescription;

class FounditemDescriptionController extends Controller
{
    public function create(Request $request)
    {
        return view('founditemdescription.create')->with('found_item_id', $request->get('found_item_id'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'dateFound' => 'required|date',
            'Color' => 'required|string|max:255',
            'Model' => 'required|string|max:255',
            'found_item_id' => 'required|exists:found_items,id',
        ]);

        $founditemDescription = new FounditemDescription;
        $founditemDescription->dateFound = $request->input('dateFound');
        $founditemDescription->Model = $request->input('Model');
        $founditemDescription->Color = $request->input('Color');
        $founditemDescription->found_item_id = $request->input('found_item_id');
        $founditemDescription->save();

        // Redirect to the create page with a success message
        return redirect()->route('report')->with('success', 'Found item reported successfully!');
    }
}
