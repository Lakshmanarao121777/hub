<?php session_start();
if (!$_SESSION) {
    header("Location:../../php/includes/logout.php");
} else {
    if ($_SESSION['USER_TYPE'] != "employee") {
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
  <link rel="stylesheet" type="text/css" href="../../assets/css/employee.css">
</head>
<style>
  form{width:100%;}
	fieldset{width:48%;border:1px solid teal;float:left;margin:.65%}
	select{width:100%;padding:4px;}
	input{width:100%;}
	@media only screen and (max-width: 768px) { 
		fieldset{width:100%;}
	}
  
</style>
<body>
  <?php include_once "../../php/includes/head_logobox.php";?>
  <?php include_once "../../php/includes/top_nav.php";?>
  <?php include_once "../../php/includes/sidebar_employee.php";?>
  <?php
    include_once "../../php/config/DBActivityPHP.php";
    $designation = new DBActivityPHP();
    $user_ofc = $designation->getColValue("employee_designations", "userID='$_SESSION[USER_ID]'", "office");
    $user_designation = $designation->getColValue("employee_designations", "userID='$_SESSION[USER_ID]'", "designation");
    ?>
  <div class="container bg_white" style="padding:0 0 20px 0;">
    <ul class="bread">
    <li><a href="./" title=""><em><span class="fa fa-tachometer-alt"></span> Dashboard</em></a></li>
		<li><a href="activity_employee" title=""><em><span class="fa fa-user-tie"></span> Employee Activity</em></a></li>
      <li class="breadcurrent"><a href="" title=""><em><span class="fa fa-user-plus"></span> New Employee</em></a></li>
    </ul>
    <br>    
    <form action="" method="post" enctype="multipart/form-data" name="adduser_stu" onsubmit="adduserId();return false;">
			<fieldset>
				<legend>User Details</legend>
				<div class="inp">
					<div class="inp_name">Employee Name : </div>
					<div class="inp_value"> <input type="text" name="student_name" required autocomplete="off"></div>
				</div>
				<div class="inp">
					<div class="inp_name">Employee Id Number : </div>
					<div class="inp_value"> <input type="text" name="student_id" required autocomplete="off"></div>
				</div>
				<div class="inp">
					<div class="inp_name">Employee Mobile : </div>
					<div class="inp_value"> <input type="number" name="student_m1" required autocomplete="off"></div>
				</div>
				<div class="inp">
					<div class="inp_name">Alternative Mobile-2 : </div>
					<div class="inp_value"> <input type="number" name="student_m2" required autocomplete="off"></div>
				</div><div class="inp">
					<div class="inp_name">Employee Email : </div>
					<div class="inp_value"> <input type="email" name="student_email" required autocomplete="off"></div>
				</div><div class="inp">
					<div class="inp_name">Alternative Email : </div>
					<div class="inp_value"> <input type="email" name="student_email2" required autocomplete="off"></div>
				</div>
				<div class="inp">
					<div class="inp_name">Select Gender : </div>
					<div class="inp_value"> <select  name="student_gender" required autocomplete="off"><option value="PUC-1">Female</option><option value="PUC-1">Male</option></select></div>
				</div>
				<div class="inp">
					<div class="inp_name">Joining Year : </div>
					<div class="inp_value"> <input type="date" name="student_joining" required autocomplete="off"></div>
				</div>
				<div class="inp">
					<div class="inp_name">Student Status : </div>
					<div class="inp_value"> <select  name="student_status" required autocomplete="off"><option value="Active">Active</option></select></div>
				</div>
				<div class="inp">
					<div class="inp_name">Date of Birth : </div>
					<div class="inp_value"> <input type="date" name="student_dob" required autocomplete="off"></div>
				</div>
			</fieldset>
			<fieldset>
				<legend>Identifications</legend>
				<div class="inp">
					<div class="inp_name">Employee Department : </div>
					<div class="inp_value"> <input type="text" name="student_dept" required autocomplete="off"></div>
				</div>
				<div class="inp">
					<div class="inp_name">Pancard : </div>
					<div class="inp_value"> <input type="text" name="student_pancard" required autocomplete="off"></div>
				</div>
				<div class="inp">
					<div class="inp_name">Passport : </div>
					<div class="inp_value"> <input type="text" name="student_passport" required autocomplete="off"></div>
				</div>
				<div class="inp">
					<div class="inp_name">Aadhar: </div>
					<div class="inp_value"> <input type="text" name="student_aadhar" required autocomplete="off"></div>
				</div>
				<div class="inp">
					<div class="inp_name">Employee Type : </div>
					<div class="inp_value">
						<select name="student_type">
							<option value="Regualar">Regular</option>
							<option value="contract">Contract</option>
							<option value="outsourcing">Out-Sourcing</option>
						</select></div>
				</div>
			</fieldset>
			<div class="clear"></div>
			<br>
			<center>
			<button class="btn btn-success" type="submit"><span class="fa fa-check"></span> Add User</button>
			<button class="btn btn-info" type="submit"><span class="fa fa-sync"></span>  Reset Details</button></center>
		</form>
  </div>
  <?php include_once "../../php/includes/footer.php";?>
  <script type="text/javascript" src="../../assets/js/jquery-1.9.1.min.js"></script>
  <script type="text/javascript" src="../../assets/fontawesome/js/all.js"></script>
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
		var msg=SendToPhp(values,"../../php/controllers/employee.php");
		var obj = JSON.parse(msg);
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
