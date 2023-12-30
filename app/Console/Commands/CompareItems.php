<?php

namespace App\Console\Commands;

use Carbon\Carbon;
use App\Models\LostItem;
use App\Models\FoundItem;
use Illuminate\Console\Command;

class CompareItems extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:compare-items';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {

        $date_lost_found_threshold_days = 5;
        $lost_items = LostItem::all();
        $found_items = FoundItem::all();

        $match_found = 0;
        
        foreach($found_items as $found_item){
            foreach($lost_items as $lost_item){
                if(! $found_item->lostItems->contains($lost_item)){
                    // comparison
                    if(! $found_item->address->match($lost_item->address)){
                        continue;
                    }
                    if(! $found_item->category->match($lost_item->category)){
                        continue;
                    }
                    if($found_item->foundItemDescriptions[0]->color != $lost_item->lostItemDescriptions[0]->color){
                        continue;
                    }
                    if($found_item->foundItemDescriptions[0]->model != $lost_item->lostItemDescriptions[0]->model){
                        continue;
                    }

                    $dateLost = Carbon::parse($lost_item->date_lost);
                    $dateFound = Carbon::parse($found_item->dateFound);
                    
                    $numberOfDays = $dateLost->diffInDays($dateFound);

                    if($numberOfDays > $date_lost_found_threshold_days){
                        continue;
                    }

                    echo "found a match between lost item: ".$lost_item->item_name." and found item: ".$found_item->item_name."\n";
                    $match_found += 1;
                    $lost_item->foundItems()->attach($found_item);
                }
            }
        }

        echo "finished checking for matches. found ".$match_found." matches on ".date('Y-m-d')."\n\n";

    }
}

//app artisan app:compare-items