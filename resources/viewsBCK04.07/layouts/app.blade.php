<!DOCTYPE html>
<html>

<head>
    <title>Survey Webapp</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}">
    <link href="{{ mix('css/app.css') }}" rel="stylesheet" type="text/css" />

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
</body>

</html>
