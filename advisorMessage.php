<?php 

include_once 'includes/config.php';
Session_start(); //start session

if(isset($_SESSION['AdvisorID'])){	
    foreach($_SESSION as $key => $value){
        $$key = $value;
        $_SESSION[$key] = $value; //SESSION
        
    }

    if(isset($_POST['message'])){
        foreach($_POST as $key => $value){	//create local  AND SESSION variables based on $_POST keys and values
            $$key = $value; //local
            $_SESSION[$key] = $value; //SESSION
        }

        $date = date('m/d/Y');

        $sql = "INSERT INTO message (StudentRecipient, AdvisorSender, Subject, Content, SentOn)
        VALUES ('$Recipient', '$AdvisorID', '$subject', '$message', STR_TO_DATE('$date', '%m/%d/%Y'))";

        try{
            $stmt = mysqli_stmt_init($conn);
            mysqli_stmt_prepare($stmt, $sql);
            mysqli_stmt_execute($stmt);
            
        }catch(\Throwable $th){
            echo $th;
        }
        header("Location: advisorDash.php?Message=success");

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