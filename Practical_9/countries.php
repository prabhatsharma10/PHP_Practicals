<!DOCTYPE html>
<html lang="en">
<head>
    <script>
        function show(str)
        {
            if(str.length==0)
            {
                document.getElementById('ss').innerHTML=" ";
                return;
            }
            else
            {
                var x=new XMLHttpRequest();
                x.onreadystatechange=function()
                {
                    if(x.readyState==4 && x.status==200)
                    {
                        document.getElementById('ss').innerHTML=this.responseText;
                    }
                }
                x.open("GET","state.php?q="+str,true);
                x.send();
            }
        }
    </script>
</head>


<?php
$con=mysqli_connect("localhost","root","","db1");
$sql="select * from tbl_countries";
$result=mysqli_query($con,$sql);
?>
<body>
<form><select name='country' onchange='show(this.value)'>
<option value='Select'>Select Country</option>
<?php
while($r=mysqli_fetch_assoc($result))
{
  $id=$r['id'];
  echo "<option value=".$id.">".$r['name']."</option>";
}
echo "</select></form>";

?>  
    
<p id="ss"></p>
</body>
</html>