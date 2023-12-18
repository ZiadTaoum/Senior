<?php

namespace App\Models;

use App\Models\User;
use App\Models\LostItem;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Review extends Model
{
    use HasFactory;

    protected $fillable = ['review_content', 'user_id'];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function lostItems(){
        return $this->hasMany(LostItem::class);
    }


}
