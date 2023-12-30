<?php

namespace App\Http\Controllers;

use App\Models\LostItem;
use App\Models\FoundItem;
use Illuminate\Http\Request;
use App\Models\LostItemDescription;
use Illuminate\Support\Facades\Log;
use App\Models\FoundItemDescription;

class CompareitemsController extends Controller
{
    public function index()
{
    // Your logic for the index page
    return view('compare_items.index');
}


public function compareItemsDescriptions()
{
    $lostItems = LostItem::with('lostItemDescription')->get();
    $foundItems = FoundItem::with('foundItemDescription')->get();
    $matchedItems = [];

    foreach ($lostItems as $lostItem) {
        foreach ($foundItems as $foundItem) {
            if ($this->areItemsPotentialMatches($lostItem, $foundItem)) {
                Log::info("Potential match found! Lost Item ID: {$lostItem->id}, Found Item ID: {$foundItem->id}");

                $matchedItems[] = [
                    'lost_item' => $lostItem,
                    'found_item' => $foundItem,
                ];

                $this->sendNotification($lostItem, $foundItem);
            }
        }
    }

    return view('compare_items.index', compact('matchedItems'));
}
private function areItemsPotentialMatches($lostItem, $foundItem)
{
    // Check if descriptions exist
    if (!$lostItem->lostItemDescription || !$foundItem->foundItemDescription) {
        return false;
    }

    // Compare each attribute of the descriptions

    // Example: Compare date_lost
    $dateLostMatch = $lostItem->lostItemDescription->date_lost == $foundItem->foundItemDescription->dateFound;

    // Example: Compare color
    $colorMatch = $lostItem->lostItemDescription->color == $foundItem->foundItemDescription->Color;

    // Example: Compare model
    $modelMatch = $lostItem->lostItemDescription->model == $foundItem->foundItemDescription->Model;

    // Add more comparisons for other attributes as needed

    // Return true if all comparisons are true
    return $dateLostMatch && $colorMatch && $modelMatch;
}

}
