<?php session_start();
if (!$_SESSION) {
    header("Location:../../php/includes/logout.php");
} else {
    if ($_SESSION['USER_TYPE'] != "employee") {
        header("Location:../../php/includes/logout.php");
    }
}
?><!DOCTYPE html>
<html lang="en">
<head>
	<title>AIR-HUB :: RGUKT-RKV</title>

	<?php include_once "../../php/meta/meta.php";?>

	<link rel="stylesheet" type="text/css" href="../../assets/bootstrap/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="../../assets/fontawesome/css/all.css">
	<link rel="stylesheet" type="text/css" href="../../assets/css/_main.css">
	<link rel="stylesheet" type="text/css" href="../../assets/css/Admin.css">

</head>
<body>
	<?php include_once "../../php/includes/head_logobox.php";?>
	<?php include_once "../../php/includes/top_nav.php";?>
	<?php include_once "../../php/includes/sidebar_Admin.php";?>
	<div class="container bg_white" style="padding:0;">
    <ul class="bread">
      <li class="breadcurrent"><a href="./" title=""><em><span class="fa fa-tachometer-alt"></span> Dashboard</em></a></li>
    </ul>
		<div class="dash_box">
	    <a href="activity_student">
	      <span class="fa fa-user-graduate icon" ></span> <div class="link_text"> Student Activities <span class="fa fa-arrow-alt-circle-right sm-icon"> </span></div>
	    </a>
		</div>
		<div class="dash_box">
	    <a href="activity_employee">
	      <span class="fa fa-user-tie icon" ></span> <div class="link_text"> Employee Activities <span class="fa fa-arrow-alt-circle-right sm-icon"> </span></div>
	    </a>
		</div>
		<div class="dash_box">
	    <a href="activity_academic">
	      <span class="fa fa-university icon" ></span> <div class="link_text"> Academics <span class="fa fa-arrow-alt-circle-right sm-icon"> </span></div>
	    </a>
	  </div>
	  <div class="dash_box">
	    <a href="NoticeBoard">
	      <span class="fa fa-newspaper icon" ></span> <div class="link_text"> Notice Board <span class="fa fa-arrow-alt-circle-right sm-icon"> </span></div>
	    </a>
	  </div>
		<div class="dash_box">
			<a href="activity_mess">
				<span class="fa fa-hotel icon" ></span> <div class="link_text">Mess <span class="fa fa-arrow-alt-circle-right sm-icon"> </span></div>
			</a>
		</div>
		<div class="dash_box">
			<a href="activity_exam">
				<span class="fa fa-file-excel icon" ></span> <div class="link_text">Examinations <span class="fa fa-arrow-alt-circle-right sm-icon"> </span></div>
			</a>
		</div>
		<div class="dash_box">
			<a href="activity_offices">
				<span class="fa fa-building icon" ></span> <div class="link_text">Offices <span class="fa fa-arrow-alt-circle-right sm-icon"> </span></div>
			</a>
		</div>
		<div class="dash_box">
			<a href="activity_discussion">
				<span class="fa fa-comments icon" ></span> <div class="link_text"> Discussions <span class="fa fa-arrow-alt-circle-right sm-icon"> </span></div>
			</a>
		</div>
		<div class="dash_box">
			<a href="user_profile">
				<span class="fa fa-user icon" ></span> <div class="link_text"> Profile <span class="fa fa-arrow-alt-circle-right sm-icon"> </span></div>
			</a>
		</div>
		<div class="dash_box">
			<a href="../payroll">
				<span class="fa fa-money-bill icon" ></span> <div class="link_text"> Payroll <span class="fa fa-arrow-alt-circle-right sm-icon"> </span></div>
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