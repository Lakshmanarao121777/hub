<?php session_start();
if (!$_SESSION) {
    header("Location:../../php/includes/logout.php");
} else {
    if ($_SESSION['USER_TYPE'] != "student") {
        header("Location:../../php/includes/logout.php");
    }
    $userId=$_SESSION['USER_ID'];
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

thead{background:teal;color:white;}td,th{padding:3px;}
</style>
<body>
  <?php include_once "../../php/includes/head_logobox.php";?>
  <?php include_once "../../php/includes/top_nav.php";?>
  <?php include_once "../../php/includes/sidebar_Student.php";?>
  <div class="container bg_white" style="padding:0;">
    <ul class="bread">
      <li><a href="../" title=""><em><span class="fa fa-tachometer-alt"></span> Dashboard</em></a></li>
      <li><a href="./" title=""><em><span class="fa fa-calendar"> </span> Attendance</em></a></li>
      <li class="breadcurrent"><a href="#" title=""><em><span class="fa fa-receipt"> </span> Reports</em></a></li>
    </ul>
    <br>

    <div class="inp" style="padding:10px;">
      <div class="inp_name">Select Date : </div>
      <div class="inp_value"><input type="date" name="rDate" id="rDate" placeholder="DD:MM:YYYY"></div>
    </div>
    <br>
    <center><button class="btn btn-bd-primary btn-primary" onclick="generateReports('<?php echo $userId; ?>')"> generate Report(s) </button></center>
    <div id="AttStatshow"></div>


  </div>
  <?php include_once "../../php/includes/footer.php";?>
  <script type="text/javascript" src="../../assets/js/jquery-1.9.1.min.js"></script>
  <script type="text/javascript" src="../../assets/fontawesome/js/all.js"></script>
  <script type="text/javascript" src="../../assets/js/jquery.min.js"></script>
  <script type="text/javascript" src="../../assets/js/main.js"></script>
  <script type="text/javascript" src="../../assets/js/Student.js"></script>
  <script>
  function generateReports(userId){
    var date=document.getElementById("rDate").value; 
    if(date!=""){
      var values=['generateReport',date,userId];
      var msg=SendToPhp(values,"../../php/controllers/Attendance.php");
      var obj = JSON.parse(msg);
      if((obj.Message).length!=0){
        var oldDate='<table id="addressbooktable" class="table-responsive table-bordered table-active table-hover" style="width:100%;"><thead class="header"><tr><th>S No</th><th>ID</th><th>Name</th><th>Date</th><th>Class</th><th>Year</th><th>Department</th><th>S1</th> <th>S2</th> <th>S3</th><th>S4</th><th>S5</th></tr></thead><tbody>';
        for(i in obj.Message){
          oldDate +="<tr>";
          var ashwini=Number(i)+1;
          oldDate+="<td>"+ashwini+"</td>";
          oldDate+="<td>"+obj.Message[i].userId+"</td>";
          oldDate+="<td>"+obj.Message[i].userName+"</td>";
          oldDate+="<td>"+obj.Message[i].date+"</td>";
          oldDate+="<td>"+obj.Message[i].currentClass+"</td>";
          oldDate+="<td>"+obj.Message[i].currentYear+"</td>";
          oldDate+="<td>"+obj.Message[i].branch+"</td>";
          if(obj.Message[i].s1time!="")oldDate+="<td>P</td>";else oldDate+="<td>AB</td>";
          if(obj.Message[i].s2time!="")oldDate+="<td>P</td>";else oldDate+="<td>AB</td>";
          if(obj.Message[i].s3time!="")oldDate+="<td>P</td>";else oldDate+="<td>AB</td>";
          if(obj.Message[i].s4time!="")oldDate+="<td>P</td>";else oldDate+="<td>AB</td>";
          if(obj.Message[i].s5time!="")oldDate+="<td>P</td>";else oldDate+="<td>AB</td>";
          oldDate +="</tr>";
        }
        oldDate+="</tbody></table>";
        oldDate+="<br><center><button class='btn btn-primary btn-md' onclick='reportDownload(\""+date+"\",\""+userId+"\")'><span class='fa fa-download'></span> Download </button></center>";
      }else{
        var oldDate="no data found on specified Date.";
      }
      
      selectionListDisplay("AttStatshow",oldDate);
    } 
    else{
      snackbar("Date must be filled.");
      alert("Date must be filled.");
    }
  }
  function reportDownload(date,userId){
    var values=['downloadReport',date,userId];
    var msg=SendToPhp(values,"../../php/controllers/Attendance.php");
    var obj = JSON.parse(msg);var i=0;
    var atteObj=[];
    var ashwini=0;
    for(i in obj.Message){
      ashwini=Number(i)+1;
      obj.Message[i].sno=ashwini;
    }
    JSONToCSVConvertor(obj, 'Attendance Report '+date, true);
  }
  function checkIndexName(indexName){
    if(indexName=="sno") return "S No";if(indexName=="userId") return "ID Number";if(indexName=="date") return "Date";
    if(indexName=="s1time") return "S1 Punchtime";if(indexName=="userName") return "Name";
    if(indexName=="s2time") return "S2 Punchtime";if(indexName=="currentClass") return "Class";
    if(indexName=="s3time") return "S3 Punchtime";if(indexName=="gender") return "Gender";
    if(indexName=="s4time") return "S4 Punchtime";if(indexName=="branch") return "Branch";
    if(indexName=="s5time") return "S5 Punchtime";if(indexName=="currentYear") return "Year";
    if(indexName=="s1appBy") return "S1 Approved";if(indexName=="s1appTime") return "S1 Approved Time";
    if(indexName=="s2appBy") return "S2 Approved";if(indexName=="s2appTime") return "S2 Approved Time";
    if(indexName=="s3appBy") return "S3 Approved";if(indexName=="s3appTime") return "S3 Approved Time";
    if(indexName=="s4appBy") return "S4 Approved";if(indexName=="s4appTime") return "S4 Approved Time";
    if(indexName=="s5appBy") return "S5 Approved";if(indexName=="s5appTime") return "S5 Approved Time";
    if(indexName=="s1Ip") return "S1 Punch IP";if(indexName=="s1appIp") return "S1 Approved IP";
    if(indexName=="s2Ip") return "S2 Punch IP";if(indexName=="s2appIp") return "S2 Approved IP";
    if(indexName=="s3Ip") return "S3 Punch IP";if(indexName=="s3appIp") return "S3 Approved IP";
    if(indexName=="s4Ip") return "S4 Punch IP";if(indexName=="s4appIp") return "S4 Approved IP";
    if(indexName=="s5Ip") return "S5 Punch IP";if(indexName=="s5appIp") return "S5 Approved IP";
  }
  function JSONToCSVConvertor(JSONData, ReportTitle) {
    var ShowLabel=true;
    var arrData = typeof JSONData != 'object' ? JSON.parse(JSONData) : JSONData;
    var CSV = '';
    //CSV += ReportTitle + '\r\n\n';
    if (ShowLabel) {
      var row = "";
      for (var index in arrData[0]) {
        if(index != Number(index))
        {
          row += checkIndexName(index) + ',';
        }
      }
      row = row.slice(0, -1);
      CSV += row + '\r\n';
    }
    var al=arrData.length;
    for (var i = 0; i < arrData.length; i++) {
      var row = "";
      for (var index in arrData[i]) {
        if(index != Number(index)){
          row += '"' + arrData[i][index] + '",';
        }
      }
      row.slice(0, row.length - 1);
      CSV += row + '\r\n';  
    }
    if (CSV == '') {
      alert("Invalid data");
      return;
    }
    var fileName = ReportTitle.replace(/ /g, "_");
    var uri = 'data:text/csv;charset=utf-8,' + escape(CSV);
    var link = document.createElement("a");
    link.href = uri;
    link.style = "visibility:hidden";
    link.download = fileName + ".csv";
    document.body.appendChild(link);
    link.click();
    document.body.removeChild(link);
  }
  </script>
</body>
</html>
