<nav class="navbar is-blurred has-text-weight-normal has-shadow is-fixed-top">

    <div class="navbar-brand is-uppercase">
        <a class="navbar-item" href="{{ route('homepage') }}">
        <img class="m-r-10" src="{{ asset('images/drillandpump-logo.png') }}" alt="Drill & Pump: Oil and gas equipment & services">
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
            <a class="navbar-item" href="#">{{ __('navbar.services') }}</a>
            <div class="navbar-item has-dropdown">
                <a class="navbar-link" href="#">
                    {{ __('navbar.production') }}
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

            <a class="navbar-item" href="#">{{ __('navbar.contacts') }}</a>

            <div class="navbar-item has-dropdown">
                <a class="navbar-link navbar-lang">
                    <img class="m-r-10" src="{{ asset('images/lang/' . App::getLocale() . '.png') }}" alt="{{ App::getLocale() }}">                    
                    {{ App::getLocale() }}..
                    <i class="m-l-5 fa fa-angle-down" aria-hidden="true"></i>                    
                </a>
                <div class="navbar-dropdown has-text-weight-normal navbar-lang">
                    @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                    <a class="navbar-item" rel="alternate" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                    <img class="m-r-10" src="{{asset('images/lang/' . $localeCode . '.png')}}" alt="{{$properties['native']}}">
                    {{ $properties['native'] }}
                    </a>
                    @endforeach
                                            
                </div>
            </div>
        
        </div>
    
        <div class="navbar-end">
            

            @if (Auth::guest())
                <a class="navbar-item" href="{{ route('login') }}">{{ __('navbar.login') }}</a>
                <a class="navbar-item" href="{{ route('register') }}">{{ __('navbar.register') }}</a>
            @else
            <div class="navbar-item has-dropdown">
                <a class="navbar-link">
                    @if ( file_exists('images/'. Auth::user()->email .'.png' ))
                        <img src="{{ asset('images/' . Auth::user()->email . '.png')}}" alt="{{ Auth::user()->name }}" class="m-r-10 user-avatar">
                    @else
                    <img src="{{asset('images/user.png')}}" alt="{{ Auth::user()->name }}" class="m-r-10 user-avatar">                    
                    @endif
                    <span class="navbar-user">
                        {{ Auth::user()->name }}<i class="m-l-5 fa fa-angle-down" aria-hidden="true"></i>
                    </span>
                </a>
                <div class="navbar-dropdown has-text-weight-normal is-right user-widget">
                    <div class="dropdown-item m-b-5">
                        <div class="hero is-light is-bold">
                            <div class="hero-body">
                                <div class="columns">
                                    <div class="column is-one-third">
                                        @if (file_exists('images/'. Auth::user()->email .'.png'))
                                            <img src="{{ asset('images/' . Auth::user()->email . '.png') }}" alt="{{ Auth::user()->name }}" class="m-r-10 user-avatar">
                                        @else
                                            <img src="{{ asset('images/user.png')}}" alt="{{ Auth::user()->name }}" class="m-r-10 user-avatar">                    
                                        @endif
                                    </div>
                                    <div class="column">
                                        <h3 class="title is-size-7 m-t-10">{{ Auth::user()->name }}</h3>
                                        <h5 class="subtitle is-size-7">{{ Auth::user()->email }}</h5>     
                                    </div>
                                </div>
                                                           
                            </div>
                        </div>

                    </div>
                    
                    <a class="navbar-item" href="/documentation/overview/start/">
                        <i class="m-r-5 fa fa-user-circle-o has-text-primary is-size-5" aria-hidden="true"></i>                        
                        {{ __('navbar.profile') }}
                    </a>
                    <a class="navbar-item" href="https://bulma.io/documentation/modifiers/syntax/">
                        <i class="m-r-5 fa fa-bell has-text-primary is-size-5" aria-hidden="true"></i>  
                        {{ __('navbar.notifications') }}
                    </a>
                    <a class="navbar-item" href="{{route('manage')}}">
                        <i class="m-r-5 fa fa-cogs has-text-primary is-size-5" aria-hidden="true"></i>
                        {{ __('navbar.manage') }}
                    </a>
                    <hr class="navbar-divider">
                    <a class="navbar-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="m-r-5 fa fa-sign-out has-text-primary is-size-5" aria-hidden="true"></i>
                        {{ __('navbar.logout') }}
                    </a>                                 
                </div>
            </div>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">{{ csrf_field() }}</form>
            @endif
        </div>
    </div>
</nav>