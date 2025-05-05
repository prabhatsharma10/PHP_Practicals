<?php
$prices = [
    'Twisties' => 3.00,
    'Cadbury' => 3.50,
    'NutChoco' => 4.50,
    'Cloud9' => 0.30
];

$name     = htmlspecialchars($_POST['buyer_name']);
$mobile   = htmlspecialchars($_POST['mobile']);
$state    = htmlspecialchars($_POST['state']);
$payment  = htmlspecialchars($_POST['payment']);

$qty_twisties = (int)$_POST['qty_twisties'];
$qty_cadbury = (int)$_POST['qty_cadbury'];
$qty_nutchoco = (int)$_POST['qty_nutchoco'];
$qty_cloud9 = (int)$_POST['qty_cloud9'];

$total = 0;
$items = [];

if ($qty_twisties > 0) {
    $amount = $qty_twisties * $prices['Twisties'];
    $items[] = ["Twisties", $qty_twisties, $amount];
    $total += $amount;
}
if ($qty_cadbury > 0) {
    $amount = $qty_cadbury * $prices['Cadbury'];
    $items[] = ["Cadbury’s Chocolate", $qty_cadbury, $amount];
    $total += $amount;
}
if ($qty_nutchoco > 0) {
    $amount = $qty_nutchoco * $prices['NutChoco'];
    $items[] = ["Cadbury’s Nut Chocolate", $qty_nutchoco, $amount];
    $total += $amount;
}
if ($qty_cloud9 > 0) {
    $amount = $qty_cloud9 * $prices['Cloud9'];
    $items[] = ["Cloud 9", $qty_cloud9, $amount];
    $total += $amount;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Order Confirmation</title>
</head>
<body>
    <h2>Order Confirmation</h2>
    <p><strong>Buyer's Name :</strong> <?= $name ?></p>
    <p><strong>Mobile Number :</strong> <?= $mobile ?></p>
    <p><strong>State :</strong> <?= $state ?></p>
    <p><strong>Payment Method :</strong> <?= $payment ?></p>

    <h3>Order Summary :</h3>
    <?php if (count($items) > 0): ?>
    <table border="1" cellpadding="5">
        <tr><th>Product</th><th>Quantity</th><th>Total</th></tr>
        <?php foreach ($items as $item): ?>
            <tr>
                <td><?= $item[0] ?></td>
                <td><?= $item[1] ?></td>
                <td><?= number_format($item[2], 2) ?></td>
            </tr>
        <?php endforeach; ?>
        <tr>
            <td colspan="2"><strong>Grand Total</strong></td>
            <td><strong><?= number_format($total, 2) ?></strong></td>
        </tr>
    </table>
    <?php else: ?>
        <p>No items ordered.</p>
    <?php endif; ?>
</body>
</html>
