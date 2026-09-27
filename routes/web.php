<?php

use App\Http\Controllers\UserController;
use App\Models\Item;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Hash;

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

Route::post('/login', function () {
    $credentials = request()->validate([
        'email' => ['required', 'email'],
        'password' => ['required'],
    ], [
        'email.required' => 'Email is required.',
        'email.email' => 'Please provide a valid email address.',
        'password.required' => 'Password is required.',
    ]);

    if (Auth::attempt($credentials)) {
        request()->session()->regenerate();
        return redirect()->intended('/account')->withCookie(cookie('userId', auth()->id(), 60 * 24 * 30))->with('success', 'Logged in successfully.'); // Cookie for 30 days
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
        return back()->with('success', 'Logged out successfully.');
    })->name('logout');

    Route::get('/account', function () {
        // Find auction by user ID and pass it to the view
        $winningAuctions = Item::where('user_id', auth()->id())->where('item_end_time', '>', now())->get();
        $wonAuctions = Item::where('user_id', auth()->id())->where('item_end_time', '<=', now())->get();
        return view('account', ['user' => auth()->user(), 'winningAuctions' => $winningAuctions, 'wonAuctions' => $wonAuctions]);
    })->name('account');

    Route::post('/auction/{slotId}/bid', function ($slotId) {
        $update = Item::updateHighestBid($slotId, request('bid_amount'));
        if ($update) {
            return back()->with('success', 'Your bid has been placed successfully.');
        }
        return back()->with('failure', 'Your bid has not been placed successfully.');
    });

    Route::post('/account/delete', function () {
        $user = auth()->user();
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();

        $user->delete();

        return redirect('/')->with('success', 'Your account has been deleted successfully.');
    })->name('account.delete');

    Route::post('/account/update-user', function () {
        $user = auth()->user();
        $validated = request()->validate([
            'name' => 'string|max:255',
            'email' => 'string|email|max:255|unique:users,email,' . $user->id,
            'password' => 'nullable|string|min:1',
        ], [
            'email.email' => 'Please provide a valid email address.',
            'email.unique' => 'An account with this email is already registered.',
            'password.min' => 'Password must be at least 1 character long.',
        ]);

        $user->name = $validated['name'] ?? $user->name;
        $user->email = $validated['email'] ?? $user->email;

        if (!empty($validated['password'])) {
            $user->password = Hash::make($validated['password']);
        }
        $user->save();

        return back()->with('success', 'Your account information has been updated successfully.');
    });
});
