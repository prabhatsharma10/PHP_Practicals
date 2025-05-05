<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Practical 2.7</title>
</head>
<body>
    
<form action="" method="post">
        Enter Number : <input type="number" name="num" required>
        <input type="submit" value="submit">
    </form>

    <?php
    if (isset($_POST['num'])){
        $num = $_POST['num'];
        if($num<0){
            echo "Enter Positive number.";
            return 0;
        }
        function fibo1($num){
        $n1 = 0;
        $n2 = 1;
        echo "Fibonacci series without recursion upto $num th term : ";
        if($num < 2){
            echo "$num ";
        } 
        else{
            echo "$n1 $n2 ";
            for($i = 2; $i < $num; $i++){          
                $temp = $n1 + $n2;
                echo "$temp ";
                $n1 = $n2;
                $n2 = $temp;
            }
        }
    }
    
    $start = microtime(true);
    fibo1($num);
    $end = microtime(true);
    $t1 = $end-$start;

    function fibo2($num){
        if($num < 2){
            return $num;
        }
        else{
            return fibo2($num-1)+fibo2($num-2);
        }
    }
    echo "<br>Time with iteration : ".$t1;

    $start = microtime(true);
    echo "<br><br>Fibonacci series with recrusion upto $num th term :";
    for($i=0;$i<$num;$i++){
        echo " ".fibo2($i);
    }
    $end = microtime(true);
    $t2 = $end-$start;
    echo "<br>Time with recrusion : ".$t2;
    if($t1 < $t2){
        echo "<br><br>without recrusion is more efficient.";
    }    
    else if($t1 > $t2){
        echo "<br><br>with recrusion is more efficient.";
    }
    else{
        echo "<br><br>Both approach is efficient.";
    }
    }
    ?>
</body>
</html>