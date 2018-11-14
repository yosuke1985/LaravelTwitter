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
    <b>Tweet</b>
    <li>
        <a href="/AllTweet">All Tweets</a>
    </li>
    <li>
        <a href="/">
            {{ Auth::user()->name }}'s Timeline
        </a>
    </li>
    <br>
    <b>Follow</b>
    <li>
        <a href="/users">User List</a>
    </li>

    <br>
    <b>Logout</b>
    <li>
        <a href="{{ route('logout') }}" onclick="event.preventDefault();
        document.getElementById('logout-form').submit();">
            {{ __('Logout') }}
        </a>
        <form action="{{ route('logout') }}" method="POST">
            @csrf
        </form>
    </li>
    <br>
@endguest

@foreach($users as $user)
        <form method="post" action = "/follow">
            {{ csrf_field() }}
            <input type="submit" name = "aa" value="Follow"  /> {{ $user["name"] }}: {{ $user["updated_at"] }}
        </form>



@endforeach

{{--<form method="post" action="/">--}}
    {{--{{ csrf_field() }}--}}
    {{--<div>Tweet</div>--}}
    {{--<input type="text" name="tweet">--}}
    {{--<br>--}}
    {{--<input type="submit" value="Submit">--}}
{{--</form>--}}


{{--//buttonをクリックすると、ボタンをクリックしたユーザーidがfollow_user_idに入り、--}}
{{--//ボタンを押されたユーザーがfollowed_user_idのなかにユーザーidが入る。--}}

{{--//Followしていない人は上位に表示し、Followedの人は下部に表示させる。--}}

</body>
</html>