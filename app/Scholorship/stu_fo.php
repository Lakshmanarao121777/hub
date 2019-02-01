<?php session_start();
if (!$_SESSION) {
    header("Location:../../php/includes/logout.php");
} 
if($_SESSION['USER_TYPE'] !='student'){header("Location:../../php/includes/logout.php");}
  $userId=$_SESSION['USER_ID'];

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
      <li class="breadcurrent"><a href="./" title=""><em><span class="fa fa-money-bill-alt"> </span> Scholorship</em></a></li>
    </ul>
    <?php if ($_SESSION['USER_TYPE'] == "student") { ?>
    
    <div class="dash_box">
      <a href="stu_fo_scholorship">
        <span class="fa fa-money-bill-wave-alt icon" ></span> <div class="link_text"> Scholorship <span class="fa fa-arrow-alt-circle-right sm-icon"> </span></div>
      </a>
    </div>
    <div class="dash_box">
      <a href="stu_fo_library">
        <span class="fa fa-book-reader icon" ></span> <div class="link_text"> Library <span class="fa fa-arrow-alt-circle-right sm-icon"> </span></div>
      </a>
    </div>
    <div class="dash_box">
      <a href="stu_fo_exams">
        <span class="fa fa-paste icon" ></span> <div class="link_text"> Exam section <span class="fa fa-arrow-alt-circle-right sm-icon"> </span></div>
      </a>
    </div>
    <div class="dash_box">
      <a href="stu_fo_oters">
        <span class="fa fa-paste icon" ></span> <div class="link_text"> Others <span class="fa fa-arrow-alt-circle-right sm-icon"> </span></div>
      </a>
    </div>
    <div class="dash_box">
      <a href="stu_fo_chalan">
        <span class="fa fa-money-bill-alt icon" ></span> <div class="link_text"> Challan <span class="fa fa-arrow-alt-circle-right sm-icon"> </span></div>
      </a>
    </div>
    <?php } 
?>


  </div>
  <?php include_once "../../php/includes/footer.php";?>
  <script type="text/javascript" src="../../assets/js/jquery-1.9.1.min.js"></script>
  <script type="text/javascript" src="../../assets/fontawesome/js/all.js"></script>
  <script type="text/javascript" src="../../assets/js/jquery.min.js"></script>
  <script type="text/javascript" src="../../assets/js/main.js"></script>
</body>
</html>
