<?php

use App\Models\Item;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/live-auctions', function () {
    $items = Item::allItems();
    return view('live-auctions', ['items' => $items]);
});

Route::get('/auction/{slotId}', function ($slotId) {
    $auction = Item::getItemById($slotId);
    return view('auction', ['auction' => $auction]);
});
