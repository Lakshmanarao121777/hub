<?php session_start(); 
if(!$_SESSION){
	header("Location:../../php/includes/logout.php");
}
else
{
	if($_SESSION['USER_TYPE']!="employee"){
		header("Location:../../php/includes/logout.php");
	}
}
?><!DOCTYPE html>
<html lang="en">
<head>
	<title>AIR-HUB :: RGUKT-RKV</title>
	
	<?php include_once("../../php/meta/meta.php"); ?>

	<link rel="stylesheet" type="text/css" href="../../assets/bootstrap/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="../../assets/fontawesome/css/all.css">
	<link rel="stylesheet" type="text/css" href="../../assets/css/_main.css">
	<link rel="stylesheet" type="text/css" href="../../assets/css/Admin.css">

</head>
<body>
	<?php include_once("../../php/includes/head_logobox.php"); ?>
	<?php include_once("../../php/includes/top_nav.php"); ?>
	<?php include_once("../../php/includes/sidebar_Admin.php"); ?>
	<div class="container bg_white" style="padding:0;">
    <ul class="bread">
      <li><a href="../" title=""><em><span class="fa fa-tachometer-alt"></span> Dashboard</em></a></li>
      <li class="breadcurrent"><a href="./" title=""><em><span class="fa fa-university"></span> Acadamic</em></a></li>
    </ul>
		<div class="dash_box">
			<a href="updatesoon"> 
				<span class="fa fa-book icon" ></span> <div class="link_text"> Study Circle <span class="fa fa-arrow-alt-circle-right sm-icon"> </span></div>
			</a>
		</div>
    <div class="dash_box">
			<a href="allotment"> 
				<span class="fa fa-book icon" ></span> <div class="link_text"> Course Allotment <span class="fa fa-arrow-alt-circle-right sm-icon"> </span></div>
			</a>
		</div>
	</div>
	<div class="dash_box">
		<a href="updatesoon"> 
			<span class="fa fa-pencil-alt icon" ></span> <div class="link_text">  Registrations  <span class="fa fa-arrow-alt-circle-right sm-icon"> </span></div>
		</a>
	</div>
	<?php include_once("../../php/includes/footer.php"); ?>
	<script type="text/javascript" src="../../assets/js/jquery-1.9.1.min.js"></script>
	<script type="text/javascript" src="../../assets/fontawesome/js/all.js"></script>
	<script type="text/javascript" src="../../assets/fontawesome/js/fontawesome.js"></script>
	<script type="text/javascript" src="../../assets/js/jquery.min.js"></script>
	<script type="text/javascript" src="../../assets/js/main.js"></script>
</body>
</html>