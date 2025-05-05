<?php
$a = [1,3,4,5,6,7];
$b = ['a'=> 1,'b'=> 2,'c'=>3 ,'d'=>4];
echo "Maximum is :".max($a).'<br>';
echo "Minimum is :".min($a)."<br>";
echo "Maximum is :".max(array_values($b))."<br>";
echo "Minimum is :".min(array_values($b));
?>