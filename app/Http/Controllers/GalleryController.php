<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Image;
use App\Models\LostItemDescription;
class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    // public function index()
    // {
    //     $images = Image::with('lostItemDescription')->get();
    //     // $images = Image::all();
    //     return view('gallery', ['images' => $images]);
    // }

    public function index()
    {
        // Retrieve all images
        $images = Image::all();

        // Fetch the associated descriptions for each image
        $imageDescriptions = [];
        foreach ($images as $image) {
            $description = LostItemDescription::where('lost_item_id', $image->id)->first();
            $imageDescriptions[$image->id] = $description;
        }

        return view('gallery', ['images' => $images, 'imageDescriptions' => $imageDescriptions]);
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
        //
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
    