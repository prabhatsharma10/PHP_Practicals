<?php
include('./conn.php');
mysqli_select_db($conn, "student_db");
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $enrollment = $_POST['enrollment'];
    $password = $_POST['password']; 
    $sql = "SELECT * FROM students WHERE enrollment='$enrollment'";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        if (mysqli_num_rows($result) == 1) {
            $row = mysqli_fetch_assoc($result);
            if (password_verify($password, $row['password'])){
                $_SESSION['enrollment'] = $row['enrollment'];
                $_SESSION['name'] = $row['name'];
                header("Location: ./welcome.php");              
            }
            else {
                echo "Invalid password.";
            }
        }
        else {
            echo "No user found with this enrollment number.";
        }
    } 
    else {
        echo mysqli_error($conn);
    }
}
 else {
?>
    <title>Student Login</title>
    <h2>Student Login</h2>
    <?php
    if (isset($error)) {
        echo "<p>$error</p>";
    }
    ?>
    <form method="POST">
        Enrollment : <input type="text" name="enrollment" required><br /><br />
        Password : <input type="password" name="password" required><br /><br />
        <input type="submit" value="Login">
    </form>
<?php
}
?>