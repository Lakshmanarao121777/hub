<?php session_start(); 
if(!$_SESSION){
  header("Location:../../php/includes/logout.php");
}
else
{
  if($_SESSION['USER_TYPE']!="student"){
    header("Location:../../php/includes/logout.php");
  }
}
include_once("../../php/config/config.inc.php"); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>AIR-HUB :: RGUKT-RKV</title>
  
  <?php include_once("../../php/meta/meta.php"); ?>

  <link rel="stylesheet" type="text/css" href="../../assets/bootstrap/css/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="../../assets/fontawesome/css/all.css">
  <link rel="stylesheet" type="text/css" href="../../assets/fontawesome/css/fontawesome.css">
  <link rel="stylesheet" type="text/css" href="../../assets/css/_main.css">
  <link rel="stylesheet" type="text/css" href="../../assets/css/Student.css">
</head>
<style type="text/css">
.full{width:100%;}
 form{padding:10px;width:100%;border:1px solid gray;margin:10px 0;}
  .inp .inp_value,.inp .inp_name{padding:0px;font-size: 14px;font-weight: 500;margin:1px 0;line-height: 1;height: 100%;padding:10px;}
  input[type="text"],select,input[type="file"],textarea{width:100%;border-radius:3px;padding:2px;margin:1px 0;}
  input[type="file"]{font-size:12px;}
  .inp .inp_value input[type="text"]{width:100%;border-radius:3px;padding:8px;margin:1px 0;font-size: 16px;border: 1px solid gray;}
  @media only screen and (max-width: 600px) { form{width:100%;}.inp .inp_value,.inp .inp_name{height:45px;padding:5px;font-size: 15px;font-weight: 500;width:100%;float: left;text-align: left;}
  	.inp_name {width:100%;}
  	.inp_value {width:100%;}
  	textarea{width:100%;}

   }

</style>
<body>
  <?php include_once("../../php/includes/head_logobox.php"); ?>
  <?php include_once("../../php/includes/top_nav.php"); ?>
  <?php include_once("../../php/includes/sidebar_Student.php"); ?>
  <div class="container bg_white" style="padding:0;">
    <ul class="bread">
      <li><a href="./" title=""><em><span class="fa fa-tachometer-alt"></span> Dashboard</em></a></li>
			<li class="breadcurrent"><a href="#" title=""><em><span class="fa fa-graduation-cap"></span> Online Leaves Apply</em></a></li>
			<li><a href="olms_status" title=""><em><span class="fa fa-chart-bar"> </span> Leaves Status </em></a></li>
    </ul>
  	<div class="notice_push">
  		<?php 
  		include_once("../../php/config/Student.php"); 
  		$olms_day=getOlmsCount($_SESSION['USER_ID'],'day');
  		$olms_month=getOlmsCount($_SESSION['USER_ID'],'month');
		if( $olms_month<4){
			if($olms_day<1 ){
  			?>
		    <form method="post" name="notice_push" enctype="multipart/form-data" action="<?php echo $_SERVER["PHP_SELF"];?>">
		    	<div class="inp">
		    		<?php include_once("../../php/config/Student.php"); ?>
		    		<img class="inp_name" src="../../users/<?php echo$_SESSION['USER_ID']; ?>/<?php echo$_SESSION['USER_ID'];?>.png" style="width:150px;position:relative;height:100%;padding:0;">
		    		<div class="inp_value"> <?php echo $_SESSION['USER_ID']; ?></div>
		    		<div class="inp_value"> <?php echo getDetfresh('students_details',"where userId='".$_SESSION['USER_ID']."'",'userName'); ?></div>
		    		<div class="inp_value"> Current Year : <?php echo getDetfresh('students_details',"where userId='".$_SESSION['USER_ID']."'",'currentYear'); ?></div>
		    		<div class="inp_value"> Department : <?php echo getDetfresh('students_details',"where userId='".$_SESSION['USER_ID']."'",'Department'); ?></div>
		    		<!--<div class="inp_value">Current Class : <?php //echo getDetfresh('students_details',"where userId='".$_SESSION['USER_ID']."'",'bed'); ?></div>-->
		    	</div>
		    	<div class="inp">
		    		<div class="clear"></div>
		    		<div class="inp_name">From Date :</div>
		    		<div class="inp_value"><input type="date" name="fdate" id="fdate" onchange="selectrdate()" style="border:1px solid gray;font-size:16px;"> </div>
		    		<div class="inp_name">Return Date :</div>
		    		<div class="inp_value"><input type="date" name="rdate" id="rdate" style="border:1px solid gray;font-size:16px;">  </div>
		    		<div class="clear"></div>
		    	</div>
			    <div class="inp">
			    	<?php 
			    		$gender=getDetfresh('students_details',"where userId='".$_SESSION['USER_ID']."'",'gender'); 
			    		$cys=getDetfresh('students_details',"where userId='".$_SESSION['USER_ID']."'",'currentYear');
			    		if( $gender=="FEMALE"){ ?>
			    			<div class="inp_name">Parent Type :</div>
				    		<div class="inp_value" style="vertical-align:center;height:100%;">
				    			<select name="ptype">
					    			<option value=""> -- Select Parent Type -- </option>
					    			<option value="Father"> Father </option>
					    			<option value="Mother"> Mother </option>
					    			<option value="Brother"> Brother </option>
					    			<option value="Sister"> Sister </option>
					    			<option value="Student"> With Student's Parent </option>
					    			<option value="Staff"> Staff </option>
					    			<option value="Guardian"> Guardian </option>
					    			<?php  
			    						if( $cys=="ENGG-3" || $cys=="ENGG-4" ){ ?>
			    					<option value="Own Risk"> Without Parent (On own Risk) </option>
			    							<?php } ?>
					    		</select>
					    	</div>
					    	<div class="clear"></div>
					    	<div class="inp_name">Parent Name :</div>
				    		<div class="inp_value" style="vertical-align:center;height:100%;"><input type="text" name="pname" ></div>
				    		<div class="clear"></div>
				    		<div class="inp_name">Parent Moile Number :</div>
				    		<div class="inp_value" style="vertical-align:center;height:100%;"><input type="text" name="pmobile" min="1111111111" max="999999999"></div>
				    		<div class="clear"></div>
					    	<div class="inp_name" >Parent ID Proof Type:</div>
				    		<div class="inp_value" style="vertical-align:center;height:100%;">
				    			<select name="pauthtype">
					    			<option value=""> -- Select Parent ID Proof Type -- </option>
					    			<option value="aadhar"> Aadhar Card </option>
					    			<option value="rc"> Ration Card </option>
					    			<option value="pan"> PanCard </option>
					    			<option value="vote"> Voter Id </option>
					    			<option value="govt"> Govt. Auth ID Card </option>
					    			<option value="driving"> Driving Licence </option>
					    			<option value="passport"> Passport </option>
					    		</select>
					    	</div> 
					    	<div class="clear"></div>
					    	<div class="inp_name">ID Proof Number :</div>
				    		<div class="inp_value" style="vertical-align:center;height:100%;"><input type="text" name="pauthid"></div>
				    		<div class="clear"></div>
			    	<?php } ?>
					</div>
					<div class="clear">	</div>
					<div class="full" >
						<div class="inp inp_name">Subject :</div>
			    	<div class="inp_value" style="height:100%;">
			    		<textarea name="title" style="height:50px;" placeholder="Discribe about Leave in short"></textarea>
			    	</div>
			    </div>
					<div class="full" >
						<div class="inp_name">Reason :</div>
			    	<div class="inp_value" style="height:100%;">
			    		<textarea style="height:140px;" name="reason"placeholder="Discribe about Leave"></textarea>
			    	</div>
			    </div>
			    <div class="notice_push">Select Attachments : </div>
			    	<div class="notice_push">
			    		<input type="file" name="att1" accept=".zip,.jpg,.png,.jpeg,.docx,.doc">
			    	</div>
			    	<div class="notice_push">
			    		<input type="file" name="att2" accept=".zip,.jpg,.png,.jpeg,.docx,.doc">
			    	</div>
			    	<div class="notice_push">
			    		<input type="file" name="att3" accept=".zip,.jpg,.png,.jpeg,.docx,.doc">
			    	</div>	
			    	<div class="notice_push">
			    		<span style="font-size:12px;">Note : if the attachemts are more than eight(8) plase make those into zip and upload.<br/>
			    		Supported Formats : .zip,.jpg,.png,.jpeg,.docx,.doc.
			    		If the your file type is not supplorted then also too zip that and upload</span>
			    	</div>	    
			    </div>
				<div class="clear"></div>

				<center>
					<button type="submit" class="btn btn-success" name="push_notice"> Apply</button>
		    	<button type="submit" class="btn btn-warning"> Reset</button>
		    </center>
			    
		    </form>
			<?php } 
			else{
				echo"<div class='notfound'>Dear Student have execcd the day quota.Consult warden for mode details</div>";
			}
		}else{
			echo"<div class='notfound'>Dear Student have execcd the Month quota.Consult warden for mode details</div>";
		}
		?>
	</div>
    <div class="clear"></div>
    <div class="border-double"></div>
    <?php
    	if(isset($_POST["push_notice"]))
    	{
    		include_once "../../php/dependencies/functions.php";
    		$fileName1 = $_FILES["att1"]["tmp_name"];$fileN1=$_FILES["att1"]["name"];
    		$fileName2 = $_FILES["att2"]["tmp_name"];$fileN2=$_FILES["att2"]["name"];
    		$fileName3 = $_FILES["att3"]["tmp_name"];$fileN3=$_FILES["att3"]["name"];
    		$userName=getDetfresh('students_details',"where userId='".$_SESSION['USER_ID']."'",'userName');
    		$currentYear=getDetfresh('students_details',"where userId='".$_SESSION['USER_ID']."'",'currentYear');
    		$currentClass=getDetfresh('students_details',"where userId='".$_SESSION['USER_ID']."'",'bed');
    		$branch=getDetfresh('students_details',"where userId='".$_SESSION['USER_ID']."'",'Department');
    		$hostel=getDetfresh('students_academices',"where userId='".$_SESSION['USER_ID']."'",'hostel');
    		$gender=getDetfresh('students_details',"where userId='".$_SESSION['USER_ID']."'",'gender');
      	$reason=secure_en_input($_POST['reason']) ;
      	$title=secure_en_input($_POST['title']) ;
      	$fdate=secure_en_input($_POST['fdate']) ;
      	$rdate=secure_en_input($_POST['rdate']) ;
      	$datec=dateCheck($fdate,$rdate);
        if (($title !="" && $title != "&amp;amp;lt;br&amp;gt;")&& ($reason != "" && $reason != "&amp;amp;lt;br&amp;gt;") && $fdate!="" && $rdate !="" && $datec ){
          $pdo = new PDO("mysql:host=$server_servername;dbname=$server_database", $server_username, $server_password);
					$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	    		if($gender =="FEMALE"){
	    			$ptype = secure_en_input($_POST['ptype']);
		    		$pname = secure_en_input($_POST['pname']);
		    		$pmobile=secure_en_input($_POST['pmobile']);
		    		$pauthtype= secure_en_input($_POST['pauthtype']);
		    		$pauthid = secure_en_input($_POST['pauthid']);
		    		$sql = "INSERT INTO students_olms (userId,userName,currentYear,currentClass,Department,title,reason,regDate,att1,att2,att3,fdate,rdate,hostel,gender,ptype,pname,pmobile,pauthtype,pauthid) VALUES ('$_SESSION[USER_ID]','$userName','$currentYear','$currentClass','$branch','$title','$reason','$time','$fileN1','$fileN2','$fileN3','$fdate','$rdate','$hostel','$gender','$ptype','$pname','$pmobile','$pauthtype','$pauthid')";
		    	}
	    		else{
	    			$sql = "INSERT INTO students_olms (userId,userName,currentYear,currentClass,Department,title,reason,regDate,att1,att2,att3,fdate,rdate,hostel,gender) VALUES ('$_SESSION[USER_ID]','$userName','$currentYear','$currentClass','$branch','$title','$reason','$time','$fileN1','$fileN2','$fileN3','$fdate','$rdate','$hostel','$gender')";
	    		}
	        $c=$pdo->exec($sql);
	        if($c ==1){echo "<script>alert('Outpass Registred Successfully')</script>";}
	        $last_sno = $pdo->lastInsertId();
          $directoryName="../Outpass/".$_SESSION['USER_ID']."_".str_pad($last_sno, 7,"0",STR_PAD_LEFT);
          mkdir($directoryName, 0777, true);
          if($fileName1!=""){	move_uploaded_file($_FILES["att1"]["tmp_name"], $directoryName. "/" . $fileN1);}
          if($fileName2!=""){	move_uploaded_file($_FILES["att2"]["tmp_name"], $directoryName. "/" . $fileN2);}
          if($fileName3!=""){	move_uploaded_file($_FILES["att3"]["tmp_name"], $directoryName. "/" . $fileN3);}
          }
          ?>
        <script type="text/javascript">window.location.href="olms_apply";</script><?php
    	} 
    ?>
    <br/>
    <div id="notice">   </div>
  </div>
  <?php include_once("../../php/includes/footer.php"); ?>
  <script type="text/javascript" src="../../assets/js/jquery-1.9.1.min.js"></script>
  <script type="text/javascript" src="../../assets/fontawesome/js/all.js"></script>
  <script type="text/javascript" src="../../assets/fontawesome/js/fontawesome.js"></script>
  <script type="text/javascript" src="../../assets/js/jquery.min.js"></script>
  <script type="text/javascript" src="../../assets/js/main.js"></script>
  <script type="text/javascript" src="../../assets/js/nicEdit-latest.js"></script> <script type="text/javascript">
  	load_olms(0);
	  function  load_olms(began){
	  	var end=began+20;
	  	var values =["load_olms",began,end];
  		var msg=SendToPhp(values,"../../php/controllers/Student.php");
  		addto("notice",msg);
	  }
	  function addto(id,msg){
	  	var aa=$("#"+id).html();
	  	selectionListDisplay(id,aa+msg);
	  }
	  function edit_stu_olms_apply(sno){
	  	var reason= "reason_"+sno;
	  	var titles= "title_"+sno;
	  	var fdate= "fdate_"+sno;
	  	var rdate= "rdate_"+sno;
	  	document.getElementById('olms_title_'+sno).innerHTML='<textarea class="notice_push" name="title" id="'+titles+'" style="height:50px;" placeholder="Leave Title/Subject"></textarea>';
	  	document.getElementById('olms_reason_'+sno).innerHTML='<textarea class="notice_push" name="reason" id="'+reason+'" style="height:150px;" placeholder="Leave Reason"></textarea>';
	  	document.getElementById('olms_fdate_'+sno).innerHTML='<input type="date" name="fdate" id="'+fdate+'" style="border:1px solid gray;font-size:16px;width:100%;">';
	  	document.getElementById('olms_rdate_'+sno).innerHTML='<input type="date" name="rdate" id="'+rdate+'" style="border:1px solid gray;font-size:16px;width:100%;">';
	  	document.getElementById('olms_edit_btn_'+sno).innerHTML='<button class="btn btn-success" style="font-weight:600;" onclick="save_stu_olms_apply('+sno+')"> <span class="fa fa-check"></span> Save Leave </button>';
	  }
	  function cancel_stu_olms_apply(sno){
	  	var values =["cancel_stu_olms",sno];
  		var msg=SendToPhp(values,"../../php/controllers/Student.php");
  		window.location.href="olms_apply";
	  }
	  function save_stu_olms_apply(sno){
	  	var reason= "reason_"+sno;
	  	var titles= "title_"+sno;
	  	var fdate= "fdate_"+sno;
	  	var rdate= "rdate_"+sno;
	  	var titles_val=document.getElementById(titles).value;
	  	var reason_val=document.getElementById(reason).value;
	  	var fdate_val=document.getElementById(fdate).value;
	  	var rdate_val=document.getElementById(rdate).value;

	  	var values =["save_stu_olms",sno,titles_val,reason_val,fdate_val,rdate_val];
  		var msg=SendToPhp(values,"../../php/controllers/Student.php");
  		window.location.href="olms_apply";

	  	document.getElementById('olms_edit_btn_'+sno).innerHTML='<button class="btn btn-info" style="font-weight:600;" onclick="edit_stu_olms_apply(\'+sno+\')"> <span class="fa fa-pencil-alt"></span> Edit </button>';
	  }
	//<![CDATA[
        bkLib.onDomLoaded(function() { nicEditors.allTextAreas() });
  	//]]>
  	$(function(){
	    var dtToday = new Date();
	    
	    var month = dtToday.getMonth() + 1;
	    var day = dtToday.getDate();
	    var year = dtToday.getFullYear();
	    if(month < 10)
	        month = '0' + month.toString();
	    if(day < 10)
	        day = '0' + day.toString();
	    var maxDate = year + '-' + month + '-' + day;
	    datePickerSet('fdate','min',maxDate)
	});
  function selectrdate(){
		var fdate=document.getElementById("fdate").value;
	  	datePickerSet('rdate','min', fdate)
	}
	function con(str){
    str = str.replace(/&/g,' ');
    str = str.replace(/\//g,' ');
    str = str.replace(/div/g,' ');
    str = str.replace(/lt;/g,' ');
    str = str.replace(/gt;/g,' ');
    str = str.replace(/nbsp;/g,' ');
    str = str.replace(/amp;/g,' ');
    return str;
  }
	</script>
</body>
</html>
