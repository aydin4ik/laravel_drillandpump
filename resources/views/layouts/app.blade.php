<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Drillandpump</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>


    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body class="has-navbar-fixed-top">
    <div id="app">

            <nav class="navbar is-primary has-text-weight-light has-shadow is-fixed-top">

                <div class="navbar-brand is-uppercase">
                    <a class="navbar-item" href="{{route('home')}}">
                    <img class="m-r-10" src="{{asset('images/drillandpump-logo.png')}}" alt="Drill & Pump: Oil and gas equipment & services">
                    <h2>Drill & Pump</h2>
                    </a>
                    <div class="navbar-burger burger" data-target="navbarExampleTransparentExample">
                    <span></span>
                    <span></span>
                    <span></span>
                    </div>
                </div>
                
                <div class="navbar-menu">
                    <div class="navbar-start">
                        <a class="navbar-item" href="#">Services</a>
                        <a class="navbar-item" href="#">Production</a>
                        <div class="navbar-item has-dropdown is-hoverable">
                            <a class="navbar-link" href="#">
                                Docs
                            </a>
                            <div class="navbar-dropdown has-text-weight-normal">
                                <a class="navbar-item" href="/documentation/overview/start/">
                                Overview
                                </a>
                                <a class="navbar-item" href="https://bulma.io/documentation/modifiers/syntax/">
                                Modifiers
                                </a>
                                <a class="navbar-item" href="https://bulma.io/documentation/columns/basics/">
                                Columns
                                </a>
                                <a class="navbar-item" href="https://bulma.io/documentation/layout/container/">
                                Layout
                                </a>
                                <a class="navbar-item" href="https://bulma.io/documentation/form/general/">
                                Form
                                </a>
                                <hr class="navbar-divider">
                                <a class="navbar-item" href="https://bulma.io/documentation/elements/box/">
                                Elements
                                </a>
                                <a class="navbar-item" href="https://bulma.io/documentation/components/breadcrumb/">
                                Components
                                </a>
                            </div>
                        </div>
                    
                    </div>
                
                    <div class="navbar-end">
                        <div class="navbar-item has-dropdown is-hoverable">
                            <a class="navbar-link" href="#">
                                Select Language
                            </a>
                            <div class="navbar-dropdown has-text-weight-normal">
                                <a class="navbar-item" href="/documentation/overview/start/">
                                English
                                </a>
                                <a class="navbar-item" href="https://bulma.io/documentation/modifiers/syntax/">
                                Russian
                                </a>
                                <a class="navbar-item" href="{{App::setLocale('az')}}">
                                Azeri
                                </a>
                                <a class="navbar-item" href="https://bulma.io/documentation/elements/box/">
                                Arabic
                                </a>                                   
                            </div>
                        </div>

                        @if (Auth::guest())
                            <a class="navbar-item" href="{{route('login')}}">Login</a>
                            <a class="navbar-item" href="{{route('register')}}">Sign Up</a>
                        @else
                        <div class="navbar-item has-dropdown is-hoverable">
                            <a class="navbar-link" href="#">
                                Username
                            </a>
                            <div class="navbar-dropdown has-text-weight-normal is-right">
                                <a class="navbar-item" href="/documentation/overview/start/">
                                Profile
                                </a>
                                <a class="navbar-item" href="https://bulma.io/documentation/modifiers/syntax/">
                                Notifications
                                </a>
                                <a class="navbar-item" href="https://bulma.io/documentation/columns/basics/">
                                Settings
                                </a>
                                <hr class="navbar-divider">
                                <a class="navbar-item" href="https://bulma.io/documentation/elements/box/">
                                Signout
                                </a>                                   
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
            </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
