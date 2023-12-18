<?php

namespace App\Models;

use App\Models\LostItem;
use App\Models\FoundItem;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['category_name'];

    public function lostItems(){
        return $this->hasMany(LostItem::class);
    }

    public function foundItems(){
        return $this->hasMany(FoundItem::class);
    }
}
