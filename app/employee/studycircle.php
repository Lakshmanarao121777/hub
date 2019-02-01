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
  <div class="container bg_white" style="padding:0;">
    <ul class="bread">
      <li><a href="./" title=""><em><span class="fa fa-tachometer-alt"></span> Dashboard</em></a></li>
      <li class="breadcurrent"><a href="#" title=""><em><span class="fa fa-bookopen"></span> Study Circle</em></a></li>
    </ul>
    <div class="dash_box">
      <a href="http://10.50.50.4:8080">
        <span class="fa fa-book icon" ></span> <div class="link_text">  Library  <span class="fa fa-arrow-alt-circle-right sm-icon"> </span></div>
      </a>
    </div>
    <div class="dash_box">
      <a href="http://10.50.50.4">
        <span class="fa fa-book icon" ></span> <div class="link_text">  NPTEL  <span class="fa fa-arrow-alt-circle-right sm-icon"> </span></div>
      </a>
    </div>
    <div class="dash_box">
      <a href="updatesoon">
        <span class="fa fa-book icon" ></span> <div class="link_text">  Others  <span class="fa fa-arrow-alt-circle-right sm-icon"> </span></div>
      </a>
    </div>
    <div class="clear"></div><div class="border-double"></div>

    <div class="dash_box">
      <a href="http://10.50.50.4/chemical.html">
        <span class="fa fa-book icon" ></span> <div class="link_text">  NPTEL(Chem)  <span class="fa fa-arrow-alt-circle-right sm-icon"> </span></div>
      </a>
    </div>
    <div class="dash_box">
      <a href="http://10.50.50.4/civil.html">
        <span class="fa fa-book icon" ></span> <div class="link_text">  NPTEL(Civil)  <span class="fa fa-arrow-alt-circle-right sm-icon"> </span></div>
      </a>
    </div>
    <div class="dash_box">
      <a href="http://10.50.50.4/css.html">
        <span class="fa fa-book icon" ></span> <div class="link_text">  NPTEL(CSE)  <span class="fa fa-arrow-alt-circle-right sm-icon"> </span></div>
      </a>
    </div>
    <div class="dash_box">
      <a href="http://10.50.50.4/ece.html">
        <span class="fa fa-book icon" ></span> <div class="link_text">  NPTEL(ECE)  <span class="fa fa-arrow-alt-circle-right sm-icon"> </span></div>
      </a>
    </div>
    <div class="dash_box">
      <a href="http://10.50.50.4/mechanical.html">
        <span class="fa fa-book icon" ></span> <div class="link_text">  NPTEL(Mech)  <span class="fa fa-arrow-alt-circle-right sm-icon"> </span></div>
      </a>
    </div>
    <div class="dash_box">
      <a href="http://10.50.50.4/metallurgy.html">
        <span class="fa fa-book icon" ></span> <div class="link_text">  NPTEL(MME)  <span class="fa fa-arrow-alt-circle-right sm-icon"> </span></div>
      </a>
    </div>
    <div class="clear"></div><div class="border-double"></div>
    <div class="dash_box">
      <a href="http://puc1a.rkv.rgukt.in">
        <span class="fa fa-book icon" ></span> <div class="link_text">  PUC-1  <span class="fa fa-arrow-alt-circle-right sm-icon"> </span></div>
      </a>
    </div>
    <div class="dash_box">
      <a href="http://puc2a.rkv.rgukt.in">
        <span class="fa fa-book icon" ></span> <div class="link_text"> PUC-2 <span class="fa fa-arrow-alt-circle-right sm-icon"> </span></div>
      </a>
    </div>
    <div class="dash_box">
      <a href="http://engg1a.rkv.rgukt.in">
        <span class="fa fa-book icon" ></span> <div class="link_text"> ENGG-1 <span class="fa fa-arrow-alt-circle-right sm-icon"> </span></div>
      </a>
    </div>
    <div class="dash_box">
      <a href="http://engg2a.rkv.rgukt.in">
        <span class="fa fa-book icon" ></span> <div class="link_text"> ENGG-2 <span class="fa fa-arrow-alt-circle-right sm-icon"> </span></div>
      </a>
    </div>
    <div class="dash_box">
      <a href="http://engg3a.rkv.rgukt.in">
        <span class="fa fa-book icon" ></span> <div class="link_text"> ENGG-3 <span class="fa fa-arrow-alt-circle-right sm-icon"> </span></div>
      </a>
    </div>
    <div class="dash_box">
      <a href="http://engg4a.rkv.rgukt.in">
        <span class="fa fa-book icon" ></span> <div class="link_text"> ENGG-4 <span class="fa fa-arrow-alt-circle-right sm-icon"> </span></div>
      </a>
    </div>
    <div class="dash_box">
      <a href="updatesoon">
        <span class="fa fa-book icon" ></span> <div class="link_text"> Others <span class="fa fa-arrow-alt-circle-right sm-icon"> </span></div>
      </a>
    </div>
  </div>
  <?php include_once "../../php/includes/footer.php";?>
  <script type="text/javascript" src="../../assets/js/jquery-1.9.1.min.js"></script>
  <script type="text/javascript" src="../../assets/fontawesome/js/all.js"></script>
  <script type="text/javascript" src="../../assets/fontawesome/js/fontawesome.js"></script>
  <script type="text/javascript" src="../../assets/js/jquery.min.js"></script>
  <script type="text/javascript" src="../../assets/js/main.js"></script>
  <script type="text/javascript" src="../../assets/js/employee.js"></script>
</body>
</html>