<?php session_start();
if (!$_SESSION) {
    header("Location:../../php/includes/logout.php");
} else {
    if ($_SESSION['USER_TYPE'] != "employee") {
        header("Location:../../php/includes/logout.php");
    }
}
include_once "../../php/config/config.inc.php";
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
<style type="text/css">
form{width:100%;}
.inp{width:100%;padding:20px;}
.inp .inp_name{width:50%;height:70px;min-height:70px;max-height: 100%;padding:10px;}
.inp .inp_value{width:50%;height:70px;max-height: 100%;}
input{font-size:24px;}
</style>

<body>
  <?php include_once "../../php/includes/head_logobox.php";?>
  <?php include_once "../../php/includes/top_nav.php";?>
  <?php include_once "../../php/includes/sidebar_security.php";?>
  <div class="container bg_white">
    <div class="inp">
      <center><h3>Student Oupass System</h3></center><br></br>
      <div class="inp_name"> <span class="telugu" style="font-size:24px;">Student Id Number</span></div>
      <div class="inp_value" style="font-size:24px;"><input class="input" type="text" id="userId" placeholder="Enter Student ID" ></div>
      <div class="inp_name"> <button type="reset" class="btn btn-lg btn-warning"> <span class="fa fa-sync"></span> RESET</button></div>
      <div class="inp_value" ><button type="submit" onclick="showusers();" class="btn btn-lg btn-success"> <span class="fa fa-search"></span> Serach </button></div>
    </div>
    <div class="clear"></div>
    <hr></hr>
    <span id="olmsout"></span>
  </div>
  <?php include_once "../../php/includes/footer.php";?>

  <script type="text/javascript" src="../../assets/js/jquery.min.js"></script>
  <script type="text/javascript" src="../../assets/fontawesome/js/all.js"></script>
  <script type="text/javascript" src="../../assets/js/main.js"></script>
  <script type="text/javascript" src="../../assets/js/nicEdit-latest.js"></script> <script type="text/javascript">
    function showusers(){
      var userId= document.getElementById('userId').value;
      var values =["showuser",userId];
      var msg=SendToPhp(values,"../../php/controllers/Security.php");
      var obj =  JSON.parse(msg);var oldDate='';
      if((obj.Message).length > 0 ){
        var i=0;
        for(i in obj.Message){
          oldDate+='<div class="notice_box">';
          oldDate+='  <div class="notice_img">';
          oldDate+='    <img src="../../users/'+userId+'/'+userId+'.jpg">';
          oldDate+='  </div>';
          oldDate+='  <div class="notice_text">';
          if(obj.Message[i].status =="approved"){
            oldDate+='      <span style="font-size:18px;font-weight:600;">Leave Status <span class="telugu"> :సెలవు మంజూరు చేయబడింది.పంపించండి </span> / Leave '+ obj.Message[i].status+'</span> <div class="border-double"></div>';
            oldDate+='              <button onclick="updateout('+obj.Message[i].sno+')" class="btn btn-success"> <span class="telugu">బయటకు పంపండి </span> /Student send Out </button>';
          }
          if(obj.Message[i].status =="chekedOut"){
            oldDate+='      <span style="font-size:18px;font-weight:600;">Leave Status <span class="telugu"> :విద్యార్థి బయటకు వెళ్ళినారు </span> / Leave '+ obj.Message[i].status+'</span> <div class="border-double"></div>';
            oldDate+='              <button onclick="updateIn('+obj.Message[i].sno+')" class="btn btn-success"> <span class="telugu">లోపలి అనుమతించండి </span> /Student approve In </button>';
          }
          oldDate+='    <div class="notice_text_auth">'+obj.Message[i].userId+', '+obj.Message[i].userName+'</div>';
          oldDate+='    <div class="notice_text_auth">'+obj.Message[i].Department+', '+obj.Message[i].currentYear+', '+obj.Message[i].currentClass+'</div>';
          oldDate+='    <div class="notice_text_auth"> Running out of date/ బయటకు వేళ్ళు తేదీ : '+obj.Message[i].fdate+' </div>';
          oldDate+='  </div>';
          oldDate+='</div>';
        }
      }
      else{
        oldDate+='<div class="notice_box">';
        oldDate+='  <div class="notice_img">';
        oldDate+='    <img src="../../users/'+userId+'/'+userId+'.jpg">';
        oldDate+='  </div>';
        oldDate+='  <div class="notice_text">';
        oldDate+='      <span style="font-size:18px;font-weight:600;">Leave Status <span class="telugu"> : అనుమతి లేకుండా బయటకు వెళ్లారు</span> <div class="border-double"></div>';
        oldDate+='              <button onclick="InsertRemark(\''+userId+'\')" class="btn btn-success"> <span class="telugu">లోపలి అనుమతించండి </span> /Student approve In </button>';
        oldDate+='    <div class="notice_text_auth">'+userId+', --- </div>';
        oldDate+='    <div class="notice_text_auth">---, ---, ---</div><div class="clear"></div>';

        oldDate+='    <div class="notice_text_auth"> Departure date/ బయటకు వెళ్లిన తేదీ : <input type="date" id="fdate"> </div>';
        oldDate+='    <div class="notice_text_auth"> Arrived date/ లోపలకు వచ్చు తేదీ : <input type="date" id="rdate"> </div>';
        oldDate+='  </div>';

        oldDate+='</div>';
      }
      selectionListDisplay("olmsout",oldDate);
    }
    function InsertRemark(userId){
      fdate =document.getElementById('fdate').value;
      rdate =document.getElementById('rdate').value;
      var values =["InsertRemarkUpdate",userId,fdate,rdate];
      var msg=SendToPhp(values,"../../php/controllers/Security.php");
      var obj =  JSON.parse(msg);var oldDate='';
      if(obj.message="success"){
        alert("success");
      }location.reload();
    }
    function updateout(sno){
      var values =["updateoutingsecurity",sno];
      var msg=SendToPhp(values,"../../php/controllers/Security.php");
      var obj =  JSON.parse(msg);var oldDate='';
      alert(obj.Message);
      showusers();  location.reload();
    }
    function updateIn(sno){
      var values =["updateInsecurity",sno];
      var msg=SendToPhp(values,"../../php/controllers/Security.php");
      var obj =  JSON.parse(msg);var oldDate='';
      alert(obj.Message);
      showusers();  location.reload();
    }
	</script>
</body>
</html>