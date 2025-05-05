<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
$a = [1,3,4,5,6,7];
$b = ['b'=> 1,'c'=> 2,'a'=>3 ,'d'=>4];
$arrev1 = array_reverse($a);
$arrev2 = array_reverse($b);
$arrev3 = array_reverse($b,true);
print_r($arrev1);
echo "<br>";
print_r($arrev2);
echo "<br>";
print_r($arrev3);
?>
</body>
</html>