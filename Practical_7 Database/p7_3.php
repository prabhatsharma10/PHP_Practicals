<!DOCTYPE html>
<html>
<head>
    <title>Create Customer Table</title>
</head>
<body>
    <form method="post">
        <h2>Create Customer Table</h2>
        <label>Enter Table Name : </label>
        <input type="text" name="tblname" required><br><br>
        <input type="submit" name="submit" value="Click to create table"><br><br>
    </form>
    <?php
    if (isset($_POST['submit'])) {
        $tableName = $_POST['tblname'];
        include 'connection.php'; 
       
        $sql = "CREATE TABLE `$tableName`(c_Id INT AUTO_INCREMENT PRIMARY KEY, c_name VARCHAR(100) NOT NULL, item_purchased VARCHAR(100), review_product INT)";
       
        if(mysqli_query($conn,$sql)){
            echo "<div style='color:green;'>Customer table created successfully ".$tableName." with fields C_Id,C_name, Name_Item_purchased and review_product.</div>";
        } 
        else{
            echo "<div style='color:red;'>Could not create table : </div>".mysqli_error($conn);
        }
        mysqli_close($conn);
    }
    ?>

</body>

</html>