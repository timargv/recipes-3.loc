<ul class="navbar-nav mr-auto">
    <li class="nav-item">
        <a class="nav-link" href="">{{ __('menu.Recipes') }}</a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="">{{ __('menu.Ingredients') }}</a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="">{{ __('menu.People') }}</a>
    </li>

    @auth
        @if(Auth::user()->isAdmin())
        <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.home') }}">{{ __('menu.Dashboard') }}</a>
        </li>
        @endif
    @endauth
</ul>
