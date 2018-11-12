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
<h1>TimelineView</h1>
<form method="post" action="sent.php">
    <div class="form-item">Tweet</div>
    <input type="text" name="tweet">
    <br>
    <input type="submit" value="Submit">
</form>


<h2>Timeline here..</h2>
</body>
</html>