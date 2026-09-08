<!DOCTYPE html>
<html lang="en">
<x-head site_name="Live Auctions" />

<body>
    <x-header />
    <main>
        <h1>Live Auctions</h1>

        <div class="auctions-container">
            <a href="/auction/1" class="auction-item">
                <div class="auction-image-container">
                    <img src="{{ asset('img/250swb.png') }}" alt="Auction Item">
                    <div class="auction-info">
                        <p class="time-info"><span class="time-value">30:34</span></p>
                        <p class="bid-info"><span class="bid-value">2.000.000€</span></p>
                    </div>
                </div>
            </a>

            <div class="auction-item">
                <div class="auction-image-container">
                    <img src="{{ asset('img/e-type.png') }}" alt="Auction Item">
                    <div class="auction-info">
                        <p class="time-info"><span class="time-value">30:34</span></p>
                        <p class="bid-info"><span class="bid-value">135.000€</span></p>
                    </div>
                </div>
            </div>

            <div class="auction-item">
                <div class="auction-image-container">
                    <img src="{{ asset('img/911.png') }}" alt="Auction Item">
                    <div class="auction-info">
                        <p class="time-info"><span class="time-value">30:34</span></p>
                        <p class="bid-info"><span class="bid-value">200.000€</span></p>
                    </div>
                </div>
            </div>

            <div class="auction-item">
                <div class="auction-image-container">
                    <img src="{{ asset('img/long-bloc.png') }}" alt="Auction Item">
                    <div class="auction-info">
                        <p class="time-info"><span class="time-value">30:34</span></p>
                        <p class="bid-info"><span class="bid-value">1.300€</span></p>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <x-footer />
</body>

</html>
