<?php session_start();
if (!$_SESSION) {
    header("Location:../../php/includes/logout.php");
} else {
    if ($_SESSION['USER_TYPE'] != "student") {
        header("Location:../../php/includes/logout.php");
    }
    $uid = $_SESSION['USER_ID'];
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
  form{padding:10px;width:100%;border:1px solid gray;margin:10px 0;}
  .inp .inp_value,.inp .inp_name{padding:5px;font-size: 16px;font-weight: 500;margin:1px 0;height:50px;}
  input[type="text"],select{width:100%;border:1px solid gray;border-radius:2px;padding:5px;margin:1px 0;}
  @media only screen and (max-width: 600px) { form{width:100%;}.inp .inp_value,.inp .inp_name{height:45px;padding:5px;font-size: 16px;font-weight: 500;width:100%;float: left;text-align: left;}
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
      <li class="breadcurrent"><a href="#" title=""><em><span class="fa fa-laptop"></span> HP Lapttop Survey</em></a></li>
    </ul>
    <?php if (getCount("hp_laptop_survey", "where userId='$uid'") == 0) {?>
    <form name="laptop_survey" onsubmit="survey_laptop('<?php echo $uid; ?>')" method="post" action="">
      <fieldset>
        <legend>FEEDBACK FORM FOR HP LAPTOPS</legend>

	                                            


   I , <b><?php echo getDetfresh('students_details', "where userId='" . $_SESSION['USER_ID'] . "'", 'userName'); ?></b> bearing roll no <b><?php echo$uid; ?> </b>from the department of  <b><?php echo getDetfresh('students_details', "where userId='" . $_SESSION['USER_ID'] . "'", 'Department'); ?></b>  have used the laptop with the following details:
	<div class="inp"> 
		<div class="inp_value">Laptop  sno  : </div>
		<div class="inp_value">
			<input type="text" name="sno" required="required">   </div></div>
	<div class="inp"> 
		<div class="inp_value">Adaptor  sno  :</div>
		<div class="inp_value">
			<input type="text" name="adaptor" required="required"> 
		</div>
	</div>
	<div class="inp"> 
		<div class="inp_value">Battery  sno :</div>
		<div class="inp_value">
			<input type="text" name="battery" required="required"> 
		</div>
	</div>
	<div class="inp"> 
		<div class="inp_value">MAC id :</div>
		<div class="inp_value">
			<input type="text" name="mac" required="required"> 
		</div>
	</div>
	<div class="inp"> 
		<div class="inp_value">1. Are you facing any heat issues with hp laptop</div>
		<div class="inp_value">
			<select name="heatIssue" required="required"><option value="Yes"> Yes </option>   <option value="No"> No </option></select>
		</div>
	</div>
	<div class="inp"> 
		<div class="inp_value">2. working  condition of keyboard is </div>
		<div class="inp_value">
			<select name="keyBoard" required="required"><option value="Good">Good </option>   
			<option value="Sensitive">Sensitive  </option>   
			<option value="Hard">Hard  </option>   
			<option value="below  average">below  average</option></select>
		</div>
	</div>
	<div class="inp"> 
		<div class="inp_value">3. Battery   backup is</div>
		<div class="inp_value">
			<select required="required" name="batteryBackup"><option value="3--4hrs">3--4hrs </option>  
			<option value="3--2hrs">3--2hrs </option>   
			<option value="2--1hr">2--1hr </option>   <option value="0--1hr">0--1hr</option></select>
		</div>
	</div>
	<div class="inp"> 
		<div class="inp_value">4. Video   (VGA) Performance while watching tutorials is</div>
		<div class="inp_value">
			<select required="required" name="vga">
				<option value="Excellent">Excellent  </option>
			   <option value="Good">Good  </option>   
			   <option value="Average">Average  </option>   
			   <option value="below average">below average</option></select>
		</div>
	</div>
	<div class="inp"> 
		<div class="inp_value">5. Ram   performance while using MULTIPLE  tabs</div>
		<div class="inp_value">
			<select required="required" name="ram">
			<option value="0—5 excellent">0—5 excellent   </option>   
			<option value="5—10 average">5—10 average</option>
			</select>
		</div>
	</div>
	<div class="inp"> 
		<div class="inp_value">6. Touch   pad scrolling performance while using it </div>
		<div class="inp_value">
			<select required="required" name="touchpad"><option value="Smooth">Smooth   </option>   
			<option value="normal">normal  </option>   <option value="hard">hard   </option>   
			<option value="too sensitive">too sensitive</option></select>
		</div>
	</div>
	<div class="inp"> 
		<div class="inp_value">7. Sound Quality when listening online tutorials/videos</div>
		<div class="inp_value">
			<select required="required" name="sound"><option value="Excellent">Excellent   </option>   
			<option value="Good">Good    </option>   
			<option value="average">average  </option>   <option value="below average">below average</option></select>
		</div>
	</div>
	<div class="inp"> 
		<div class="inp_value">8. Web cam Quality when using it</div>
		<div class="inp_value">
			<select required="required" name="webcam"><option value="Excellent">Excellent   </option>   
			<option value="Good">Good    </option>   <option value="Average">Average   </option>  
			 <option value="below average">below average</option></select>
		</div>
	</div>
	<div class="inp"> 
		<div class="inp_value">9. Adaptor working condition when charging</div>
		<div class="inp_value">
			<select required="required" name="adapterCondition"><option value="Excellent">Excellent   </option>   
			<option value="Good"> Good  </option>   <option value="Average">Average  </option>   
			<option value="Below average">Below average</option></select>
		</div>
	</div>
	<div class="inp"> 
		<div class="inp_value">10  . Screen quality</div>
		<div class="inp_value">
			<select required="required" name="screen"><option value="Comfort">Comfort  </option>   
			<option value="Useful">Useful   </option>   
			<option value="Delicate"> Delicate   </option>   <option value="Too Sensitive"> Too Sensitive</option></select>
		</div>
	</div>
	<div class="inp"> 
		<div class="inp_value">11. Laptop  panel quality</div>
		<div class="inp_value">
			<select required="required" name="panel"><option value="Comfort">Comfort   </option>   
			<option value="Useful">Useful </option>   <option value="Delicate">Delicate   </option>   
			<option value="Too Sensitive">Too Sensitive</option></select>
		</div>
	</div>
	<div class="inp"> 
		<div class="inp_value">12.USB performance when transferring  data  by using right side port</div>
		<div class="inp_value">
			<select required="required" name="usbRHS">
			<option value="20—30 mbps">20—30 mbps    </option>   
			<option value="10—20 mbps ">10—20 mbps  </option>   
			<option value="1—10mbps">1—10mbps   </option>   
			<option value="0—1mb">0—1mb</option></select>
		</div>
	</div>
	<div class="inp"> 
		<div class="inp_value">13.Processor performance when using Graphics/Software’s/Videos</div>
		<div class="inp_value">
			<select required="required" name="processor">
			<option value="Excellent ">Excellent  </option>   
			<option value="Good">Good  </option>   
			<option value="average">average  </option>   
			<option value="below average">below average</option></select>
		</div>
	</div>
	<div class="inp"> 
		<div class="inp_value">14.Facing any laptop hanging  issues while using  Softwares/Videos/Tabs</div>
		<div class="inp_value">
			<select required="required" name="other">
			<option value="Yes"> Yes </option>   <option value="No"> No </option></select>
		</div>
	</div>
	<div class="inp"> 
		<div class="inp_value">
			15.I have used the services of the above laptop for 20 days based on that my feedback working  of the laptop is</div>
		<div class="inp_value">
			<select name="overall" required="required"><option value="Satisfied"> Satisfied </option>   
			<option value="Dissatisfied"> Dissatisfied </option></select>
		</div>
	</div>
        <br/>
        <div class="inp">
		<div class="inp_value"></div>
		<div class="inp_value">
			<button class="btn btn-info" type="reset"><span class="fa fa-recycle"> </span>Reset </button>
			<button type="submit" class="btn btn-success"><span class="fa fa-check"> </span> Save </button>
		</div>
        </div>
	<br/>
	<div class="clear"></div>
      </fieldset>

    </form>
  <?php } else {echo "<br><div class='notfound'>Dear Student have alreaduy taken the survey</div>";?>
    <div class="inp" style="border:1px solid black;padding:10px;">
      <div class="inp_name">Student Id : </div>
      <div class="inp_value"><?php echo $uid; ?></div>
      <div class="inp_name">Student Name : </div>
      <div class="inp_value"><?php echo getDetfresh('laptop_survey', "where userId='" . $_SESSION['USER_ID'] . "'", 'userName'); ?></div>
      <div class="inp_name">Laptop Serial Number : </div>
      <div class="inp_value"><?php echo getDetfresh('laptop_survey', "where userId='" . $_SESSION['USER_ID'] . "'", 'laptop_serial'); ?></div>
      <div class="inp_name">Laptop Problem : </div>
      <div class="inp_value"><?php echo getDetfresh('laptop_survey', "where userId='" . $_SESSION['USER_ID'] . "'", 'problem'); ?></div>
    </div>

<?php
}?>
  </div>
  <?php include_once "../../php/includes/footer.php";?>
  <script type="text/javascript" src="../../assets/js/jquery-1.9.1.min.js"></script>
  <script type="text/javascript" src="../../assets/fontawesome/js/all.js"></script>
  <!--<script type="text/javascript" src="../../assets/fontawesome/js/fontawesome.js"></script>-->
  <script type="text/javascript" src="../../assets/js/jquery.min.js"></script>
  <script type="text/javascript" src="../../assets/js/main.js"></script>
  <script type="text/javascript" src="../../assets/js/Student.js"></script>
  <script type="text/javascript">

    function survey_laptop(userId){
       var snos  = document.forms['laptop_survey']['sno'].value;
       var adaptor  = document.forms['laptop_survey']['adaptor'].value;
       var battery  = document.forms['laptop_survey']['battery'].value;
       var mac  = document.forms['laptop_survey']['mac'].value;
       var heatIssue  = document.forms['laptop_survey']['heatIssue'].value;
       var keyBoard  = document.forms['laptop_survey']['keyBoard'].value;
       var batteryBackup  = document.forms['laptop_survey']['batteryBackup'].value;
       var vga  = document.forms['laptop_survey']['vga'].value;
       var ram  = document.forms['laptop_survey']['ram'].value;
       var touchpad  = document.forms['laptop_survey']['touchpad'].value;
       var sound  = document.forms['laptop_survey']['sound'].value;
       var webcam  = document.forms['laptop_survey']['webcam'].value;
       var adapterCondition  = document.forms['laptop_survey']['adapterCondition'].value;
       var screen  = document.forms['laptop_survey']['screen'].value;
       var panel  = document.forms['laptop_survey']['panel'].value;
       var usbRHS  = document.forms['laptop_survey']['usbRHS'].value;
       var processor  = document.forms['laptop_survey']['processor'].value;
       var other  = document.forms['laptop_survey']['other'].value;
       var overall  = document.forms['laptop_survey']['overall'].value;      
       var values =["laptop_survey_hp",userId,snos,adaptor,battery,mac,heatIssue,keyBoard,batteryBackup,vga,ram,touchpad,sound,webcam,adapterCondition,screen,panel,usbRHS,processor,other,overall];   
       var msg = SendToPhp(values,"../../php/controllers/Student_New.php");
       alert(msg);
       /*if(msg="Success")
       {
         alert("Survey Successfully Completed.");
         location.reload();
       }*/
     }

  </script>
</body>
</html>
