<!DOCTYPE html>
<html>
<head>
    <title>U-Shop @ MSU - Order Page</title>
</head>
<body>
    <h2>Welcome to U-Shop @ MSU</h2>

    <?php  
    $buyer_name = $mobile = $state = $payment = "";
    $qty_twisties = $qty_cadbury = $qty_nutchoco = $qty_cloud9 = 0;

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $buyer_name   = $_POST['buyer_name'] ?? '';
        $mobile       = $_POST['mobile'] ?? '';
        $state        = $_POST['state'] ?? '';
        $payment      = $_POST['payment'] ?? '';
        $qty_twisties = (int) ($_POST['qty_twisties'] ?? 0);
        $qty_cadbury  = (int) ($_POST['qty_cadbury'] ?? 0);
        $qty_nutchoco = (int) ($_POST['qty_nutchoco'] ?? 0);
        $qty_cloud9   = (int) ($_POST['qty_cloud9'] ?? 0);
    }
    ?>

    <form action="confirm.php" method="post">
        <table>
            <tr>
                <td><label>Buyer’s Name</label></td>
                <td><input type="text" name="buyer_name" required value="<?= htmlspecialchars($buyer_name) ?>"></td>
            </tr>
            <tr>
                <td><label>Mobile Number</label></td>
                <td><input type="text" name="mobile" pattern="[0-9]{10,12}" required value="<?= htmlspecialchars($mobile) ?>"></td>
            </tr>
            <tr>
                <td><label>State</label></td>
                <td><input type="text" name="state" value="<?= htmlspecialchars($state) ?>"></td>
            </tr>           
        </table>   
        <br>
        <table border="1" cellpadding="5">
            <tr><th>Product Name</th><th>Price</th><th>Quantity</th></tr>
            <tr>
                <td>Twisties</td>
                <td>3.00</td>
                <td><input type="number" name="qty_twisties" min="0" value="<?= $qty_twisties ?>"></td>
            </tr>
            <tr>
                <td>Cadbury’s Chocolate</td>
                <td>3.50</td>
                <td><input type="number" name="qty_cadbury" min="0" value="<?= $qty_cadbury ?>"></td>
            </tr>
            <tr>
                <td>Cadbury’s Nut Chocolate</td>
                <td>4.50</td>
                <td><input type="number" name="qty_nutchoco" min="0" value="<?= $qty_nutchoco ?>"></td>
            </tr>
            <tr>
                <td>Cloud 9</td>
                <td>0.30</td>
                <td><input type="number" name="qty_cloud9" min="0" value="<?= $qty_cloud9 ?>"></td>
            </tr>
        </table><br>

        <label>Payment Method:</label><br>
        <input type="radio" name="payment" value="Cash" <?= ($payment === "Cash") ? "checked" : "" ?>> Cash<br>
        <input type="radio" name="payment" value="Visa" <?= ($payment === "Visa") ? "checked" : "" ?>> Visa<br>
        <input type="radio" name="payment" value="Master Card" <?= ($payment === "Master Card") ? "checked" : "" ?>> Master Card<br><br>

        <button type="submit">Submit Order</button>
        <button type="reset">Cancel Order</button>
    </form>
</body>
</html>
