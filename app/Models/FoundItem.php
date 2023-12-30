<?php

namespace App\Models;

use App\Models\User;
use App\Models\Image;
use App\Models\Address;
use App\Models\Category;
use App\Models\LostItem;
use App\Models\FoundItemDescription;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class FoundItem extends Model
{
    use HasFactory;

    protected $fillable = ['item_name','status','user_id','image_id','address_id','category_id'];

    public function user(){
        return $this->belongsTo(User::class);
    }
    public function image(){
        return $this->belongsTo(Image::class);
    }
    public function address(){
        return $this->belongsTo(Address::class);
    }
    public function category(){
        return $this->belongsTo(Category::class);
    }
    public function foundItemDescriptions(){
        return $this->hasMany(FoundItemDescription::class);
    }

    public function lostItems(){
        return $this->belongsToMany(LostItem::class, 'lost_found_items', 'found_item_id', 'lost_item_id');
    }
}

