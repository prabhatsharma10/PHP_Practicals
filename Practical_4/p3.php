
<!DOCTYPE html>
<html>
<head>
    <title>Using $_REQUEST</title>
</head>
<body>
<form method="post" action="">
    Enter your name : <input type="text" name="username">
    <input type="submit" value="Submit">
</form>

<?php
if (isset($_REQUEST['username'])) {
    $name = htmlspecialchars($_REQUEST['username']);
    echo "<h3>Hello, $name! Welcome to our site.</h3>";
}
?>

</body>
</html>
