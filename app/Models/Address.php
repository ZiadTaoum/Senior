<?php

namespace App\Models;

use App\Models\User;
use App\Models\LostItem;
use App\Models\FoundItem;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Address extends Model
{
    use HasFactory;

    protected $fillable = ['city','governorate', 'street', 'user_id'];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function lostItems(){
        return $this->hasMany(LostItem::class);
    }
    public function foundItems(){
        return $this->hasMany(FoundItem::class);
    }

    public function match(Address $anotherAddress){
        if($this->city == $anotherAddress->city){
            if($this->governorate == $anotherAddress->governorate){
                if($this->street == $anotherAddress->street){
                    return true;
                }
            }
        }
        return false;
    }
}
