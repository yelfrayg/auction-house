<?php

namespace Database\Seeders;

use App\Models\Item;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

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
                'item_description' => 'This Porsche 911 S/T is a rare and highly specified car, known for its exceptional performance and iconic design.',
                'item_image_url' => 'img/911.png',
                'item_min_price' => 100_000.00,
                'item_highest_bid' => 1_000_000.00,
                'item_start_time' => now(),
                'item_end_time' => now()->addSeconds(170),
            ], [
                'item_name' => 'Mercedes AMG GT63 S 4-Door Coupe',
                'item_description' => 'The Mercedes AMG GT63 S 4-Door Coupe is a high-performance luxury sedan with a powerful V8 engine and advanced technology features.',
                'item_image_url' => 'img/gt63s-4.png',
                'item_min_price' => 60_000.00,
                'item_highest_bid' => 60_000.00,
                'item_start_time' => now(),
                'item_end_time' => now()->addHours(10),
            ]
        ];

        foreach ($items as $item) {
            Item::create($item);
        }
    }
}
