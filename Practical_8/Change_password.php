<?php
include('./conn.php');
mysqli_select_db($conn,"student_db");
session_start();
if (!isset($_SESSION['enrollment'])) {
    header("Location: login.php");
    exit;
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $current_password = $_POST['current_password'];
    $new_password = password_hash(
        $_POST['new_password'],
        PASSWORD_BCRYPT
    );
    $enrollment = $_SESSION['enrollment'];
    $sql = "SELECT password FROM students WHERE enrollment='$enrollment'";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        $row = mysqli_fetch_assoc($result);
        if ($row) {
            if (password_verify($current_password, $row['password'])) {
                $update_sql = "UPDATE students SET password='$new_password'
WHERE enrollment='$enrollment'";
                if (mysqli_query($conn, $update_sql)) {
                    echo "Password changed successfully.";
                } else {
                    echo mysqli_error($conn);
                }
            } else {
                echo "Current password is incorrect.";
            }
        } else {
            echo "No student found with this enrollment number.";
        }
    } else {
        echo mysqli_error($conn);
    }
} else {
?>
    <title>Change Password</title>
    <h2>Change Password</h2>
    <form method="post">
        Current Password: <input type="password" name="current_password"
            required><br /><br />
        New Password: <input type="password" name="new_password"
            required><br /><br />
        <input type="submit" value="Change Password">
    </form>
<?php
}
?>