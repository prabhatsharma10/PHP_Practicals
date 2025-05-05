<?php
$servername="localhost";
$username="root";
$password="";
$conn= mysqli_connect($servername,$username,$password);
if(!$conn){
    echo"not connected with mysql database becuase of ".mysqli_connect_error();
}
else{
    echo "successfully connected to mysql ";
}
?>