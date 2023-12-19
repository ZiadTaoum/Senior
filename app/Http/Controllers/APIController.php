<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\Category;
use Illuminate\Http\Request;

class APIController extends Controller
{
    public function getCategories(){
        return response()->json([
            'status' => 200,
            'categories' => Category::all() //Category::orderBy('id', 'DESC')->limit(5)->get()
        ], 200);
    }

    public function getAddresses(){
        return response()->json([
            'status' => 200,
            'addresses' => Address::all()
        ], 200);
    }

    // public function searchCategory(Request $request, $cat){
    //     $found = Category::where('category_name', 'LIKE', '%'.$cat.'%')->get();

    //     // "SELECT * FROM categories WHERE category_name LIKE '%cat%'"

    //     return response()->json([
    //         'status' => 200,
    //         'categories' => $found
    //     ], 200);
    // }
}
