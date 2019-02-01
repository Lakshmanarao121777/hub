<?php session_start();
if (!$_SESSION) {
    header("Location:../../php/includes/logout.php");
} else {
    if ($_SESSION['USER_TYPE'] != "student") {
        header("Location:../../php/includes/logout.php");
    }
}
?> 
<!DOCTYPE html>
<html lang="en">
<head>
  <title>AIR-HUB :: RGUKT-RKV</title>

  <?php include_once "../../php/meta/meta.php";?>

  <link rel="stylesheet" type="text/css" href="../../assets/bootstrap/css/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="../../assets/fontawesome/css/all.css">
  <link rel="stylesheet" type="text/css" href="../../assets/css/_main.css">
  <link rel="stylesheet" type="text/css" href="../../assets/css/Attendance.css">
</head>
<body>
  <?php include_once "../../php/includes/head_logobox.php";?>
  <?php include_once "../../php/includes/top_nav.php";?>
  <?php include_once "../../php/includes/sidebar_Student.php";?>
  <div class="container bg_white" style="padding:0;">
    <ul class="bread">
      <li><a href="../" title=""><em><span class="fa fa-tachometer-alt"></span> Dashboard</em></a></li>
      <li class="breadcurrent"><a href="./" title=""><em><span class="fa fa-calendar"> </span> Attendance</em></a></li>
    </ul>
    <div class="dash_box">
      <a href="stu_attendance_marking">
        <span class="fa fa-calendar-check icon" ></span> <div class="link_text"> Attendance <span class="fa fa-arrow-alt-circle-right sm-icon"> </span></div>
      </a>
    </div>
    <div class="dash_box">
      <a href="stu_attendance_statistics">
        <span class="fa fa-chart-bar icon" ></span> <div class="link_text"> Statistics  <span class="fa fa-arrow-alt-circle-right sm-icon"> </span></div>
      </a>
    </div>
    <div class="dash_box">
      <a href="stu_attendance_bio">
        <span class="fa fa-fingerprint icon" ></span> <div class="link_text"> Bio-Metric  <span class="fa fa-arrow-alt-circle-right sm-icon"> </span></div>
      </a>
    </div>
    <?php
    include_once "../../php/config/DBActivityPHP.php";
    $designation = new DBActivityPHP();
    $user_cr = $designation->getColValue("students_details", "userId='$_SESSION[USER_ID]'","isAttendanceCr");
    if ($user_cr=="Yes") { ?>
    <div class="dash_box">
      <a href="stu_attendance_mark_cr">
        <span class="fa fa-calendar-check icon" ></span> <div class="link_text"> Authenticate  <span class="fa fa-arrow-alt-circle-right sm-icon"> </span></div>
      </a>
    </div>
    <div class="dash_box">
      <a href="stu_attendance_report">
        <span class="fa fa-receipt icon" ></span> <div class="link_text"> Reports  <span class="fa fa-arrow-alt-circle-right sm-icon"> </span></div>
      </a>
    </div>
    <?php } ?>




  </div>
  <?php include_once "../../php/includes/footer.php";?>
  <script type="text/javascript" src="../../assets/js/jquery-1.9.1.min.js"></script>
  <script type="text/javascript" src="../../assets/fontawesome/js/all.js"></script>
  <!--<script type="text/javascript" src="../../assets/fontawesome/js/fontawesome.js"></script>-->
  <script type="text/javascript" src="../../assets/js/jquery.min.js"></script>
  <script type="text/javascript" src="../../assets/js/main.js"></script>
  <script type="text/javascript" src="../../assets/js/Student.js"></script>
</body>
</html>
