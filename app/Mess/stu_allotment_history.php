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
			<li class="breadcurrent"><a href="#" title=""><em><span class="fa fa-hotel"></span> Mess Allotment</em></a></li>
		</ul>
		<div id="showq" style="display: none;"></div>
	</div>
	<?php include_once "../../php/includes/footer.php";?>
	<script type="text/javascript" src="../../assets/js/jquery-1.9.1.min.js"></script>
	<script type="text/javascript" src="../../assets/fontawesome/js/all.js"></script>
	<script type="text/javascript" src="../../assets/js/jquery.min.js"></script>
	<script type="text/javascript" src="../../assets/js/main.js"></script>
	<script type="text/javascript" src="../../assets/js/Student.js"></script>
	<script type="text/javascript">
		submits('<?php echo $userId;?>');
		function submits(userId){
			var values=['submit_mess_responce_history',userId];
			var msg = SendToPhp(values,"../../php/controllers/Student_New.php");
			var obj = JSON.parse(msg);
			var i=0;oldDate='',ashu=0;
			if((obj.Message).length>0){
				oldDate += '<table class="table table-condensed table-bordered table-striped table-responsive">';
				oldDate +='<thead>';
				oldDate +='<tr><th> </th><th>Student Id</th> <th>Period</th> <th>Mess</th><th>Question - 1 </th><th>Question - 2 </th><th>Question - 3 </th><th>Question - 4 </th><th>Question - 5.1 </th><th>Question - 5.2 </th><th>Question - 5.3 </th><th>Question - 6 </th><th>Question - 7 </th></tr>';
				oldDate +='</thead><tbody>';
				for(i in obj.Message){
					ashu = Number(i)+1;
					oldDate +='<tr><td>'+ashu+'</td><td>'+userId+'</td><td>'+obj.Message[i].period+'</td><td>'+obj.Message[i].mess+'</td>';
					oldDate +='<td>'+obj.Message[i].q1+'</td><td>'+obj.Message[i].q2+'</td><td>'+obj.Message[i].q3+'</td><td>'+obj.Message[i].q4+'</td><td>'+obj.Message[i].q5+'</td><td>'+obj.Message[i].q52+'</td><td>'+obj.Message[i].q53+'</td><td>'+obj.Message[i].q6+'</td><td>'+obj.Message[i].q7+'</td>';
					oldDate +='</tr>';
				}
				oldDate +='</tbody></table>';
			}
			else{
				oldDate='<div class="notfound"> No Data Found </div>';
			}
			document.getElementById('showq').style.display="block";
			selectionListDisplay("showq",oldDate);
		}
	</script>
</body>
</html>
			