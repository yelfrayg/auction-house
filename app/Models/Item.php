<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

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
        'user_id'
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

    public static function updateHighestBid($id, $newBid)
    {
        $item = self::find($id);
        if ($item && $newBid > $item->item_highest_bid) {
            $item->item_highest_bid = $newBid;
            $item->user_id = auth()->id(); // Update the user_id to the current authenticated user
            $item->save();
            return ['code' => 200, 'message' => 'Bid updated successfully.'];
        }
        return ['code' => 400, 'message' => 'Current highest bid is higher than your bid.'];
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
