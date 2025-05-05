<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    $a = array("a" => "red", "b" => "green", "c" => "red", "d" => "yellow");
    print_r(array_unique($a));
    ?>

</body>

</html>