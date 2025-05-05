<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
$a = array(8,2,6,1,0,8,3,4);
sort($a);
$x = array('a'=>1,'d'=>4,'e'=>5,'f'=>0,'b'=>2,'c'=>3);
sort($x);
foreach ($a as $key => $val) {
    echo "a[".$key."] = ".$val."<br>";
}
foreach ($x as $key => $val) {
    echo "x[".$key."] = ".$val."<br>";
}
?>
</body>
</html>