{{--@extends('layouts.app')--}}

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
        <a href="/profile">
            {{ Auth::user()->name }}
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


<h1>Tweet Timeline</h1>

<h2>{{ $msg }}</h2>
    <form method="post" action="/">
        {{ csrf_field() }}
        <div>Tweet</div>
        <input type="text" name="msg">
        <br>
        <input type="submit" value="Submit">
    </form>

</body>
</html>