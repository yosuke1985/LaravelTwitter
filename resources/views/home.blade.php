@extends('layouts.app')

@if (Auth::check())
    <p>USER: {{$user->name}}</p>
    <p>USER: {{$user->email}}</p>

    {{--<p>USER: {{$user->email}}</p>--}}
@else
    <p>ログインしておりません。(<a href = "/login">login</a>|<a href = "/register">Register</a>)</p>
@endif

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
