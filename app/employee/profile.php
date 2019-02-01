<?php session_start(); 
	if(!$_SESSION){
		header("Location:../../php/includes/logout.php");
	}
	else
	{
		if($_SESSION['USER_TYPE']!="employee"){
			header("Location:../../php/includes/logout.php");
		}
		$stuIds=$_SESSION['USER_ID'];
	}
?>  
<!DOCTYPE html>
<html lang="en">
<head>
  <title>AIR-HUB :: RGUKT-RKV</title>
  
  <?php include_once("../../php/meta/meta.php"); ?>

  <link rel="stylesheet" type="text/css" href="../../assets/bootstrap/css/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="../../assets/fontawesome/css/all.css">
  <link rel="stylesheet" type="text/css" href="../../assets/css/_main.css">
  <link rel="stylesheet" type="text/css" href="../../assets/css/employee.css">
</head>
<style type="text/css">
	.tab{margin:0;}
	.container ul.tab{width:100%;margin: 0;float: left;}
	.container ul.tab>li {display: inline;float: left;margin:0 0 0 2px;}
	.container ul.tab>li a.tablinks{padding:4.5px 11px;font-size:16px;float: left;margin: 0;border:1px solid rgba(0,0,0,0.3);border-radius: 10px 10px 0 0;min-width:100px;color:rgba(0,0,0,0.9);text-decoration: none;}
	.container ul.tab>li:hover{background:rgba(0,0,0,0.2);color:rgba(0,0,0,.7);border-radius:10px 10px 0 0;}
	.tabcontents{width:100%;border:1px solid gray;float: left;padding:10px;display:none;}
	.active_tab_top{font-size:180px;border-bottom:1px solid green;border-radius: 10px 10px 0 0;background:rgba(0,0,0,0.05);color:rgba(0,0,0,.7);border:0;}
	.inp{min-height:100%;width:95%}
	.inp_value input[type="text"]{max-width:90%;}
	.inp_value input[type="date"]{max-width:90%;}
	.inp_value textarea,.inp_value select{width:90%;height:100%;padding:3px 5px;}
	.inp_value {height:100%;}
	fieldset{width:50%;float:left;}
	.inp_name{text-align: left;}
	.inp{width:100%;float: left;}
		.inp .inp_name{text-align: right;height: 100%;font-weight: 600;}
		.inp .inp_value{float: left;height: 100%;font-size:15px;}
		.hide-md{display:none;}
		.hide-sm{display:block;}
		#addressbookshow th{background:teal;color:white;padding:8px 10px;}
		#addressbookshow td{padding:8px 10px;}
	@media only screen and (max-width: 768px) { 
		.container ul.tab>li a.tablinks{min-width:20px;}
		fieldset{width:100%;}
		legend{min-width:100%;margin:0;}
		.inp{width:100%;float: left;}
		.inp .inp_name{width:100%;text-align: left;height: 100%;font-weight: 600;}
		.inp .inp_value{width:100%;float: left;height: 100%;font-size:15px;}
		.inp_value input[type="text"]{max-width:90%;}
		.inp_value input[type="date"]{max-width:90%;}
		.br{border-bottom:1px solid gray;border-right:0;}
		.container ul.tab{width:100%;margin: 0;float: left;}
		ul.tab{padding:5px 10px;font-size:14px;border-radius: 10px 10px 0 0;min-width:40%;}
		.hide-sm{display:none;}
		.hide-md{display:block}
	}
</style>
<body>
  <?php include_once("../../php/includes/head_logobox.php"); ?>
  <?php include_once("../../php/includes/top_nav.php"); ?>
  <?php include_once("../../php/includes/sidebar_employee.php"); ?>
  <div class="container bg_white" style="padding:2px;">
    <ul class="bread">
      <li><a href="./" title=""><em><span class="fa fa-tachometer-alt"></span> Dashboard</em></a></li>
      <li class="breadcurrent"><a href="#" title=""><em><span class="fa fa-user"></span> My Profile</em></a></li>
    </ul>
		<br>
  	<ul class="tab">
			<li title="Personal"><a href="#Personal" class="tablinks" onclick="openprofile(event,'Personal');return false;"><span class="hide-md fa fa-user-alt"> </span> <span class="hide-sm"> Personal Personal </span></a></li>
			<li title="Security"><a href="#Security" class="tablinks" onclick="openprofile(event,'Security');return false;"><span class="hide-md fa fa-shield-alt"> </span> <span class="hide-sm" id="defaultOpen"> Security </span></a></li>
			<li title="Acadamic"><a href="#Acadamic" class="tablinks" onclick="openprofile(event,'Acadamic');return false;" ><span class="hide-md fa fa-user-graduate"> </span> <span class="hide-sm"> Acadamics </span></a></li>
			<li title="Achivements"><a href="#Misc" class="tablinks" onclick="openprofile(event,'Misc');return false;"><span class="hide-md fa fa-award"> </span> <span class="hide-sm">  Achivements </span></a></li>
			<li title="Address Book"><a href="#addressbook" class="tablinks" onclick="openprofile(event,'addressbook');return false;"><span class="hide-md fa fa-address-book"> </span> <span class="hide-sm"> Address Book </span></a></li>
			<li title="Past Expeiences"><a href="#experience" class="tablinks" onclick="openprofile(event,'experience');return false;"><span class="hide-md fa fa-briefcase"> </span> <span class="hide-sm"> Experience </span></a></li>
			<li title="Payroll Details"><a href="#payroll" class="tablinks" onclick="openprofile(event,'payroll');return false;"><span class="hide-md fa fa-money-bill-alt"> </span> <span class="hide-sm"> Payroll </span></a></li>
		</ul>
		<div id="Personal" class="tabcontents">
			<div id="personalshow"></div>
		</div>
		<div id="Acadamic" class="tabcontents">
			Update soon
		</div>
		<div id="Security" class="tabcontents">
			<fieldset>
				<legend>Password Manager:-</legend>
				<form method="POST" onsubmit="changePassword('<?php echo $_SESSION['USER_ID']; ?>');return false;" name="changepass" style="width:100%;">
					<div class="inp">
						<div class="inp_name">Old Password : </div> 
						<div class="inp_value"><input type="password" name="oldpass" required="required" autocomplete="off"></div>
					</div>
						<div class="inp">
						<div class="inp_name">New Password : </div> 
						<div class="inp_value"><input type="password" name="newpass" required="required" autocomplete="off"></div>
					</div>
					<div class="inp">
						<div class="inp_name">Confirm Password : </div> 
						<div class="inp_value"><input type="password" name="cpass" required="required" autocomplete="off"></div>
						<span id="error"></span>
					</div><center>
					<button type="submit" class="btn btn-sm btn-success"><span class="fa fa-check"> </span> Change Password</button> <button type="reset" class="btn btn-warning btn-sm" id="resetpassword"> <span class="fa fa-sync"> </span> Reset </button></center>
				</form>
			</fieldset>
			<fieldset>
				<legend>Password  Policy:-</legend>
				<ol>
					<li>Old Password and New Password Must not Match</li>
					<li>New Password and Confirm Password Must Match</li>
					<li>Create Strong Password to Prevent UN-Expected Events</li>
				</ol>
			</fieldset>
		</div>
		<div id="Misc" class="tabcontents">
			Updatesoon
		</div>
		<div id="addressbook" class="tabcontents">
			<fieldset>
				<legend>Add New Contact</legend>
				<form method="post" onsubmit="addContact('<?php echo $_SESSION['USER_ID']; ?>');return false;" name="addcontact"  style="width:100%;">
					<div class="inp">
						<div class="inp_name">Contact Name</div>
						<div class="inp_value"><input type="text" name="contactName" required="required"></div>
					</div>
					<div class="inp">
						<div class="inp_name">Contact Mobile</div>
						<div class="inp_value"><input type="number" name="contactMobile" required="required" ></div>
					</div>
					<div class="inp">
						<div class="inp_name">Contact Email</div>
						<div class="inp_value"><input type="text" name="contactEmail" ></div>
					</div>
					<div class="inp">
						<div class="inp_name">Contact Type</div>
						<div class="inp_value">
							<select name="contactType">
								<option value="Primary"> Primary </option>
								<option value="Work"> Work </option>
								<option value="Home"> Home </option>
								<option value="Business"> Business </option>
							</select>
						</div>
					</div>
					<button type="submit" class="btn btn-sm btn-success"><span class="fa fa-address-book	"></span> Save Contact</button>
					<button type="reset" class="btn btn-sm btn-warning" id="resetcontact"><span class="fa fa-sync"></span> Reset</button>
				</form>
			</fieldset>
			<div id="addressbookshow"></div>
		</div>
		<div id="experience" class="tabcontents">
			<fieldset class="br">
				<form method="post" name="addexperience" onsubmit="addexperiences('<?php echo $_SESSION['USER_ID']; ?>');return false;" style="width:100%;">
					<legend>Add New Job Experience </legend>
					<div class="inp">
						<div class="inp_name">Employee Id</div>
						<div class="inp_value"><input type="text" required="required" readonly="readonly" name="jobuserId" value="<?php echo $_SESSION['USER_ID']; ?>" /></div>
					</div>
					<div class="inp">
						<div class="inp_name">Job Title</div>
						<div class="inp_value"><input type="text" required="required" name="jobTitle" /></div>
					</div>
					<div class="inp">
						<div class="inp_name">Designation</div>
						<div class="inp_value"><input type="text" required="required" name="jobDesignation" /></div>
					</div>
					<div class="inp">
						<div class="inp_name">Worked From</div>
						<div class="inp_value"><input type="date" required="required" name="jobFrom" /></div>
					</div>
					<div class="inp">
						<div class="inp_name">Worked To</div>
						<div class="inp_value"><input type="date" required="required" name="jobTo" /></div>
					</div>
					<div class="inp">
						<div class="inp_name">Job Discription</div>
						<div class="inp_value"><textarea required="required" name="jobDiscription"></textarea></div>
					</div>
					<div class="inp">
						<div class="inp_name">Organization/Company Name</div>
						<div class="inp_value"><input type="text" required="required" name="jobCompany" /></div>
					</div>
					<div class="inp">
						<div class="inp_name">Organization/Company website</div>
						<div class="inp_value"><input type="text" required="required" name="jobWesite" /></div>
					</div>
					<div class="inp">
						<div class="inp_name">Organization/Company Address</div>
						<div class="inp_value"><input type="text" required="required" name="jobCompanyAddress" /></div>
					</div>
					<center>
					<button type="submit" class="btn btn-sm btn-success"><span class="fa fa-check"></span> Add This Experience </button>
					<button type="reset" id="resetexperience" class="btn btn-sm btn-warning"><span class="fa fa-sync"></span> Reset</button></center>
				</form>
			</fieldset>
			<div id="experienceshow"></div>
		</div>
		<div id="payroll" class="tabcontents">
			<div id="payrollshow"></div>
		</div>
	</div>
  <?php include_once("../../php/includes/footer.php"); ?>
  <script type="text/javascript" src="../../assets/js/jquery-1.9.1.min.js"></script>
  <script type="text/javascript" src="../../assets/fontawesome/js/all.js"></script>
  <script type="text/javascript" src="../../assets/fontawesome/js/fontawesome.js"></script>
  <script type="text/javascript" src="../../assets/js/jquery.min.js"></script>
  <script type="text/javascript" src="../../assets/js/main.js"></script>
	<script type="text/javascript">
		function openprofile(evt,cityName) {
			if(cityName=="Personal"){showpersonal("<?php echo $_SESSION['USER_ID']; ?>");};
			if(cityName=="addressbook"){showaddressbook("<?php echo $_SESSION['USER_ID']; ?>");};
			if(cityName=="experience"){showexperiences("<?php echo $_SESSION['USER_ID']; ?>");};
			if(cityName=="payroll"){showpayroll("<?php echo $_SESSION['USER_ID']; ?>");};
		    var i, tabcontent, tablinks;
		    tabcontent = document.getElementsByClassName("tabcontents");
		    for (i = 0; i < tabcontent.length; i++) {
		        tabcontent[i].style.display = "none";
		    }
		    tablinks = document.getElementsByClassName("tablinks");
		    for (i = 0; i < tablinks.length; i++) {
		        tablinks[i].className = tablinks[i].className.replace(" active_tab_top", "");
		    }
		    document.getElementById(cityName).style.display = "block";
		    evt.currentTarget.className += " active_tab_top";
		} 
		document.getElementById("defaultOpen").click();
		//showaddressbook("<?php echo $_SESSION['USER_ID']; ?>");
		showpersonal("<?php echo $_SESSION['USER_ID']; ?>");
		//showpayroll("<?php echo $_SESSION['USER_ID']; ?>");
		//showexperiences("<?php echo $_SESSION['USER_ID']; ?>");
		function changePassword(userId){
			var oldPass = document.forms['changepass']['oldpass'].value;
			var newPass = document.forms['changepass']['newpass'].value;
			var cPass   = document.forms['changepass']['cpass'].value;
			if(oldPass !=""){
				if(oldPass != newPass){
					if(cPass == newPass ){
						var values = ['chanegePassword',oldPass,newPass,userId];
						msg= SendToPhp(values,"../../php/controllers/employee.php");
						var obj = JSON.parse(msg);
						if(obj.Message=="success"){
							snackbar("Your Password has been updated successfully.");
							document.getElementById("resetpassword").click();
						}
					  else{
							snackbar("Your Password updation Failed due to Technical reasons Please contact Administrator.");
							document.getElementById("resetpassword").click();
						}
					}
					else{
						snackbar("New Password and Confirmation Password must Match.");
						document.getElementById("resetpassword").click();
					}	
				}
				else{
					snackbar("New Password and Old Password must not be the same.");
					document.getElementById("resetpassword").click();
				}
			}
			else{
				snackbar("Old Password must not Empty.");
				document.getElementById("resetpassword").click();
			}
			document.getElementById("resetpassword").click();
		}
		function addContact(userId){
			var contactName    = document.forms['addcontact']['contactName'].value;
			var contactMobile = document.forms['addcontact']['contactMobile'].value;
			var contactEmail     = document.forms['addcontact']['contactEmail'].value;
			var contactType       = document.forms['addcontact']['contactType'].value;
			var values = ['addcontact',contactName,contactMobile,contactEmail,contactType,userId];
			msg= SendToPhp(values,"../../php/controllers/employee.php");
			var obj = JSON.parse(msg);
			if(obj.message=="success"){
				snackbar("Your Contact Named "+contactName+" was added successfully.");
				document.getElementById("resetcontact").click();
				showaddressbook("<?php echo $_SESSION['USER_ID']; ?>");
			}
		}
		function payrollUpdate(userId){
			var contactName    = document.forms['updatePayroll']['bankAccount'].value;
			var contactMobile = document.forms['updatePayroll']['bankBranch'].value;
			var contactEmail     = document.forms['updatePayroll']['bankAccount'].value;
			var contactType       = document.forms['updatePayroll']['pancard'].value;
			var values = ['payrollUpdateRequest',contactName,contactMobile,contactEmail,contactType,userId];
			msg= SendToPhp(values,"../../php/controllers/employee.php");
			var obj = JSON.parse(msg);
			if(obj.message=="success"){
				snackbar("Your Payroll Update Request was successfully recorded.");
				document.getElementById("resetpayrollrequest").click();
				showpayroll("<?php echo $_SESSION['USER_ID']; ?>");
			}
		}
		function addexperiences(userId){
			var jobTitle    = document.forms['addexperience']['jobTitle'].value;
			var jobDesignat = document.forms['addexperience']['jobDesignation'].value;
			var jobFrom     = document.forms['addexperience']['jobFrom'].value;
			var jobTo       = document.forms['addexperience']['jobTo'].value;
			var jobDiscript = document.forms['addexperience']['jobDiscription'].value;
			var jobCompany  = document.forms['addexperience']['jobCompany'].value;
			var jobWesite   = document.forms['addexperience']['jobWesite'].value;
			var jobAddress  = document.forms['addexperience']['jobCompanyAddress'].value;
			var jobUserId   = document.forms['addexperience']['jobuserId'].value;
			var values = ['addexperience',jobTitle,jobDesignat,jobFrom,jobTo,jobDiscript,jobCompany,jobWesite,jobAddress,jobUserId,userId];
			msg= SendToPhp(values,"../../php/controllers/employee.php");
			var obj = JSON.parse(msg);
			if(obj.message=="success"){
				snackbar("Your Past Experience is added successfully.");
				document.getElementById("resetexperience").click();
				showexperiences("<?php echo $_SESSION['USER_ID']; ?>");
			}
			else{
				snackbar("Your Past Experience adding was  Failed due to Technical reasons Please contact Administrator.");
			}
		}
		function showexperiences(userId){
			var oldDate='',i;
			var values = ['showexperience',userId];
			msg= SendToPhp(values,"../../php/controllers/employee.php");
			var obj = JSON.parse(msg);
			if((obj.Message).length==0){
				oldDate+='';
				snackbar("No Past Experience Records Found. Please go to Experiences Tab and Update Details. ");
			}
			for(i in obj.Message){
				oldDate+='<fieldset class="br"><legend>Job Experience </legend><div class="inp"><div class="inp_name">Employee Id</div><div class="inp_value">'+obj.Message[i].userId+'</div></div><div class="inp"><div class="inp_name">Job Title</div><div class="inp_value">'+obj.Message[i].jobTitle+'</div></div><div class="inp"><div class="inp_name">Designation</div><div class="inp_value">'+obj.Message[i].designation+'</div></div><div class="inp"><div class="inp_name">Worked From</div><div class="inp_value">'+obj.Message[i].workedFrom+'</div></div><div class="inp"><div class="inp_name">Worked To</div><div class="inp_value">'+obj.Message[i].workedTo+'</div></div><div class="inp"><div class="inp_name">Job Discription</div><div class="inp_value">'+obj.Message[i].discription+'</div></div><div class="inp"><div class="inp_name">Organization/Company Name</div><div class="inp_value">'+obj.Message[i].organizationName+'</div></div><div class="inp"><div class="inp_name">Organization/Company website</div><div class="inp_value">'+obj.Message[i].organizationAddress+'</div></div><div class="inp"><div class="inp_name">Organization/Company Address</div><div class="inp_value">'+obj.Message[i].organizationwebsite+'</div></div></fieldset>';
			}
			selectionListDisplay("experienceshow",oldDate);
		}
		function showpayroll(userId){
			var oldDate='',i;
			var values = ['showpayroll',userId];
			msg= SendToPhp(values,"../../php/controllers/employee.php");
			var obj = JSON.parse(msg);
			for(i in obj.Message){
				oldDate+='<fieldset class="br"><legend>Payroll Details </legend><div class="inp"><div class="inp_name">Employee Id</div><div class="inp_value">'+obj.Message[i].userId+'</div></div><div class="inp"><div class="inp_name">Employee Name</div><div class="inp_value">'+obj.Message[i].userName+'</div></div><div class="inp"><div class="inp_name">Account Number</div><div class="inp_value">'+obj.Message[i].accountNumber+'</div></div><div class="inp"><div class="inp_name">Branch Name</div><div class="inp_value">'+obj.Message[i].branchName+'</div></div><div class="inp"><div class="inp_name">Bank IFSC</div><div class="inp_value">'+obj.Message[i].ifsc+'</div></div><div class="inp"><div class="inp_name">PAN Card</div><div class="inp_value">'+obj.Message[i].pancard+'</div></div></fieldset>';
				var oldDate1='',i1;
				var values1 = ['showpayroll_request',obj.Message[i].userId];
				msg1= SendToPhp(values1,"../../php/controllers/employee.php");
				var obj1 = JSON.parse(msg1);
				if((obj1.Message).length==0){
						oldDate+='<fieldset class="br"><form method="post" onsubmit="payrollUpdate(\''+obj.Message[i].userId+'\')" name="updatePayroll" style="width:100%;"><legend>Payroll Details Update Request </legend><div class="inp"><div class="inp_name">Employee Id</div><div class="inp_value">'+obj.Message[i].userId+'</div></div><div class="inp"><div class="inp_name">Employee Name</div><div class="inp_value">'+obj.Message[i].userName+'</div></div><div class="inp"><div class="inp_name">Account Number</div><div class="inp_value"><input type="text" required="required" name="bankAccount" value="'+obj.Message[i].accountNumber+'"/></div></div><div class="inp"><div class="inp_name">Branch Name</div><div class="inp_value"><input type="text" required="required" name="bankBranch" value="'+obj.Message[i].branchName+'"/></div></div><div class="inp"><div class="inp_name">Bank IFSC</div><div class="inp_value"><input type="text" required="required" name="bankIFSC" value="'+obj.Message[i].ifsc+'"/></div></div><div class="inp"><div class="inp_name">PAN Card</div><div class="inp_value"><input type="text" required="required" name="pancard" value="'+obj.Message[i].pancard+'"/></div></div><center><button type="submit" class="btn btn-sm btn-success"><span class="fa fa-check"> </span> Request Payroll Datails Change</button> <button type="reset" class="btn btn-warning btn-sm" id="resetpassword"> <span class="fa fa-sync"> </span> Reset </button></center></form></fieldset>';
					}
				else{
					for(i1 in obj1.Message){
						if(obj1.Message[i].status=="Pending"){
							oldDate+='<fieldset class="br"><legend>Payroll Details Update Request </legend><b>Your Request was in Pending Please wait or Please contact FO Section or Establishment Section for more Details.</b></fieldset>';
						}
						if(obj1.Message[i].status=="Approved"){
							oldDate+='<fieldset class="br"><legend>Payroll Details Update Request </legend><p>Your Request was Approved and Details already reflected in your Profile Section.</p> <p>For any Technical Querys Please feel free to contact Administrot at sdc@rguktrkv.ac.in.</p> </fieldset>';
						}
					}
				}
			}
			selectionListDisplay("payrollshow",oldDate);
		}
		function showpersonal(userId){
			var oldDate='',i;
			var values = ['showpersonal',userId];
			msg= SendToPhp(values,"../../php/controllers/employee.php");
			var obj = JSON.parse(msg);
			for(i in obj.Message){
				oldDate+='<fieldset class="br"><legend>Personal Details </legend>';
				oldDate+='<div class="inp"><div class="inp_name">Employee Id</div><div class="inp_value">'+obj.Message[i].userId+'</div></div>';
				oldDate+='<div class="inp"><div class="inp_name">Employee Name</div><div class="inp_value">'+obj.Message[i].userName+'</div></div>';
				if(obj.Message[i].mobile !=""){
					oldDate+='<div class="inp"><div class="inp_name">Mobile -1</div><div class="inp_value">'+obj.Message[i].mobile+'</div></div>';
				}
				else{
					oldDate+='<div class="inp"><div class="inp_name">Mobile -1</div><div class="inp_value"><input type="text" id="mobile" /></div></div>';
				}
				if(obj.Message[i].email_1 !=""){
					oldDate+='<div class="inp"><div class="inp_name">Email (Primary)</div><div class="inp_value">'+obj.Message[i].email_1+'</div></div>';
				}
				else{
					oldDate+='<div class="inp"><div class="inp_name">Email (Primary)</div><div class="inp_value"><input type="text" id="email1" /></div></div>';
				}
				if(obj.Message[i].email_2 !=""){
					oldDate+='<div class="inp"><div class="inp_name">Email(Secondary)</div><div class="inp_value">'+obj.Message[i].email_2+'</div></div>';
				}
				else{
					oldDate+='<div class="inp"><div class="inp_name">Email(Secondary)</div><div class="inp_value"><input type="text" id="email2" /></div></div>';
				}
				if((obj.Message[i].aadhar).length ==12){
					oldDate+='<div class="inp"><div class="inp_name">Aadhar </div> <div class="inp_value">'+obj.Message[i].aadhar+'</div></div>';
				}
				else{
					oldDate+='<div class="inp"><div class="inp_name">Aadhar</div><div class="inp_value"><input type="text" id="aadhar" /></div></div>';
				}
				if(obj.Message[i].passport !=""){
					oldDate+='<div class="inp"><div class="inp_name">Passport</div><div class="inp_value">'+obj.Message[i].passport+'</div></div>';
				}
				else{
					oldDate+='<div class="inp"><div class="inp_name">Passport</div><div class="inp_value"><input type="text" id="passport" /></div></div>';
				}
				if(obj.Message[i].working_from !=""){
					oldDate+='<div class="inp"><div class="inp_name">Date of Joining</div><div class="inp_value">'+obj.Message[i].working_from+'</div></div>';
				}
				else{
					oldDate+='<div class="inp"><div class="inp_name">Date of Joining</div><div class="inp_value"><input type="text" id="doj" /></div></div>';
				}
				oldDate+='<div class="inp"><div class="inp_name">Status</div><div class="inp_value">'+obj.Message[i].status+'</div></div>';
				oldDate+='</fieldset>';
			}
			selectionListDisplay("personalshow",oldDate);
		}
		function showaddressbook(userId){
			var oldDate='',i;
			var values = ['showaddressbook',userId];
			msg= SendToPhp(values,"../../php/controllers/employee.php");
			var obj = JSON.parse(msg);
			if((obj.Message).length==0){
				oldDate+='<table class="table-responsive table-bordered table-active table-hover" style="width:100%;"><thaed><tr><th>Sno</th><th>Contact Name</th><th>Mobile Number</th><th>Email ID</th></tr></thaed><tbody><tr> <td colspan="5">No records found</td></tr></tbody></table>';
				snackbar("No Contacts Found.");
			}
			if((obj.Message).length!=0){
				oldDate+='<table id="addressbooktable" class="table-responsive table-bordered table-active table-hover" style="width:100%;"><thaed><tr><th onclick="sortTable(0,\'addressbooktable\')">Sno</th><th onclick="sortTable(1,\'addressbooktable\')">Contact Name</th><th onclick="sortTable(2,\'addressbooktable\')">Mobile Number</th><th onclick="sortTable(3,\'addressbooktable\')">Email ID</th></tr></thaed><tbody>';
				for(i in obj.Message){
					var ashwini=Number(i)+1;
					oldDate+='<tr><td>'+ashwini +'</td><td>'+obj.Message[i].contactName+' <span class="btn btn-xs btn-primary"> '+obj.Message[i].contactType+'</span></td><td>'+obj.Message[i].contactMobile+'</td><td>'+obj.Message[i].contactEmail+'</td></tr>';
				}
				oldDate+='</tbody></table>';
			}
			
			selectionListDisplay("addressbookshow",oldDate);
		}
	</script>
</body>
</html>