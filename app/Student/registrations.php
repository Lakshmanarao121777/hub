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
  <div class="container bg_white" style="padding:0;">
    <ul class="bread">
      <li><a href="./" title=""><em><span class="fa fa-tachometer-alt"></span> Dashboard</em></a></li>
      <li class="breadcurrent"><a href="registrations" title=""><em><span class="fa fa-pencil-alt"> </span> Registrations</em></a></li>
    </ul>
    <?php  
    if(date("d-m-Y")=="10-10-2018"||date("d-m-Y")=="11-10-2018"||date("d-m-Y")=="12-10-2018"||date("d-m-Y")=="13-10-2018"||date("d-m-Y")=="14-10-2018"){ ?>
      <div class="dash_box">
        <a href="Dussehra">
          <span class="fa fa-sign-out-alt icon" ></span> <div class="link_text">  Dussehra vatcations  <span class="fa fa-arrow-alt-circle-right sm-icon"> </span></div>
        </a>
      </div>
    <?php } ?>
    <div class="dash_box">
      <a href="sem_regular.php">
        <span class="fa fa-graduation-cap icon" ></span> <div class="link_text">  Semister  <span class="fa fa-arrow-alt-circle-right sm-icon"> </span></div>
      </a>
     </div>
    <div class="dash_box">
      <a href="r13_fm">
        <span class="fa fa-graduation-cap icon" ></span> <div class="link_text"> Fresh-Mode <span class="fa fa-arrow-alt-circle-right sm-icon"> </span></div>
      </a>
    </div>
    <div class="dash_box">
      <a href="ay1819summersemrem">
        <span class="fa fa-graduation-cap icon" ></span> <div class="link_text"> Summer Semister <span class="fa fa-arrow-alt-circle-right sm-icon"> </span></div>
      </a>
    </div>
    <div class="dash_box">
      <a href="ay1819remedial">
        <span class="fa fa-graduation-cap icon" ></span> <div class="link_text"> Remedial-Mode <span class="fa fa-arrow-alt-circle-right sm-icon"> </span></div>
      </a>
    </div>
    <div class="dash_box">
      <a href="minor">
        <span class="fa fa-graduation-cap icon" ></span> <div class="link_text"> Minor Degree <span class="fa fa-arrow-alt-circle-right sm-icon"> </span></div>
      </a>
    </div>
    <div class="dash_box">
      <a href="updatesoon">
        <span class="fa fa-graduation-cap icon" ></span> <div class="link_text"> Grand Rem <span class="fa fa-arrow-alt-circle-right sm-icon"> </span></div>
      </a>
    </div>
    <div class="dash_box">
      <a href="updatesoon">
        <span class="fa fa-building icon" ></span> <div class="link_text"> Hostel <span class="fa fa-arrow-alt-circle-right sm-icon"> </span></div>
      </a>
    </div>
    <div class="dash_box">
      <a href="updatesoon">
        <span class="fa fa-hotel icon" ></span> <div class="link_text"> Mess <span class="fa fa-arrow-alt-circle-right sm-icon"> </span></div>
      </a>
    </div>
    <div class="dash_box">
      <a href="olms_apply">
        <span class="fa fa-sign-out-alt icon" ></span> <div class="link_text"> Out-Pass <span class="fa fa-arrow-alt-circle-right sm-icon"> </span></div>
      </a>
    </div>
    <div class="dash_box">
      <a href="updatesoon">
        <span class="fa fa-graduation-cap icon" ></span> <div class="link_text"> Others <span class="fa fa-arrow-alt-circle-right sm-icon"> </span></div>
      </a>
    </div>
  </div>
  <?php include_once "../../php/includes/footer.php";?>
  <script type="text/javascript" src="../../assets/js/jquery-1.9.1.min.js"></script>
  <script type="text/javascript" src="../../assets/fontawesome/js/all.js"></script>
  <script type="text/javascript" src="../../assets/fontawesome/js/fontawesome.js"></script>
  <script type="text/javascript" src="../../assets/js/jquery.min.js"></script>
  <script type="text/javascript" src="../../assets/js/main.js"></script>
  <script type="text/javascript" src="../../assets/js/Student.js"></script>
</body>
</html>