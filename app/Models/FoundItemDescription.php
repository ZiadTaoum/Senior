<?php

namespace App\Models;

use App\Models\FoundItem;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class FoundItemDescription extends Model
{
    use HasFactory;

    protected $fillable = ['dateFound','Color','Model','found_item_id'];

    public function founditem(){
        return $this->belongsTo(FoundItem::class);
    }
}
