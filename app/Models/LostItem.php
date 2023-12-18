<?php

namespace App\Models;

use App\Models\User;
use App\Models\Image;
use App\Models\Review;
use App\Models\Reward;
use App\Models\Address;
use App\Models\Category;
use App\Models\LostItemDescription;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class LostItem extends Model
{
    use HasFactory;

    protected $fillable = ['item_name','status','user_id','image_id','address_id', 'category_id','reward'];
    protected $guarded = ['review_id'];

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
    public function review(){
        return $this->belongsTo(Review::class);
    }
    public function reward(){
        return $this->belongsTo(Reward::class);
    }
    public function lostItemDescriptions(){
        return $this->hasMany(LostItemDescription::class);
    }
}
