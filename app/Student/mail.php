<?php session_start();
if (!$_SESSION) {
    header("Location:../../php/includes/logout.php");
} else {
    if ($_SESSION['USER_TYPE'] != "student") {
        header("Location:../../php/includes/logout.php");
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
<style>
	.fullwidth{width:100%;margin:0;padding:0;float:left;}
	.mail{float:left;width:100%;height:100%;}
	.mail_left{width:30%;float:left;}
	.mail_right{width:70%;float:left;padding:10px;}
	.mail ul{display:inline-block;width:100%;padding:0;}
  .mail ul >li{display:block;height:55px;padding:0;}
  .compose{padding:20px;}
	button{width:100%;padding:0;border:0;padding-bottom:10px;padding-top:10px;background:rgb(143, 5, 5);border-radius:5px;width:100%;color:white;font-weight:900;}
	.msg{width:100%;float:left;}
  .msg_left {float:left;line-height:2;padding:5px 10px;}
  .msg_time{float:left;padding:0px 10px;width:90%;font-size:12px;}
  .user_img_left{width:50px;height:55px;float:left;border-radius:100%;}
  .user_details_left{float:left;padding:6px 20px;border-bottom:1px solid rgba(0,0,0,0.1); width: -moz-calc(100% - 65px); width: -webkit-calc(100% - 65px);width: calc(100% - 65px);}
  .msg_bodys{width:100%;float:left;font-size:16px;padding:2px 10px 0 0;background:rgba(0,0,0,0.03);}
</style>
<body>
  <?php include_once "../../php/includes/head_logobox.php";?>
  <?php include_once "../../php/includes/top_nav.php";?>
  <?php include_once "../../php/includes/sidebar_Student.php";?>
  <div class="container bg_white" style="padding:0;">
    <ul class="bread">
	<li><a href="./" title=""><em><span class="fa fa-tachometer-alt"></span> Dashboard</em></a></li>
      <li class="breadcurrent"><a href="#" title=""><em><span class="fa fa-envelope"></span> Mail</em></a></li>
    </ul>
	<div class="mail" style="height:90%;">
		<div class="mail_left">
			<div class="fullwidth compose">
				<button class="btn"> New Message</button>
			</div>
			<div class="fullwidth">
				<ul>
					<li>
						<div class="user_img_left"><img src="../../assets/images/logo.png" class="user_img_left"> </div> 
						<div class="user_details_left">KGJHG<br>sdfgfgdfgdf</div>
					</li>
				</ul>
			</div>
		</div>
		<div class="mail_right">
			<div class="fullwidth">
				<div class="fullwidth">
					<div class="msg_bodys">
						<img src="../../assets/images/logo.png" style="width:50px;float:left;padding:3px 10px;;"> 
						<div class="" style="float:left;padding:0px 10px;width:90%;font-weight:900;"> Lakshmanarao</div>
						<div class="msg_time" style=""> 15:00 12:12:2018</div>
						<!--<div class="" style="float:right;"><span class="fa fa-trash-alt"></span></div>-->
					</div>
					<div class="msg">
						<div class="msg_left">
							sferew
						</div>
					</div>
				</div>
			</div>
			<div class="" style="padding:10px 0;position:fixed;bottom:50px;width:55%;">
				<div class="" style="width:85%;float:left;padding:0 10px 0 0;">
					<input type="text" style="width:100%;float:left;border-radius:10px;padding:0 15px;height:38px;border:1px solid black" placeholder="Enter Your Message Here.."/>
				</div>
				<div class="" style="width:15%;float:left;">
					<button class="btn btn-success"><span class="fa fa-paper-plane"> </span> Send </button>
				</div>
			</div>
		</div>
	</div>




  </div>
  <?php include_once "../../php/includes/footer.php";?>
  <script type="text/javascript" src="../../assets/js/jquery-1.9.1.min.js"></script>
  <script type="text/javascript" src="../../assets/fontawesome/js/all.js"></script>
  <script type="text/javascript" src="../../assets/js/jquery.min.js"></script>
  <script type="text/javascript" src="../../assets/js/main.js"></script>
  <script type="text/javascript" src="../../assets/js/Student.js"></script>
</body>
</html>
