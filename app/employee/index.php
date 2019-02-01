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
  <link rel="stylesheet" type="text/css" href="../../assets/css/employee.css">
</head>
<body>
  <?php include_once "../../php/includes/head_logobox.php";?>
  <?php include_once "../../php/includes/top_nav.php";?>
  <?php include_once "../../php/includes/sidebar_employee.php";?>
  <div class="container bg_white" style="padding:0 0 20px 0;">
    <ul class="bread">
      <li class="breadcurrent"><a href="./" title=""><em><span class="fa fa-tachometer-alt"></span> Dashboard</em></a></li>
    </ul>
    <?php
    include_once "../../php/config/DBActivityPHP.php";
    $designation = new DBActivityPHP();
    $user_ofc = $designation->getColValue("employee_designations", "userId='$_SESSION[USER_ID]'", "office");
    if ($user_ofc != "") {?>
      <div class="dash_box">
        <a href="profile">
          <span class="fa fa-user icon" ></span> <div class="link_text"> Profile <span class="fa fa-arrow-alt-circle-right sm-icon"> </span></div>
        </a>
      </div>
      <div class="dash_box">
        <a href="studycircle">
          <span class="fa fa-book icon" ></span> <div class="link_text"> Study Circle <span class="fa fa-arrow-alt-circle-right sm-icon"> </span></div>
        </a>
      </div>
      <div class="dash_box">
        <a href="olms_apply">
          <span class="fa fa-sign-out-alt icon" ></span> <div class="link_text"> Online Leaves <span class="fa fa-arrow-alt-circle-right sm-icon"> </span></div>
        </a>
      </div>
      <div class="dash_box">
        <a href="../payroll">
          <span class="fa fa-money-bill-alt icon" ></span> <div class="link_text"> Payroll <span class="fa fa-arrow-alt-circle-right sm-icon"> </span></div>
        </a>
      </div>
      <div class="dash_box">
        <a href="updatesoon">
          <span class="fa fa-comments-dollar icon" ></span> <div class="link_text"> Discussions <span class="fa fa-arrow-alt-circle-right sm-icon"> </span></div>
        </a>
      </div>
      <div class="dash_box">
        <a href="updatesoon">
          <span class="fa fa-clipboard-list icon" ></span> <div class="link_text"> NoticeBoard <span class="fa fa-arrow-alt-circle-right sm-icon"> </span></div>
        </a>
      </div>
      <div class="dash_box">
        <a href="../Grievance">
          <span class="fa fa-headphones-alt icon" ></span> <div class="link_text"> Grievance <span class="fa fa-arrow-alt-circle-right sm-icon"> </span></div>
        </a>
      </div>
      <div class="clear"></div><br>
      <div class="border-double"></div>
      <h3> <b><u>Office Activities</u> :-</b> </h3>
      <?php }
    if ($user_ofc == "admin" || $user_ofc == "DA" || $user_ofc == "SWO" || $user_ofc == "ESTD" || $user_ofc == "FO" || $user_ofc == "EXAMCELL" || $user_ofc == "Director") { ?>
      <div class="dash_box">
        <a href="../Statistics">
          <span class="fa fa-chart-pie icon" ></span> <div class="link_text"> Statistics <span class="fa fa-arrow-alt-circle-right sm-icon"> </span></div>
        </a>
      </div>
      <div class="dash_box">
        <a href="activity_student">
          <span class="fa fa-user-graduate icon" ></span> <div class="link_text"> Student Activities <span class="fa fa-arrow-alt-circle-right sm-icon"> </span></div>
        </a>
      </div>
    <?php }
    if ($user_ofc == "admin" || $user_ofc == "DA" || $user_ofc == "ESTD" || $user_ofc == "FO" || $user_ofc == "Director") {?>
      <div class="dash_box">
        <a href="activity_employee">
          <span class="fa fa-user-tie icon" ></span> <div class="link_text"> Employee Activities <span class="fa fa-arrow-alt-circle-right sm-icon"> </span></div>
        </a>
      </div>
      <?php }
    if ($user_ofc == "admin" || $user_ofc == "ESTD" || $user_ofc == "FO") {?>
      <div class="dash_box">
        <a href="activity_payroll">
          <span class="fa fa-money-bill-alt icon" ></span> <div class="link_text"> Payroll Activities <span class="fa fa-arrow-alt-circle-right sm-icon"> </span></div>
        </a>
      </div>
      <?php }
    if ($user_ofc == "admin" || $user_ofc == "SWO" || $user_ofc == "Director" || $user_ofc == "DA") { ?>
      <div class="dash_box">
        <a href="../Grievance">
          <span class="fa fa-bug icon" ></span> <div class="link_text"> Grievance Activities <span class="fa fa-arrow-alt-circle-right sm-icon"> </span></div>
        </a>
      </div>
    <?php }
    if ($user_ofc == "admin" || $user_ofc == "EXAMCELL" || $user_ofc == "Director" || $user_ofc == "DA") { ?>
      <div class="dash_box">
        <a href="#">
          <span class="fa fa-file-excel icon" ></span> <div class="link_text"> Exam Activities <span class="fa fa-arrow-alt-circle-right sm-icon"> </span></div>
        </a>
      </div>
    <?php }
    if ($user_ofc == "admin") { ?>
      <div class="dash_box">
        <a href="../Scholorship">
          <span class="fa fa-money-bill-alt icon" ></span> <div class="link_text"> Fee Perticulars <span class="fa fa-arrow-alt-circle-right sm-icon"> </span></div>
        </a>
      </div>
      <div class="dash_box">
        <a href="survey">
          <span class="fa fa-question icon" ></span> <div class="link_text"> Surveys <span class="fa fa-arrow-alt-circle-right sm-icon"> </span></div>
        </a>
      </div>
      <div class="dash_box">
        <a href="#">
          <span class="fa fa-building icon" ></span> <div class="link_text"> Office Activities <span class="fa fa-arrow-alt-circle-right sm-icon"> </span></div>
        </a>
      </div>
      <div class="dash_box">
        <a href="../Attendance">
          <span class="fa fa-calendar-alt icon" ></span> <div class="link_text"> Attendance Activities <span class="fa fa-arrow-alt-circle-right sm-icon"> </span></div>
        </a>
      </div>
      <div class="dash_box">
        <a href="#">
          <span class="fa fa-newspaper icon" ></span> <div class="link_text"> E-Notice Activities <span class="fa fa-arrow-alt-circle-right sm-icon"> </span></div>
        </a>
      </div>
      <div class="dash_box">
        <a href="activity_designations">
          <span class="fa fa-id-card-alt icon" ></span> <div class="link_text"> Designations <span class="fa fa-arrow-alt-circle-right sm-icon"> </span></div>
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
