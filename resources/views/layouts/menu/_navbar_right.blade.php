<ul class="navbar-nav ml-auto">
    <!-- Authentication Links -->
    @guest
    <li class="nav-item">
        <a class="nav-link" href="{{ route('login') }}">{{ __('auth.LoginIn') }}</a>
    </li>
    @if (Route::has('register'))
        <li class="nav-item">
            <a class="nav-link" href="{{ route('register') }}">{{ __('auth.Register') }}</a>
        </li>
    @endif
    @else
        <li class="nav-item">
            <a class="nav-link d-flex px-md-2" href="" data-toggle="tooltip" data-placement="bottom" title="{{ __('menu.Feed') }}">
                <i class="fa fa-cutlery align-content-center"></i>
                <span class="d-inline-flex d-md-none pl-2 ml-1 align-content-center">{{ __('menu.Feed') }}</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link d-flex px-md-2" href="" data-toggle="tooltip" data-placement="bottom" title="{{ __('menu.Like') }}">
                <i class="fa fa-heart-o align-content-center"></i>
                <span class="d-flex d-md-none pl-2 align-content-center">{{ __('menu.Like') }}</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link d-inline-flex px-md-2" href="" data-toggle="tooltip" data-placement="bottom" title="{{ __('menu.Notifications') }}">
                <i class="fa fa-bell-o align-content-center"></i>
                <span class="d-inline-flex d-md-none pl-2 align-content-center">{{ __('menu.Notifications') }}</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link d-inline-flex px-md-2" href="" data-toggle="tooltip" data-placement="bottom" title="{{ __('menu.Profile') }}">
                <i class="fa fa-home align-content-center d-md-none"></i>
                <span class="d-inline-flex pl-2 align-content-center">{{ Auth::user()->name }}</span>
            </a>
        </li>




        {{--<li class="nav-item dropdown ml-md-3">--}}
            {{--<a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>--}}
                {{--{{ Auth::user()->name }} <span class="caret"></span>--}}
            {{--</a>--}}

            {{--<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">--}}
                {{--<a class="dropdown-item" href="{{ route('logout') }}"--}}
                   {{--onclick="event.preventDefault();--}}
                                                     {{--document.getElementById('logout-form').submit();">--}}
                    {{--{{ __('auth.LogoUt') }}--}}
                {{--</a>--}}

                {{--<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">--}}
                    {{--@csrf--}}
                {{--</form>--}}
            {{--</div>--}}
        {{--</li>--}}
        @endguest
</ul>