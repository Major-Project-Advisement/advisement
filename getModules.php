<?php 
 
 include_once "includes/config.php";

 if(isset($_POST["programId"]))
 {
   $pid = (int)$_POST["programId"];
   $uid = (int)$_POST["UID"];
   $page = $_POST["PAGE"];

    
   
        $sql = "SELECT a.ModuleID, a.ModuleCode, a.Name, a.Type, a.Credits, a.StudentID, c.StudentID as Current from (SELECT m.ModuleID, m.ModuleCode, m.Name, m.Type, m.Credits, p.StudentID FROM module m LEFT JOIN (Select * From passedmodules where StudentID = $uid ) p ON m.ModuleID = p.ModuleID WHERE m.ModuleID IN(SELECT ModuleID FROM programmodules WHERE programID = $pid) ) a left join (SELECT * FROM currentmodules WHERE StudentID = $uid) c on a.ModuleID = c.ModuleID ORDER BY a.Name";
   

   
  
   $result = mysqli_query($conn, $sql);
   $html = "";

   if($page == 'passed'){
        while ($row = mysqli_fetch_assoc($result)){

            if(is_null($row['StudentID'])){

                $html = $html.'<div id="module-card" class="col-md-4 col-sm-6 col-lg-3 col-6" data-id="'.$row['ModuleID'].'" data-completed="0">
                    <a class="custom-card" style="cursor: pointer;">
                        <div class="card mb-3">
                            <div class="card-header bg-primary text-white text-center">'.$row['ModuleCode'].'</div>
                            <div class="card-body">
                                <h5 class="card-title">'.$row['Name'].'</h5>
                                <p class="card-text">
                                    <ul style="list-style:none; padding-left:0;">
                                        <li>Type: '.$row['Type'].'</li>
                                        <li>Credits: '.$row['Credits'].'</li>
                                        <li>Status: <span>To Do</span>  </li>
                                    </ul>
                                </p>
                            </div>
                        </div>
                    </a>
                    </div>';

            }else {

                $html = $html.'<div id="module-card" class="col-md-4 col-sm-6 col-lg-3 col-6" data-id="'.$row['ModuleID'].'" data-completed="1">
                    <a class="custom-card" style="cursor: pointer;">
                        <div class="card mb-3">
                            <div class="card-header bg-primary text-white text-center">'.$row['ModuleCode'].'</div>
                            <div class="card-body bg-primary text-white">
                                <h5 class="card-title">'.$row['Name'].'</h5>
                                <p class="card-text">
                                    <ul style="list-style:none; padding-left:0;">
                                        <li>Type: '.$row['Type'].'</li>
                                        <li>Credits: '.$row['Credits'].'</li>
                                        <li>Status: <span><b>Passed</b></span>  </li>
                                    </ul>
                                </p>
                            </div>
                        </div>
                    </a>
                    </div>';

            }

                

        }
   }
   else
   {
    while ($row = mysqli_fetch_assoc($result)){

        if(is_null($row['Current']) && is_null($row['StudentID']) ){

            $html = $html.'<div id="module-card" class="col-md-4 col-sm-6 col-lg-3 col-6" data-id="'.$row['ModuleID'].'" data-completed="0">
                        <a class="custom-card" style="cursor: pointer;">
                            <div class="card mb-3">
                                <div class="card-header bg-primary text-white text-center">'.$row['ModuleCode'].'</div>
                                <div class="card-body">
                                    <h5 class="card-title">'.$row['Name'].'</h5>
                                    <p class="card-text">
                                        <ul style="list-style:none; padding-left:0;">
                                            <li>Type: '.$row['Type'].'</li>
                                            <li>Credits: '.$row['Credits'].'</li>
                                            <li>Status: <span>To Do</span>  </li>
                                        </ul>
                                    </p>
                                </div>
                            </div>
                        </a>
                    </div>';

        }else
        if(!is_null($row['Current']) && is_null($row['StudentID'])){

            $html = $html.'<div id="module-card" class="col-md-4 col-sm-6 col-lg-3 col-6" data-id="'.$row['ModuleID'].'" data-completed="1">
                    <a class="custom-card" style="cursor: pointer;">
                        <div class="card mb-3">
                            <div class="card-header bg-primary text-white text-center">'.$row['ModuleCode'].'</div>
                            <div class="card-body bg-primary text-white">
                                <h5 class="card-title">'.$row['Name'].'</h5>
                                <p class="card-text">
                                    <ul style="list-style:none; padding-left:0;">
                                        <li>Type: '.$row['Type'].'</li>
                                        <li>Credits: '.$row['Credits'].'</li>
                                        <li>Status: <span><b>Doing</b></span>  </li>
                                    </ul>
                                </p>
                            </div>
                        </div>
                    </a>
                    </div>';
        }

            

    }

   }

   echo $html;
      
 }
?>