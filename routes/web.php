<?php

use App\Http\Controllers\AuctionStreamController;
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

Route::post('/auction/{slotId}/bid', function ($slotId) {
    // 1. Preis updaten
    // 2. Event an alle Clients senden
    $update = Item::updateHighestBid($slotId, request('bid_amount'));
    if ($update) {
        return redirect()->back()->with('success', 'Your bid has been placed successfully.');
    }
    return redirect()->back()->with('failure', 'Your bid has not been placed successfully.');
});

Route::get('/account', function () {
    if(auth()->check()) {
        return view('account');
    }
    return redirect()->route('login');
});

Route::get('/userAuth', function () {
    return view('userAuth');
})->name('login');

Route::post('/register', [\App\Http\Controllers\AuthController::class, 'register'])->name('register');
