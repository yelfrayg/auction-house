<!DOCTYPE html>
<html lang="en">
<x-head site_name="Auction {{ $auction['id'] }}" :js_files="['resources/js/auctionStream.js']" />

<body>
    <x-header />
    <main>
        @isset($auction)
            {{-- <pre>{{ json_encode($auction->item_description, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE) }}</pre> --}}
            <div class="container">
                <div class="imgcontainer">
                    <img src="{{ asset($auction['item_image_url']) }}" alt="{{ $auction['item_name'] }}">
                    <section class="number-details">
                        <p class="auction-end-time" data-end-time="{{ date('c', strtotime($auction['item_end_time'])) }}"></p>
                        <p class="auction-highest-bid">
                            <span class="highest-bid-label">Highest Bid: </span>
                            <span class="highest-bid-value">
                                {{ number_format($auction['item_highest_bid'], 0, ',', '.') }} €
                            </span>
                        </p>
                    </section>
                </div>
                <div class="auction-info">
                    <p class="auction-lot">Auction Lot: {{ $auction['id'] }}</p>
                    <h1 class="auction-h1">{{ $auction['item_name'] }}</h1>
                    <p class="auction-description">{{ $auction['item_description'] }}</p>
                    <div class="buttons">
                        <form action="/auction/{{ $auction['id'] }}/bid" method="POST">
                            @csrf
                            <input type="number" name="bid_amount" min="{{ $auction['item_highest_bid'] + 1 }}"
                                placeholder="Enter your bid" required>
                            <button type="submit">Place Bid</button>
                        </form>
                    </div>
                </div>
            </div>
        @else
            <p>Auction not found.</p>
        @endisset
    </main>
    <x-footer />
</body>

</html>
