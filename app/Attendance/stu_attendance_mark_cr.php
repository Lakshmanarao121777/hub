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
  <title>AIR-HUB :: RGUKT-RKV</title>

  <?php include_once "../../php/meta/meta.php";?>

  <link rel="stylesheet" type="text/css" href="../../assets/bootstrap/css/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="../../assets/fontawesome/css/all.css">
  <link rel="stylesheet" type="text/css" href="../../assets/css/_main.css">
  <link rel="stylesheet" type="text/css" href="../../assets/css/Attendance.css">
</head>
<style>

thead{background:teal;color:white;}td,th{padding:3px;text-align:center;}td{width:9%}td:nth-child(1){width:2.5%;}</style>
<body>
  <?php include_once "../../php/includes/head_logobox.php";?>
  <?php include_once "../../php/includes/top_nav.php";?>
  <?php include_once "../../php/includes/sidebar_Student.php";?>
  <div class="container bg_white" style="padding:0;">
    <ul class="bread">
      <li><a href="../" title=""><em><span class="fa fa-tachometer-alt"></span> Dashboard</em></a></li>
      <li><a href="./" title=""><em><span class="fa fa-calendar"> </span> Attendance</em></a></li>
      <li class="breadcurrent"><a href="#" title=""><em><span class="fa fa-calendar-check"> </span> Authenticattion</em></a></li>
    </ul>
    
    <div id="AttStatshow"></div>
    


  </div>
  <?php include_once "../../php/includes/footer.php";?>
  <script type="text/javascript" src="../../assets/js/jquery-1.9.1.min.js"></script>
  <script type="text/javascript" src="../../assets/fontawesome/js/all.js"></script>
  <!--<script type="text/javascript" src="../../assets/fontawesome/js/fontawesome.js"></script>-->
  <script type="text/javascript" src="../../assets/js/jquery.min.js"></script>
  <script type="text/javascript" src="../../assets/js/main.js"></script>
  <script type="text/javascript" src="../../assets/js/Student.js"></script>
  <script type="text/javascript">
    StatAtt('<?php echo $_SESSION["USER_ID"] ?>');
    function StatAtt(userId){
      var oldDate='',i;
      var values=['auth_stu_cr',userId];
      var msg=SendToPhp(values,"../../php/controllers/Attendance.php");
      var obj = JSON.parse(msg);
      if((obj.Message).length==0){
        oldDate+='<table class="table-responsive table-bordered table-active table-hover" style="width:100%;"><thead class="header"><tr><th>S.no </th><th>ID No </th><th>Date </th><th>S-1</th><th>S-2</th><th>S-3</th><th>S-4</th><th>S-5</th><th>Total</th></tr></thead><tbody><tr> <td colspan="9">No records found</td></tr></tbody></table>';
        snackbar("No Contacts Found.");
      }
      if((obj.Message).length!=0){
        oldDate+='<table id="addressbooktable" class="table-responsive table-bordered table-active table-hover" style="width:100%;"><thead class="header">';
          oldDate+='<tr>';
          oldDate+='<td onclick="sortTable(0,\'addressbooktable\')">S.no </td>';
          oldDate+='<td>ID No </td>';
          oldDate+='<td>Current Year</td>';
          oldDate+='<td>Current Class</td>';
          oldDate+='<td onclick="sortTable(4,\'addressbooktable\')">Date </td>';
          oldDate+='<td onclick="sortTable(5,\'addressbooktable\')">S-1</td>';
          oldDate+='<td onclick="sortTable(6,\'addressbooktable\')">S-2</td>';
          oldDate+='<td onclick="sortTable(7,\'addressbooktable\')">S-3</td>';
          oldDate+='<td onclick="sortTable(8,\'addressbooktable\')">S-4</td>';
          oldDate+='<td onclick="sortTable(9,\'addressbooktable\')">S-5</td>';
          //oldDate+='<td onclick="sortTable(10,\'addressbooktable\')">Total</td>';
          oldDate+='</tr></thead><tbody>';
        var ttt=0;var kk=(obj.Message).length;
        for(i in obj.Message){
          var ashwini=Number(i)+1;
          var tt=0;
          var state1="<span class='fa fa-times'></span>",state2="<span class='fa fa-times'></span>",state3="<span class='fa fa-times'></span>",state4="<span class='fa fa-times'></span>",state5="<span class='fa fa-times'></span>";
          var pass="style='background:rgba(10,200,10,0.9);color:white;'";
          var error="style='background:rgba(200,10,10,0.9);color:white;'";
          if(obj.Message[i].s1time!=""){if(obj.Message[i].s1appTime==""){tt+=1;state1="<button class='btn-success btn btn-xs' onclick=approve('"+userId+"','"+obj.Message[i].userId+"','s1') ><span class='fa fa-check'></span> Approve </button><button class='btn-warning btn btn-xs' onclick=reject('"+userId+"','"+obj.Message[i].userId+"','s1') > <span class='fa fa-times'></span> Reject </button>";}else{state1="<span class='fa fa-check'></span>";}}
          if(obj.Message[i].s2time!=""){if(obj.Message[i].s2appTime==""){tt+=1;state2="<button class='btn-success btn btn-xs' onclick=approve('"+userId+"','"+obj.Message[i].userId+"','s2') ><span class='fa fa-check'></span>  Approve </button><button class='btn-warning btn btn-xs' onclick=reject('"+userId+"','"+obj.Message[i].userId+"','s2') > <span class='fa fa-times'></span> Reject </button>";}else{state2="<span class='fa fa-check'></span>";}}
          if(obj.Message[i].s3time!="" ){if(obj.Message[i].s3appTime==""){tt+=1;state3="<button class='btn-success btn btn-xs' onclick=approve('"+userId+"','"+obj.Message[i].userId+"','s3') ><span class='fa fa-check'></span>  Approve </button><button class='btn-warning btn btn-xs' onclick=reject('"+userId+"','"+obj.Message[i].userId+"','s3') > <span class='fa fa-times'></span> Reject </button>";}else{state3="<span class='fa fa-check'></span>";}}
          if(obj.Message[i].s4time!=""){if(obj.Message[i].s4appTime==""){tt+=1;state4="<button class='btn-success btn btn-xs' onclick=approve('"+userId+"','"+obj.Message[i].userId+"','s4') ><span class='fa fa-check'></span>  Approve </button><button class='btn-warning btn btn-xs' onclick=reject('"+userId+"','"+obj.Message[i].userId+"','s4') > <span class='fa fa-times'></span> Reject </button>";}else{state4="<span class='fa fa-check'></span>";}}
          if(obj.Message[i].s5time!=""){if(obj.Message[i].s5appTime==""){tt+=1;state5="<button class='btn-success btn btn-xs' onclick=approve('"+userId+"','"+obj.Message[i].userId+"','s5') ><span class='fa fa-check'></span>  Approve </button><button class='btn-warning btn btn-xs' onclick=reject('"+userId+"','"+obj.Message[i].userId+"','s5') > <span class='fa fa-times'></span> Reject </button>";}else{state5="<span class='fa fa-check'></span>";}}
          
          ttt+=tt;
          oldDate+='<tr><td>'+ashwini +'</td>';
          oldDate+='<td>'+obj.Message[i].userId+'</td>';
          oldDate+='<td >'+obj.Message[i].currentYear+'</td>';
          oldDate+='<td >'+obj.Message[i].currentClass+'</td>';
          oldDate+='<td>'+obj.Message[i].date+'</td>';
          oldDate+='<td>'+state1+'</td>';
          oldDate+='<td>'+state2+'</td>';
          oldDate+='<td>'+state3+'</td>';
          oldDate+='<td>'+state4+'</td>';
          oldDate+='<td>'+state5+'</td>';
          //oldDate+='<td>'+tt*20+'/100</td>';
          oldDate+='</tr>';
        }
        //oldDate+='<tr><td colspan="9"></td> <td>Total</td> <td>'+ttt*20/kk+'/100</td> </tr>';
        oldDate+='</tbody></table>';
      }
      
      selectionListDisplay("AttStatshow",oldDate);
    }
    function approve(userId,stuId,ses){
      var values=['auth_stu_cr_auth1',userId,ses,stuId];
      var msg=SendToPhp(values,"../../php/controllers/Attendance.php");
      var obj = JSON.parse(msg);
      if(obj.Message="success"){
        snackbar("Student attendance Authenticated Successfully.");
        StatAtt('<?php echo $_SESSION["USER_ID"] ?>');
      }
    }
    function reject(userId,stuId,ses){
      var values=['auth_stu_cr_auth2',userId,ses,stuId];
      var msg=SendToPhp(values,"../../php/controllers/Attendance.php");
      var obj = JSON.parse(msg);
      if(obj.Message="success"){
        snackbar("Student attendance Authenticated Successfully.");
        StatAtt('<?php echo $_SESSION["USER_ID"] ?>');
      }
    }
  </script>
</body>
</html>
