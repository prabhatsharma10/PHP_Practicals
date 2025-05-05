<?php
$a = array(2,6,1,0,8,3,4);
$b = array('a'=>1,'d'=>4,'e'=>5,'f'=>0,'b'=>2,'c'=>3);
echo "8 present at ".array_search(8,$a)." index";
echo "<br>";
echo "4 present at ".array_search(4,$b)." key";
?>