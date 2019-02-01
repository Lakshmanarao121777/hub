<?php session_start();
if (!$_SESSION) {
		header("Location:../../php/includes/logout.php");
} else {
		if ($_SESSION['USER_TYPE'] != "student") {
				header("Location:../../php/includes/logout.php");
		}
		$userId = $_SESSION['USER_ID'];
		include_once "../../php/config/DBActivityPHP.php";
		$designation = new DBActivityPHP();
		$mess = $designation->getColValue("students_details", "userId='$userId'", "gender");
		if($mess=="MALE" ){$mm=1;}
		if($mess=="FEMALE"){$mm=2;}
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
	.inp .inp_value{padding:10px;}
	input[type="text"],select{width:100%;border:1px solid gray;border-radius:2px;padding:5px;margin:0px 0;}
	.half{width: 50%;vertical-align: middle;}
	#showq {width:90%;float:left;margin: 10px 5%;padding:10px;}
	#showq .inp{width: 100%;border:1px solid gray;margin:1px;padding:2px;}
	#showq .inp .inp_name{width:60%;text-align:left;}
	#showq .inp .inp_value{width:36%;}
	.notfound{width:95%;margin:.2% 2.5%;}
	fieldset{width:50%;float:left;}
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
			<li class="breadcurrent"><a href="#" title=""><em><span class="fa fa-hotel"></span> Allotment Survey</em></a></li>
		</ul>
		<fieldset>
			<div class="inp">
				<div class="inp_name"> Student Id : </div>
				<div class="inp_value"><?php echo $userId; ?></div>
			</div>
			<div class="inp">
				<div class="inp_name"> Current Year : </div>
				<div class="inp_value"><?php echo $designation->getColValue("students_details", "userId='$userId'", "currentYear"); ?></div>
			</div>
		</fieldset>
		<fieldset>
			<div class="inp">
				<div class="inp_name"> Student Name : </div>
				<div class="inp_value"><?php echo $designation->getColValue("students_details", "userId='$userId'", "userName"); ?></div>
			</div>
			<div class="inp">
				<div class="inp_name"> Department : </div>
				<div class="inp_value"><?php echo $designation->getColValue("students_details", "userId='$userId'", "Department"); ?></div>
			</div>
		</fieldset>
		<div id="pre" style="display: none">
			<div class="inp">
				<div class="inp_name"> Gender : </div>
				<div class="inp_value"><?php echo $mess ?><input type="hidden" id="preme" value="<?php echo $mess ?>" readonly="readonly"/></div>
			</div>
			<div class="inp">
				<div class="inp_name"> Select Prefered Mess -1 : </div>
				<div class="inp_value"><select name="m1" id="m1" onchange="checkmess()"><option value="">-- SELECT --</option><?php if($mm==1){ ?><option value="MESS-1">Mess-1</option><option value="MESS-2">Mess-2</option><option value="MESS-7">Mess-7</option><option value="MESS-8">Mess-8</option> <?php } if($mm==2){ ?><option value="MESS-3">Mess-3</option><option value="MESS-4">Mess-4</option><option value="MESS-5">Mess-5</option><option value="MESS-6">Mess-6</option><?php }?></select></div>
			</div>
			<div class="inp">
				<div class="inp_name"> Select Prefered Mess -2 : </div>
				<div class="inp_value"><select name="m2" id="m2" onchange="checkmess()"><option value="">-- SELECT --</option><?php if($mm==1){ ?><option value="MESS-1">Mess-1</option><option value="MESS-2">Mess-2</option><option value="MESS-7">Mess-7</option><option value="MESS-8">Mess-8</option> <?php } if($mm==2){ ?><option value="MESS-3">Mess-3</option><option value="MESS-4">Mess-4</option><option value="MESS-5">Mess-5</option><option value="MESS-6">Mess-6</option><?php }?></select></div>
			</div>
			<div class="inp">
				<div class="inp_name"> Select Prefered Mess -3 : </div>
				<div class="inp_value"><select name="m3" id="m3" onchange="checkmess()"><option value="">-- SELECT --</option><?php if($mm==1){ ?><option value="MESS-1">Mess-1</option><option value="MESS-2">Mess-2</option><option value="MESS-7">Mess-7</option><option value="MESS-8">Mess-8</option> <?php } if($mm==2){ ?><option value="MESS-3">Mess-3</option><option value="MESS-4">Mess-4</option><option value="MESS-5">Mess-5</option><option value="MESS-6">Mess-6</option><?php }?></select></div>
			</div>
			<div class="inp">
				<div class="inp_name"> Select Prefered Mess -4 : </div>
				<div class="inp_value"><select name="m4" id="m4" onchange="checkmess()"><option value="">-- SELECT --</option><?php if($mm==1){ ?><option value="MESS-1">Mess-1</option><option value="MESS-2">Mess-2</option><option value="MESS-7">Mess-7</option><option value="MESS-8">Mess-8</option> <?php } if($mm==2){ ?><option value="MESS-3">Mess-3</option><option value="MESS-4">Mess-4</option><option value="MESS-5">Mess-5</option><option value="MESS-6">Mess-6</option><?php }?></select></div>
			</div>
		</div>
		<div class="clear"></div>
		<div id="btns" style="display: none;">
			<center><button onclick="messfeed('<?php echo $userId;?>','<?php echo $mess;?>')" class="btn btn-sm btn-success"> <span class="fa fa-check"></span> Submit </button> <button onclick="location.reload();" class="btn btn-sm btn-warning"> <span class="fa fa-sync"></span> Reset </button> </center>
		</div>
		
		<div id="showq" style="display: none;"></div>
		
	</div>
	<?php include_once "../../php/includes/footer.php";?>
	<script type="text/javascript" src="../../assets/js/jquery-1.9.1.min.js"></script>
	<script type="text/javascript" src="../../assets/fontawesome/js/all.js"></script>
	<script type="text/javascript" src="../../assets/js/jquery.min.js"></script>
	<script type="text/javascript" src="../../assets/js/main.js"></script>
	<script type="text/javascript" src="../../assets/js/Student.js"></script>
	<script type="text/javascript">

		function checkmess(){
			var m1= document.getElementById('m1').value;
			var m2= document.getElementById('m2').value;
			var m3= document.getElementById('m3').value;
			var m4= document.getElementById('m4').value;
			var preme= document.getElementById('preme').value;
			var d = new Date();
			var yy = d.getMinutes();
			var n = d.getHours();
			var month = d.getMonth() + 1;
		  var day = d.getDate();
		  var year = d.getFullYear();
		  var oyear=2019,omonth=1,odate=9,ohours=16,ominute =0;
			if(preme!=""  && year ==oyear && month== omonth ){
				if( m1 != "" && m2 != "" && m3 != "" && m4!="" && m1!=m2 && m1 !=m3 && m1 != m4 && m2!=m3 && m2 !=m4 && m3 !=m4){
					if(day==odate){
						if(n==ohours){
							if(yy>=ominute){
									document.getElementById('btns').style.display="block";
							}
							else{
								document.getElementById('btns').style.display="block";
								document.getElementById('btns').innerHTML="<center><div class='notfound'>Please wait till "+ohours+":"+ominute+"  ("+odate+":"+omonth+":"+oyear+")</div></center>";
							}
						}
						else if(n>ohours){
							document.getElementById('btns').style.display="block";
						}
						else{
							document.getElementById('btns').style.display="block";
							document.getElementById('btns').innerHTML="<center><div class='notfound'>Please wait till "+ohours+":"+ominute+"  ("+odate+":"+omonth+":"+oyear+")</div></center>";
						}
					}
					else if(day>odate){
						document.getElementById('btns').style.display="block";
					}
					else{
						document.getElementById('btns').style.display="block";
						document.getElementById('btns').innerHTML="<center><div class='notfound'>Please wait till "+ohours+":"+ominute+"  ("+odate+":"+omonth+":"+oyear+")</div></center>";
					}
				}
			}
			else{
				document.getElementById('btns').style.display="block";
				document.getElementById('btns').innerHTML="<center><div class='notfound'>Please wait till "+ohours+":"+ominute+"  ("+odate+":"+omonth+":"+oyear+")</div></center>";
			}
		}
		function deleteOP(sno){
			var values = ['messallotmentDelete',sno];
			var msg = SendToPhp(values,"../../php/controllers/Student_New.php");
			var obj = JSON.parse(msg);
			if(obj.mesaage == "Success"){
				snackbar("Your response hasbeen recorded.");
			}
			location.reload();
		}
		function messfeed(userId,mess){
			var m1= document.getElementById('m1').value;
			var m2= document.getElementById('m2').value;
			var m3= document.getElementById('m3').value;
			var m4= document.getElementById('m4').value;
			var values = ['messallotment',userId,mess,m1,m2,m3,m4];
			var msg = SendToPhp(values,"../../php/controllers/Student_New.php");
			var obj = JSON.parse(msg);
			if(obj.mesaage == "Success"){
				snackbar("Your response hasbeen recorded.");
			}
			location.reload();
		}
		checkallotemnt('<?php echo $userId;?>');
		function checkallotemnt(userId){
			var values = ['messallotment_check',userId];
			var msg = SendToPhp(values,"../../php/controllers/Student_New.php");
			var obj = JSON.parse(msg);
			var i=0;olddate='';
				for(i in obj.Message){
					if(obj.Message[i].op1!=""){
						olddate+='<div class="inp"><div class="inp_name">Prefernece -1 : </div><div class="inp_value"> '+obj.Message[i].op1+' </div></div';
					olddate+='<div class="inp"><div class="inp_name">Prefernece -2 : </div><div class="inp_value">'+obj.Message[i].op2+' </div></div';
					olddate+='<div class="inp"><div class="inp_name">Prefernece -3 : </div><div class="inp_value">'+obj.Message[i].op3+' </div></div';
					olddate+='<div class="inp"><div class="inp_name">Prefernece -4 : </div><div class="inp_value">'+obj.Message[i].op4+' </div></div>';
					olddate+="<div class='notfound' > If you want to update your MESS Preference<button onclick='deleteOP("+obj.Message[i].sno+")' class='btn btn-warning btn-sm'> clik Here </button></div>";
					document.getElementById('pre').style.display="block";
					document.getElementById('pre').innerHTML ="<div class='notfound' > You have already submitted the preferences</div><div class='notfound'>"+ olddate+"</div>";
					}
				}
				document.getElementById('pre').style.display="block";
			}

	</script>
</body>
</html>
			