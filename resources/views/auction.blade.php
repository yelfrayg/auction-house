<!DOCTYPE html>
<html lang="en">
<x-head site_name="Auction {{ $auction['id'] }}" :js_files="['resources/js/auctionStream.js']" />

<body>
    <x-header />
    <main>
        @isset($auction)
            {{-- <pre>{{ json_encode($auction->item_description, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE) }}</pre> --}}
            <div class="auction-container">
                <div class="imgcontainer">
                    <img src="{{ asset($auction['item_image_url']) }}" alt="{{ $auction['item_name'] }}">
                    <section class="number-details">
                        <p class="auction-end-time" data-end-time="{{ date('c', strtotime($auction['item_end_time'])) }}">
                            Waiting...</p>
                        <p class="auction-highest-bid">
                            <span class="highest-bid-label">Highest Bid: </span>
                            <span class="highest-bid-value">
                                {{ number_format($auction['item_highest_bid'], 0, ',', '.') }} €
                            </span>
                        </p>
                    </section>
                </div>
                <div class="auction-info">
                    <div class="auction-info-wrapper">
                        <p class="auction-lot">#{{ $auction['id'] }}</p>
                        <div class="auction-title-viewport">
                            <h1 class="auction-h1" data-title="{{ $auction['item_name'] }}">{{ $auction['item_name'] }}</h1>
                        </div>
                        <p class="auction-description">{{ $auction['item_description'] }}</p>
                    </div>

                    <div class="buttons">
                        @if (!date('c', strtotime($auction['item_end_time'])) >= date('c'))
                            @if ($auction['user_id'])
                                <p class="auction-winner">Current Winner: {{ $auction->user->name }}</p>
                            @else
                                <p class="auction-winner">No bids yet.</p>
                            @endif
                        @endif

                        <form action="/auction/{{ $auction['id'] }}/bid" method="POST">
                            @csrf
                            @if (date('c', strtotime($auction['item_end_time'])) < date('c'))
                                <input type="text" name="bid_amount" value="Winner: {{ $auction->user->name }}"
                                    disabled>
                            @else
                                <input type="number" name="bid_amount" min="{{ $auction['item_highest_bid'] + 1500 }}"
                                    placeholder="Enter your bid" step = "1500" required>
                                <button type="submit">Place Bid</button>
                            @endif
                        </form>
                        @if (session('success'))
                            <aside class="bid-messages success">
                                <x-message text="{{ session('success') }}" />
                            </aside>
                        @elseif (session('failure'))
                            <aside class="bid-messages failure">
                                <x-message text="{{ session('failure') }}" />
                            </aside>
                        @endif
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
