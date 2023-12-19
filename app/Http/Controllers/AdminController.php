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


    public function editLostItem($id)
    {
        // Retrieve the lost item to be edited
        $lostItem = LostItem::find($id);
        // Add any necessary logic here

        return view('items.edit', compact('lostItem'));
    }

    public function editFoundItem($id)
    {
        // Retrieve the found item to be edited
        $foundItem = FoundItem::find($id);
        // Add any necessary logic here

        return view('items.edit', compact('foundItem'));
    }

    public function destroyLostItem($id)
    {
        // Find the lost item to be deleted
        $lostItem = LostItem::find($id);
        // Add any necessary logic here

        // Delete the lost item
        $lostItem->delete();

        return redirect()->route('admin.index')->with('success', 'Lost item deleted successfully!');
    }

    public function destroyFoundItem($id)
    {
        // Find the found item to be deleted
        $foundItem = FoundItem::find($id);
        // Add any necessary logic here

        // Delete the found item
        $foundItem->delete();

        return redirect()->route('admin.index')->with('success', 'Found item deleted successfully!');
    }

    
}
