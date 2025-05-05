<?php
session_start();
if (!isset($_SESSION['enrollment'])) {
    header("Location: login.php");
    exit;
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Welcome</title>
</head>

<body>
    <h2>Welcome, <?php echo $_SESSION['name']; ?></h2>
    <p><a href="Change_password.php">Change Password</a></p>
    <p><a href="logout.php">Logout</a></p>
</body>

</html>