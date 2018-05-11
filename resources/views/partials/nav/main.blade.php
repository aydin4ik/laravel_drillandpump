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
            <a class="navbar-item" href="#">{{__('navbar.services')}}</a>
            <div class="navbar-item has-dropdown is-hoverable">
                <a class="navbar-link" href="#">
                    {{__('navbar.production')}}
                    <i class="m-l-5 fa fa-angle-down" aria-hidden="true"></i>
                </a>
                <div class="navbar-dropdown has-text-weight-normal">
                    <a class="navbar-item has-text-weight-bold" href="/documentation/overview/start/">
                    Drill Bits
                    </a>
                    <a class="navbar-item" href="https://bulma.io/documentation/modifiers/syntax/">
                    Tricone Bits
                    </a>
                    <a class="navbar-item" href="https://bulma.io/documentation/columns/basics/">
                PDC Bits
                    </a>
                    <a class="navbar-item" href="https://bulma.io/documentation/layout/container/">
                    BHA Constituent Elements
                    </a>
                    <hr class="navbar-divider">                    
                    <a class="navbar-item has-text-weight-bold" href="https://bulma.io/documentation/form/general/">
                    Drill Pipes
                    </a>
                    <a class="navbar-item" href="https://bulma.io/documentation/elements/box/">
                    Elements
                    </a>
                    <a class="navbar-item" href="https://bulma.io/documentation/components/breadcrumb/">
                    Components
                    </a>
                </div>
            </div>

            <a class="navbar-item" href="#">{{__('navbar.contacts')}}</a>

            <div class="navbar-item has-dropdown is-hoverable">
                <a class="navbar-link navbar-lang" href="#">
                    <img class="m-r-10" src="{{asset('images/lang/' . App::getLocale() . '.png')}}" alt="{{App::getLocale()}}">                    
                    {{App::getLocale()}}..
                    <i class="m-l-5 fa fa-angle-down" aria-hidden="true"></i>                    
                </a>
                <div class="navbar-dropdown has-text-weight-normal">
                    <a class="navbar-item" href="locale/en">
                    <img class="m-r-10" src="{{asset('images/lang/en.png')}}" alt="Select English">
                    English
                    </a>
                    <a class="navbar-item" href="locale/ru">
                    <img class="m-r-10" src="{{asset('images/lang/ru.png')}}" alt="Select English">
                    Русский
                    </a>
                    <a class="navbar-item" href="locale/az">
                    <img class="m-r-10" src="{{asset('images/lang/az.png')}}" alt="Select English">                    
                    Azərbaycanca
                    </a>
                    <a class="navbar-item" href="locale/ar">
                    <img class="m-r-10" src="{{asset('images/lang/ar.png')}}" alt="Select English">
                    عربى
                    </a>                                   
                </div>
            </div>
        
        </div>
    
        <div class="navbar-end">
            

            @if (Auth::guest())
                <a class="navbar-item" href="{{route('login')}}">{{__('navbar.login')}}</a>
                <a class="navbar-item" href="{{route('register')}}">{{__('navbar.register')}}</a>
            @else
            <div class="navbar-item has-dropdown is-hoverable">
                <a class="navbar-link" href="#">
                    Hey {{Auth::user()->name}}
                </a>
                <div class="navbar-dropdown has-text-weight-normal is-right">
                    <a class="navbar-item" href="/documentation/overview/start/">
                    Profile
                    </a>
                    <a class="navbar-item" href="https://bulma.io/documentation/modifiers/syntax/">
                    Notifications
                    </a>
                    <a class="navbar-item" href="{{route('manage')}}">
                    Manage
                    </a>
                    <hr class="navbar-divider">
                    <a class="navbar-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>                                 
                </div>
            </div>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">{{ csrf_field() }}</form>
            @endif
        </div>
    </div>
</nav>