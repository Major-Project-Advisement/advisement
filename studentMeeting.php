<?php 

include_once 'includes/config.php';
Session_start(); //start session

if(isset($_SESSION['StudentID'])){	
    foreach($_SESSION as $key => $value){
        $$key = $value;
        $_SESSION[$key] = $value; //SESSION
        
    }

    if(isset($_POST['description'])){
        foreach($_POST as $key => $value){	//create local  AND SESSION variables based on $_POST keys and values
            $$key = $value; //local
            $_SESSION[$key] = $value; //SESSION
        }

        $sql = "INSERT INTO meeting (StudentID, AdvisorID, Topic, Date, Time, Description, Status)
        VALUES ($UID, $AdvisorID, '$topic', '$MeetingDate', '$MeetingTime', '$description', 'Status')";

        try{
            $stmt = mysqli_stmt_init($conn);
            mysqli_stmt_prepare($stmt, $sql);
            mysqli_stmt_execute($stmt);
            
        }catch(\Throwable $th){
            echo $th;
        }
        header("Location: studentDash.php?Meeting=success");

    }else{
        echo "POST Did Not Work!";
        exit();
    }
    
}else{
    echo "Session Did Not Work!";
    //header("Location: studentLogin.php?error=cantlogin");
    //exit();
}


?>