<?php 
    include_once 'includes/config.php';
    Session_start();//continue/start session

    if(isset($_POST['submit'])){
        foreach($_POST as $key => $value){	//create local  AND SESSION variables based on $_POST keys and values
            $$key = $value; //local
            $_SESSION[$key] = $value; //SESSION
        }

        if(empty($UID) || empty($password)){//if fields are empty
            header("Location: adminLogin.php?error=emptyfields");
            exit();
        }
        else{
            $sql = "SELECT * FROM admin WHERE EmployeeID='".$UID."'"; //sql statement with ? placeholder 

            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_assoc($result);

            if($password == $row['Password']){
                session_destroy();
                session_start();
        
                foreach($row as $key => $value){							
                    $_SESSION[$key] = $value; //SESSION
                }

                header("Location: adminDash.php?login=success");
            }else{      
                header("Location: adminLogin.php?error=wronginfo");
            } 
            
        }
    }else{
        echo "Sad Life";
        var_dump($sql);
    }

?>