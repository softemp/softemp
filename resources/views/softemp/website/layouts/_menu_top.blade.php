<ul class="nav navbar-nav navbar-right  ml-auto">
    <li class="nav-item {{ (Request::is('/') || Request::is('home') ? 'active' : '') }} ">
        <a class="nav-link" href="{{ route('website.home.index') }}"> Home</a>
    </li>
    <li class="nav-item hidden-sm {{ (Request::is('planos') ? 'active' : '') }}">
        <a class="nav-link" href="{{ route('website.plans.index') }}">Planos</a>
    </li>
    <li class="nav-item hidden-sm {{ (Request::is('contato') ? 'active' : '') }}">
        <a class="nav-link" href="{{ route('website.contact.index') }}">Contato</a>
    </li>
    <li class="nav-item hidden-sm {{ (Request::is('sobre') ? 'active' : '') }}">
        <a class="nav-link" href="{{ route('website.about.index') }}">Sobre</a>
    </li>
    <li class="nav-item hidden-sm {{ (Request::is('ajuda') ? 'active' : '') }}">
        <a class="nav-link" href="{{ route('website.help.index') }}">Ajuda</a>
    </li>
    {{--based on anyone login or not display menu items--}}
    @if(Auth::guest())
        <li><a href="{{ URL::to('login') }}">Log In</a>
        </li>
        <li><a href="{{ URL::to('register') }}">Sign Up</a>
        </li>
    @else
        <li {{ (Request::is('my-account') ? 'class=active' : '') }}><a href="{{ URL::to('my-account') }}">My
                Account</a>
        </li>
        <li><a href="{{ URL::to('logout') }}">Logout</a>
        </li>
    @endif
</ul>