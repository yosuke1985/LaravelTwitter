<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<body>
<h1>Login</h1>
<form method="post" action="sent.php">
    <div class="form-item">Email</div>
    <input type="text" name="email">
    <div class="form-item">Password</div>
    <input type="text" name="name">
    <br>
    <input type="submit" value="Submit">
</form>

<br>
<a href="/register">back</a>
</body>
</html>