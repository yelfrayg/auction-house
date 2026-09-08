<?php

namespace Database\Seeders;

use App\Models\Item;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        // Erst DB leeren:
        Item::truncate();

        $items = [
            [
                'item_name' => 'Ferrari 250 SWB',
                'item_description' => 'Ferrari 250 Shor Wheel Base.',
                'item_image_url' => 'img/250swb.png',
                'item_min_price' => 1_000_000.00,
                'item_highest_bid' => 12_000_000.00,
                'item_start_time' => now(),
                'item_end_time' => now()->addHours(7),
            ],
            [
                'item_name' => 'Porsche 911 S/T',
                'item_description' => 'This Porsche 911 S/T is a rare and highly sought-after car, known for its exceptional performance and iconic design.',
                'item_image_url' => 'img/911.png',
                'item_min_price' => 100_000.00,
                'item_highest_bid' => 1_000_000.00,
                'item_start_time' => now(),
                'item_end_time' => now()->addMinutes(17),
            ],
            [
                'item_name' => 'Hot Wheels 1:64',
                'item_description' => 'Hot Wheels 1:64 scale die-cast car.',
                'item_image_url' => 'img/long-bloc.png',
                'item_min_price' => 10.00,
                'item_highest_bid' => 100.00,
                'item_start_time' => now(),
                'item_end_time' => now()->addDays(3),
            ]
        ];

        foreach ($items as $item) {
            Item::create($item);
        }
    }
}
