<?php
include('./conn.php');
mysqli_select_db($conn, "student_db");
if (isset($_GET['delete'])) {
    $enrollment = $_GET['delete'];
    $sql = "DELETE FROM students WHERE enrollment='$enrollment'";
    if (mysqli_query($conn, $sql)) {
        echo "Record deleted successfully";
    } else {
        echo "Error deleting record ";
    }
}
$search = '';
if (isset($_POST['search'])) {
    $search = $_POST['search'];
}
$sql = "SELECT * FROM students WHERE name LIKE '%$search%' ORDER BY
enrollment";
$result = mysqli_query($conn, $sql);
?>
<!DOCTYPE html>
<html>

<head>
    <title>Admin Dashboard</title>
</head>

<body>
    <h2>Welcome, Admin!</h2>
    <form method="POST">
        Search by Name: <input type="text" name="search" value="<?php echo
                                                                $search; ?>">
        <input type="submit" value="Search"><br /><br />
    </form>
    <table border="1">
        <tr>
            <th>Enrollment</th>
            <th>Name</th>
            <th>Branch</th>
            <th>Photo</th>
            <th>Action</th>
        </tr>
        <?php
        if ($result) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>
<td>{$row['enrollment']}</td>
<td>{$row['name']}</td>
<td>{$row['branch']}</td>
<td><img src='{$row['photo']}' width='50' height='50'></td>
<td>
<a
href='admin_update.php?enrollment={$row['enrollment']}'>Update</a>
<a
href='admin_dashboard.php?delete={$row['enrollment']}'>Delete</a>
</td>
</tr>";
            }
        } else {
            echo "<tr><td colspan='5'>No records found</td></tr>";
        }
        ?>
    </table>
</body>

</html>