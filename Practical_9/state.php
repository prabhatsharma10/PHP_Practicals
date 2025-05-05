<!DOCTYPE html>
<html lang="en">
<head>
    <script>
        function show1(str) {
            if (str.length == 0) {
                document.getElementById('ss1').innerHTML = " ";
                return;
            } else {
                var x = new XMLHttpRequest();
                x.onreadystatechange = function() {
                    if (x.readyState == 4 && x.status == 200) {
                        document.getElementById('ss1').innerHTML = this.responseText;
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
$sql = "select * from tbl_states where country_id=$q";

$result = mysqli_query($con, $sql);
?>

<body>
    <form>
        <select name='state' onchange='show1(this.value)'>
            <option value='Select'>Select State</option>
            <?php
            while ($r = mysqli_fetch_assoc($result)) {
                $id = $r['id'];
                echo "<option value=" . $id . ">" . $r['name'] . "</option>";
            }
            ?>
        </select>
    </form>
    <p id="ss1">state</p>
</body>

</html>