<?php session_start();
if (!$_SESSION) {
    header("Location:../../php/includes/logout.php");
} else {
    if ($_SESSION['USER_TYPE'] != "employee") {
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
  <link rel="stylesheet" type="text/css" href="../../assets/css/payroll.css">
</head>
<body>
  <?php include_once "../../php/includes/head_logobox.php";?>
  <?php include_once "../../php/includes/top_nav.php";?>
  <?php include_once "../../php/includes/sidebar_payroll.php";?>
  <div class="container bg_white" style="padding:0;">
    <ul class="bread">
      <li><a href="../" title=""><em><span class="fa fa-tachometer-alt"></span> Dashboard</em></a></li>
      <li><a href="./" title=""><em><span class="fa fa-tachometer-alt"></span> Payroll Dashboard</em></a></li>
      <li class="breadcurrent"><a href="" title=""><em><span class="fa fa-award"></span> Award</em></a></li>
    </ul>
    <div class="dash_box">
      <a href="users">
        <span class="fa fa-users icon" ></span> <div class="link_text">  Users  <span class="fa fa-arrow-alt-circle-right sm-icon"> </span></div>
      </a>
    </div>
    <div class="dash_box">
      <a href="attendance">
        <span class="fa fa-calendar-alt icon" ></span> <div class="link_text"> Attendance <span class="fa fa-arrow-alt-circle-right sm-icon"> </span></div>
      </a>
    </div>
    <div class="dash_box">
      <a href="leaves">
        <span class="fa fa-sign-out-alt icon" ></span> <div class="link_text"> Leaves <span class="fa fa-arrow-alt-circle-right sm-icon"> </span></div>
      </a>
    </div>
    <div class="dash_box">
      <a href="payroll">
        <span class="fa fa-money-bill icon" ></span> <div class="link_text"> Payroll <span class="fa fa-arrow-alt-circle-right sm-icon"> </span></div>
      </a>
    </div>
    <div class="dash_box">
      <a href="Notice">
        <span class="fa fa-clipboard icon" ></span> <div class="link_text">  Notice Board  <span class="fa fa-arrow-alt-circle-right sm-icon"> </span></div>
      </a>
    </div>
    <div class="dash_box">
      <a href="Mail">
        <span class="fa fa-envelope icon" ></span> <div class="link_text"> Messages <span class="fa fa-arrow-alt-circle-right sm-icon"> </span></div>
      </a>
    </div>
    <div class="dash_box">
      <a href="awards">
        <span class="fa fa-award icon" ></span> <div class="link_text"> Awards <span class="fa fa-arrow-alt-circle-right sm-icon"> </span></div>
      </a>
    </div>
		
		




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
