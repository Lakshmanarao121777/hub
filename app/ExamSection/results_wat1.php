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
      <a href="results_wat1_puc1">
        <span class="fa fa-chart-bar icon" ></span> <div class="link_text">  PUC-1  <span class="fa fa-arrow-alt-circle-right sm-icon"> </span></div>
      </a>
    </div>
    <div class="dash_box">
      <a href="results_wat1_ch_engg_1">
        <span class="fa fa-chart-bar icon" ></span> <div class="link_text">  CH ENGG-1  <span class="fa fa-arrow-alt-circle-right sm-icon"> </span></div>
      </a>
    </div>
    <div class="dash_box">
      <a href="results_wat1_cs_engg_1">
        <span class="fa fa-chart-bar icon" ></span> <div class="link_text">  CS ENGG-1 <span class="fa fa-arrow-alt-circle-right sm-icon"> </span></div>
      </a>
    </div>
    <div class="dash_box">
      <a href="results_wat1_ce_engg_1">
        <span class="fa fa-chart-bar icon" ></span> <div class="link_text">  CE ENGG-1 <span class="fa fa-arrow-alt-circle-right sm-icon"> </span></div>
      </a>
    </div>
    <div class="dash_box">
        <a href="results_wat1_ec_engg_1">
          <span class="fa fa-chart-bar icon" ></span> <div class="link_text">  EC ENGG-1 <span class="fa fa-arrow-alt-circle-right sm-icon"> </span></div>
        </a>
    </div>
    <div class="dash_box">
      <a href="results_wat1_me_engg_1">
        <span class="fa fa-chart-bar icon" ></span> <div class="link_text">  ME ENGG-1 <span class="fa fa-arrow-alt-circle-right sm-icon"> </span></div>
      </a>
    </div>
    <div class="dash_box">
      <a href="results_wat1_mm_engg_1">
        <span class="fa fa-chart-bar icon" ></span> <div class="link_text">  MM ENGG-1 <span class="fa fa-arrow-alt-circle-right sm-icon"> </span></div>
      </a>
    </div>
    <div class="clear"></div>
    <div class="dash_box">
      <a href="results_wat1_puc_2">
        <span class="fa fa-chart-bar icon" ></span> <div class="link_text">  PUC-2  <span class="fa fa-arrow-alt-circle-right sm-icon"> </span></div>
      </a>
    </div>
    <div class="dash_box">
      <a href="results_wat1_ch_engg_2">
        <span class="fa fa-chart-bar icon" ></span> <div class="link_text">  CH ENGG-2  <span class="fa fa-arrow-alt-circle-right sm-icon"> </span></div>
      </a>
    </div>
    <div class="dash_box">
      <a href="results_wat1_cs_engg_2">
        <span class="fa fa-chart-bar icon" ></span> <div class="link_text">  CS ENGG-2 <span class="fa fa-arrow-alt-circle-right sm-icon"> </span></div>
      </a>
    </div>
    <div class="dash_box">
      <a href="results_wat1_ce_engg_2">
        <span class="fa fa-chart-bar icon" ></span> <div class="link_text">  CE ENGG-2 <span class="fa fa-arrow-alt-circle-right sm-icon"> </span></div>
      </a>
    </div>
    <div class="dash_box">
        <a href="results_wat1_ec_engg_2">
          <span class="fa fa-chart-bar icon" ></span> <div class="link_text">  EC ENGG-2 <span class="fa fa-arrow-alt-circle-right sm-icon"> </span></div>
        </a>
    </div>
    <div class="dash_box">
      <a href="results_wat1_me_engg_2">
        <span class="fa fa-chart-bar icon" ></span> <div class="link_text">  ME ENGG-2 <span class="fa fa-arrow-alt-circle-right sm-icon"> </span></div>
      </a>
    </div>
    <div class="dash_box">
      <a href="results_wat1_mm_engg_2">
        <span class="fa fa-chart-bar icon" ></span> <div class="link_text">  MM ENGG-2 <span class="fa fa-arrow-alt-circle-right sm-icon"> </span></div>
      </a>
    </div>
    <div class="clear"></div>
    <div class="dash_box">
      <a href="results_wat1_ch_engg_3">
        <span class="fa fa-chart-bar icon" ></span> <div class="link_text">  CH ENGG-3  <span class="fa fa-arrow-alt-circle-right sm-icon"> </span></div>
      </a>
    </div>
    <div class="dash_box">
      <a href="results_wat1_cs_engg_3">
        <span class="fa fa-chart-bar icon" ></span> <div class="link_text">  CS ENGG-3 <span class="fa fa-arrow-alt-circle-right sm-icon"> </span></div>
      </a>
    </div>
    <div class="dash_box">
      <a href="results_wat1_ce_engg_3">
        <span class="fa fa-chart-bar icon" ></span> <div class="link_text">  CE ENGG-3 <span class="fa fa-arrow-alt-circle-right sm-icon"> </span></div>
      </a>
    </div>
    <div class="dash_box">
        <a href="results_wat1_ec_engg_3">
          <span class="fa fa-chart-bar icon" ></span> <div class="link_text">  EC ENGG-3 <span class="fa fa-arrow-alt-circle-right sm-icon"> </span></div>
        </a>
    </div>
    <div class="dash_box">
      <a href="results_wat1_me_engg_3">
        <span class="fa fa-chart-bar icon" ></span> <div class="link_text">  ME ENGG-3 <span class="fa fa-arrow-alt-circle-right sm-icon"> </span></div>
      </a>
    </div>
    <div class="dash_box">
      <a href="results_wat1_mm_engg_3">
        <span class="fa fa-chart-bar icon" ></span> <div class="link_text">  MM ENGG-3 <span class="fa fa-arrow-alt-circle-right sm-icon"> </span></div>
      </a>
    </div>
    <div class="clear"></div>
    <div class="dash_box">
      <a href="results_wat1_ch_engg_4">
        <span class="fa fa-chart-bar icon" ></span> <div class="link_text">  CH ENGG-4  <span class="fa fa-arrow-alt-circle-right sm-icon"> </span></div>
      </a>
    </div>
    <div class="dash_box">
      <a href="results_wat1_cs_engg_4">
        <span class="fa fa-chart-bar icon" ></span> <div class="link_text">  CS ENGG-4 <span class="fa fa-arrow-alt-circle-right sm-icon"> </span></div>
      </a>
    </div>
    <div class="dash_box">
      <a href="results_wat1_ce_engg_4">
        <span class="fa fa-chart-bar icon" ></span> <div class="link_text">  CE ENGG-4 <span class="fa fa-arrow-alt-circle-right sm-icon"> </span></div>
      </a>
    </div>
    <div class="dash_box">
        <a href="results_wat1_ec_engg_4">
          <span class="fa fa-chart-bar icon" ></span> <div class="link_text">  EC ENGG-4 <span class="fa fa-arrow-alt-circle-right sm-icon"> </span></div>
        </a>
    </div>
    <div class="dash_box">
      <a href="results_wat1_me_engg_4">
        <span class="fa fa-chart-bar icon" ></span> <div class="link_text">  ME ENGG-4 <span class="fa fa-arrow-alt-circle-right sm-icon"> </span></div>
      </a>
    </div>
    <div class="dash_box">
      <a href="results_wat1_mm_engg_4">
        <span class="fa fa-chart-bar icon" ></span> <div class="link_text">  MM ENGG-4 <span class="fa fa-arrow-alt-circle-right sm-icon"> </span></div>
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