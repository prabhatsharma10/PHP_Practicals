<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="P2.8.php" method="post">
        Enter Rows : <input type="number" name="rows" id="rows"><br>
        Enter Columns : <input type="number" name="columns" id="columns"><br>
        <input type="submit" value="Submit"><br><br>
    </form>

    <?php
    if (isset($_POST['rows']) && isset($_POST['columns'])) {
        $rows = $_POST['rows'];
        $columns = $_POST['columns'];
        echo "<table style='padding:0; border: 1px solid black;'>";
        for($i=1; $i<=$rows; $i++){
            echo "<tr>";
            for($j=1; $j<=$columns; $j++){
                echo "<td style='padding:0; border: 1px solid black;'>Rows : ".$i.", Cols : ".$j."</td>";
            }
            echo "</tr>";
        }
        echo "</table>";
    }
    ?>
</body>
</html>