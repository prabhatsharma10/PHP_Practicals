<!DOCTYPE html>
<html>
<head>
    <title>Create Database</title>
</head>
<body>
    <form method="post">
        <h2>Create MySQL Database</h2>
        <input type="text" name="dbname" placeholder="Enter Database Name" required>
        <input type="submit" name="create" value="Create Database">
    </form>

    <?php
    if (isset($_POST['create'])) {
        $dbName = $_POST['dbname'];

        $servername = "localhost";
        $username = "root";
        $password = "";

        $conn = mysqli_connect($servername, $username, $password);

        if(!$conn){
            die("Connection failed : ".mysqli_connect_error());
        }

        $sql = "CREATE DATABASE IF NOT EXISTS $dbName";
        if(mysqli_query($conn, $sql)){
            echo "Database db1 created successfully.";
        }
        else{
            echo "Sorry, database creation failed ".mysqli_error($conn);
        }
        mysqli_close($conn);
    }
    ?>
</body>
</html>