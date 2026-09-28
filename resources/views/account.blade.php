<!DOCTYPE html>
<html lang="en">
<x-head site_name="My account" :js_files="['resources/js/dashboard.js']" />

<body>
    <x-header />
    <main class="dashboard">
        @if (isset($user))
            <div class="dashboard-heading">
                <div>
                    <p class="eyebrow">Account overview</p>
                    <h1>Hello, {{ $user->name }}!</h1>
                </div>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button class="button button-secondary" type="submit">Logout</button>
                </form>
            </div>

            <div class="dashboard-grid">
                {{-- <section class="dashboard-panel user-info">
                    <p class="eyebrow">Your details</p>
                    <h2>User Information</h2>
                    <dl>
                        <div>
                            <dt>Name</dt>
                            <dd>{{ $user->name }}</dd>
                        </div>
                        <div>
                            <dt>Email</dt>
                            <dd>{{ $user->email }}</dd>
                        </div>
                    </dl>
                </section> --}}

                <section class="dashboard-panel user-section">
                    <p class="eyebrow">Manage account</p>
                    <h2>Update Information</h2>
                    <form action="/account/update-user" method="post">
                        @csrf
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" value="{{ $user->email }}" required>
                        <label for="name">Name</label>
                        <input type="text" name="name" id="name" value="{{ $user->name }}" required>
                        <label for="password">New Password</label>
                        <input type="password" name="password" id="password"
                            placeholder="Leave blank to keep current password">
                        <div class="button-container">
                            <button class="button" id="save-button" type="submit" disabled>Update Information</button>
                            <form action="/account/delete" method="post">
                                @csrf
                                <button class="button delete" id="delete-account-button" type="submit">Delete Account</button>
                            </form>
                        </div>
                    </form>
                </section>

                <section class="dashboard-panel auctions">
                    <div class="panel-heading">
                        <div>
                            <p class="eyebrow">Your activity</p>
                            <h2>Auctions</h2>
                        </div>
                    </div>
                    <div class="auction-columns">
                        <div class="auction-list won-auctions">
                            <h3>Won Auctions</h3>
                            @if (isset($wonAuctions) && count($wonAuctions) > 0)
                                <ul>
                                    @foreach ($wonAuctions as $auction)
                                        <li>
                                            <a href="/auction/{{ $auction->id }}">
                                                #{{ $auction->id }} - {{ $auction->item_name }}
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            @else
                                <p class="nothing-message">No won auctions.</p>
                            @endif
                        </div>
                        <div class="auction-list active-auctions">
                            <h3>Active Auctions</h3>
                            @if (isset($winningAuctions) && count($winningAuctions) > 0)
                                <ul>
                                    @foreach ($winningAuctions as $auction)
                                        <li>
                                            <a href="/auction/{{ $auction->id }}">
                                                # {{ $auction->id }} - {{ $auction->item_name }}
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            @elseif (isset($winningAuctions) && count($winningAuctions) === 0)
                                <p class="nothing-message">No active auctions.</p>
                            @endif
                        </div>
                        {{-- <div class="auction-list upcoming-auctions">
                            <h3>Upcoming Auctions</h3>
                            <ul>
                                <li>Auction 7</li>
                                <li>Auction 8</li>
                                <li>Auction 9</li>
                            </ul>
                        </div> --}}
                    </div>
                </section>
            </div>
        @else
            <h1>User information is not available.</h1>
        @endif
    </main>
    <x-footer />
</body>

</html>
