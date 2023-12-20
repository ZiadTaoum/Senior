<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use App\Models\Admin;
use App\Models\Image;
use App\Models\LostItem;
use App\Models\FoundItem;

use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Console\Command;
use App\Models\LostItemDescription;
use App\Models\FoundItemDescription;
use Illuminate\Support\Facades\Hash;


class AdminController extends Controller
{

    public function index()
    {
        // Retrieve all lost items with pagination
        $lostItems = LostItem::paginate(5); // You can adjust the number of items per page

        $lostItemDescriptions = $this->getDescriptions($lostItems);

        // Retrieve all found items with pagination
        $foundItems = FoundItem::paginate(5); // You can adjust the number of items per page

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
