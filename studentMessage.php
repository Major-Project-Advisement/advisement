<?php 

include_once 'includes/config.php';

session_start(); //start session

if(isset($_POST['submit'])){	
    foreach($_POST as $key => $value){
        $$key = $value;
        $_SESSION[$key] = $value; //SESSION
        echo $value;
        echo $_SESSION[$key];
    }

    //Select to get AdvisorID from Student table
    $sqlAdvisor = "SELECT AdvisorID FROM student WHERE StudentID=?";
    
    mysqli_stmt_bind_param($stmt, "s", $UID);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if($row = mysqli_fetch_assoc($result)){
        //Check to see if AdvisorID is null
        if($row['AdvisorID']==0 OR $row['AdvisorID']==null){
            //No Advisor
        }else{
            //Advisor is present, insert data into the database
            $sql = "INSERT INTO message (StudentID, Subject, Content, SentOn, AdvisorID)
            VALUES ($UID, '$subject', '$message', STR_TO_DATE('$date', '%m/%d/%Y'), $AdvisorID)";
        
            
            try{
                $stmt = mysqli_stmt_init($conn);
        
                mysqli_stmt_prepare($stmt, $sql);
                mysqli_stmt_execute($stmt);
                
                
            }catch(\Throwable $th){
                echo $th;
            }
        }
    }

    session_destroy(); //end session

}else{
    echo "Nahhh, it skipped it fam!";
    header("Location: studentLogin.php");
    exit();
}


?>