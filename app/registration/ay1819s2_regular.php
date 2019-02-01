<?php session_start();
if (!$_SESSION) {
    header("Location:../../php/includes/logout.php");
} $userId='';
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>AIR-HUB :: RGUKT-RKV</title>

  <?php include_once "../../php/meta/meta.php";?>

  <link rel="stylesheet" type="text/css" href="../../assets/bootstrap/css/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="../../assets/fontawesome/css/all.css">
  <link rel="stylesheet" type="text/css" href="../../assets/css/_main.css">
  <link rel="stylesheet" type="text/css" href="../../assets/css/Student.css">
</head>
<style type="text/css">
td,th{padding:10px;border:1px solid black;}
select{width:100%;}
option{width:100%;}
.cc{width:99%;margin:0 auto;border:1px solid gray;}
.cc .inp{width:50%;}
.inp_name{font-weight:700;height:100%;}

  .inp{width:50%;float:left;}
  .inp .inp_name,.inp .inp_value{max-width:50%;float: left;font-size:12px;}
hr{width:80%;}
form{min-width:90%;padding:10px;}
#dis{width:90%;margin:0 auto;}
.table-bordered>thead>tr th,.table-bordered>tbody>tr td{padding: 5px !important;font-size:10px;}
ol li{font-size:10px;}
@media only screen and (max-width:760px){
  .cc{width:100%; margin: 0;}
  .inp{width:50%;float:left;}
  .inp .inp_name,.inp .inp_value{width:20%;max-width:50%;float: left ;}
  form{width:100%;}
}
</style>
<body>
  <?php include_once "../../php/includes/head_logobox.php";?>
  <?php include_once "../../php/includes/top_nav.php";?>
  <?php if ($_SESSION['USER_TYPE'] == "student") {  include_once "../../php/includes/sidebar_Student.php";} else{include_once "../../php/includes/sidebar_employee.php";}?>
  <div class="container bg_white" style="padding:0;">
    <ul class="bread">
      <li><a href="../" title=""><em><span class="fa fa-tachometer-alt"></span> Dashboard</em></a></li>
      <li><a href="./" title=""><em><span class="fa fa-pencil-alt"> </span> Registrations</em></a></li>
      <li><a href="stu_regular" title=""><em><span class="fa fa-book"> </span> Regular Semister</em></a></li>
      <li class="breadcurrent"><a href="#" title=""><em><span class="fa fa-graduation-cap"></span> AY18-19 Regular Sem-2</em></a></li>
    </ul>
    <br>
    <?php 
    if ($_SESSION['USER_TYPE'] != "student") {  ?>
      <div class="inp"><div class="inp_name">Enter Student ID Number : </div><div class="inp_value"><input type="text" id="userIds"></div></div><div class="clear"></div><br>
      <center><button class="btn btn-primary btn-md" onclick="shoes()"> Get Details </button></center>
        <br><br>
    <?php } else{
      $userId = $_SESSION['USER_ID'];
    }
    ?>
    <div class="cc" id="printDiv">
      <div class='col-12'><img src='../../assets/images/letterhead.jpg'  style='height:100px;width:100%'/></div>
      <center><b><h4>Student Registration Form for SEM-II, AY 2018-19</h4></b></center><hr></hr>
      <br>
      <div id="userDetails"></div>
      <div class="clear"></div><hr></hr>
      <div id="dis"></div>
      <div class="clear"></div>
      <div id="inst" style="padding:10px 50px;">
        <h4>General Instruction for Students:</h4>
        <ol>
          <li> 75% attendance is mandatory for the EST examinations and also for sanction of full scholarship amount.</li>
          <li> Marking bio-metric attendance in both the sessions is mandatory.</li>
          <li> Online Subject/Course registration for AY 2018-19 Semester-II will be enabled till December 14 th , 2018 without any fine and offline registration (at Dean Academics office) up to December 28 th , 2018 by paying a fine of Rs.500.</li>
          <li> If any candidate fails to submit the hard copy of registration form, within the stipulated time, his/her attendance will not be considered.</li>
          <li> You are permitted only for the registered courses.</li>
          <li> Every student should be aware of all the academic guidelines and have a quick note of periodic changes being made in it.</li>
        </ol>
        <b>Note:-Registration process will be completed after signing in the register at HoD office/Dean Academic Office and by submitting hard copy of the registration form between 29 th Dec 2018: 9:00AM–01 st Jan 2019: 10:00AM.</b>
        <b><u>Declaration:</u></b><p> I have read the above mentioned guidelines and declare that I obey the institute guidelines, failing which I am liable to any action to be taken on me.</p><br>
        <span style="float:right;font-weight:900; padding:10px; "> Signature of the student</span>
        <hr style=" border-color:black; width:100%;"></hr>
        <span style="flaot:right; font-weight:800 "> Office Use Only</span>
        <div class="clear"></div> <br><br><br><br>
      </div>
    </div>

        <center> 
          <button class="btn btn-sm btn-success" onclick=printDiv();><span class="fa fa-print"></span> Print .</button>
        </center><br><br>
  </div>
  <?php include_once "../../php/includes/footer.php";?>
  <script type="text/javascript" src="../../assets/js/jquery-1.9.1.min.js"></script>
  <script type="text/javascript" src="../../assets/fontawesome/js/all.js"></script>
  <script type="text/javascript" src="../../assets/js/jquery.min.js"></script>
  <script type="text/javascript" src="../../assets/js/main.js"></script>
  <script type="text/javascript" src="../../assets/js/Student.js"></script>
  <script type="text/javascript">
    function shoes(){
      var userId = document.getElementById('userIds').value
      getSubList(userId);
      shoeuserDetails(userId);
    }
    shoeuserDetails("<?php echo $userId; ?>");
    function getColValuess(table,wheresql,col){
      var values=["get_col_value",table,wheresql,col];
      var msg=SendToPhp(values,"../../php/controllers/Student_New.php");
      return msg;
    }
    function shoeuserDetails(userId){
      if(userId!="") {
        var cYear=getColValuess("students_details","userId='"+userId+"'","currentYear");
        var dept=getColValuess("students_details","userId='"+userId+"'","Department");
        var userName=getColValuess("students_details","userId='"+userId+"'","userName");
        var classroom=getColValuess("students_details","userId='"+userId+"'","currentClass");
        var oldDate ='';
        oldDate += '<div class="inp"><div class="inp_name">Id Number : </div><div class="inp_value">'+userId+'</div></div>';
        oldDate += '<div class="inp"><div class="inp_name"> Name : </div><div class="inp_value">'+userName+'</div></div>';
        oldDate += '<div class="inp"><div class="inp_name">Department : </div><div class="inp_value">'+dept+'</div></div>';
        oldDate += '<div class="inp"><div class="inp_name"> Current Year : </div><div class="inp_value">'+cYear+'</div></div>';
        oldDate += '<div class="inp"><div class="inp_name">Class Room : </div><div class="inp_value">'+classroom+'</div></div>';
        selectionListDisplay("userDetails",oldDate);
        getSubList("<?php echo $userId; ?>");
      }
    }
    function getSubList(userId){
      if(userId!=""){
        var cYear=getColValuess("students_details","userId='"+userId+"'","currentYear");
        var dept=getColValuess("students_details","userId='"+userId+"'","Department");
        var values =['get_col_valueSum','ay1819s2Subjects',"subDept='"+dept+"' and subYear='"+cYear+"' "];
        if(checkReg(userId)){
          if(cYear =="ENGG-3" || cYear =="ENGG-4"){
            getSubListE3E4(userId,cYear,dept);
          }
          else{
            var msg = SendToPhp(values,"../../php/controllers/Student_New.php");
            var obj = JSON.parse(msg);
            if( (obj.Message).length > 0){
              var i=0,oldDate='',ashu=0,ln=0,k=0; 
              //oldDate +="<form method='post' onsubmit='ay1819s2sub(\""+userId+"\")' name='ay1819s2'>";
              oldDate +="<table class='table table-condensed table-bordered table-striped table-responsive'><thead><tr><th> Sno </th><th> Subject Code </th><th> Subject Name </th><th> Credit Points </th><th> Credit Type </th><th> Action </th></tr></thead><tbody>";
              for(i in obj.Message){
                ashu =Number(i)+1;
                //oldDate +='<tr><td>'+ashu+'</td>';
                //oldDate +='<td>'+obj.Message[i].subCode+'</td>';
                //oldDate +='<td>'+obj.Message[i].subName+'</td>';
                //oldDate +='<td>'+obj.Message[i].subCredit+'</td>';
                //oldDate +='<td>'+obj.Message[i].subType+'</td>';
                //oldDate +='<td><input type="checkbox" name="subList[]" value="'+obj.Message[i].subCode+'"></td></tr>';
              }
              oldDate +='<tr colspan="6"><td><center>Registrations were closed</center></td>';
              oldDate += '</tbody></table><div class="clear"></div>';
              //oldDate += ' <center><button type="submit" class="btn btn-success btn-md"><span class="fa fa-check"> </span> Register </button> <button type="rest" class="btn btn-warning btn-md"><span class="fa fa-sync"> </span> Reset </button></center>';
              oldDate += '<div class="notfound">Registrations are closed. </div>';
              //oldDate += '</form>';
            }else{
              oldDate='<div class="notfound"> Registration is not Started yet for you/Your current Acadamic Year/Department</div>';
            }
          }
        }
        else{
          var values =['get_col_valueSum','ay1819s2reg',"userId='"+userId+"'"];
          var msg = SendToPhp(values,"../../php/controllers/Student_New.php");
          oldDate = msg;
          var i=0;var oldDate='';var ashu=0;
          var obj= JSON.parse(msg);
          if( (obj.Message).length > 0){ 
            oldDate +="<h4>Subjects Registered for the SEM-II, 2018-19.</h4> <br><table class='table table-condensed table-bordered table-striped table-responsive'><thead><tr><th> Sno </th><th> Subject Code </th><th> Subject Name </th><th> Credit Points </th><th> Credit Type </th><th> Action </th></tr></thead><tbody>";
            for(i in obj.Message){
              ashu =Number(i)+1;
              //oldDate +='<tr><td>'+ashu+'</td>';
              //oldDate +='<td>'+obj.Message[i].subCode+'</td>';
              //oldDate +='<td>'+obj.Message[i].subName+'</td>';
              //oldDate +='<td>'+obj.Message[i].subCredit+'</td>';
              //oldDate +='<td>'+obj.Message[i].subType+'</td>';
              //oldDate +='<td> Registred </td>';
              //oldDate +='<td><button onclick="deletesno(\''+obj.Message[i].sno+'\')" class="btn btn-warning btn-xs"><span class="fa fa-trash"></span></td>';
              //oldDate +='</tr>';
            }
            oldDate +='<tr colspan="6"><td><center>Registrations were closed</center></td>';
            oldDate += '</tbody></table><div class="clear"></div>';
          }
        }
        selectionListDisplay("dis",oldDate);
      }
    }
    function deletesno(sno){
      var values =['delte',sno];
      var userId = getColValuess("ay1819s2reg","sno='"+sno+"'","userId");
      var msg = SendToPhp(values,"../../php/controllers/Student_New.php");
      var obj = JSON.parse(msg);
      if(obj.Message=="success"){
        snackbar("Subject list Updated.");
        getSubList(userId);
      }
    }
    function getSubListE3E4(userId,cYear,dept){
      var values =['getE3E4subListCore',cYear,dept]
      var msg = SendToPhp(values,"../../php/controllers/Student_New.php");
      var obj = JSON.parse(msg);var ashu=0;
      if( (obj.Message).length > 0){
        var i=0,oldDate='',ln=0,k=0; 
        //oldDate +="<form method='post' onsubmit='ay1819s2subE3E4(\""+userId+"\")' name='ay1819s2'>"; 
        oldDate +="<table class='table table-condensed table-bordered table-striped table-responsive'><thead><tr><th> Sno </th><th> Subject Code </th><th> Subject Name </th><th> Credit Points </th><th> Credit Type </th><th> Action </th></tr></thead><tbody>";
        for(i in obj.Message){
          ashu =Number(i)+1;
          oldDate +='<tr><td>'+ashu+'</td>';
          oldDate +='<td>'+obj.Message[i].subCode+'</td>';
          oldDate +='<td>'+obj.Message[i].subName+'</td>';
          oldDate +='<td>'+obj.Message[i].subCredit+'</td>';
          oldDate +='<td>'+obj.Message[i].subType+'</td>';
          //oldDate +='<td><input type="checkbox" name="subList[]" value="'+obj.Message[i].subCode+'"></td></tr>';
        }
      }
      var values2 =['getE3E4subListElective',cYear,dept]
      var msg2 = SendToPhp(values2,"../../php/controllers/Student_New.php");
      var obj2 = JSON.parse(msg2);
      if( (obj2.Message).length > 0){
        var i2=0;
        for(i2 in obj2.Message){
          ashu =ashu+1;
          oldDate +='<tr><td>'+ashu+'</td>';
          oldDate +='<td>--</td>';
          oldDate +='<td> Elective </td>';
          oldDate +='<td>'+obj2.Message[i2].subCredit+'</td>';
          oldDate +='<td>'+obj2.Message[i2].subType+'</td><td><select id="subList_Select'+ashu+'">';
          if(obj2.Message[i2].electiveNumber != "Free Elective" ){
            var values3 =['getE3E4subListElectiveSub',cYear,dept,obj2.Message[i2].electiveNumber];
            var msg3 = SendToPhp(values3,"../../php/controllers/Student_New.php");
            var obj3 = JSON.parse(msg3);
            var i3=0;
            if( (obj3.Message).length > 0){
              for(i3 in obj3.Message){
                oldDate +='<option value="'+obj3.Message[i3].subCode+'"> '+obj3.Message[i3].subName+' </option>';
              }
            }
          }
          oldDate +='</select></td>';
          oldDate +='</tr>';
        }
        oldDate +='<input type="hidden" id="ashu" value="'+ashu+'">';
      }
      oldDate += '</tbody></table><div class="clear"></div>';
      //oldDate += ' <center><button type="submit" class="btn btn-success btn-md"><span class="fa fa-check"> </span> Register </button> <button type="rest" class="btn btn-warning btn-md"><span class="fa fa-sync"> </span> Reset </button></center>';
      oldDate += '<div class="notfound">Registrations are closed. </div>';
      //oldDate += '</form>';
      selectionListDisplay("dis",oldDate);
    }
    function ay1819s2sub(userId) {
      var cboxes = document.getElementsByName('subList[]');
      var len = cboxes.length;
      var values='' ;var cb='';
      values ='s2reg,'+userId+',';
      var mm='';var l=0;
      for (var i=0; i<len; i++) {
        if(cboxes[i].checked)
        {
          l++;
          cb =cboxes[i].value;
          mm = mm+','+cb;
        }
      }
      if(l==len){
        values =values+l+mm;
        var mnm = values.split(',');
        var msg = SendToPhp(mnm,"../../php/controllers/Student_New.php");
        if(msg=="success"){
          snackbar("registration was successfully completed.Printing of Registration form will be updated soon.");
        }
      }
      else{
        alert("Select all the Subjects");
      }
    }
    function ay1819s2subE3E4(userId) {
      var cboxes = document.getElementsByName('subList[]');
      var ashu = document.getElementById('ashu').value;
      var len = cboxes.length;
      var values='' ;var cb='';
      values ='s2reg,'+userId+',';
      var mm='';var l=0;
      for (var i=0; i<len; i++) {
        if(cboxes[i].checked)
        {
          l++;
          cb =cboxes[i].value;
          mm = mm+','+cb;
        }
      }
      var mmm='';
      for (var i=l+1; i<=ashu; i++) {
        var mmm = document.getElementById('subList_Select'+i).value;
          l++;
          mm = mm+','+mmm;
      }
      if(l==ashu){
        values =values+l+mm;
        var mnm = values.split(',');
        var msg = SendToPhp(mnm,"../../php/controllers/Student_New.php");
        if(msg=="success"){
          snackbar("registration was successfully completed.Printing of Registration form will be updated soon.");
        }
      }
      else{
        alert("Select all the Subjects");
      }
    }
    function checkReg(userId){
      var values =['check_s2sub_reg',userId]
      var msg = SendToPhp(values,"../../php/controllers/Student_New.php");
      if(msg > 0){
        return false;
      }
      else{
        return true;
      }
    }
    function printDiv() {
      var printContents = document.getElementById('printDiv').innerHTML;
      var originalContents = document.body.innerHTML;
      document.body.innerHTML = printContents;
      window.print();
      document.body.innerHTML = originalContents;
    }
  </script>
</body>
</html>