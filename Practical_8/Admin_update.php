<?php
include('./conn.php');
mysqli_select_db($conn, "student_db");
if (isset($_GET['enrollment'])) {
    $enrollment = $_GET['enrollment'];
    $sql = "SELECT * FROM students WHERE enrollment='$enrollment'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $name = $row['name'];
    $branch = $row['branch'];
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $newName = $_POST['name'];
        $newBranch = $_POST['branch'];
        $sql = "UPDATE students SET name='$newName', branch='$newBranch'
WHERE enrollment='$enrollment'";
        if (mysqli_query($conn, $sql)) {
            echo "Record updated successfully";
            header('Location: admin_dashboard.php');
        } else {
            echo "Error updating record: " . mysqli_error($conn);
        }
    }
} 
else {
    header('Location: admin_dashboard.php');
}
?>
<title>Update Student</title>
<h2>Update Student</h2>
<form method="POST">
    Name: <input type="text" name="name" value="<?php echo $name; ?>"
        required><br /><br />
    Branch: <input type="text" name="branch" value="<?php echo $branch; ?>"
        required><br /><br />
    <input type="submit" value="Update">
</form>