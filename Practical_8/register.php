<?php
include('./conn.php');
mysqli_select_db($conn,"student_db");
$sql = "CREATE TABLE if not exists students(id INT AUTO_INCREMENT PRIMARY KEY, enrollment VARCHAR(15) , name VARCHAR(100) ,branch VARCHAR(100) ,password VARCHAR(255) ,photo VARCHAR(255) )";
$res = mysqli_query($conn, $sql);
if (!$res) {
    die("Connection failed : ".mysqli_connect_error());
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $enrollment = $_POST['enrollment'];
    $name = $_POST['name'];
    $branch = $_POST['branch'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
    $photo = $_FILES['photo']['name'];
    $target = "uploads/" . basename($photo);
    $sql = "INSERT INTO students (enrollment, name, branch, password, photo) VALUES ('$enrollment', '$name', '$branch', '$password', '$photo')";
    if (mysqli_query($conn, $sql)) {
        if (move_uploaded_file($_FILES['photo']['tmp_name'], $target)) {
            echo "Registration successful.";
            header('Refresh: 10; url = ./Login.php');
            echo "<br />Redirecting to login page in 5 seconds...";
        } else {
            echo "Failed to upload photo.";
        }
    } else {
        echo "Error";
    }
} else {
?>
    <title>Student Registration</title>
    <h2>Student Registration</h2>
    <form method="post" enctype="multipart/form-data">
        Enrollment : <input type="text" name="enrollment" required><br /><br />
        Name : <input type="text" name="name" required><br /><br />
        Branch : <input type="text" name="branch" required><br /><br />
        Password : <input type="password" name="password" required><br /><br />
        Photo : <input type="file" name="photo" required><br /><br />
        <input type="submit" value="Register">
    </form>
<?php
}
?>