<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="P2.6.php" method="POST">
        Start : <input type="number" name="start" required><br>
        End : <input type="number" name="end" required><br>
        <input type="submit">
    </form>
    <?php
     
    function checkPrime($num){
        $prime = true;
        if($num < 2){
            $prime = false;
            return $prime;
        }  
        for($i=2;$i<$num;$i++){
            if($num % $i == 0){
                $prime = false;
                break;
            }
        }
        return $prime;           
    }

    $start = $_POST['start'];
    $end = $_POST['end'];
    echo "<b>Prime Number between $start and $end : <b>";
    for($i = $start; $i < $end; $i++){
        if(checkPrime($i)){
            echo "$i ";
        }
    }
    ?>
</body>
</html>