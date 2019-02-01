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
<style>
	form{width:70%;float:left;margin-left:15%;}
	.inp{width:100%;}
	.inp .inp_name{text-align:right;}
	.inp .inp_value,.inp .inp_name{width:45%;float:left;margin:2px;}
	@media only screen and (max-width: 768px) {
		.inp .inp_value,.inp .inp_name{width:98%;float:left;margin:2px;}
	}
</style>
<body>
	<?php include_once "../../php/includes/head_logobox.php";?>
	<?php include_once "../../php/includes/top_nav.php";?>
	<?php include_once "../../php/includes/sidebar_Admin.php";?>
	<div class="container bg_white" style="padding:0;">
    <ul class="bread">
      <li><a href="./" title=""><em><span class="fa fa-tachometer-alt"></span> Dashboard</em></a></li>
			<li><a href="activity_employee" title=""><em><span class="fa fa-user-tie"></span> Employee</em></a></li>
      <li class="breadcurrent"><a href="" title=""><em><span class="fa fa-key"></span> Update Password</em></a></li>
    </ul>
		<center><h2>Employee Password Management</h2></center>
		<br>
		<form onsubmit="changepassword();return false;" name= "activity_student_changepassword" >
			<div class="inp">
				<div class="inp_name">
					Enter Student Id Number :
				</div>
				<div class="inp_value">
					<input type="text" required="required" placeholder="Employee Id Number" name="stu_userId" id="stu_userId" onchange="showimg();return false;">
				</div>
				<span id="img_confirm"></span>

				<div class="inp_name">
					Enter New Password :
				</div>
				<div class="inp_value">
					<input type="text" name="new_password" id="newpass" required="required" placeholder="Enter New Password">
				</div>
				<div class="inp_name">
					<button type="submit" class="btn btn-success"><span class="fa fa-check"> </span> Reset Password</button>
				</div>
				<div class="inp_value">
				<button type="reset" id="reset" class="btn btn-warning"><span class="fa fa-sync"> </span> Reset Password</button>
				</div>
			</div>
		</form>
	</div>
	<?php include_once "../../php/includes/footer.php";?>
	<script type="text/javascript" src="../../assets/js/jquery-1.9.1.min.js"></script>
	<script type="text/javascript" src="../../assets/fontawesome/js/all.js"></script>
	<script type="text/javascript" src="../../assets/fontawesome/js/fontawesome.js"></script>
	<script type="text/javascript" src="../../assets/js/jquery.min.js"></script>
	<script type="text/javascript" src="../../assets/js/main.js"></script>
	<script type="text/javascript">
	function changepassword(){
		var stuId    = document.getElementById('stu_userId').value;
		var passw    = document.getElementById('newpass').value;
    var values =["activity_employee_change_password",stuId,passw];
		var msg=SendToPhp(values,"../../php/controllers/Admin.php");
    if(msg=="success"){
			snackbar("User "+stuId+" Password was updated successfully");
			document.getElementById("reset").click();
		}
		document.getElementById("reset").click();
	}
	function showimg(){
		
		var msg    = document.getElementById('stu_userId').value;
		msg=msg.toUpperCase();var jj='';
		if( msg.length>=2){
			jj+='<div class="inp_name">Employee Picture Confirmation :</div>	<div class="inp_value" id="img_confirm"><img src="http://210.212.217.208/Registrations/upload/'+msg+'/'+msg+'.jpg" style="width:100px;height:120px;"></div> ';

    var valuess =["activity_employee_change_password_getold",msg];
		var msgs=SendToPhp(valuess,"../../php/controllers/Admin.php");alert(msgs);
			jj+='<div class="inp_name">Employee Old Password :</div>	<div class="inp_value" id="img_confirm">'+msgs+'</div> ';
			selectionListDisplay("img_confirm",jj);
		}
	}

	</script>
</body>
</html>