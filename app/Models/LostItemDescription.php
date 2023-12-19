<?php

namespace App\Models;

use App\Models\LostItem;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class LostItemDescription extends Model
{
    use HasFactory;

    protected $fillable = ['date_lost','color','model','lost_item_id'];

    public function lostItem(){
        return $this->belongsTo(LostItem::class);
    }
}
