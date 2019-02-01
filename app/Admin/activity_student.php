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
      <li><a href="../" title=""><em><span class="fa fa-tachometer-alt"></span> Dashboard</em></a></li>
      <li class="breadcurrent"><a href="./" title=""><em><span class="fa fa-user"></span> Student</em></a></li>
    </ul>
	<div class="dash_box">
            <a href="activity_student_add">
                <span class="fa fa-user-plus icon" ></span> <div class="link_text"> Add New <span class="fa fa-arrow-alt-circle-right sm-icon"> </span></div>
            </a>
		</div>
		<div class="dash_box">
            <a href="activity_student_edit">
                <span class="fa fa-user-edit icon" ></span> <div class="link_text"> Edit <span class="fa fa-arrow-alt-circle-right sm-icon"> </span></div>
            </a>
        </div>
        <div class="dash_box">
            <a href="activity_student_search">
                <span class="fa fa-search icon" ></span> <div class="link_text"> Search <span class="fa fa-arrow-alt-circle-right sm-icon"> </span></div>
            </a>
		</div>
		<div class="dash_box">
	      <a href="activity_student_password">
	        <span class="fa fa-key icon" ></span> <div class="link_text"> Change Password <span class="fa fa-arrow-alt-circle-right sm-icon"> </span></div>
	      </a>
        </div>
		<div class="dash_box">
	      <a href="activity_student_olms">
	        <span class="fa fa-sign-out-alt icon" ></span> <div class="link_text"> Online-Leaves <span class="fa fa-arrow-alt-circle-right sm-icon"> </span></div>
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