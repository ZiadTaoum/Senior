<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use App\Models\Admin;
use App\Models\Image;
use App\Models\LostItem;
use App\Models\FoundItem;

use Illuminate\Http\Request;
use Illuminate\Console\Command;
use App\Models\LostItemDescription;
use App\Models\FoundItemDescription;
use Illuminate\Support\Facades\Hash;




class AdminController extends Controller
{
   
    public function index()
    {
        // Retrieve all lost items
        $lostItems = LostItem::all();
        $lostItemDescriptions = $this->getDescriptions($lostItems);
    
        // Retrieve all found items
        $foundItems = FoundItem::all();
        $foundItemDescriptions = $this->getDescriptions($foundItems);
    
        return view('items.index', [
            'lostItems' => $lostItems,
            'lostItemDescriptions' => $lostItemDescriptions,
            'foundItems' => $foundItems,
            'foundItemDescriptions' => $foundItemDescriptions,
        ]);
    }
    
    private function getDescriptions($items)
    {
        $itemDescriptions = [];
        foreach ($items as $item) {
            // Assuming there's a foreign key 'item_id' in the descriptions table
            $description = $item->description; // Adjust the relationship based on your actual model structure
            $itemDescriptions[$item->id] = $description;
        }
    
        return $itemDescriptions;
    }

    
}
