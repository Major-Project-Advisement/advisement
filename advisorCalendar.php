<?php 
    Session_start();//continue/start session

    if(isset($_SESSION['AdvisorID'])){
        
      
        foreach($_SESSION as $key => $value){ //create local variables based on $_SESSION keys and values
          $$key = $value;
        }
        
  
    }
      

   
    $username = $FirstName;
    $page_title="Calendar";
    $header="My Calendar";
    $style='<link href="https://fonts.googleapis.com/css?family=Raleway:300,400,500,600,700" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/profilepage.css" />';

    $crumb='<div class="container">
    <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="advisorDash.php">Dashboard</a></li>
        <li class="breadcrumb-item active" aria-current="page">Calendar</li>
    </ol>
    </nav>
    </div>';

    $sidebar = '';



    $main = '<div id="calendar" class="container" style="width: 100%">
    
    </div>';

    include 'advisorTemplate.php';

?>

<script>

document.addEventListener('DOMContentLoaded', function() {
  var calendarEl = document.getElementById('calendar');

  var calendar = new FullCalendar.Calendar(calendarEl, {
    editable: true,
    initialView: 'dayGridMonth',
    headerToolbar: {
      left: 'prev,next today',
      center: 'title',
      right: 'dayGridMonth,timeGridWeek,timeGridDay'
    },
    events: 'load.php',
    dateClick: function() {
    alert('a day has been clicked!');
  }
  });

  calendar.render();

  
});

</script>
    