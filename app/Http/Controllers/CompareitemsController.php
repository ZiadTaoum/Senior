<?php

namespace App\Http\Controllers;

use App\Mail\TestMail;
use App\Mail\ItemFound;
use App\Models\LostItem;
use App\Models\FoundItem;
use Illuminate\Http\Request;
use App\Models\LostFoundItem;
use App\Models\LostItemDescription;
use Illuminate\Support\Facades\Log;
use App\Models\FoundItemDescription;
use Illuminate\Support\Facades\Mail;


class CompareitemsController extends Controller
{
    public function index()
    {
        // Retrieve unchecked items from LostFoundItem
        $uncheckedItems = LostFoundItem::where('admin_checked', false)->paginate(10);

        return view('compare_items.index', ['uncheckedItems' => $uncheckedItems]);
    }


    public function confirm(LostFoundItem $lostFoundItem)
    {
        // Send email to user
        $finderEmail = $lostFoundItem->foundItem->user->email;
        $userEmail = $lostFoundItem->lostItem->user->email;
        $subject = 'Item Found';
        $body = 'Your item has been found';
        Mail::to($userEmail)->send(new ItemFound($subject, $body, $finderEmail));


        // Update columns
        $lostFoundItem->update([
            'admin_checked' => true,
            'email_sent' => true,
        ]);

        return redirect()->route('compare_items.index')->with('success', 'Item confirmed successfully.');
    }

    public function unconfirm(LostFoundItem $lostFoundItem)
    {
        // Update column
        $lostFoundItem->update(['admin_checked' => true]);

        return redirect()->route('compare_items.index')->with('success', 'Item unconfirmed successfully.');
    }
}
