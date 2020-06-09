<!DOCTYPE html>
    <html>
    <head>
    <style>
    </style>
    </head>
    <body>
        <?php
            include_once 'includes/config.php';

            mysqli_select_db($con,"advisement");
            $sql="SELECT * FROM `module` WHERE 1=1 AND (`moduleCode` = 'ANI1001')";
            $result = mysqli_query($con, $sql);

            if(mysqli_num_row($result) > 0){
                while($row = mysqli_fetch_assoc($result)) {
                    echo "<option>" . $row['name'] . "</option>";
                }
            }else{
                echo "Well, it didnt work";
            }
                
            mysqli_close($con);
        ?>
    </body>
</html> 