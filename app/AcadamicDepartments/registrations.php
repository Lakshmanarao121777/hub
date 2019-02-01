<?php session_start();
if (!$_SESSION) {
    header("Location:../../php/includes/logout.php");
} else {
    if ($_SESSION['USER_TYPE'] != "employee") {
        header("Location:../../php/includes/logout.php");
    }
}
$dept = $_SESSION['USER_DEPARTMENT'];
$designation = $_SESSION['USER_DESIGNATION'];
$uid = $_SESSION['USER_ID'];
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
<style type="text/css">
td,th{padding:10px;border:1px solid black;}
select{width:100%;}
option{width:100%;}
</style>
<body>
  <?php include_once "../../php/includes/head_logobox.php";?>
  <?php include_once "../../php/includes/top_nav.php";?>
  <?php include_once "../../php/includes/sidebar_AcadamicDepartments.php";?>
  <div class="container bg_white">
    <div class="dash_box">
      <a href="statistics">
        <span class="fa fa-chart-bar icon" ></span> <div class="link_text">  Statistics  <span class="fa fa-arrow-alt-circle-right sm-icon"> </span></div>
      </a>
     </div>

     <div class="clear"></div>
     <br/>
    <div class="notfound" style="background:gray;color:white;padding:5px 10px;text-align:left;"><b><u>Trending Pages</u></b></div>
    <div class="search bg_white ball">
	    <form method="post" name="serachid" onchange="serachuid('<?php echo $dept; ?>','<?php echo $uid; ?>','<?php echo $designation; ?>');return false;"  onkeyup="serachuid('<?php echo $dept; ?>','<?php echo $uid; ?>','<?php echo $designation; ?>');return false;">
	    	<div class="enterid">Enter Student Id Number : </div>
	    	<div class="enterid"><input type="text" name="searchingid" required="required"></div>
	    </form>
      <!--<center><b>Registrations are closed</b></center>-->
  	</div>

  	<div class="clear"></div>
  	<div id="sub">

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