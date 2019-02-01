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
  <title>AIR-HUB :: RGUKT-RKV - Dussara Vacations Outing Pass</title>

  <?php include_once "../../php/meta/meta.php";?>

  <link rel="stylesheet" type="text/css" href="../../assets/bootstrap/css/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="../../assets/fontawesome/css/all.css">
  <link rel="stylesheet" type="text/css" href="../../assets/css/_main.css">
  <link rel="stylesheet" type="text/css" href="../../assets/css/Student.css">
</head>
<style type="text/css">
	.inp{min-height:100%;width:100%;}
	.inp_value input[type="text"]{max-width:90%;}
	.inp_value input[type="date"]{max-width:90%;}
	.inp_value textarea,.inp_value select{width:90%;height:100%;padding:3px 5px;}
	.inp_value {height:100%;width:50%;}
	fieldset{width:50%;float:left;}
	.inp_name{text-align: left;}
	.inp{width:100%;float: left;}
		.inp .inp_name{text-align: left ;height: 100%;font-weight: 600;}
		.inp .inp_value{float: left;height: 100%;}
    fieldset img{width:100%;height:150px;}
    
    .f1{width:12%;border:1px solid teal;float:left;padding:10px 10px;border-right:0;}
    .f2{width:43%;border:1px solid teal;float:left;border-right:0;border-left:0;}
    .f3{width:43%;border:1px solid teal;float:left;padding:20px 10px;border-left:0;}
    #printDiv .inp .inp_name,#printDiv .inp .inp_value,#printDiv,#printDiv .inp{font-size:10px;}
    #printDiv .f1{width:10%;}
    #printDiv .f2,#printDiv .f3{width:45%;}
    #printDiv{max-height:130px;}
	@media only screen and (max-width: 768px) { 
    .f2,.f1,.f3{width:100%;}
		fieldset{width:100%;}
		legend{min-width:100%;margin:0;}
		.inp{width:100%;float: left;}
		.inp .inp_name{width:100%;text-align: left;height: 100%;font-weight: 600;}
		.inp .inp_value{width:100%;float: left;height: 100%;font-size:13px;}
		.inp_value input[type="text"]{max-width:90%;}
		.inp_value input[type="date"]{max-width:90%;}
	}
</style>

<body>
  <?php include_once "../../php/includes/head_logobox.php";?>
  <?php include_once "../../php/includes/top_nav.php";?>
  <?php include_once "../../php/includes/sidebar_Student.php";?>
  <div class="container bg_white" style="padding:0;">
    <ul class="bread">
      <li><a href="./" title=""><em><span class="fa fa-tachometer-alt"></span> Dashboard</em></a></li>
      <li class="breadcurrent"><a href="" title=""><em><span class="fa fa-sign-out-alt"></span> Dussehra vacation Registrations</em></a></li>
    </ul>
    <?php if(date("d-m-Y")=="10-10-2018"||date("d-m-Y")=="11-10-2018"||date("d-m-Y")=="12-10-2018"||date("d-m-Y")=="13-10-2018"||date("d-m-Y")=="14-10-2018"){ ?>
      <?php 
      if(getDetfresh("students_details","where userId='$_SESSION[USER_ID]'","m1")==""  ){ 
        echo '<script>alert("Your Mobile number is not registred.Please Update Your Profile and Tray gain");</script>';
        echo "<div class='notfound'>Your profile is not uptodate Please Update your Profile and Try Again</div> "; }
      else{ 
        if(getCount("dussehra","WHERE userId='$_SESSION[USER_ID]'") == 0){ ?>
          <fieldset class="f1">
            <img src="http://<?php echo $link;?>/registrations/upload/<?php echo $_SESSION['USER_ID']?>/<?php echo $_SESSION['USER_ID'].'.jpg';?>" >
          </fieldset>
          <fieldset class="f2">
            <div class="inp">
              <div class="inp_name">Student Id :</div>
              <div class="inp_value"><input type="hidden" id="userId" value="<?php echo $_SESSION['USER_ID']; ?>" /><?php echo $_SESSION['USER_ID']; ?></div>
            </div>
            <div class="inp">
              <div class="inp_name">Student Name :</div>
              <div class="inp_value"><?php echo getDetfresh("students_details","where userId='$_SESSION[USER_ID]'","userName"); ?></div>
            </div>
            <div class="inp">
              <div class="inp_name">Student Mobile :</div>
              <div class="inp_value"><?php echo getDetfresh("students_details","where userId='$_SESSION[USER_ID]'","m1"); ?></div>
            </div>
            <div class="inp">
              <div class="inp_name">Studying Year :</div>
              <div class="inp_value"><?php echo getDetfresh("students_details","where userId='$_SESSION[USER_ID]'","currentYear"); ?></div>
            </div>
            <div class="inp">
              <div class="inp_name">Department :</div>
              <div class="inp_value"><?php echo getDetfresh("students_details","where userId='$_SESSION[USER_ID]'","Department"); ?></div>
            </div>
          </fieldset>
          <fieldset class="f3">
            <div class="inp">
              <div class="inp_name">Father Name :</div>
              <div class="inp_value"><?php echo getDetfresh("students_details","where userId='$_SESSION[USER_ID]'","pname1"); ?></div>
            </div>
            <div class="inp">
              <div class="inp_name">Father Mobile :</div>
              <div class="inp_value"><?php echo getDetfresh("students_details","where userId='$_SESSION[USER_ID]'","pm1"); ?></div>
            </div>
            <div class="inp">
              <div class="inp_name">Journy Date :</div>
              <div class="inp_value"><b><input type="date" value="2018-10-12" id="jdate" /></b></div>
            </div>
            <div class="inp">
              <div class="inp_name">Return Date :</div>
              <div class="inp_value"><b>22-10-2018</b></div>
            </div>
          </fieldset>
          <fieldset class="col-12">
            <div class="inp">
              <div class="inp_name" style="font-size:18px;padding:10px;">Are Leaving Campus with your Parents : </div>
              <div class="inp_value">
                <select name="pr" id="pr" style="width:90%;padding:10px;font-size:18px;" onchange="ch()">
                  <option value="no">Select Your Option</option>
                  <option value="yes">Yes</option>
                  <option value="no">No</option>
                </select>
              </div>
            </div>
          </fieldset>
          <div class="clear"></div>
          <div id="op1" style="width:100%;"></div>
        <?php }
        else{ ?>
        <div id="printDiv">
          <fieldset class="f1">
            <img src="http://<?php echo $link;?>/registrations/upload/<?php echo $_SESSION['USER_ID']?>/<?php echo $_SESSION['USER_ID'].'.jpg';?>" style="width:100%;height:150px;" >
          </fieldset>
          <fieldset class="f2">
            <div class="inp">
              <div class="inp_name">Student Id :</div>
              <div class="inp_value"><input type="hidden" id="userId" value="<?php echo $_SESSION['USER_ID']; ?>" /><?php echo $_SESSION['USER_ID']; ?></div>
            </div>
            <div class="inp">
              <div class="inp_name">Student Name :</div>
              <div class="inp_value"><?php echo getDetfresh("students_details","where userId='$_SESSION[USER_ID]'","userName"); ?></div>
            </div>
            <div class="inp">
              <div class="inp_name">Student Mobile :</div>
              <div class="inp_value"><?php echo getDetfresh("students_details","where userId='$_SESSION[USER_ID]'","m1"); ?></div>
            </div>
            <div class="inp">
              <div class="inp_name">Studying Year :</div>
              <div class="inp_value"><?php echo getDetfresh("students_details","where userId='$_SESSION[USER_ID]'","currentYear"); ?></div>
            </div>
            <div class="inp">
              <div class="inp_name">Department :</div>
              <div class="inp_value"><?php echo getDetfresh("students_details","where userId='$_SESSION[USER_ID]'","Department"); ?></div>
            </div>
          </fieldset>
          <fieldset class="f3" style="padding:10px;">
            <div class="inp">
              <div class="inp_name">Father Name :</div>
              <div class="inp_value"><?php echo getDetfresh("students_details","where userId='$_SESSION[USER_ID]'","pname1"); ?></div>
            </div>
            <div class="inp">
              <div class="inp_name">Father Mobile :</div>
              <div class="inp_value"><?php echo getDetfresh("students_details","where userId='$_SESSION[USER_ID]'","pm1"); ?></div>
            </div>
            <div class="inp">
              <div class="inp_name">Is Parent Comming :</div>
              <div class="inp_value"><?php if(getDetfresh("dussehra","where userId='$_SESSION[USER_ID]'","parent")=='yes')echo 'Yes';else echo 'No'; ?></div>
            </div>
            <div class="inp">
              <div class="inp_name">Journy Date :</div>
              <div class="inp_value"><b><?php echo getDetfresh("dussehra","where userId='$_SESSION[USER_ID]'","journyDate"); ?></b></div>
            </div>
            <div class="inp">
              <div class="inp_name">Return Date :</div>
              <div class="inp_value"><b>22-10-2018</b></div>
            </div>
          </fieldset>
          <fieldset><div class="clear"></div>
            <input type="checkbox" id="terms1" checked="checked" required readonly="readonly" style="font-size:18px;"> I promise that I shall abide by the rules and regulations of RGUKT<br>
            <input type="checkbox" id="terms2" checked="checked" required readonly="readonly" style="font-size:18px;"> I hereby declare that I\'m going my home during the Dussara Vacations on my own risk<br>
            <input type="checkbox" id="terms3" checked="checked" required readonly="readonly" style="font-size:18px;"> I am alone responsible if anything happens to me during my journy and RGUKT will not be the responsiblility for the same.<br> <div class="clear"></div>
          </fieldset>       
        </div>  
        <center>
        <?php $uid=$_SESSION['USER_ID'];?>
            <div class="clear"></div>  <center><button  class="btn btn-md btn-danger" onclick="deleteLeave('<?php echo $uid ?>')"><span class="fa fa-trash"></span> Cancel Application and Re-Apply</button> 
            <button  class="btn btn-md btn-success" onclick="printDiv()"><span class="fa fa-print"></span> Print Outpass Application</button>
          </center><div class="clear"></div>
        <?php }
      } ?>
      <?php
    }
    else{die("<div class='notfound'>Registrations are not opened yet </div> ");} ?>
    
  </div>
  <?php include_once "../../php/includes/footer.php";?>
  <script type="text/javascript" src="../../assets/js/jquery-1.9.1.min.js"></script>
  <script type="text/javascript" src="../../assets/fontawesome/js/all.js"></script>
  <script type="text/javascript" src="../../assets/js/jquery.min.js"></script>
  <script type="text/javascript" src="../../assets/js/main.js"></script>
  <script type="text/javascript" src="../../assets/js/Student.js"></script>
  <script>
    function printDiv() {
      var printContents = document.getElementById('printDiv').innerHTML;
      var originalContents = document.body.innerHTML;
      document.body.innerHTML = printContents;
      window.print();
      document.body.innerHTML = originalContents;
    }
    function ch(){
      var pr=document.getElementById('pr').value;
      var  kk;
      if(pr=="no"){
        kk+='<div class="inp"><div class="inp_name" style="font-size:18px;padding:10px;">How you Planned Your Journy : </div><div class="inp_value"><select name="jt" id="jt" style="width:90%;padding:10px;font-size:18px;"><option value="">Select One</option><option value="bus" >Bus</option><option value="train"> Train </option> </select> </div></div>  ';
        kk+='  <center>';
        kk+='<input type="checkbox" id="terms1" value="checked" required style="font-size:18px;"> I promise that I shall abide by the rules and regulations of RGUKT </center><br>';
        kk+='<input type="checkbox" id="terms2" value="checked" required style="font-size:18px;"> I hereby declare that I\'m going my home during the Dussara Vacations on my own risk</center><br>';

        kk+='<input type="checkbox" id="terms3" value="checked" required style="font-size:18px;"> I am alone responsible if anything happens to me during my journy and RGUKT will not be the responsiblility for the same.</center><br>';

        kk+='  <div class="clear"></div>  <center><button type="submit" class="btn btn-md btn-success" onclick="accpt()">Submit Outpass Application</button></center><div class="clear"></div> ';
      }
      if(pr=="yes"){
        kk=' <div class="clear"></div>  <center><button type="submit" class="btn btn-md btn-success" onclick="accpt()">Submit Outpass Application</button></center><div class="clear"></div> ';
      }
      selectionListDisplay("op1",kk);
    }
    function accpt(){
      var userId=document.getElementById('userId').value;
      var pr=document.getElementById('pr').value;
      var jdate=document.getElementById('jdate').value;
      if(pr=="yes"){
        if(jdate=="2018-10-14" || jdate=="2018-10-13"){
            var values=["dusara",userId,pr,jdate];
            var msg=SendToPhp(values,"../../php/controllers/Student.php");
            if(msg=="success"){
              alert('Your application was submitted Successfully');
              snackbar("Your outpass application was recorded succssfully.");
              window.location.href="Dussehra";
            }
          }
          else{
            alert("Journy date must be 13-Oct,2018 or 14-Oct,2018.Please select appropriate date.to proceed.")
          }
      }
      else{
        var terms1=document.getElementById('terms1').checked;
        var terms2=document.getElementById('terms2').checked;
        var terms3=document.getElementById('terms3').checked;
        var jt =document.getElementById('jt').value;
        if(jdate=="2018-10-14" || jdate=="2018-10-13"){
          if(terms1&terms2&terms3){
            var values=["dusara",userId,pr,jdate,jt];
            var msg=SendToPhp(values,"../../php/controllers/Student.php");
            if(msg=="success"){
              alert('Your application was submitted Successfully');
              snackbar("Your outpass application was recorded succssfully.");
              window.location.href="Dussehra";
            }
          }
          else{
            alert("Please accept all the terms and tick all the checkbox to proceed");
          }
        }
        else{
          alert("Journy date must be 13-Oct,2018 or 14-Oct,2018.Please select appropriate date to proceed.");
        }
      }
    }
    function deleteLeave(userId){
      var values=["dusara_delete",userId];
      var msg=SendToPhp(values,"../../php/controllers/Student.php");
      if(msg=="success"){
        alert('Your application was canceled Successfully');
        snackbar("Your outpass application was canceld succssfully.");
        window.location.href="Dussehra";
      }
    }
  
  </script>
</body>
</html>
