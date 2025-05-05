<html>

<head>
    <title>Customer Table Data</title>
    <style>
        table {
            border-collapse: collapse;
            width: 50%;
            margin: 10px auto;
        }

        th,
        td {
            border: 2px solid #555;
            padding: 20px;
            text-align: center;
            background-color: antiquewhite;
        }

        th {
            background-color: #222;
            color: white;
        }

        h2 {
            text-align: center;
            color: red;
        }
    </style>
</head>

<body>
    <h2>Customer Table Records</h2>
    <?php
    include 'connection.php'; 

    $sql = "SELECT * FROM customer";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        echo "<table>
            <tr>
                <th>C_Id</th>
                <th>C_name</th>
                <th>Name_Item_purchased</th>
                <th>Review_product</th>
            </tr>";

        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>
                    <td>" . $row["c_Id"] . "</td>
                    <td>" . $row["c_name"] . "</td>
                    <td>" . $row["item_purchased"] . "</td>
                    <td>" . $row["review_product"] . "</td>
                </tr>";
        }
        echo "</table>";
    }
    else{
        echo "<p style='text-align:center; color:red;'>No records found in the Customer table.</p>";
    }
    mysqli_close($conn);
    ?>
</body>
</html>