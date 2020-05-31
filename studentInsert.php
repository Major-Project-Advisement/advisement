<?php

$host="localhost";
$dbUsername ="root";
$dbpassword = "pwdpwd";
$dbName = "testdb";
$conn = mysqli_connect($host, $dbUsername, $dbpassword, $dbName);

if ($conn->connect_error) {
    die("Database connection failed: " . $conn->connect_error);
}


if(isset($_POST['submit'])){
    echo "Tested and worked";
    $id = $_POST['UID'];
    $title = $_POST['title'];
    $firstName = $_POST['fname'];
    $lastName = $_POST['lname'];
    $school = $_POST['school'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $hashedpwd = password_hash($password, PASSWORD_DEFAULT);

    $INSERT = "INSERT into student (StudentID, Title, FirstName, LastName, School, Email, Pass, PassHash) 
    values ('$id', '$title', '$firstName', '$lastName', '$school', '$email', '$password', '$hashedpwd')";

    if (!mysqli_query($conn, $INSERT)) {
        die('An error occurred when submitting your student.');
    } else {
    echo "Thanks for your review.";
    header("Location:http://localhost/Major%20Project/advisement/studentLogin.php");
    }

    echo "Multiform thing";

}


//ALTER TABLE vendors
//ADD COLUMN phone VARCHAR(15) AFTER name;
//$SELECT = "SELECT email FROM student Where email = ? Limit 1";

//Prepare statement
//$stmt = $conn->prepare($SELECT);
//$stmt->bind_param("s", $email);
//$stmt->execute();
//$stmt->bind_result($email);
//$stmt->store_result();
//$rnum = $stmt->num_rows;

//if($rnum == 0){

//   $stmt->close();
//
//    $stmt = $conn->prepare($INSERT);
//    $stmt->bind_param("issss", $id, $firstName, $lastName, $email, $password);
//    $stmt->execute();
//    echo "New record inserted";
//}

//$stmt->close();
//$conn->close();












?>