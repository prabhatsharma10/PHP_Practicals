<html>
<head>
    <title>Customer Feedback Form</title>
</head>
<body>
    <h2>Customer Feedback Form</h2>
    <form action="" method="post">
        <label>Customer Name : </label>
        <input type="text" name="cname" placeholder="customer name" required><br><br>

        <label>Purchased Item Name : </label>
        <input type="text" name="item" placeholder="Purchase Item" required><br><br>

        <label>Review of Product : </label>
        <select name="review" required>
            <option value="none">--select--</option>
            <option value="1">1(Very bad)</option>
            <option value="2">2(Bad)</option>
            <option value="3">3(Good)</option>
            <option value="4">4(Very Good)</option>
            <option value="5">5(Excellent)</option>
        </select><br><br>

        <input type="submit" name="submit" value="submit feedback">
    </form>
    <?php
    if (isset($_POST['submit'])) {
        $cname = $_POST['cname'];
        $item = $_POST['item'];
        $review = $_POST['review'];

        include 'connection.php';

        if (!$conn) {
            echo "Not connected with mysql database becuase of " . mysqli_connect_error();
        }
        $sql = "INSERT INTO customer(c_name , item_purchased, review_product) VALUES ('$cname','$item','$review')";
        if (mysqli_query($conn, $sql)) {
            echo "<p style='color:green;'>Feedback submitted successfully!</p>";
        } else {
            echo "<p style='color:red;'>Error: " . $sql . "<br>" . mysqli_error($conn) . "</p>";;
        }
    }
    ?>
</body>
</html>