<?php

namespace App\Http\Controllers;

use App\Mail\ItemFound;
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
                                , 'foundItems' => $foundItems]);

    }
    

    
}
