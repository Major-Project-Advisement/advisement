<?php

    $dbhost = "localhost";
    $dbuser = "root";
    $dbpass = "Password444";
    $db = "Advisement";

    $conn = mysqli_connect($dbhost, $dbuser, $dbpass,$db) or die("Connecttion DAMN WELL failed: %s\n". $conn -> error);

    if(!$conn){
        echo 'Connection Error: ' . mysqli_connect_error();
    }else{
        echo 'Okayyyyyy, it worked I guess. WOOOOOOOOOOOW';
    }


    session_start(); //start session

    if(isset($_POST['UID'])){
        foreach($_POST as $key => $value){	//create local  AND SESSION variables based on $_POST keys and values
            $$key = $value;
            $_SESSION[$key] = $value; //SESSION
        }
        
        //hash password
        $hashedpwd = password_hash($password, PASSWORD_DEFAULT);

        //get current date
        $date = date('m/d/Y');

        //handle uploaded image
        if(isset($_FILES['img'])){
            $file = $_FILES['img'];
            $fileName = $_FILES['img']['name'];
            $fileTmpName = $_FILES['img']['tmp_name'];
            $fileSize = $_FILES['img']['size'];
            $fileError = $_FILES['img']['error'];
            $fileType = $_FILES['img']['type'];
        
            $fileExt = explode('.',$fileName);
            $fileActualExt = strtolower(end($fileExt));
        
            //create unique file name
            $fileNameNew = uniqid('', true).".".$fileActualExt;
        
            //store image
            $fileDestination = 'uploads/'.$fileNameNew;
            move_uploaded_file($fileTmpName, $fileDestination); 
        } 
        else 
        {
            $fileNameNew = "null";
        }

        //insert data into database
        $sql = "INSERT INTO student (studentID, Title, FirstName, LastName, School, Email, CreatedOn, Phone, HashPassword, Photo)
        VALUES ($UID, '$title', '$fname', '$lname', '$school', '$email', STR_TO_DATE('$date', '%m/%d/%Y'), $phone, '$hashedpwd', '$fileNameNew' )";

        
        try {
            //code...
            $stmt = mysqli_stmt_init($conn);

            mysqli_stmt_prepare($stmt, $sql);
            mysqli_stmt_execute($stmt);
            echo "It worked I guess";
            
            
        } catch (\Throwable $th) {
            //throw $th;
            echo $th;
        }
        session_destroy(); //end session
        // header("Location: studentLogin.php");
    }


?>