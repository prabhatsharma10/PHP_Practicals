<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    date_default_timezone_set("Asia/Kolkata");
    $time = date("H:i:s");
    if ($time >= "00:00:00" && $time <= "11:59:59") {
        echo "<h1>Good Morning<br></h1>";
    } elseif ($time >= "12:00:00" && $time <= "17:59:59") {
        echo "<h1>Good Afternoon<br></h1>";
    } elseif ($time >= "17:00:00" && $time <= "20:59:59") {
        echo "<h1>Good Eveving<br></h1>";
    } else {
        echo "<h1>Good Night</h1>";
    }
    ?>
</body>

</html>