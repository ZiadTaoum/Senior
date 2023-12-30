<?php

namespace App\Models;

use App\Models\LostItem;
use App\Models\FoundItem;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class LostFoundItem extends Model
{
    use HasFactory;

    protected $fillable = ['lost_item_id','found_item_id','email_sent','admin_checked'];

    public function lostItem(){
        return $this->belongsTo(LostItem::class);
    }
    public function foundItem(){
        return $this->belongsTo(FoundItem::class);
    }
}


