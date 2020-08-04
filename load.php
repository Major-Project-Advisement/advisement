<?php 
include_once 'includes/config.php';
Session_start();//continue/start session
$user='';
$type='';

    if(isset($_SESSION['UID'])){
        
        $type='student';
        $user = $_SESSION['UID'];       
    }else{
        $type='advisor';
        $user = $_SESSION['AdvisorID'];  
    }




$data = array();
if($type == 'student'){
    $sql = "SELECT * FROM events WHERE StudentID = $user";
}else{
    $sql = "SELECT * FROM events WHERE AdvisorID = $user";
}


$result = mysqli_query($conn, $sql);

while($row = mysqli_fetch_assoc($result)){
    $data[] = array(
        'id' => $row['ID'],
        'title' => $row['Title'],
        'start' => $row['Start'],
        'end' => $row['End']
    );
}

echo json_encode($data);

?>