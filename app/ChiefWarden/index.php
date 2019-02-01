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
	<link rel="stylesheet" type="text/css" href="../../assets/css/CheifWarden.css">

</head>
<body>
	<?php include_once "../../php/includes/head_logobox.php";?>
	<?php include_once "../../php/includes/top_nav.php";?>
	<?php include_once "../../php/includes/sidebar_CheifWarden.php";?>
	<div class="container bg_white">
		<div class="dash_box">
	      <a href="olms">
	        <span class="fa fa-sign-out-alt icon" ></span> <div class="link_text"> Online-Leaves <span class="fa fa-arrow-alt-circle-right sm-icon"> </span></div>
	      </a>
	    </div>
	    <div class="dash_box">
	      <a href="NoticeBoard">
	        <span class="fa fa-paragraph icon" ></span> <div class="link_text"> Notice Board <span class="fa fa-arrow-alt-circle-right sm-icon"> </span></div>
	      </a>
	    </div>
	    <!--<div class="dash_box">
	      <a href="students">
	        <span class="fa fa-users icon" ></span> <div class="link_text"> Students <span class="fa fa-arrow-alt-circle-right sm-icon"> </span></div>
	      </a>
	    </div>-->
	    <div class="dash_box">
	      <a href="updatesoon">
	        <span class="fa fa-pencil-alt icon" ></span> <div class="link_text">  Registrations  <span class="fa fa-arrow-alt-circle-right sm-icon"> </span></div>
	      </a>
	    </div>
	    <div class="dash_box">
	      <a href="updatesoon">
	        <span class="fa fa-user icon" ></span> <div class="link_text"> Profile <span class="fa fa-arrow-alt-circle-right sm-icon"> </span></div>
	      </a>
	    </div>
	    <div class="dash_box">
	      <a href="updatesoon">
	        <span class="fa fa-book icon" ></span> <div class="link_text"> Study Circle <span class="fa fa-arrow-alt-circle-right sm-icon"> </span></div>
	      </a>
	    </div>
	    <div class="dash_box">
	      <a href="updatesoon">
	        <span class="fa fa-comments icon" ></span> <div class="link_text"> Discussions <span class="fa fa-arrow-alt-circle-right sm-icon"> </span></div>
	      </a>
	    </div>
	    <div class="dash_box">
	      <a href="updatesoon">
	        <span class="fa fa-money-bill-wave icon" ></span> <div class="link_text">Fee Particulars <span class="fa fa-arrow-alt-circle-right sm-icon"> </span></div>
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