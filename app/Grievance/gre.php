<?php session_start();
if (!$_SESSION) {
    header("Location:../../php/includes/logout.php");
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
  <?php
    if ($_SESSION['USER_TYPE'] == "student") {
      include_once "../../php/includes/sidebar_Student.php";
    }
    else{
      include_once "../../php/includes/sidebar_employee.php";
    }
  ?>
	<div class="container bg_white" style="padding:0 0 50px 0;">
    <ul class="bread">
      <li><a href="../" title=""><em><span class="fa fa-tachometer-alt"></span> Dashboard</em></a></li>
      <li class="breadcurrent"><a href="./" title=""><em><span class="fa fa-headphones-alt"> </span> Grievance Dashboard</em></a></li>
    </ul>
    <div class="dash_box">
      <a href="user_gre">
        <span class="fa fa-pencil-alt icon" ></span> <div class="link_text"> File Complaint <span class="fa fa-arrow-alt-circle-right sm-icon"> </span></div>
      </a>
    </div>
    <div class="dash_box">
      <a href="user_complaints">
        <span class="fa fa-headphones-alt icon" ></span> <div class="link_text"> My Complaints <span class="fa fa-arrow-alt-circle-right sm-icon"> </span></div>
      </a>
    </div><!--
    <div class="dash_box">
      <a href="user_tracking">
        <span class="fa fa-map-pin icon" ></span> <div class="link_text"> Tracking <span class="fa fa-arrow-alt-circle-right sm-icon"> </span></div>
      </a>
    </div>-->
    <div class="clear"></div>
    <?php
    include_once "../../php/config/DBActivityPHP.php";
    $designation = new DBActivityPHP();
    $user_designation = $designation->getColValue("gre_users", "userId='$_SESSION[USER_ID]'", "designation");
    if ($user_designation == "CoOrdinator" || $user_designation == "Assistant CoOrdinator") { ?>
      <div class="dash_box">
        <a href="admin_users">
          <span class="fa fa-users icon" ></span> <div class="link_text"> Users <span class="fa fa-arrow-alt-circle-right sm-icon"> </span></div>
        </a>
      </div>
      <div class="dash_box">
        <a href="admin_assign">
          <span class="fa fa-users-cog icon" ></span> <div class="link_text"> Assign Team <span class="fa fa-arrow-alt-circle-right sm-icon"> </span></div>
        </a>
      </div>
      <div class="dash_box">
        <a href="admin_Statistices">
          <span class="fa fa-chart-bar icon" ></span> <div class="link_text"> Statistices <span class="fa fa-arrow-alt-circle-right sm-icon"> </span></div>
        </a>
      </div>
    <?php } 
    if ($user_designation == "Technesian" || $user_designation == "CoOrdinator" || $user_designation == "Assistant CoOrdinator") { ?>
      <div class="dash_box">
        <a href="admin_compalints">
          <span class="fa fa-receipt icon" ></span> <div class="link_text"> View Compalints <span class="fa fa-arrow-alt-circle-right sm-icon"> </span></div>
        </a>
      </div>
    <?php } ?>

	</div>
	<?php include_once "../../php/includes/footer.php";?>
	<script type="text/javascript" src="../../assets/js/jquery-1.9.1.min.js"></script>
	<script type="text/javascript" src="../../assets/fontawesome/js/all.js"></script>
	<script type="text/javascript" src="../../assets/fontawesome/js/fontawesome.js"></script>
	<script type="text/javascript" src="../../assets/js/jquery.min.js"></script>
	<script type="text/javascript" src="../../assets/js/main.js"></script>
</body>
</html>