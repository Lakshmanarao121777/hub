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
<style>
.form{width:100%;padding:2px;float:left;}
.inp{width:33%;}
.inp .inp_name,.inp .inp_value{width:50%;float:left;}
</style>
<body>
  <?php include_once "../../php/includes/head_logobox.php";?>
  <?php include_once "../../php/includes/top_nav.php";?>
  <?php include_once "../../php/includes/sidebar_ExamSection.php";?>
  <div class="container bg_white">
    <div class="inp">
      <div class="inp_nam">Select Year : </div>
      <div class="inp_value"><select id="sYear"><option value="PUC-1">PUC-1</option><option value="PUC-2">PUC-2</option><option value="ENGG-1">Engg-1</option><option value="ENGG-2">Engg-2</option><option value="ENGG-3">Engg-3</option><option value="ENGG-4">Engg-4</option></select></div>
    </div>
    <div class="inp">
      <div class="inp_nam">Status : </div>
      <div class="inp_value"><select id="sYear"><option value="PUC-1">Distributed</option><option value="PUC-2">In-Office</option></select></div>
    </div>
    <div class="inp">
      <div class="inp_nam">Printing Status : </div>
      <div class="inp_value"><select id="sYear"><option value="PUC-1">Issued</option><option value="PUC-2">Re-Issued</option></select></div>
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