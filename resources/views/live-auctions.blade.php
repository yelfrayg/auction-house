<!DOCTYPE html>
<html lang="en">
<x-head site_name="Live Auctions" :js_files="['resources/js/auctionStream.js']"/>
<body>
    <x-header />
    <main>
        <h1>Live Auctions</h1>

        <div class="auctions-container">
            @isset($items)
                @foreach ($items as $item)
                    <a href="/auction/{{ $item->id }}" class="auction-item">
                        <div class="auction-image-container">
                            <img src="{{ asset($item->item_image_url) }}" alt="{{ $item->item_name }}">
                            <div class="auction-info">
                                <p class="time-info">
                                    <span class="time-value" data-end-time="{{ $item->item_end_time->toIso8601String() }}">
                                        {{ $item->item_end_time->diffForHumans() }}
                                    </span>
                                </p>
                                <p class="bid-info">
                                    <span class="bid-value">{{ number_format($item->item_highest_bid, 0) }}€</span>
                                </p>
                            </div>
                        </div>
                    </a>
                @endforeach
            @else
                <p>Currently no live auctions available.</p>
            @endisset
        </div>
    </main>
    <x-footer />
</body>

</html>
