<!DOCTYPE html>
<html lang="en">
<x-head site_name="Auction {{ $auction['id'] }}" />

<body>
    <x-header />
    <main>
        @isset($auction)
            <pre>{{ json_encode($auction['description'], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE) }}</pre>
        @else
            <p>Auction not found.</p>
        @endisset
    </main>
    <x-footer />
</body>

</html>
