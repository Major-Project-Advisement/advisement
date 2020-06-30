<?php 

include_once 'includes/config.php';
Session_start(); //start session

if(isset($_SESSION['StudentID'])){	
    foreach($_SESSION as $key => $value){
        $$key = $value;
        $_SESSION[$key] = $value; //SESSION
        
    }

    if(isset($_POST['message'])){
        foreach($_POST as $key => $value){	//create local  AND SESSION variables based on $_POST keys and values
            $$key = $value; //local
            $_SESSION[$key] = $value; //SESSION
        }

        $sql = "INSERT INTO message (StudentID, Subject, Content, SentOn, AdvisorID)
        VALUES ($UID, '$subject', '$message', STR_TO_DATE(now(), '%m/%d/%Y'), $AdvisorID)";

        try{
            $stmt = mysqli_stmt_init($conn);
            mysqli_stmt_prepare($stmt, $sql);
            mysqli_stmt_execute($stmt);
            
        }catch(\Throwable $th){
            echo $th;
        }
        //header("Location: studentDash.php");

    }else{
        echo "POST Did Not Work!";
        exit();
    }
    
    session_destroy(); //end session
}else{
    echo "Session Did Not Work!";
    //header("Location: studentLogin.php?error=cantlogin");
    //exit();
}


?>