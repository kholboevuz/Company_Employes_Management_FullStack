<!DOCTYPE html>
<html lang="en">
<head>
  <title>Sirdaryo Yoshlar Texnoparki</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="./assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="./assets/css/bootstrap.theme.min.css">
  <link rel="stylesheet" href="./assets/bootstrap-datepicker/css/datepicker.css">
  <link rel="stylesheet" href="./assets/bootstrap-datepicker/css/datepicker-custom.css">
  <link rel="stylesheet" href="./assets/css/custom.css">
  <script src="./assets/js/jquery.min.js"></script>
  <script src="./assets/js/bootstrap.min.js"></script>
  <script src="./assets/js/custom.js"></script>
  <script src="./assets/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
  <script src="./assets/bootstrap-datepicker/js/datepicker-custom.js"></script>
  <script type="text/javascript">
    
    /* delete function confirmation  */
    function check_delete() {
      var check = confirm('Are you sure you want to delete this?');
        if (check) {
         
            return true;
        } else {
            return false;
      }
    }
  </script>
</head>
<body>

<nav class="navbar navbar-inverse sidebar navbar-fixed-top" role="navigation">
    <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-sidebar-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="task-info.php"><span style="color: #5bcad9; font-weight: bold;">S.Y.T.P</span></a>
    </div>

    <?php
    $user_role = $_SESSION['user_role'];
     if($user_role == 1){
    ?>
      <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-sidebar-navbar-collapse-1">
      <ul class="nav navbar-nav navbar-nav-custom">
        <li <?php if($page_name == "Task_Info" ){echo "class=\"active\"";} ?>><a href="task-info.php">Asosiy<span style="font-size:16px; color:#5bcad9;" class="pull-right hidden-xs showopacity glyphicon glyphicon-tasks" ></span></a></li>
        <li <?php if($page_name == "Attendance" ){echo "class=\"active\"";} ?>><a href="attendance-info.php">Davomat <span style="font-size:16px; color:#5bcad9;" class="pull-right hidden-xs showopacity glyphicon glyphicon-calendar"></span></a></li>
        <li <?php if($page_name == "Admin" ){echo "class=\"active\"";} ?>><a href="manage-admin.php">Xodimlar<span style="font-size:16px; color:#5bcad9;" class="pull-right hidden-xs showopacity glyphicon glyphicon-user"></span></a></li>
        <li <?php if($page_name == "Daily-Task-Report" ){echo "class=\"active\"";} ?>><a href="daily-task-report.php">Vazifalar Natijadorligi<span style="font-size:16px; color:#5bcad9;" class="pull-right hidden-xs showopacity glyphicon glyphicon-file"></span></a></li>
        <li <?php if($page_name == "Daily-Attennce-Report" ){echo "class=\"active\"";} ?>><a href="daily-attendance-report.php">Davomat hisoboti<span style="font-size:16px; color:#5bcad9;" class="pull-right hidden-xs showopacity glyphicon glyphicon-file"></span></a></li>
         <li <?php if($page_name == "Daily-Attennce-Report" ){echo "class=\"active\"";} ?>><a href="daily-attendance-report.php">Murojaatlar<span style="font-size:16px; color:#5bcad9;" class="pull-right hidden-xs showopacity glyphicon glyphicon-file"></span></a></li>
        <li <?php if($page_name == "Taskday_Info" ){echo "class=\"active\"";} ?>><a href="taskday-info.php">Xodimlarning kunlik <br> <br> ish  hisoboti<span style="font-size:16px; color:#5bcad9;" class="pull-right hidden-xs showopacity glyphicon glyphicon-header" ></span></a></li>
        <li <?php if($page_name == "Task_graph" ){echo "class=\"active\"";} ?>><a href="task-graph.php">Xodimlar statistikasi<span style="font-size:16px; color:#5bcad9;" class="pull-right hidden-xs showopacity glyphicon glyphicon-signal" ></span></a></li>
        <li ><a href="?logout=logout">Chiqish<span style="font-size:16px; color:#5bcad9;" class="pull-right hidden-xs showopacity glyphicon glyphicon-log-out"></span></a></li>
      </ul>
    </div>
    <?php 
     }else if($user_role == 2){

      ?>
          <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-sidebar-navbar-collapse-1">
      <ul class="nav navbar-nav navbar-nav-custom">
        <li <?php if($page_name == "Task_Info" ){echo "class=\"active\"";} ?>><a href="task-info.php">Asosiy<span style="font-size:16px; color:#5bcad9;" class="pull-right hidden-xs showopacity glyphicon glyphicon-tasks"></span></a></li>
        <li <?php if($page_name == "Attendance" ){echo "class=\"active\"";} ?>><a href="attendance-info.php">Davomat <span style="font-size:16px; color:#5bcad9;" class="pull-right hidden-xs showopacity glyphicon glyphicon-calendar"></span></a></li>  
        <li <?php if($page_name == "Task_Day" ){echo "class=\"active\"";} ?>><a href="task-sytp-day.php">Hisobot Topshirish<span style="font-size:16px; color:#5bcad9;" class="pull-right hidden-xs showopacity glyphicon glyphicon-header"></span></a></li>
        <li ><a href="?logout=logout">Chiqish<span style="font-size:16px; color:#5bcad9;" class="pull-right hidden-xs showopacity glyphicon glyphicon-log-out"></span></a></li>
      </ul>
    </div>

      <?php

     }else{
       header('Location: index.php');
     }

    ?>
    


  </div>
</nav>



<div class="main">