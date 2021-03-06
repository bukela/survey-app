<!DOCTYPE html>
<html>

<head>
    <title>Survey Webapp</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <script
			  src="https://code.jquery.com/jquery-2.2.4.js"
			  integrity="sha256-iT6Q9iMJYuQiMWNd9lDyBUStIq/8PuOW33aOqmvFpqI="
			  crossorigin="anonymous"></script>
    {{-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"> --}}
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}">
    <link href="{{ mix('css/app.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet" type="text/css" />

</head>

<body>
    <header>
        <div class="header__logo">
            <a href="{{ route('login') }}">
                <img src="{{ asset('img/logo.svg') }}" alt="logo">
            </a>
        </div>

        @if(auth()->check())
        <a href="#" class="logout" id="logout-button">uitloggen</a>
        <form id="logout-form" method="post" action="{{ route('logout') }}">{{ csrf_field() }}</form>
        @endif

    </header>
    <main>

        @include('_alert') @yield('content')

    </main>
    <footer>
        <div class="footer">
            <div class="footer__logo">
                <a href="https://www.convatec.nl/wondzorg/aquacel-wondverband/aquacel-foam/" target="_blank">
                    <img src="{{ asset('img/aquacel.svg') }}" alt="logo">
                </a>
            </div>
            <div class="footer__penguins @yield('show-penguins')">
                <img src="{{ asset('img/penguins.png') }}" alt="">
            </div>
            <div class="footer__disclaimer">
                <a href="{{ asset('Disclaimer_Convatec.pdf') }}">Disclaimer</a>
            </div>
        </div>
    </footer>

    @include('_confirm-delete-modal')

    <script src="{{ mix('js/app.js') }}"></script>
    @yield('script')
</body>

</html>
