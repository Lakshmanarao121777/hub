<?php session_start();
if (!$_SESSION) {
    header("Location:../../php/includes/logout.php");
} else {
    if ($_SESSION['USER_TYPE'] != "student") {
        header("Location:../../php/includes/logout.php");
    }
}
include_once "../../php/config/config.inc.php";
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
  <link rel="stylesheet" type="text/css" href="../../assets/css/AcadamicDepartments.css">
</head>
<body>
  <?php include_once "../../php/includes/head_logobox.php";?>
  <?php include_once "../../php/includes/top_nav.php";?>
  <?php include_once "../../php/includes/sidebar_Student.php";?>
  <div class="container bg_white" style="padding:0;">
    <ul class="bread">
      <li><a href="./" title=""><em><span class="fa fa-tachometer-alt"></span> Dashboard</em></a></li>
      <li class="breadcurrent"><a href="#" title=""><em><span class="fa fa-laptop"></span> Notice Board</em></a></li>
    </ul>
    <div id="notice">   </div>
  </div>
  <?php include_once "../../php/includes/footer.php";?>
  <script type="text/javascript" src="../../assets/js/jquery-1.9.1.min.js"></script>
  <script type="text/javascript" src="../../assets/fontawesome/js/all.js"></script>
  <script type="text/javascript" src="../../assets/fontawesome/js/fontawesome.js"></script>
  <script type="text/javascript" src="../../assets/js/jquery.min.js"></script>
  <script type="text/javascript" src="../../assets/js/main.js"></script>
  <script type="text/javascript" src="../../assets/js/nicEdit-latest.js"></script> <script type="text/javascript">
  //<![CDATA[
        bkLib.onDomLoaded(function() { nicEditors.allTextAreas() });
    //]]>
    load_notice(0);
    function  load_notice(began){
      var end=began+20;
      var values =["load_notice",began,end];
      var msg=SendToPhp(values,"../../php/controllers/AcadamicDepartments.php");
      addto("notice",msg);
    }
    function addto(id,msg){
      var aa=$("#"+id).html();
      selectionListDisplay(id,aa+msg);
    }
    jQuery(function($) {
    $('.container').on('scroll', function() {
        if($(this).scrollTop() + $(this).innerHeight() >= $(this)[0].scrollHeight) {
            load_notice( $("#notice  img").length);
        }
    })
});
  </script>
</body>
</html>