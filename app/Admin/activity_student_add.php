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
	fieldset{width:45%;border:1px solid gray;margin:2px 2%;float:left;padding:10px;}
	legend{background:rgba(100,100,100,0.7);font-size:15px;margin-left:10px;max-width:80%;padding:5px 10px;font-weight:900;}
	.inp{width:100%;margin:1px;font-size:14px;padding:0;}
	.inp .inp_name,.inp .inp_value{width:48%;float:left;}
	.inp .inp_name{text-align:right;}
	.inp_value select,input[type="date"],input[type="text"]{width:90%;padding:2px;min-height:30px;border:1px solid gray;}
</style>
<body>
	<?php include_once "../../php/includes/head_logobox.php";?>
	<?php include_once "../../php/includes/top_nav.php";?>
	<?php include_once "../../php/includes/sidebar_Admin.php";?>
	<div class="container bg_white" style="padding:0;">
    <ul class="bread">
      <li><a href="./" title=""><em><span class="fa fa-tachometer-alt"></span> Dashboard</em></a></li>
			<li><a href="activity_student" title=""><em><span class="fa fa-user"></span> Student</em></a></li>
      <li class="breadcurrent"><a href="" title=""><em><span class="fa fa-user-plus"></span> Add New User</em></a></li>
    </ul>
		<form action="" method="post" enctype="multipart/form-data" name="adduser_stu" onsubmit="adduserId();return false;">
			<fieldset>
				<legend>User Details</legend>
				<div class="inp">
					<div class="inp_name">Student Name : </div>
					<div class="inp_value"> <input type="text" name="student_name" required autocomplete="off"></div>
				</div>
				<div class="inp">
					<div class="inp_name">Student Id Number : </div>
					<div class="inp_value"> <input type="text" name="student_id" required autocomplete="off"></div>
				</div>
				<div class="inp">
					<div class="inp_name">Current Year : </div>
					<div class="inp_value"> <select name="student_cYear" required autocomplete="off"><option value="PUC-1">PUC-1</option><option value="PUC-1">PUC-2</option><option value="PUC-1">ENGG-1</option><option value="PUC-1">ENGG-2</option><option value="PUC-1">ENGG-3</option><option value="PUC-1">ENGG-4</option></select></div>
				</div>
				<div class="inp">
					<div class="inp_name">Current Branch : </div>
					<div class="inp_value"> <select  name="student_department" required autocomplete="off"><option value="PUC-1">PUC-1</option><option value="PUC-1">PUC-2</option><option value="CH">Chemical</option><option value="CE">Civil</option><option value="CS">CSE</option><option value="EC">ECE</option><option value="MM">MME</option><option value="ME">MEchanical</option></select></div>
				</div>
				<div class="inp">
					<div class="inp_name">Select Gender : </div>
					<div class="inp_value"> <select  name="student_gender" required autocomplete="off"><option value="PUC-1">Female</option><option value="PUC-1">Male</option></select></div>
				</div>
				<div class="inp">
					<div class="inp_name">Joining Year : </div>
					<div class="inp_value"><select  name="student_joining" required autocomplete="off"><option value="2018">2018</option><option value="2017">2017</option><option value="2016">2016</option><option value="2015">2015</option><option value="2014">2014</option><option value="2013">2013</option><option value="2012">2012</option><option value="2011">2011</option><option value="2010">2010</option><option value="2009">2009</option><option value="2008">2008</option></select></div>
				</div>
				<div class="inp">
					<div class="inp_name">Student Status : </div>
					<div class="inp_value"> <select  name="student_status" required autocomplete="off"><option value="Active">Active</option><option value="TC">TC</option><option value="PASSES-OUT">PASSED-OUT</option></select></div>
				</div>
				<div class="inp">
					<div class="inp_name">Date of Birth : </div>
					<div class="inp_value"> <input type="date" name="student_dob" required autocomplete="off"></div>
				</div>
			</fieldset>
			<fieldset>
				<legend>Personal Details</legend>
				<div class="inp">
					<div class="inp_name">Father Name : </div>
					<div class="inp_value"> <input type="text" name="student_fname" required autocomplete="off"></div>
				</div>
				<div class="inp">
					<div class="inp_name">Father Mobile Number : </div>
					<div class="inp_value"> <input type="text" name="student_fm" required autocomplete="off"></div>
				</div>
				<div class="inp">
					<div class="inp_name">Mother Name : </div>
					<div class="inp_value"> <input type="text" name="student_mname" required autocomplete="off"></div>
				</div>
				<div class="inp">
					<div class="inp_name">Mother Mobile Number : </div>
					<div class="inp_value"> <input type="text" name="student_mm" required autocomplete="off"></div>
				</div>
				<div class="inp">
					<div class="inp_name">Guardian Name : </div>
					<div class="inp_value"> <input type="text" name="student_gname" required autocomplete="off"></div>
				</div>
				<div class="inp">
					<div class="inp_name">Guardian Mobile Number : </div>
					<div class="inp_value"> <input type="text" name="student_gm" required autocomplete="off"></div>
				</div>
				<div class="inp">
					<div class="inp_name">Cast/Community : </div>
					<div class="inp_value"> <select name="student_cast" required autocomplete="off"><option value="SC">SC</option><option value="ST">ST</option><option value="BC-A">BC-A</option><option value="BC-B">BC-B</option><option value="BC-C">BC-C</option><option value="BC-D">BC-D</option><option value="BC-E">BC-E</option><option value="OC">OC</option></select> </div>
				</div>
				<div class="inp">
					<div class="inp_name">Cast/Community Application Id : </div>
					<div class="inp_value"> <input type="text" name="student_castid" required autocomplete="off"></div>
				</div>
			</fieldset>

			<fieldset>
				<legend>Communication Details</legend>
				<div class="inp">
					<div class="inp_name">Current Address : </div>
					<div class="inp_value"> <input type="text" name="student_caddress" required autocomplete="off"></div>
				</div>
				<div class="inp">
					<div class="inp_name">Perminent Address : </div>
					<div class="inp_value"> <input type="text" name="student_paddress" required autocomplete="off"></div>
				</div>
			</fieldset>
			<fieldset>
				<legend>Income Details</legend>
				<div class="inp">
					<div class="inp_name">Annuval Income : </div>
					<div class="inp_value"> <input type="text" name="student_income" required autocomplete="off"></div>
				</div>
				<div class="inp">
					<div class="inp_name">Income Source: </div>
					<div class="inp_value"> <input type="text" name="student_incomesource" required autocomplete="off"></div>
				</div>
			</fieldset>
			<fieldset>
				<legend>Hostel Details</legend>
				<div class="inp">
					<div class="inp_name">Select Hostel : </div>
					<div class="inp_value"> <select name="student_hostel" required autocomplete="off"><option value="BH-1">BH-1</option><option value="BH-2">BH-2</option><option value="GH-1">GH-1</option><option value="GH-2">GH-2</option></select></div>
				</div>
				<div class="inp">
					<div class="inp_name">Hostel Room Number: </div>
					<div class="inp_value"> <input type="text" name="student_room" required autocomplete="off"></div>
				</div>
				<div class="inp">
					<div class="inp_name">Cot number : </div>
					<div class="inp_value"> <input type="text" name="student_cot" required autocomplete="off"></div>
				</div>
				<div class="inp">
					<div class="inp_name">Bed Number : </div>
					<div class="inp_value"> <input type="text" name="student_bed" required autocomplete="off"></div>
				</div>
			</fieldset>
			<fieldset>
				<legend>Security Details</legend>
				<div class="inp">
					<div class="inp_name">Password : </div>
					<div class="inp_value"> <input type="text" name="student_password" required autocomplete="off"></div>
				</div>
				<div class="inp">
					<div class="inp_name">Mobile Number-1 : </div>
					<div class="inp_value"> <input type="text" name="student_m1" required autocomplete="off"></div>
				</div>
				<div class="inp">
					<div class="inp_name">Mobile Number-2 : </div>
					<div class="inp_value"> <input type="text" name="student_m2" required autocomplete="off"></div>
				</div>
				<div class="inp">
					<div class="inp_name">Email Id : </div>
					<div class="inp_value"> <input type="text" name="student_email" required autocomplete="off"></div>
				</div>
			</fieldset>
			<fieldset>
				<legend>Attendance Details</legend>
				<div class="inp">
					<div class="inp_name">Biometric Status : </div>
					<div class="inp_value"> <select name="student_bio" required autocomplete="off"><option value="Working">Working</option><option value="Not-Working">Not-Working</option></select></div>
				</div>
				<div class="inp">
					<div class="inp_name">Blood Group : </div>
					<div class="inp_value"> <select name="student_blood" required autocomplete="off"><option value="A+">A+</option><option value="A-">A-</option><option value="B+">B+</option><option value="B-">B-</option><option value="AB+">AB+</option><option value="AB-">AB-</option><option value="O-">O-</option><option value="O+">O+</option></select></div>
				</div>
				<div class="inp">
					<div class="inp_name">Aadhar Number : </div>
					<div class="inp_value"> <input type="text" name="student_aadhar" required autocomplete="off"></div>
				</div>
			</fieldset>
			<fieldset>
				<legend>Other Details</legend>
				<div class="inp">
					<div class="inp_name">Ration Card Number : </div>
					<div class="inp_value"> <input type="text" name="student_rc" required autocomplete="off"></div>
				</div>
				<div class="inp">
					<div class="inp_name">Pan Card Number : </div>
					<div class="inp_value"> <input type="text" name="student_pan" autocomplete="off"></div>
				</div>
				<div class="inp">
					<div class="inp_name">Passport Number : </div>
					<div class="inp_value"> <input type="text" name="student_passport" autocomplete="off"></div>
				</div>
			</fieldset>
			<div class="clear"></div>
			<br>
			<center>
			<button class="btn btn-success" type="submit"><span class="fa fa-check"></span> Add User</button>
			<button class="btn btn-info" type="submit"><span class="fa fa-refresh"></span>  Reset Details</button></center>
		</form>
	</div>
	<?php include_once "../../php/includes/footer.php";?>
	<script type="text/javascript" src="../../assets/js/jquery-1.9.1.min.js"></script>
	<script type="text/javascript" src="../../assets/fontawesome/js/all.js"></script>
	<script type="text/javascript" src="../../assets/fontawesome/js/fontawesome.js"></script>
	<script type="text/javascript" src="../../assets/js/jquery.min.js"></script>
	<script type="text/javascript" src="../../assets/js/main.js"></script>
	<script type="text/javascript">
	function adduserId(){
		var student_name     = document.forms['adduser_stu']['student_name'].value;
		var student_id    = document.forms['adduser_stu']['student_id'].value;
		var student_cYear    = document.forms['adduser_stu']['student_cYear'].value;
		var student_department    = document.forms['adduser_stu']['student_department'].value;
		var student_gender    = document.forms['adduser_stu']['student_gender'].value;
		var student_joining    = document.forms['adduser_stu']['student_joining'].value;
		var student_status    = document.forms['adduser_stu']['student_status'].value;
		var student_dob    = document.forms['adduser_stu']['student_dob'].value;
		var student_fname    = document.forms['adduser_stu']['student_fname'].value;
		var student_fm    = document.forms['adduser_stu']['student_fm'].value;
		var student_mname    = document.forms['adduser_stu']['student_mname'].value;
		var student_mm    = document.forms['adduser_stu']['student_mm'].value;
		var student_gname    = document.forms['adduser_stu']['student_gname'].value;
		var student_gm    = document.forms['adduser_stu']['student_gm'].value;
		var student_cast    = document.forms['adduser_stu']['student_cast'].value;
		var student_castid    = document.forms['adduser_stu']['student_castid'].value;
		var student_caddress    = document.forms['adduser_stu']['student_caddress'].value;
		var student_paddress    = document.forms['adduser_stu']['student_paddress'].value;
		var student_income    = document.forms['adduser_stu']['student_income'].value;
		var student_incomesource    = document.forms['adduser_stu']['student_incomesource'].value;
		var student_hostel    = document.forms['adduser_stu']['student_hostel'].value;
		var student_room    = document.forms['adduser_stu']['student_room'].value;
		var student_cot    = document.forms['adduser_stu']['student_cot'].value;
		var student_bed    = document.forms['adduser_stu']['student_bed'].value;
		var student_password    = document.forms['adduser_stu']['student_password'].value;
		var student_m1    = document.forms['adduser_stu']['student_m1'].value;
		var student_m2    = document.forms['adduser_stu']['student_m2'].value;
		var student_email    = document.forms['adduser_stu']['student_email'].value;
		var student_bio    = document.forms['adduser_stu']['student_bio'].value;
		var student_blood    = document.forms['adduser_stu']['student_blood'].value;
		var student_aadhar    = document.forms['adduser_stu']['student_aadhar'].value;
		var student_rc    = document.forms['adduser_stu']['student_rc'].value;
		var student_pan    = document.forms['adduser_stu']['student_pan'].value;
		var student_passport    = document.forms['adduser_stu']['student_passport'].value;
		var values=['activity_student_add_new_user',student_id,student_password,student_name,student_department,student_gender,student_joining,student_status,student_cYear,student_aadhar,student_email,student_m1,student_m2,student_fm,student_mm,student_fname,student_mname,student_dob,student_cast,student_castid,student_pan,student_passport,student_rc,student_gname,student_gm,student_caddress,student_paddress,student_income,student_incomesource,student_blood,student_bio,student_hostel,student_cot,student_bed,student_room];
		var msg=SendToPhp(values,"../../php/controllers/Admin.php");
		if(msg=="success"){
			snackbar("Creating new user "+student_id+" was sucessfully Completed");
		}
		else{
			snackbar("Creating new user "+student_id+" was Failed.PLease Register again.Sorry for Inconvinece.If you are facin this problem again please contact administrator.");
		}
	}
	</script>
</body>
</html>