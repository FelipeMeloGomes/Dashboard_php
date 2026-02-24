<!doctype html>
<html lang="pt-br">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Admin FMG</title>

    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes" />
    <meta name="color-scheme" content="light dark" />
    <meta name="theme-color" content="#007bff" media="(prefers-color-scheme: light)" />
    <meta name="theme-color" content="#1a1a1a" media="(prefers-color-scheme: dark)" />

    <meta name="supported-color-schemes" content="light dark" />

    @unless (app()->environment('testing'))
        @vite(['resources/scss/app.scss', 'resources/js/app.js'])
    @endunless

</head>

<body class="bg-body-secondary @yield('body-class')">
    @yield('content')
</body>

</html>
