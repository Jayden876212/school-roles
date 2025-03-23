<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield("title")</title>

    @include("shared.stylesheets")
    @yield("styles")
</head>
<body>
    <x-header-component :page_title="$page_title" />
    <main>
        @yield("content")
    </main>
    <x-footer-component/>

    @include("shared.scripts")
    @yield("scripts")
</body>
</html>