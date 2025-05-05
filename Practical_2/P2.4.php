<html>
    <body>
        <?php
        $month1 = 5;        
        function dayinmonth($month){
            $day = array(1=>31,2=>28,3=>31,4=>30,5=>31,6=>30,7=>31,8=>31,9=>30,10=>31,11=>30,12=>31);
            if($month < 1 || $month > 12){
                echo "Enter valid Month";
            }
            else{
                echo "number of days  in month : $day[$month]";
            }
        }
        dayinmonth($month1);
        ?>
    </body>
</html>