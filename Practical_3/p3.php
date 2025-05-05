<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
$a = [1,2,3,4];
$b = [5,6,7,8];
$x = ['a'=>1,'b'=>2,'c'=>3];
$y = ['d'=>4,'e'=>5,'f'=>6];
print_r(array_merge($a,$b));
echo "<br>";
print_r(array_merge($x,$y));
?>
</body>
</html>