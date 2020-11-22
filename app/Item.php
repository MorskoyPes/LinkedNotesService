<?php

namespace App;

use App\Item;
use Illuminate\Pagination\Paginator;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    public function bag()
    {
        return $this->belongsTo('App\Bag', 'bag_id');
    }

    public static function getSortAllItems($orderByField = "id", $orderDirection = "asc")
    {
    	if (!$orderByField){
            $orderByField = 'id';
        }
        if (!$orderDirection){
            $orderDirection = 'asc';
        }

    	$items = Item::with('bag')->
	    	orderBy($orderByField, $orderDirection)->
	    	paginate(8);

    	return $items;
    }
    public static function getSortInBags($orderByField = 'bags.name', $orderDirection = 'asc')
    {
    	$items = Item::with('bag')->
    		join('bags', 'bags.id', '=', 'bag_id')->
	    	orderBy($orderByField, $orderDirection)->
	    	paginate(8);

    	return $items;
    }
}
