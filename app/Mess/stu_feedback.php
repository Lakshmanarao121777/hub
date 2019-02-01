 <?php session_start();
if (!$_SESSION) {
		header("Location:../../php/includes/logout.php");
} else {
		if ($_SESSION['USER_TYPE'] != "student") {
				header("Location:../../php/includes/logout.php");
		}
		$userId = $_SESSION['USER_ID'];
}
?>
<!DOCTYPE html> 
<html lang="en">
<head>
	<title>AIR-HUB :: RGUKT-RKV</title>

	<?php include_once "../../php/meta/meta.php";
include_once "../../php/config/Student.php";
?>

	<link rel="stylesheet" type="text/css" href="../../assets/bootstrap/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="../../assets/fontawesome/css/all.css">
	<link rel="stylesheet" type="text/css" href="../../assets/css/_main.css">
	<link rel="stylesheet" type="text/css" href="../../assets/css/Student.css">
</head>
<style type="text/css">
	form{padding:10px;width:70%;border:1px solid gray;margin:10px 0;}
	.inp .inp_value,.inp .inp_name{padding:5px;font-size: 16px;font-weight: 500;height:100%;}
	.inp_name{line-height:2;}
	input[type="text"],select{width:100%;border:1px solid gray;border-radius:2px;padding:5px;margin:1px 0;}
	.half{width: 50%;vertical-align: middle;}
	#showq {width:90%;float:left;margin: 10px 5%;padding:10px;}
	#showq .inp{width: 100%;border:1px solid gray;margin:1px;padding:2px;}
	#showq .inp .inp_name{width:60%;text-align:left;}
	#showq .inp .inp_value{width:36%;}
	.notfound{width:95%;margin:2.5%;}
	@media only screen and (max-width: 600px) { form{width:100%;}.inp .inp_value,.inp .inp_name{height:45px;padding:5px;font-size: 16px;font-weight: 500;width:100%;float: left;text-align: left;}
	.half{width: 100%;}
	 }
</style>
<body>
	<?php include_once "../../php/includes/head_logobox.php";?>
	<?php include_once "../../php/includes/top_nav.php";?>
	<?php include_once "../../php/includes/sidebar_Student.php";?>
	<div class="container bg_white" style="padding:0;">
		<ul class="bread">
			<li><a href="../" title=""><em><span class="fa fa-tachometer-alt"></span> Dashboard</em></a></li>
			<li><a href="../Student/survey" title=""><em><span class="fa fa-question"> </span> Suervey</em></a></li>
			<li><a href="./" title=""><em><span class="fa fa-hotel"></span> Mess Survey</em></a></li>
			<li class="breadcurrent"><a href="#" title=""><em><span class="fa fa-hotel"></span> Mess Feedback Survey </em></a></li>
		</ul>
		<div id="showAvailable"></div>
		<div id="showq" style="display: none;">
			<div class="inp">
				<div class="inp_name"> 1. Timeliness of the service</div>
				<div class="inp_value">
					<select id="q1" required="required" onchange="cheakopt1()" >
						<option value=""> --Select Rating -- </option>
						<option value="Good"> Good </option>
						<option value="Above Average"> Above Average </option>
						<option value="Average"> Average </option>
						<option value="Below average"> Below average </option>
						<option value="Bad"> Bad </option>
					</select>
				</div>
			</div>
			<div class="inp">
				<div class="inp_name"> 2. Quantity of food as per menu i.e., no. of grams/actual consumption whichever is higher</div>
				<div class="inp_value">
					<select id="q2" required="required" onchange="cheakopt1()" >
						<option value=""> --Select Rating -- </option>
						<option value="Good"> Good </option>
						<option value="Above Average"> Above Average </option>
						<option value="Average"> Average </option>
						<option value="Below average"> Below average </option>
						<option value="Bad"> Bad </option>
					</select>
				</div>
			</div>
			<div class="inp">
				<div class="inp_name"> 3. Neatness of the surroundings (Including Table, Dining hall, plates and dustbins)</div>
				<div class="inp_value">
					<select id="q3" required="required" onchange="cheakopt1()" >
						<option value=""> --Select Rating -- </option>
						<option value="Good"> Good </option>
						<option value="Above Average"> Above Average </option>
						<option value="Average"> Average </option>
						<option value="Below average"> Below average </option>
						<option value="Bad"> Bad </option>
					</select>
				</div>
			</div>
			<div class="inp">
				<div class="inp_name"> 4. Wearing of Uniform by Catering Contractor Emp while on Duty</div>
				<div class="inp_value">
					<select id="q4" required="required" onchange="cheakopt1()" >
						<option value=""> --Select Rating -- </option>
						<option value="Good"> Good </option>
						<option value="Above Average"> Above Average </option>
						<option value="Average"> Average </option>
						<option value="Below average"> Below average </option>
						<option value="Bad"> Bad </option>
					</select>
				</div>
			</div>
			<div class="inp">
				<div class="inp_name"> 5. Quality of food to all dining members</div>
				<div class="inp_name"> 5.1 Status of boiled Rice/ Status of Banana/ Status of Boiled Egg</div>
				<div class="inp_value">
					<select id="q5" required="required" onchange="cheakopt1()" >
						<option value=""> --Select Rating -- </option>
						<option value="Good"> Good </option>
						<option value="Above Average"> Above Average </option>
						<option value="Average"> Average </option>
						<option value="Below average"> Below average </option>
						<option value="Bad"> Bad </option>
					</select>
				</div>
				<div class="inp_name"> 5.2 Taste of Curries/ Fried</div>
				<div class="inp_value">
					<select id="q52" required="required" onchange="cheakopt1()" >
						<option value=""> --Select Rating -- </option>
						<option value="Good"> Good </option>
						<option value="Above Average"> Above Average </option>
						<option value="Average"> Average </option>
						<option value="Below average"> Below average </option>
						<option value="Bad"> Bad </option>
					</select>
				</div>
				<div class="inp_name"> 5.3 Snacks, Tea, Coffee and Breakfast</div>
				<div class="inp_value">
					<select id="q53" required="required" onchange="cheakopt1()" >
						<option value=""> --Select Rating -- </option>
						<option value="Good"> Good </option>
						<option value="Above Average"> Above Average </option>
						<option value="Average"> Average </option>
						<option value="Below average"> Below average </option>
						<option value="Bad"> Bad </option>
					</select>
				</div>
			</div>
			<div class="inp">
				<div class="inp_name"> 6.Courtesy of services from contractor employees towards dining Members</div>
				<div class="inp_value">
					<select id="q6" required="required" onchange="cheakopt1()" >
						<option value=""> --Select Rating -- </option>
						<option value="Good"> Good </option>
						<option value="Above Average"> Above Average </option>
						<option value="Average"> Average </option>
						<option value="Below average"> Below average </option>
						<option value="Bad"> Bad </option>
					</select>
				</div>
			</div>
			<div class="inp">
				<div class="inp_name"> 7.Cooking as per Menu</div>
				<div class="inp_value">
					<select id="q7" required="required" onchange="cheakopt1()" >
						<option value=""> --Select Rating -- </option>
						<option value="Good"> Good </option>
						<option value="Above Average"> Above Average </option>
						<option value="Average"> Average </option>
						<option value="Below average"> Below average </option>
						<option value="Bad"> Bad </option>
					</select>
				</div>
			</div>

			<div id="btnlinksssub" syle="display:none;"></div>
		</div>
		<div class="table-responsive" id="shodata"></div>
		
	</div>
	<?php include_once "../../php/includes/footer.php";?>
	<script type="text/javascript" src="../../assets/js/jquery-1.9.1.min.js"></script>
	<script type="text/javascript" src="../../assets/fontawesome/js/all.js"></script>
	<script type="text/javascript" src="../../assets/js/jquery.min.js"></script>
	<script type="text/javascript" src="../../assets/js/main.js"></script>
	<script type="text/javascript" src="../../assets/js/Student.js"></script>
	<script type="text/javascript">
		showAvailableSurvey('<?php echo $userId;?>');
		showfeedbacks('<?php echo $userId;?>');
		function showAvailableSurvey(userId){
			var values =['getAvail_messSurvey',userId];
			var msg = SendToPhp(values,"../../php/controllers/Student_New.php");
			var obj= JSON.parse(msg);
			var i=0,oldDate="";
			var ll=checkLen(userId);
			if( (obj.Message).length >= ll ){
				if(obj.Message!=""){
					oldDate+= '<fieldset><div class="inp half"><div class="inp_name">Please select your Mess</div><div class="inp_value"><select id="messop" onchange="checkopt()"><option value=""> -- select Mess -- </option><option value="MESS-1">Mess-1</option><option value="MESS-2" > Mess-2 </option> <option value="MESS-3">Mess-3 </option> <option value="MESS-4"> Mess-4</option><option value="MESS-5">Mess-5 </option> <option value="MESS-6">Mess-6 </option> <option value="MESS-7">Mess-7</option> <option value="MESS-8" >Mess-8</option></select></div></div>';
					oldDate+= '<div class="inp half"><div class="inp_name">Please select Survey Period</div><div class="inp_value"><select id="periodop" onchange="checkopt()"><option value=""> -- select Survey --</option>';
					for(i in obj.Message){
						var per =obj.Message[i].period_from;
						if(checksurvey_response(per,userId)){
							oldDate +='<option value="'+obj.Message[i].period_from+'">'+obj.Message[i].period_from+' to '+ obj.Message[i].period_to +'</option>';
						}
					}
					oldDate+= '</select></div></div><div id="btnlinkss"></div>';
					oldDate+= '</fieldset>';
					selectionListDisplay("showAvailable",oldDate);
				}
				else{
					selectionListDisplay("showAvailable","<div class='notfound'>No survey is available at Present Time.Please try after some time.</div>");
				}
			}
			else{
				selectionListDisplay("showAvailable","<div class='notfound'>No survey is available at Present Time.Please try after some time.</div>");
			}
		}
		function checksurvey_response(perios,userId){
			var values =['check_messSurvey_feed',userId,perios];
			var msg = SendToPhp(values,"../../php/controllers/Student_New.php");
			var obj=JSON.parse(msg);
			if((obj.Message).length == 0) return true;
			else return false;
		}
		function checkLen(userId){
			var values =['check_messSurvey_len',userId];
			var msg = SendToPhp(values,"../../php/controllers/Student_New.php");
			var obj= JSON.parse(msg);
			return (obj.Message).length;
		}
		function checkopt(){
			var mess = document.getElementById("messop").value;
			var period = document.getElementById("periodop").value;
			if(mess!="" && period!=""){
				//var oo='<br><center><button class="btn btn-success" onclick="showq()"><span class="fa fa-check"></span> Submit </button> </center>';
				//selectionListDisplay("btnlinkss",oo);
				showq();
			}
		}
		function showq(){
			document.getElementById("showq").style.display="block";
		}
		function cheakopt1(){
			var q1 = document.getElementById("q1").value;
			var q2 = document.getElementById("q2").value;
			var q3 = document.getElementById("q3").value;
			var q4 = document.getElementById("q4").value;
			var q5 = document.getElementById("q5").value;
			var q52 = document.getElementById("q52").value;
			var q53 = document.getElementById("q53").value;
			var q6 = document.getElementById("q6").value;
			var q7 = document.getElementById("q7").value;
			if(q1!="" && q2!="" && q3!="" && q4!="" && q5!="" && q52!="" && q53!="" && q7!="" && q6!=""){
				var oo='<center><button class="btn btn-success" onclick="submits(\'<?php echo $userId; ?>\')"><span class="fa fa-check"></span> Submit Feedback </button> </center>';
				selectionListDisplay("btnlinksssub",oo);
			}
		}
		function submits(userId){
			var mess = document.getElementById("messop").value;
			var period = document.getElementById("periodop").value;
			var q1 = document.getElementById("q1").value;
			var q2 = document.getElementById("q2").value;
			var q3 = document.getElementById("q3").value;
			var q4 = document.getElementById("q4").value;
			var q5 = document.getElementById("q5").value;
			var q52 = document.getElementById("q52").value;
			var q53 = document.getElementById("q53").value;
			var q6 = document.getElementById("q6").value;
			var q7 = document.getElementById("q7").value;
			var values=['submit_mess_responce',userId,mess,period,q1,q2,q3,q4,q5,q6,q52,q53,q7];
			var msg = SendToPhp(values,"../../php/controllers/Student_New.php");
			var obj = JSON.parse(msg);
			if(obj.message == "success"){
				snackbar("Your Response has been recorded.Thankyou for your cooperation.");
			}
			window.location.href="stu_feedback";
		}
	</script>
</body>
</html>
			