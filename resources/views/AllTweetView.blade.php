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
    <form method="post" action="/AllTweet">
        {{ csrf_field() }}
        <div>Tweet</div>
        <input type="text" name="tweet">
        <br>
        <input type="submit" value="Submit">
    </form>

{{--<h3>{{ $user->name }}</h3>--}}
{{--<h3>{{ $tweets[0] }}</h3>--}}

@foreach($tweets as $tweet)
    <h3>{{ $tweet["name"] }}: {{ $tweet["tweet"] }} {{ $tweet["updated_at"] }}
@endforeach

</body>
</html>