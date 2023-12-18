<?php

namespace App\Models;

use App\Models\LostItem;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Reward extends Model
{
    use HasFactory;

    protected $fillable = ['reward_id'];

    public function lostItems(){
        return $this->hasMany(LostItem::class);
    }
}
