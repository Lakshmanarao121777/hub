<?php session_start();
if (!$_SESSION) {
    header("Location:../../php/includes/logout.php");
} else {
    if ($_SESSION['USER_TYPE'] != "") {
        header("Location:gre");
    }
    else {
        header("Location:../../");
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
	<div class="container">
	</div>
	<?php include_once "../../php/includes/footer.php";?>
	<script type="text/javascript" src="../../assets/js/jquery-1.9.1.min.js"></script>
	<script type="text/javascript" src="../../assets/fontawesome/js/all.js"></script>
	<script type="text/javascript" src="../../assets/fontawesome/js/fontawesome.js"></script>
	<script type="text/javascript" src="../../assets/js/jquery.min.js"></script>
	<script type="text/javascript" src="../../assets/js/main.js"></script>
</body>
</html>