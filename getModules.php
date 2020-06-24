<?php 
 
 include_once "includes/config.php";

 if(isset($_POST["userId"]))
 {
   $uid = (int)$_POST["userId"];

   $sql = "SELECT * FROM module LIMIT 10";

  
   $result = mysqli_query($conn, $sql);
   $html = "";
      
   while ($row = mysqli_fetch_assoc($result)){

        $html = $html.'<div class="col-md-4 col-sm-6 col-lg-3 col-6" data="'.$row['ModuleID'].'">
            <a class="custom-card" style="cursor: pointer;">
                <div class="card mb-3">
                    <div class="card-header bg-primary text-white text-center">'.$row['ModuleCode'].'</div>
                    <div class="card-body">
                        <h5 class="card-title">'.$row['Name'].'</h5>
                        <p class="card-text">
                            <ul style="list-style:none; padding-left:0;">
                                <li>Type: '.$row['Type'].'</li>
                                <li>Credits: '.$row['Credits'].'</li>
                                <li>Status: Passed </li>
                            </ul>
                        </p>
                    </div>
                </div>
            </a>
            </div>';

   }

   echo $html;
      
 }
?>