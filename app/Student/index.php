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
  <link rel="stylesheet" type="text/css" href="../../assets/css/Student.css">
</head>
<body>
  <?php include_once "../../php/includes/head_logobox.php";?>
  <?php include_once "../../php/includes/top_nav.php";?>
  <?php include_once "../../php/includes/sidebar_Student.php";?>
  <div class="container bg_white" style="padding:0 50px 100px 0px;">
    <ul class="bread">
      <li class="breadcurrent"><a href="./" title=""><em><span class="fa fa-tachometer-alt"></span> Dashboard</em></a></li>
    </ul>
    <div class="dash_box">
      <a href="../registration">
        <span class="fa fa-pencil-alt icon" ></span> <div class="link_text">  Registrations  <span class="fa fa-arrow-alt-circle-right sm-icon"> </span></div>
      </a>
    </div>
    <div class="dash_box">
      <a href="exam_result">
        <span class="fa fa-chart-pie icon" ></span> <div class="link_text"> Results <span class="fa fa-arrow-alt-circle-right sm-icon"> </span></div>
      </a>
    </div>
    <div class="dash_box">
      <a href="exam_seating">
        <span class="fa fa-wheelchair icon" ></span> <div class="link_text"> Seating <span class="fa fa-arrow-alt-circle-right sm-icon"> </span></div>
      </a>
    </div>
    <div class="dash_box">
      <a href="cdpc">
        <span class="fa fa-pencil-alt icon" ></span> <div class="link_text">  CDPC  <span class="fa fa-arrow-alt-circle-right sm-icon"> </span></div>
      </a>
    </div>
    <div class="dash_box">
      <a href="profile">
        <span class="fa fa-user icon" ></span> <div class="link_text"> Profile <span class="fa fa-arrow-alt-circle-right sm-icon"> </span></div>
      </a>
    </div>
    <div class="dash_box">
      <a href="survey">
        <span class="fa fa-question icon" ></span> <div class="link_text"> Online Survey <span class="fa fa-arrow-alt-circle-right sm-icon"> </span></div>
      </a>
    </div>
    <div class="dash_box">
      <a href="../Attendance">
        <span class="fa fa-calendar-alt icon" ></span> <div class="link_text"> Attendance <span class="fa fa-arrow-alt-circle-right sm-icon"> </span></div>
      </a>
    </div>
    <div class="dash_box">
      <a href="../Grievance">
        <span class="fa fa-headphones icon" ></span> <div class="link_text"> Grievance <span class="fa fa-arrow-alt-circle-right sm-icon"> </span></div>
      </a>
    </div>
    <div class="dash_box">
      <a href="studycircle">
        <span class="fa fa-book icon" ></span> <div class="link_text"> Study Circle <span class="fa fa-arrow-alt-circle-right sm-icon"> </span></div>
      </a>
    </div>
    <?php  
    if(date("d-m-Y")=="10-10-2018"||date("d-m-Y")=="11-10-2018"||date("d-m-Y")=="12-10-2018"||date("d-m-Y")=="13-10-2018"||date("d-m-Y")=="14-10-2018"){ ?>
      <div class="dash_box">
        <a href="Dussehra">
          <span class="fa fa-sign-out-alt icon" ></span> <div class="link_text">  Dussehra vatcations  <span class="fa fa-arrow-alt-circle-right sm-icon"> </span></div>
        </a>
      </div>
    <?php } ?>
    <div class="dash_box">
      <a href="olms_apply">
        <span class="fa fa-sign-out-alt icon" ></span> <div class="link_text"> Online Leaves <span class="fa fa-arrow-alt-circle-right sm-icon"> </span></div>
      </a>
    </div>

    <div class="dash_box">
      <a href="updatesoon">
        <span class="fa fa-comments icon" ></span> <div class="link_text"> Discussions <span class="fa fa-arrow-alt-circle-right sm-icon"> </span></div>
      </a>
    </div>
    <div class="dash_box">
      <a href="stu_notice">
        <span class="fa fa-paragraph icon" ></span> <div class="link_text"> NoticeBoard <span class="fa fa-arrow-alt-circle-right sm-icon"> </span></div>
      </a>
    </div>
    <div class="dash_box">
      <a href="../Scholorship">
        <span class="fa fa-money-bill-wave icon" ></span> <div class="link_text">Fee Particulars <span class="fa fa-arrow-alt-circle-right sm-icon"> </span></div>
      </a>
    </div>
    <div class="dash_box">
      <a href="updatesoon">
        <span class="fa fa-certificate icon" ></span> <div class="link_text"> E - Certificates <span class="fa fa-arrow-alt-circle-right sm-icon"> </span></div>
      </a>
    </div>
    <div class="dash_box">
      <a href="updatesoon">
        <span class="fab fa-cc-diners-club icon" ></span> <div class="link_text"> StudentClub <span class="fa fa-arrow-alt-circle-right sm-icon"> </span></div>
      </a>
    </div>
    <div class="dash_box">
      <a href="updatesoon">
        <span class="fa fa-gamepad icon" ></span> <div class="link_text"> Sports <span class="fa fa-arrow-alt-circle-right sm-icon"> </span></div>
      </a>
    </div>
    <div class="dash_box">
      <a href="updatesoon">
        <span class="fa fa-hand-holding-heart icon" ></span> <div class="link_text"> HHO <span class="fa fa-arrow-alt-circle-right sm-icon"> </span></div>
      </a>
    </div>




  </div>
  <?php include_once "../../php/includes/footer.php";?>
  <script type="text/javascript" src="../../assets/js/jquery-1.9.1.min.js"></script>
  <script type="text/javascript" src="../../assets/fontawesome/js/all.js"></script>
  <script type="text/javascript" src="../../assets/js/jquery.min.js"></script>
  <script type="text/javascript" src="../../assets/js/main.js"></script>
  <script type="text/javascript" src="../../assets/js/Student.js"></script>
</body>
</html>
