<?php

use App\Http\Controllers\UserController;
use App\Models\Item;
use Illuminate\Support\Facades\Auth;
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
})->middleware('auth');

Route::get('/account', function () {
    if (auth()->check()) {
        return view('account');
    }
    return redirect()->route('login');
});

Route::get('/userAuth', function () {
    return view('userAuth');
})->name('login');

Route::post('/register', [UserController::class, 'store'])->name('register');

Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard')->middleware('auth');

Route::post('/login', function () {
    $credentials = request()->validate([
        'email' => ['required', 'email'],
        'password' => ['required'],
    ]);

    if (auth()->attempt($credentials)) {
        request()->session()->regenerate();
        return redirect()->intended('/dashboard')->withCookie(cookie('userId', auth()->id(), 60 * 24 * 30))->with('success', 'Logged in successfully.'); // Cookie for 30 days
    }

    return back()->withErrors([
        'email' => 'The provided credentials do not match our records.',
    ]);
});


Route::middleware('auth')->group(function () {
    Route::post('/logout', function () {
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        return back()->with('success', 'Logged out successfully.'); // Delete cookie
    })->name('logout');

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::post('/auction/{slotId}/bid', function ($slotId) {
        // 1. Preis updaten
        // 2. Event an alle Clients senden
    });
});
