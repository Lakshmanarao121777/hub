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
thead{background:teal;color:white;}
  tr th{padding:10px;}
  td{padding:10px;}
</style>
<body>
  <?php include_once "../../php/includes/head_logobox.php";?>
  <?php include_once "../../php/includes/top_nav.php";?>
  <?php include_once "../../php/includes/sidebar_Student.php";?>
  <div class="container bg_white" style="padding:0;">
    <ul class="bread">
      <li><a href="../" title=""><em><span class="fa fa-tachometer-alt"></span> Dashboard</em></a></li>
      <li><a href="./" title=""><em><span class="fa fa-calendar"> </span> Attendance</em></a></li>
      <li class="breadcurrent"><a href="#" title=""><em><span class="fa fa-fingerprint"> </span> Bio Metric</em></a></li>
    </ul>
    <div id="AttStatshow"></div>




  </div>
  <?php include_once "../../php/includes/footer.php";?>
  <script type="text/javascript" src="../../assets/js/jquery-1.9.1.min.js"></script>
  <script type="text/javascript" src="../../assets/fontawesome/js/all.js"></script>
  <script type="text/javascript" src="../../assets/js/jquery.min.js"></script>
  <script type="text/javascript" src="../../assets/js/main.js"></script>
  <script type="text/javascript" src="../../assets/js/Student.js"></script>
  <script type="text/javascript">
    StatAtt('<?php echo $_SESSION["USER_ID"] ?>');
    function StatAtt(userId){
      var oldDate='',i;
      var values=['StatAtt_stu',userId];
      var msg=SendToPhp(values,"../../php/controllers/Attendance.php");
      var obj = JSON.parse(msg);
      if((obj.Message).length==0){
        oldDate+='<table class="table-responsive table-bordered table-active table-hover" style="width:100%;"><thead class="header"><tr><th>S.no </th><th>ID No </th><th>Date </th><th>S-1</th><th>S-2</th><th>S-3</th><th>S-4</th><th>S-5</th><th>Total</th></tr></thead><tbody><tr> <td colspan="9">No records found</td></tr></tbody></table>';
        snackbar("No Contacts Found.");
      }
      if((obj.Message).length!=0){
        oldDate+='<table id="addressbooktable" class="table-responsive table-bordered table-active table-hover" style="width:100%;"><thead class="header"><tr><td onclick="sortTable(0,\'addressbooktable\')">S.no </td><td>ID No </td><td onclick="sortTable(2,\'addressbooktable\')">Date </td><td onclick="sortTable(3,\'addressbooktable\')">S-1</td><td onclick="sortTable(4,\'addressbooktable\')">S-2</td><td onclick="sortTable(5,\'addressbooktable\')">S-3</td><td onclick="sortTable(6,\'addressbooktable\')">S-4</td><td onclick="sortTable(7,\'addressbooktable\')">S-5</td><td onclick="sortTable(8,\'addressbooktable\')">Total</td></tr></thead><tbody>';
        var ttt=0;var kk=(obj.Message).length;
        for(i in obj.Message){
          var ashwini=Number(i)+1;
          var tt=0;
          var state1="AB",state2="AB",state3="AB",state4="AB",state5="AB";
          var pass="style='background:rgba(10,200,10,0.9);color:white;'";
          var error="style='background:rgba(200,10,10,0.9);color:white;'";
          var style1=error,style2=error,style3=error,style4=error,style5=error;
          if(obj.Message[i].s1time!=""){tt+=1;state1="P";style1=pass;}
          if(obj.Message[i].s2time!=""){tt+=1;state2="P";style2=pass;}
          if(obj.Message[i].s3time!=""){tt+=1;state3="P";style3=pass;}
          if(obj.Message[i].s4time!=""){tt+=1;state4="P";style4=pass;}
          if(obj.Message[i].s5time!=""){tt+=1;state5="P";style5=pass;}
          
          ttt+=tt;
          oldDate+='<tr><td>'+ashwini +'</td><td>'+obj.Message[i].userId+'</td><td>'+obj.Message[i].date+'</td><td '+style1+'>'+state1+'</td><td '+style2+'>'+state2+'</td><td '+style3+'>'+state3+'</td><td  '+style4+'>'+state4+'</td><td  '+style5+'>'+state5+'</td><td>'+tt*20+'/100</td></tr>';
        }
        oldDate+='<tr><td colspan="7"></td> <td>Total</td> <td>'+ttt*20/kk+'/100</td> </tr>';
        oldDate+='</tbody></table>';
      }
      
      selectionListDisplay("AttStatshow",oldDate);
    }
  </script>
</body>
</html>
