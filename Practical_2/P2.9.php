<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="P2.9.php" method="post">
        Enter number : <input type="number" name="num">
        <input type="submit" value="Submit">
    </form>

    <?php

    function printTable($num){
        for ($i = 1; $i <= 10; $i++){
            $res = $num * $i;
            echo $num."X".$i."=".$res."<br>";
            }
        }
if (isset($_POST['num'])){
    $n = $_POST['num'];
    printTable($n);
}
    ?>
</body>

</html>