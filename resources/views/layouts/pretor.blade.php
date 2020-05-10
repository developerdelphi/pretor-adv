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
    <script src="{{ asset('js/all.js') }}" defer></script>
    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
    <script src="{{ asset('js/semantic.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/all.css') }}" rel="stylesheet">
    <link href="{{ asset('css/semantic.css') }}" rel="stylesheet">
    <!-- Styles Datatables -->
    <style>
        * {}
    </style>
</head>

<body>
    <div id="app" class="">
        <div class="row">
            <nav class="ui menu fluid">
                <div class="header item">
                    {{ config('app.name', 'Laravel') }}
                </div>
                <div class="item">
                    <a class="nav-link" href="{{ url('lawyer') }}">Advogado</a>
                </div>
                <div class="ui dropdown item">
                    More
                    <i class="dropdown icon"></i>
                    <div class="menu">
                        <a class="item"><i class="edit icon"></i> Edit Profile</a>
                        <a class="item"><i class="globe icon"></i> Choose Language</a>
                        <a class="item"><i class="settings icon"></i> Account Settings</a>
                    </div>
                </div>
                <!-- Right Side Of Navbar -->
                @guest
                <div class="item right">
                    <a class="link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    @if (Route::has('register'))
                    <a class="link" href="{{ route('register') }}">{{ __('Register') }}</a>
                    @endif
                </div>
                @else
                <!-- Authentication Links -->
                <div class="ui item dropdown right">
                    {{ Auth::user()->name }}
                    <i class="dropdown icon"></i>
                    <div class="menu">
                        <a class="item link" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                        document.getElementById('logout-form').submit();">
                            <i class="power icon"></i>Sair
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </div>
                @endguest
            </nav>
        </div>
        <main class="ui grid doubling stackable" style="margin:0;padding:0;">
            <div class="column three wide">
                @include('components/menus/sidebar')
                <!-- end Sidebar -->
            </div>
            <div class="column thirteen wide">
                @include('sweetalert::alert')
                @yield('content')
                @yield('footer-page')
            </div>

        </main>
    </div>
    @yield('page-script')
    <script type="text/javascript">
        $(document).ready(function(){
            $('.ui.dropdown').dropdown();
            //$('.ui.labeled.icon.sidebar').sidebar('toggle');

        });
    </script>
</body>

</html>
