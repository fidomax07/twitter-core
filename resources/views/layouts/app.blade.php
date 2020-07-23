<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <meta name="auth-user" content="{{ json_encode(optional(auth()->user())->only(['id', 'avatar_url'])) }}">

    <script>
		(function fetchAuthUser() {
			var {id = null, avatar_url: avatar = null} = JSON.parse(
				document.getElementsByTagName('meta').namedItem('auth-user').content
			) ?? {}
			window.User = {id, avatar}
		}())
    </script>
</head>
<body>
<div id="app">
    <main class="container mx-auto">
        @yield('content')

        {{--<modals-container/>--}}
    </main>
</div>
</body>
</html>
