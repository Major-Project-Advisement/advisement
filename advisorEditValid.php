<?php 

include_once 'includes/config.php';
	session_start(); //start session


	if(isset($_POST['editSubmit'])){

		
		foreach($_POST as $key => $value)	//create local  AND SESSION variables based on $_POST keys and values
		{
			$$key = $value;
			$_SESSION[$key] = $value; //SESSION
		}

		//reset error variable
		$_SESSION['error']="";

		//set error flag
		$errFlag = 0;
		$_SESSION['errFlag']=0;



		//validation
		if($column == 'FirstName' || $column == 'LastNname'){//name validation
			if(!preg_match("/^[a-z ,.'-]+$/i",$newval)){
				$_SESSION['error']="Please enter valid name";
				$errFlag = 1;
				$_SESSION['errFlag']=1;
			}else{
				$newval = ucfirst($newval);
			}
		}else if($column == 'Phone'){
			if(!is_numeric($newval)){
                $_SESSION['error']="Please enter a valid number";
                $errFlag = 1;
                $_SESSION['errFlag']=1;
			}
		}else if($column == 'Email'){
			if (!filter_var($newval, FILTER_VALIDATE_EMAIL)){
                $_SESSION['error']="Please enter a valid email address";
                $errFlag = 1;
                $_SESSION['errFlag']=1;
		    }
		}else{
			$errFlag ==1;
			$_SESSION['error']="unknown error";
		}

		//check for errors
		if($errFlag == 1 ){
			header("Location: advisorEdit.php?name=$attribute&edit=$column&current=$preval");
		}else{
			$AdvisorID = $_SESSION['AdvisorID'];
			$_SESSION[$column] = $newval;
			$sql = "UPDATE advisor SET $column = '$newval' WHERE AdvisorID = $AdvisorID";
		
			mysqli_query($conn, $sql);

			header("Location: advisorUpdate.php");
		}
		
	}


	?>