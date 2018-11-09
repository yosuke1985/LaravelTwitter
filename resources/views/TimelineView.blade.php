<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<body>
<a href="">Log out</a>
<br>

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