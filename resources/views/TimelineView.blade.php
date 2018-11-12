{{--@extends('layouts.app')--}}

<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<body>
@extends('layouts.app')
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
        <a href="/">
            {{ Auth::user()->name }}'s Timeline
        </a>
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



<h1>All Tweets</h1>
    <form method="post" action="/timeline">
        {{ csrf_field() }}
        <div>Tweet</div>
        <input type="text" name="tweet">
        <br>
        <input type="submit" value="Submit">
    </form>

{{--配列を変数に入れループで回す--}}

<h3>{{ $user }}</h3>
<h3>{{ $msg }}</h3>
</body>
</html>