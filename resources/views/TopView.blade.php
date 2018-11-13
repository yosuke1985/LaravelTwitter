<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@extends('layouts.app')
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
        <a href="/AllTweet">All Tweets</a>
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

<h1>{{ $user->name }}'s Timeline </h1>
<form method="post" action="/">
    {{ csrf_field() }}
    <div>Tweet</div>
    <input type="text" name="tweet">
    <br>
    <input type="submit" value="Submit">
</form>
{{--<h3>{{ $tweets }}</h3>--}}

@foreach($tweets as $tweet)
    <h3> {{ $tweet["name"] }}:{{ $tweet["tweet"] }} {{ $tweet["updated_at"] }}
@endforeach

</body>
</html>