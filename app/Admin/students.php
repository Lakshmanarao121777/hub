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
  <link rel="stylesheet" type="text/css" href="../../assets/css/Admin.css">
</head>
<body>
  <?php include_once "../../php/includes/head_logobox.php";?>
  <?php include_once "../../php/includes/top_nav.php";?>
  <?php include_once "../../php/includes/sidebar_Admin.php";?>
  <div class="container bg_white">
    <div class="search bg_white ball">
      <form method="post" name="serachid" >
        <div class="enterid">Enter Student Id Number : </div>
        <div class="enterid"><input type="text" name="searchingid" required="required" placeholder="Student Id Number" onchange="SerachStudent('<?php echo $dept; ?>');return false;" onkeyup="SerachStudent('<?php echo $dept; ?>');return false;"></div>
      </form>
    </div>
    <div class="result" id="lists">
    </div>
  </div>
  <?php include_once "../../php/includes/footer.php";?>
  <script type="text/javascript" src="../../assets/js/jquery-1.9.1.min.js"></script>
  <script type="text/javascript" src="../../assets/fontawesome/js/all.js"></script>
  <script type="text/javascript" src="../../assets/fontawesome/js/fontawesome.js"></script>
  <script type="text/javascript" src="../../assets/js/jquery.min.js"></script>
  <script type="text/javascript" src="../../assets/js/main.js"></script>
  <script type="text/javascript">
	function SerachStudent(branch)
	{
	  var idnumber    = document.forms['serachid']['searchingid'].value;
	  var values =['stu_chip_Show',idnumber,branch];
	  if(idnumber.length>=5){var msg=SendToPhp(values,"../../php/controllers/Admin.php");
	  selectionListDisplay("lists",msg);}
	}
  </script>
</body>
</html>