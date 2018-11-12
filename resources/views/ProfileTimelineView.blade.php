<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<body>

<!-- Authentication Links -->
@guest
    <li>
        <a href="{{ route('login') }}">{{ __('Login') }}</a>
    </li>
    <li >
        @if (Route::has('register'))
            <a href="{{ route('register') }}">{{ __('Register') }}</a>
        @endif
    </li>
@else
    <li>
        <a href="/">HOME</a>
    </li>
    <br>
    <li>
        <a href="{{ route('logout') }}" onclick="event.preventDefault();
        document.getElementById('logout-form').submit();">
            {{ __('Logout') }}
        </a>
        <form action="{{ route('logout') }}" method="POST">
            @csrf
        </form>
    </li>
@endguest

<br>
<h1>ProfileTimeline</h1>
<h2>Timeline here..</h2>
<h3>back button here</h3>
</body>
</html>