<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<body>
@if ($msg != "")
<h1>Register {{$msg}}</h1>
    @else
<h1>Register</h1>
@endif
<form method="post" action="/register">
    {{ csrf_field() }}
    <div class="form-item">NickName</div>
    <input type="text" name="name">
    <div class="form-item">Email</div>
    <input type="text" name="email">
    <div class="form-item">Password</div>
    <input type="text" name="name">
    <div class="form-item">message</div>
    <input type="text" name="msg">
    <br>
    <input type="submit" value="Submit">
</form>
<br>

<a href="/login">Login page</a>
</body>
</html>