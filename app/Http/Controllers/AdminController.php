<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use App\Models\Admin;
use App\Models\Image;
use App\Models\Review;
use App\Mail\ItemFound;
use App\Models\LostItem;

use App\Models\FoundItem;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Models\LostFoundItem;
use Illuminate\Console\Command;
use App\Models\LostItemDescription;
use Illuminate\Support\Facades\Log;
use App\Models\FoundItemDescription;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;


class AdminController extends Controller
{

    public function index()
    {

        $lostItems = LostItem::paginate(10);
        $foundItems = FoundItem::paginate(10);
        return view('items.index', ['lostItems' => $lostItems
                                , 'foundItems' => $foundItems
                                    ]);

    }

    public function adminReviewIndex()
    {
        $reviews = Review::with('user')->paginate(10); 
        return view('adminReview.index', ['reviews' => $reviews]);
    }

    public function adminEditReview(Review $review)
    {
        return view('admin.reviews.edit', ['review' => $review]);
    }

    public function adminUpdateReview(Request $request, Review $review)
    {
        // Validate and update the review
        // ...

        return redirect()->route('admin.reviews.index')->with('success', 'Review updated successfully!');
    }

    public function adminDestroyReview(Review $review)
    {
        $review->delete();

        return redirect()->route('admin.reviews.index')->with('success', 'Review deleted successfully!');
    }

}


