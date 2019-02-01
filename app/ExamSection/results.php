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
  <link rel="stylesheet" type="text/css" href="../../assets/fontawesome/css/fontawesome.css">
  <link rel="stylesheet" type="text/css" href="../../assets/css/_main.css">
  <link rel="stylesheet" type="text/css" href="../../assets/css/Exams.css">
</head>
<body>
  <?php include_once "../../php/includes/head_logobox.php";?>
  <?php include_once "../../php/includes/top_nav.php";?>
  <?php include_once "../../php/includes/sidebar_ExamSection.php";?>
  <div class="container bg_white">
    <div class="dash_box">
      <a href="results_wat1">
        <span class="fa fa-chart-bar icon" ></span> <div class="link_text">  WAT-1  <span class="fa fa-arrow-alt-circle-right sm-icon"> </span></div>
      </a>
     </div>
     <div class="dash_box">
      <a href="results_wat2">
        <span class="fa fa-chart-bar icon" ></span> <div class="link_text">  WAT-2 <span class="fa fa-arrow-alt-circle-right sm-icon"> </span></div>
      </a>
     </div>
     <div class="dash_box">
      <a href="results_wat3">
        <span class="fa fa-chart-bar icon" ></span> <div class="link_text">  WAT-3 <span class="fa fa-arrow-alt-circle-right sm-icon"> </span></div>
      </a>
     </div>
    <div class="dash_box">
      <a href="results_wat4">
        <span class="fa fa-chart-bar icon" ></span> <div class="link_text">  WAT-4 <span class="fa fa-arrow-alt-circle-right sm-icon"> </span></div>
      </a>
     </div>
    <div class="dash_box">
      <a href="results_wat5">
        <span class="fa fa-chart-bar icon" ></span> <div class="link_text">  WAT-5 <span class="fa fa-arrow-alt-circle-right sm-icon"> </span></div>
      </a>
     </div>
    <div class="dash_box">
      <a href="results_wat6">
        <span class="fa fa-chart-bar icon" ></span> <div class="link_text">  WAT-6 <span class="fa fa-arrow-alt-circle-right sm-icon"> </span></div>
      </a>
     </div>
     <div class="dash_box">
      <a href="results_wat7">
        <span class="fa fa-chart-bar icon" ></span> <div class="link_text">  WAT-7 <span class="fa fa-arrow-alt-circle-right sm-icon"> </span></div>
      </a>
     </div>
     <div class="dash_box">
      <a href="results_wat8">
        <span class="fa fa-chart-bar icon" ></span> <div class="link_text">  WAT-8 <span class="fa fa-arrow-alt-circle-right sm-icon"> </span></div>
      </a>
     </div>
     <div class="dash_box">
      <a href="results_wat9">
        <span class="fa fa-chart-bar icon" ></span> <div class="link_text">  WAT-9 <span class="fa fa-arrow-alt-circle-right sm-icon"> </span></div>
      </a>
     </div>
     <div class="dash_box">
      <a href="results_wat10">
        <span class="fa fa-chart-bar icon" ></span> <div class="link_text">  WAT-10 <span class="fa fa-arrow-alt-circle-right sm-icon"> </span></div>
      </a>
     </div>
     <div class="dash_box">
      <a href="results_mid1">
        <span class="fa fa-chart-bar icon" ></span> <div class="link_text">  MID-1 <span class="fa fa-arrow-alt-circle-right sm-icon"> </span></div>
      </a>
     </div>
     <div class="dash_box">
      <a href="results_mid2">
        <span class="fa fa-chart-bar icon" ></span> <div class="link_text">  MID-2 <span class="fa fa-arrow-alt-circle-right sm-icon"> </span></div>
      </a>
     </div>
     <div class="dash_box">
      <a href="results_mid3">
        <span class="fa fa-chart-bar icon" ></span> <div class="link_text"> MID-3 <span class="fa fa-arrow-alt-circle-right sm-icon"> </span></div>
      </a>
     </div>
     <div class="dash_box">
      <a href="results_endsem">
        <span class="fa fa-chart-bar icon" ></span> <div class="link_text"> END-SEM <span class="fa fa-arrow-alt-circle-right sm-icon"> </span></div>
      </a>
     </div>

  </div>
  <?php include_once "../../php/includes/footer.php";?>
  <script type="text/javascript" src="../../assets/js/jquery-1.9.1.min.js"></script>
  <script type="text/javascript" src="../../assets/fontawesome/js/all.js"></script>
  <script type="text/javascript" src="../../assets/fontawesome/js/fontawesome.js"></script>
  <script type="text/javascript" src="../../assets/js/jquery.min.js"></script>
  <script type="text/javascript" src="../../assets/js/main.js"></script>
</body>
</html>