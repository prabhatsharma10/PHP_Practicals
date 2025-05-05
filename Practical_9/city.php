<!DOCTYPE html>
<html lang="en">

<head>
    <script>
        function show2(str) {
            if (str.length == 0) {
                document.getElementById('ss3').innerHTML = " ";
                return;
            } else {
                var x = new XMLHttpRequest();
                x.onreadystatechange = function() {
                    if (x.readyState == 4 && x.status == 200) {
                        document.getElementById('ss3').innerHTML = this.responseText;
                    }
                }
                x.open("GET", "city.php?q=" + str, true);
                x.send();
            }
        }
    </script>
</head>

<?php
$q = $_REQUEST["q"];
$con = mysqli_connect("localhost", "root","", "db1");
$sql = "select * from tbl_cities where state_id=$q";

$result = mysqli_query($con, $sql);
?>

<body>
    <form>
        <select name='city' onchange='show2(this.value)'>
            <option value='Select'>Select City</option>

            <?php
            while ($r = mysqli_fetch_assoc($result)) {
                $id = $r['id'];
                echo "<option value=" . $id . ">" . $r['name'] . "</option>";
            }
            echo "</select></form>";
            ?>

            <p id="ss3">city</p>
</body>

</html>