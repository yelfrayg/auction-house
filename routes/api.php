<?php

// routes/api.php
use App\Http\Controllers\Api\BidController;
use Illuminate\Support\Facades\Route;

// POST-Endpunkt zum Erstellen eines Gebots
Route::post('/bids', [BidController::class, 'store']);

// GET-Endpunkt zum Abrufen aller Gebote
Route::get('/bids', [BidController::class, 'index']);
