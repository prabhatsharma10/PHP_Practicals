<?php
//$filename="data.txt";
//$fp = fopen($filename, "r");
//$contents = fread($fp, filesize($filename));//read file
//echo "<pre>$contents</pre>";//printing data of file
//fclose($fp);//close file

//$filename="data.txt";
//$fp = fopen($filename, "r");
//echo fgets($fp,5);
//fclose($fp);//close file

$filename="data.txt";
$fp = fopen($filename, "r");
while(!feof($fp)) {
echo fgetc($fp);
}
fclose($fp);//close file
?>