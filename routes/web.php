<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/live-auctions', function () {
    return view('live-auctions');
});

Route::get('/auction/{slotId}', function ($slotId) {
    $auction = [
        'id' => $slotId,
        'description' => 'Description for Auction 1',
        'product' => [
            'id' => 1,
            'name' => 'Product 1',
            'description' => 'Description for Product 1',
        ],
        'seller' => [
            'id' => 1,
            'name' => 'Seller 1',
            'description' => 'Description for Seller 1',
        ],
        'end_time' => now()->addMinutes(10),
    ];
    return view('auction', ['auction' => $auction]);
});
