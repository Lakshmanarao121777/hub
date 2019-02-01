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
?>

	<link rel="stylesheet" type="text/css" href="../../assets/bootstrap/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="../../assets/fontawesome/css/all.css">
	<link rel="stylesheet" type="text/css" href="../../assets/css/_main.css">
	<link rel="stylesheet" type="text/css" href="../../assets/css/Student.css">
</head>
<style type="text/css">
	form{padding:10px;width:70%;border:1px solid gray;margin:10px 0;}
	.inp .inp_value,.inp .inp_name{padding:5px;font-size: 13px;font-weight: 500;height:100%;}
	input[type="text"],select{width:100%;border:1px solid gray;border-radius:2px;padding:5px;margin:1px 0;}
	.half{width: 45%;vertical-align: middle;}
	#showq {width:90%;float:left;margin: 10px 5%;padding:10px;}
	#showq .inp{width: 100%;border:1px solid gray;margin:1px;padding:2px;height: 100%;}
	#showq .inp .inp_name{width:60%;text-align:left;height:100%;}
	#showq .inp .inp_value{width:36%;height:100%;}
	.notfound{width:95%;margin:2.5%;}
	@media only screen and (max-width: 600px) { form{width:100%;}.inp .inp_value,.inp .inp_name{height:45px;padding:5px;font-size: 13px;font-weight: 500;width:100%;float: left;text-align: left;height:100%;}
	.half{width: 100%;}
	 }
</style>
<body>
	<?php include_once "../../php/includes/head_logobox.php";?>
	<?php include_once "../../php/includes/top_nav.php";?>
	<?php include_once "../../php/includes/sidebar_Student.php";?>
	<div class="container bg_white" style="padding:0;">
		<ul class="bread">
			<li><a href="./" title=""><em><span class="fa fa-tachometer-alt"></span> Dashboard</em></a></li>
			<li><a href="survey" title=""><em><span class="fa fa-question"> </span> Suervey</em></a></li>
			<li class="breadcurrent"><a href="#" title=""><em><span class="fa fa-user-tie"></span> Faculty Feedback Survey</em></a></li>
		</ul>
		<br>
		<div class="inp half">
			<div class="inp_name">Student Name : </div>
			<div class="inp_value"> <span id="userName"></span> </div>
		</div>
		<div class="inp half">
			<div class="inp_name">Current Year : </div>
			<div class="inp_value"> <span id="cyear"></span> </div>
		</div>
		<div class="inp half">
			<div class="inp_name">Department : </div>
			<div class="inp_value"> <span id="cdept"></span> </div>
		</div>
		<div class="inp half">
			<div class="inp_name">Class : </div>
			<div class="inp_value"> <input type="text" id="cclass" autocomplete="off" placeholder="AB1G001"> </div>
		</div>
		<div class="clear"></div><br><div class="border-double"></div><br>
		<div class="inp half">
			<div class="inp_name">Select Subject : </div>
			<div class="inp_value"> <select id="subjects" required="required" onchange="showForm()"></select> </div>
		</div>
		<div class="inp half">
			<div class="inp_name">Select Faculty : </div>
			<div class="inp_value"> <input type="text" autocomplete="on" required="required" list="subjefac" placeholder="Faculty" id="facname" onchange="showForm()"><datalist id="subjefac"></datalist> </div>
		</div>
		<div class="clear"></div><br><div class="border-double"></div><br>
		<div id="showqsub" style="display: none;float: left: ">
			
		</div>
		<div class="clear"></div>
		 <br></br>
		
	</div>
	<?php include_once "../../php/includes/footer.php";?>
	<script type="text/javascript" src="../../assets/js/jquery-1.9.1.min.js"></script>
	<script type="text/javascript" src="../../assets/fontawesome/js/all.js"></script>
	<script type="text/javascript" src="../../assets/js/jquery.min.js"></script>
	<script type="text/javascript" src="../../assets/js/main.js"></script>
	<script type="text/javascript" src="../../assets/js/Student.js"></script>
	<script type="text/javascript">
		
	  showSubjects("<?php echo $userId; ?>");showFac();
		function getColValuess(table,userIds,col){
				var wheresql =" userId='"+userIds+"' ";
	      var values=["get_col_value",table,wheresql,col];
	      var msg=SendToPhp(values,"../../php/controllers/Student_New.php");
	      return msg;
	  }
	  function getColValus(table,userIds,col){
				wheresql =" subCode='"+userIds+"' ";
	      var values=["get_col_value",table,wheresql,col];
	      var msg=SendToPhp(values,"../../php/controllers/Student_New.php");
	      return msg;
	  }
	  function showSubjects(userId){
	  	var tbl="ay1819s1reg";
	  	var yy=getColValuess(tbl,userId,"currentYear");
	  	var dept=getColValuess(tbl,userId,"Dept");
	  	selectionListDisplay("userName","<b>"+getColValuess("students_details",userId,"userName")+"<b>");
			selectionListDisplay("cyear","<b>"+yy+"<b>");
			selectionListDisplay("cdept","<b>"+dept+"<b>");
	  	

	  	var values=["sfss","ay1819s1reg",yy,dept,userId];
	  	var msg=SendToPhp(values,"../../php/controllers/Student_New.php");
	  	var obj = JSON.parse(msg);
	  	var i=0;oldDate="";
	  	oldDate ="<option value=''> -- Select Subject -- </option>";
	  	if((obj.Message).length !=""){
	  		for (i in obj.Message){
	  			if( isValidSub(obj.Message[i].subCode,userId) ){
	  				oldDate +="<option value='"+obj.Message[i].subName+"'> "+obj.Message[i].subName+" </option>";
	  			}
	  		}
	  	}
	  	else{
	  		oldDate ="";
	  	}
	  	selectionListDisplay("subjects",oldDate);
	  }
	  function showFac(){
	  	var values=["sfsf"];
	  	var msg=SendToPhp(values,"../../php/controllers/Student_New.php");
	  	var obj = JSON.parse(msg);
	  	var i=0;oldDate="";
	  	if((obj.Message).length !=""){
	  		for (i in obj.Message){
	  			oldDate +="<option value='"+obj.Message[i].userId+"' >"+obj.Message[i].userName+"</option>";
	  		}
	  	}
	  	else{
	  		oldDate ="";
	  	}
	  	selectionListDisplay("subjefac",oldDate);
	  }
	  function showForm(){
	  	var cclass= document.getElementById("cclass").value;
	  	var subjefac= document.getElementById("facname").value;
	  	var subname= document.getElementById("subjects").value;
	  	var subcredit=getColValus("subjects",subname,"subCredit");
	  	var i=0,oldDate='';
	  	if(cclass !="" && subjefac!="" && subname !=""){
	  		var questions=['Whether the Syllabus and the Lecture Plan are provided at beginning of the course?','Is instructor punctual & regular to the class?','Level of Instructor’s Preparedness to the class ','Level of Instructor’s Communication and Presentation','Level of Instructor’s Effectiveness in organizing the class','Level of Instructor’s subject depth','Whether the instructor covered entire syllabus?','Whether the instructor discussed topics beyond syllabus?','Level of Instructor’s availability to the students outside the class room','Overall quality in delivery of the course','Whether the instructor discussed list of experiments and their schedule at beginning of the course?','Level of demonstration of experiments by the instructor ','Is instructor punctual, regular and available throughout the laboratory duration? ','Has  Instructor provided the course material related to all experiments','Has Instructor clearly communicated and enforced the safety precautions?','Has Instructor helped you in conducting the experiments?','Has Instructor explained the integration of theoretical concepts and practical applications/relevance of the experiments?','Whether each student is given hands-on experience?','Whether instructor has discussed the inference/interpretation the results obtained?','Overall quality in conducting the laboratory course'];
	  		if(subcredit <= 2 ) {var len=20;i=10;}
	  		else{var len=10;i=0}
	  		var cou=0;
	  		for(i;i<len;i++){
	  			cou=cou+1;
					oldDate +='<div class="inp">';
					oldDate +=' <div class="inp_name"> '+questions[i]+'</div>';
					oldDate +=' <div class="inp_value">';
					oldDate +='  <select id="q'+cou+'" required="required" onchange="cheakfeedback()">';
					oldDate +='   <option value=""> --Select Rating -- </option>';
					oldDate +='   <option value="Good"> Good </option>';
					oldDate +='   <option value="Above Average"> Above Average </option>';
					oldDate +='   <option value="Average"> Average </option>';
					oldDate +='   <option value="Below average"> Below average </option>';
					oldDate +='   <option value="Bad"> Bad </option>';
					oldDate +='  </select>';
					oldDate +=' </div>';
					oldDate +='</div>';
	  		}
	  		oldDate+='<div id="btnlinksssub" syle="display:none;"></div>';
	  		selectionListDisplay("showqsub",oldDate);
	  		document.getElementById("showqsub").style.display="block";
	  	}	
	  }
	  function cheakfeedback(){
	  	var oldDate='';
	  	var q1= document.getElementById("q1").value;
	  	var q2= document.getElementById("q2").value;
	  	var q3= document.getElementById("q3").value;
	  	var q4= document.getElementById("q4").value;
	  	var q5= document.getElementById("q5").value;
	  	var q6= document.getElementById("q6").value;
	  	var q7= document.getElementById("q7").value;
	  	var q8= document.getElementById("q8").value;
	  	var q9= document.getElementById("q9").value;
	  	var q10= document.getElementById("q10").value;
	  	if(q1!=""&&q2!=""&&q3!=""&&q4!=""&&q5!=""&&q6!=""&&q7!=""&&q8!=""&&q9!=""&&q10!=""){
	  		oldDate +="<br><center><button class='btn btn-success' onclick='formSubmit(\"<?php echo $userId;?>\")'><span class='fa fa-check'></span> Submit </button> <button class='btn btn-warning'><span class='fa fa-sync'></span> Reset </button></center> <br></br>";
	  		selectionListDisplay("btnlinksssub",oldDate);
	  		document.getElementById("btnlinksssub").style.display="block";
	  	}
	  }
	  function formSubmit(userId){
	  	var q1= document.getElementById("q1").value;
	  	var q2= document.getElementById("q2").value;
	  	var q3= document.getElementById("q3").value;
	  	var q4= document.getElementById("q4").value;
	  	var q5= document.getElementById("q5").value;
	  	var q6= document.getElementById("q6").value;
	  	var q7= document.getElementById("q7").value;
	  	var q8= document.getElementById("q8").value;
	  	var q9= document.getElementById("q9").value;
	  	var q10= document.getElementById("q10").value;
	  	var cclass= document.getElementById("cclass").value;
	  	var subjefac= document.getElementById("facname").value;
	  	var subname= document.getElementById("subjects").value;
	  	if(q1!=""&&q2!=""&&q3!=""&&q4!=""&&q5!=""&&q6!=""&&q7!=""&&q8!=""&&q9!=""&&q10!=""&&cclass !="" && subjefac!="" && subname !=""){
	  		var values=["submit_faculty_feed",userId,cclass,subname,subjefac,q1,q2,q3,q4,q5,q6,q7,q8,q9,q10];
	      var msg=SendToPhp(values,"../../php/controllers/Student_New.php");
	      var obj = JSON.parse(msg);
	      if(obj.message="success"){
	      	snackbar("Your responce was recorded succesfully for the subject"+ subname);
	      }
	      else{
	      	snackbar("Responce recording failed.Please Try again")
	      }
	  	}
	  }
	  function isValidSub(subCode,userId){
	  	var values= ["check_sub_feedback",userId,subCode];
	  	var msg=SendToPhp(values,"../../php/controllers/Student_New.php");
	  	if(msg<=0){return true;}
	  	else{return false;}
	  }
	</script>
</body>
</html>
			