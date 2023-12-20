<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LostItemDescription;

class LostitemDescriptionController extends Controller
{
    public function create(Request $request)
    {
        return view('lostitemdescription.create')->with('lost_item_id', $request->get('lost_item_id'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'date_lost' => 'required|date',
            'color' => 'required|string|max:255',
            'model' => 'required|string|max:255',
            'lost_item_id' => 'required|exists:lost_items,id',
        ]);

        $lostitemDescription = new LostItemDescription;
        $lostitemDescription->date_lost = $request->input('date_lost');
        $lostitemDescription->model = $request->input('model');
        $lostitemDescription->color = $request->input('color');
        $lostitemDescription->lost_item_id = $request->input('lost_item_id');
        $lostitemDescription->save();

        // Redirect to the create page with a success message
        return redirect()->route('report')->with('success', 'Lost item reported successfully!');
    }
}
