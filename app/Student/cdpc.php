<?php session_start();
if (!$_SESSION) {
    header("Location:../../php/includes/logout.php");
} else {
    if ($_SESSION['USER_TYPE'] != "student") {
        header("Location:../../php/includes/logout.php");
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>AIR-HUB :: RGUKT-RKV, CDPC Registation & Guidelines</title>

  <?php include_once "../../php/meta/meta.php";?>

  <link rel="stylesheet" type="text/css" href="../../assets/bootstrap/css/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="../../assets/fontawesome/css/all.css">
  <link rel="stylesheet" type="text/css" href="../../assets/css/_main.css">
  <link rel="stylesheet" type="text/css" href="../../assets/css/Student.css">
</head>
<style type="text/css">
	.tab{margin:0;}
	.container ul.tab{width:100%;margin: 0;float: left;}
	.container ul.tab>li {display: inline;float: left;margin:0 0 0 2px;}
	.container ul.tab>li a.tablinks{padding:4.5px 11px;font-size:16px;float: left;margin: 0;border:1px solid rgba(0,0,0,0.3);border-radius: 10px 10px 0 0;min-width:100px;color:rgba(0,0,0,0.9);text-decoration: none;}
	.container ul.tab>li:hover{background:rgba(0,0,0,0.2);color:rgba(0,0,0,.7);border-radius:10px 10px 0 0;}
	.tabcontents{width:100%;border:1px solid gray;float: left;padding:10px;display:none;}
	.active_tab_top{border-bottom:1px solid green;border-radius: 10px 10px 0 0;background:rgba(0,0,0,0.05);color:rgba(0,0,0,.7);border:0;}
	.inp{min-height:100%;width:100%;}
	.inp_value input[type="text"]{max-width:90%;}
	.inp_value input[type="date"]{max-width:90%;}
	.inp_value textarea,.inp_value select{width:90%;height:100%;padding:3px 5px;}
	.inp_value {height:100%;width:50%;}
  p,ol>li{line-height:1.25;margin:0 0 0 10px;font-size:13px;}
  ol>li{margin:0 0 0 0px;}
  #printDiv{width:100%;overflow:hidden;}
	fieldset{width:50%;float:left;}
	.inp_name{text-align: left;}
	.inp{width:100%;float: left;}
		.inp .inp_name{text-align: left ;height: 100%;font-weight: 600;}
		.inp .inp_value{float: left;height: 100%;}
		.hide-md{display:none;}
		.hide-sm{display:block;}
    #printDiv .inp .inp_name,#printDiv  .inp .inp_value,#printDiv,p,ol>li{min-width:25%;font-size:12px;padding:0;}

	@media only screen and (max-width: 768px) { 
		.container ul.tab>li a.tablinks{min-width:20px;}
		fieldset{width:100%;}
		legend{min-width:100%;margin:0;}
		.inp{width:100%;float: left;}
		.inp .inp_name{width:100%;text-align: left;height: 100%;font-weight: 600;}
		.inp .inp_value{width:100%;float: left;height: 100%;font-size:13px;}
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
  <?php include_once "../../php/includes/head_logobox.php";?>
  <?php include_once "../../php/includes/top_nav.php";?>
  <?php include_once "../../php/includes/sidebar_Student.php";?>
  <div class="container bg_white" style="padding:0;">
    <ul class="bread">
      <li><a href="./" title=""><em><span class="fa fa-tachometer-alt"></span> Dashboard</em></a></li>
      <li><a href="CDPC" title=""><em><span class="fa fa-graduation-cap"> </span> CDPC</em></a></li>
      <li class="breadcurrent"><a href="#" title=""><em><span class="fa fa-question"> </span> CDPC Survey</em></a></li>
    </ul>
    <?php include_once "../../php/config/config.inc.php";{
      $dbuserId=$_SESSION['USER_ID'];
      $dbcurrentYear = getDetfresh("students_details","where userId='$dbuserId'","currentYear");
      $dbm1 = getDetfresh("students_details","where userId='$dbuserId'","m1");
      $dbm2= getDetfresh("students_details","where userId='$dbuserId'","m2");
      $dbuserName= getDetfresh("students_details","where userId='$dbuserId'","userName");
      $dbemail= getDetfresh("students_details","where userId='$dbuserId'","email");
      $dbdepartment= getDetfresh("students_details","where userId='$dbuserId'","Department");
      $dbdob= getDetfresh("students_details","where userId='$dbuserId'","dob");
      if($dbcurrentYear=="ENGG-3"){
        if(getDetfresh("students_details","where userId='$dbuserId'","m1")=="" | getDetfresh("students_details","where userId='$dbuserId'","email")=="" | getDetfresh("students_details","where userId='$dbuserId'","dob")=="" ){
          echo"<script> alert('your Profile is incomplete.Please Complete the Profile to proceed.');window.location.href='profile';</script>";
        }
        else{
          if(getCount("cdpc_srvey","where userId='$dbuserId'") > 0){ ?>
            <div id="printDiv">
              <div class="col-12"><img src="../../assets/images/letterhead.jpg" style="height:100px;width:100%;"></div>
              <div class="border-double"></div>
              <div class="inp">
                <div class="inp_value" style="width:40%;">
                  <div class="inp">
                    <div class="inp_name">Student Id </div>
                    <div class="inp_value"><?php  echo $dbuserId; ?></div>
                  </div>
                  <div class="inp">
                    <div class="inp_name">Student Name </div>
                    <div class="inp_value"><?php  echo $dbuserName ; ?></div>
                  </div>
                  <div class="inp">
                    <div class="inp_name">Contact-1 </div>
                    <div class="inp_value"><?php  echo $dbm1; ?></div>
                  </div>
                  <div class="inp">
                    <div class="inp_name"> Contact-2 </div>
                    <div class="inp_value"><?php  echo $dbm2; ?></div>
                  </div>
                </div>
                <div class="inp_value" style="width:47%;">
                <div class="inp">
                    <div class="inp_name">Department </div>
                    <div class="inp_value"><?php  echo $dbdepartment; ?></div>
                  </div>
                  <div class="inp">
                    <div class="inp_name">Date of Birth </div>
                    <div class="inp_value"><?php  echo $dbdob; ?></div>
                  </div>
                  <div class="inp">
                    <div class="inp_name">Primary Email </div>
                    <div class="inp_value"><?php echo $dbuserId."@rguktrkv.ac.in"; ?></div>
                  </div>
                  <div class="inp">
                    <div class="inp_name">Alternative Email </div>
                    <div class="inp_value"><?php  echo $dbemail; ?></div>
                  </div>
                </div>
                <div class="inp" style="width:10%;">
                <img class="img_user" src="../../users/<?php echo $dbuserId ?>/<?php echo $dbuserId;?>.jpg" style="width:100%;height:150px;">
                </div>
              </div>
              <div class="clear"></div>
              <div class="border-double"></div>
              <div class="col-12">
              <h4> Rules :-</h4>
                <ol>
                  <li> Every student is eligible to register and those only will be considered for applying to appear in any of the campus recruitment drives.</li>
                  <li> Students, who are interested to pursue their further studies (or) not interested in doing jobs, are strictly instructed not to register for placements.</li>
                  <li> Students are expected to go through Job Notification Form and research about the company, job profile before applying for the respective recruitment drive.</li>
                  <li> Once the students have registered for the drive and got offer from the company, students should accept the offer and join the company on date as mentioned by the company. The defaulters will be debarred/ blacklisted from future campus placement drives.</li>
                  <li> It is mandatory for the students, who have registered for a recruitment drive to attend the PPTs (Pre-Placement Talk) of the respective companies, should occupy the venue 20-mintues before the given scheduled time and will not be allowed to leave the room while the PPT in progress.</li>
                  <li> If anybody found misbehaving/arguing/complaining with the company officials while in any rounds of recruitment process will be considered seriously &amp; those involved will be debarred/ blacklisted from future campus placement drives.</li>
                  <li> Students cannot drop out from selection process once he/she has been shortlisted for further rounds unless he/she will be rejected midway by the company. A disciplinary action will be taken against defaulter student(s).</li>
                  <li> Students are expected not to quit any rounds of recruitment drive in a midway until they are asked to leave.</li>
                  <li> Students must carry their identity cards with them whenever they go through any on campus or off- campus Placement activity.</li>
                  <li> Student should carry at least 3 sets of copies of their latest resume, two sets of photocopies/original certificates in a proper file along with two passport size photographs for any of the recruitment drive.</li>
                  <li> It is the responsibility of the student to check announcements/notices/ updated information/shortlisted names etc. in coordination with CDPC.</li>
                  <li> If once students get placed in one company he/she will not be allowed to appear for other companies.</li>
                </ol>
                <p><h4>Dress Code : </h4></p>
                <p><b>Students are expected to follow the dress code stipulated by the Placement Committee.</b></p>
                <p>a. Students must be formally dressed whenever they participate in any sort of interaction with a company.</p>
                <p>b. Minimum formal clothes for boys include formal shirt and trousers with tuck, and leather shoes.</p>
                <p>c. Minimum formal clothes for girls include either a pair of Salwar-Kameez.</p>
                <p>d. Ties and other formal accessories are optional. Accessories deemed unsuitable by the Placement Committee, such as sunglasses/bands/funky hairstyles are banned.</p>
                <p>e. T-shirts, jeans, casual shirts, slippers and other informal wear is strictly prohibited and students found violating the dress code will be disallowed from attending the process and treated as absent, as regulated by the rule above.</p>
                <p>f. The boys should be presentable with proper haircut, clean shave and nails trimmed.</p>
                <br>
                <p><input type="checkbox" checked="checked" readonly="readonly">I hereby confirm that I have read and understood above guideline, agree to its terms and conditions, and I am signing it voluntarily.</p>
              </div>
              <br><br>
              <div class="inp">
                <div class="inp_value">Place : RKVALLEY<br> Date :<?php echo date('d/M/Y'); ?></div>
                <div class="inp_value"><br>(<?php  echo$dbuserName; ?>)</div>
              </div>
            </div>
            <center><button class="btn btn-primary" onclick="printDiv()"><span class="fa fa-print"></span>  Print Undertaking Form </button></center><br>
          <?php }
          else{ ?>
            <fieldset style="border:1px solid black;width:75%;">
              <legend>Placement Regisration Survey</legend>
              <form method="post" onsubmit="enrollcdpcs();return false;" name="enrollcdpc" style="width:100%;">
              <div class="inp">
                  <div class="inp_name">UserId  : </div>
                  <div class="inp_value">
                    <input type="text" value="<?php echo $_SESSION['USER_ID']; ?>" readonly="readonly" name="userId"/>
                  </div>
                </div>
                <div class="inp">
                  <div class="inp_name">Are you interested in going for a job in Industry : </div>
                  <div class="inp_value">
                    <select name="o1" onchange="interust()">
                      <option value=""> Select Your Option </option>
                      <option value="Yes"> Yes </option>
                      <option value="No"> No </option>
                    </select>
                  </div>
                </div>
                <span id="openion"></span>
            </fieldset><?php
          }
        }
      }
      else{
        echo"<div class='notfound'>No registrations are opened..</div>";
      }
    }
    ?>
   <script>
   
    function interust(){
      var openion= document.forms['enrollcdpc']['o1'].value;
      var openion2='';
      if(openion=="Yes"){
        openion2+='<div class="inp">';
        openion2+='  <div class="inp_name">Please Select the type of the Industry You want to joining: </div>';
        openion2+='  <div class="inp_value">';
        openion2+='    <select name="o2" onchange="interust2()"><option value=""> Select Your Option </option>';
        openion2+='      <option value="IT"> IT Industry </option>';
        openion2+='      <option value="Core"> Core Side Job </option>';
        openion2+='      <option value="Both"> Both </option>';
        openion2+='      <option value="else"> Something Else </option>';
        openion2+='    </select><span id="openion2"></span>';
        openion2+='  </div>';
        openion2+='</div>';
      }
      if(openion=="No"){
        openion2+='<div class="inp">';
        openion2+='  <div class="inp_name">hat you are planing to do after Gaduation : </div>';
        openion2+='  <div class="inp_value">';
        openion2+='    <select name="o2" onchange="interust2()"><option value=""> Select Your Option </option>';
        openion2+='      <option value="Banking"> Banking </option>';
        openion2+='      <option value="Gate"> GATE </option>';
        openion2+='      <option value="GRE"> GRE </option>';
        openion2+='      <option value="TOFEL"> TOFEL </option>';
        openion2+='      <option value="CAT"> CAT </option>';
        openion2+='      <option value="CIVILS/Groups"> CIVILS/Groups </option>';
        openion2+='      <option value="else"> Something Else </option>';
        openion2+='    </select><span id="openion2"></span></span>';
        openion2+='  </div>';
        openion2+='</div>';
      }
      selectionListDisplay("openion",openion2);
    }
    function interust2(){
      var openion1= document.forms['enrollcdpc']['o1'].value;
      var openion2= document.forms['enrollcdpc']['o2'].value;
      var op3='';
      if(openion2=="else"){
        op3+='<textarea col="4" name="o3"></textarea>';
      }
      op3+='<br><br><center><button type="submit" class="btn btn-success"><span class="fa fa-check"></span> Submit Feedback</button> <button type="reset" class="btn btn-warning"><span class="fa fa-sync"></span> Reset</button></center>';
      selectionListDisplay("openion2",op3);
    }
    function enrollcdpcs(){
      var openion1= document.forms['enrollcdpc']['o1'].value;
      var openion2= document.forms['enrollcdpc']['o2'].value;
      if(openion2=="else")openion2=document.forms['enrollcdpc']['o3'].value;
      var userId= document.forms['enrollcdpc']['userId'].value;
      var values=['cdpc_survey',openion1,openion2,userId];
      var msg=SendToPhp(values,"../../php/controllers/Student.php");
			if(msg=="success"){
        snackbar("Your options were recorded succssfully.");
      }
      window.location.reload();
    }
    function printDiv() {
      var printContents = document.getElementById('printDiv').innerHTML;
      var originalContents = document.body.innerHTML;
      document.body.innerHTML = printContents;
      window.print();
      document.body.innerHTML = originalContents;
    }
   </script>
    




  </div>
  <?php include_once "../../php/includes/footer.php";?>
  <script type="text/javascript" src="../../assets/js/jquery-1.9.1.min.js"></script>
  <script type="text/javascript" src="../../assets/fontawesome/js/all.js"></script>
  <!--<script type="text/javascript" src="../../assets/fontawesome/js/fontawesome.js"></script>-->
  <script type="text/javascript" src="../../assets/js/jquery.min.js"></script>
  <script type="text/javascript" src="../../assets/js/main.js"></script>
  <script type="text/javascript" src="../../assets/js/Student.js"></script>
</body>
</html>
