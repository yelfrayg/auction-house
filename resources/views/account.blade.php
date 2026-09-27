<!DOCTYPE html>
<html lang="en">
<x-head site_name="Mein Account" :js_files="['resources/js/dashboard.js']" />

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
                <section class="dashboard-panel user-info">
                    <p class="eyebrow">Your details</p>
                    <h2>User Information</h2>
                    <dl>
                        <div><dt>Name</dt><dd>{{ $user->name }}</dd></div>
                        <div><dt>Email</dt><dd>{{ $user->email }}</dd></div>
                    </dl>
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
                            <ul><li>Auction 1</li><li>Auction 2</li><li>Auction 3</li></ul>
                        </div>
                        <div class="auction-list active-auctions">
                            <h3>Active Auctions</h3>
                            <ul><li>Auction 4</li><li>Auction 5</li><li>Auction 6</li></ul>
                        </div>
                    </div>
                </section>

                <section class="dashboard-panel user-section">
                    <p class="eyebrow">Manage account</p>
                    <h2>Update Information</h2>
                    <form action="/update-user" method="post">
                        @csrf
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" value="{{ $user->email }}" required>
                        <label for="name">Name</label>
                        <input type="text" name="name" id="name" value="{{ $user->name }}" required>
                        <label for="password">New Password</label>
                        <input type="password" name="password" id="password" placeholder="Leave blank to keep current password">
                        <button class="button" type="submit" disabled>Update Information</button>
                    </form>
                </section>
            </div>
        @else
            <h1>User information is not available.</h1>
        @endif
    </main>
    <x-footer />
</body>

</html>
