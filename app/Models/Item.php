<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $fillable = [
        'item_name',
        'item_description',
        'item_image_url',
        'item_min_price',
        'item_highest_bid',
        'item_start_time',
        'item_end_time',
    ];

    protected $casts = [
        'item_min_price' => 'decimal:2',
        'item_highest_bid' => 'decimal:2',
        'item_start_time' => 'datetime',
        'item_end_time' => 'datetime',
    ];

    public static function allItems()
    {
        return self::all();
    }

    public static function getItemById($id)
    {
        return self::find($id);
    }
}
