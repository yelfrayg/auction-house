@props(['site_name', "js_files" => []])
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ $site_name }}</title>

    @fonts
    <!-- Styles / Scripts -->
    @vite(array_merge(['resources/css/app.css', 'resources/js/app.js'], $js_files))
</head>
