<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>AIR-HUB :: RGUKT-RKV</title>

  <?php include_once "../../php/meta/meta.php";?>

  <link rel="stylesheet" type="text/css" href="../../assets/bootstrap/css/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="../../assets/fontawesome/css/all.css">
  <link rel="stylesheet" type="text/css" href="../../assets/css/_main.css">
</head>
<style type="text/css">
.container
{
	top: 0;
	left: 0%;
	position: fixed;
	height:100%;
	overflow: hidden;
	width: 100%;
	z-index: 810;
	padding-top:150px;
	padding-bottom: 150px;
	background-image: url(../../assets/images/uder-construction.jpg);
	background-attachment: fixed;
	background-size: cover;
}
    .comesoonbox {
        padding: 20px;
        background: rgba(0, 0, 0, .6);
        margin: 2% auto;
    }
    .comesoontext {
        font-size: 34px;
        line-height: 2;
        font-weight: 600;
        text-align: center;
        color: yellow;
    }
    .comesoonsubtext {
        font-size: 24px;
        color: white;
        text-align: center;
    }
</style>
<body>
  <?php include_once "../../php/includes/head_logobox.php";?>
  <?php include_once "../../php/includes/top_nav.php";?>
  <div class="container" style="overflow-y: hidden;">
  	<div class="">
      	<div class="comesoonbox" style="width:80%;padding:5% 2%;">
					<div style="color:yellow;background:transparent;margin:auto;color: yellow;text-align:center;">
						<span class="fa fa-exclamation-triangle" style="font-size:120px;"></span>
					</div>
       		<div class="comesoontext">  Oops.. 500 Error </div>
					<div class="comesoonsubtext">The Page you are looking is having problem while load from server.<br>Please <a href='#' onClick='javascript:history.go(-1);'>Go Back to previous Page </a></div>
				</div>
    </div>
  </div>
  <?php include_once "../../php/includes/footer.php";?>
  <script type="text/javascript" src="../../assets/js/jquery.min.js"></script>
  <script type="text/javascript" src="../../assets/js/main.js"></script>
</body>
</html>