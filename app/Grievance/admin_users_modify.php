<?php session_start();
if (!$_SESSION) {
    header("Location:../../php/includes/logout.php");
} else {
    if ($_SESSION['USER_TYPE'] == "") {
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
<style>thead{background:teal;color:white;}td,th{padding:3px;}
th,tr{padding:7px 3px;text-align:center;}
#show{width:95%;margin:10px 2%;}
td:nth-child(1){width:50px;text-align:center;}
td:nth-child(5){width:150px;text-align:center;}
td:nth-child(3){text-align:left;}
td:nth-child(4){width:180px;text-align:center;}
td:nth-child(2){width:100px;text-align:center;}
form{width:100%;padding:2px;}
.inp{min-height:100%;width:100%;}
select,select > option{width:100%;padding:3px;}
.inp_value input[type="text"],select{max-width:100%;}
.inp_value input[type="date"]{max-width:100%;}
.inp_value textarea{width:100%;height:100%;}
.inp_value {height:100%;}
fieldset{width:50%;float:left;margin:10px 2% 2% 2%;}
.inp_name{text-align: left;width:35%;}
.inp{width:100%;float: left;}
	.inp .inp_name{text-align: right;height: 100%;font-weight: 600;}
	.inp .inp_value{float: left;height: 100%;font-size:15px;width:60%;}
	.hide-md{display:none;}
  .hide-sm{display:block;}
  .sarath{width:20%;border:1px solid gray;border-radius:5px;float:left;margin:10px 2% 5px 0;font-size:16px;}
  .pp{background:#444466;color:white;padding:20px 10px 8px 10px;}
  .pe{background:#444444;color:white;padding:20px 10px 8px 10px;}
  .ss{background:#006644;color:white;padding:20px 10px 8px 10px;}
  .rj{background:#990000;color:white;padding:20px 10px 8px 10px;}
  .ico{float:left;font-size:50px;color:rgba(255,255,255,0.4);}
.numbershow{width:100%;position:relative;font-size:30px;text-align:right;float:right;padding:2px 20px;line-height:2;padding-top:20px;}
@media only screen and (max-width: 768px) { 
  .sarath{width:90%;border:1px solid gray;border-radius:5px;float:left;margin:10px 2% 2% 0;padding:10px;}
	.container ul.tab>li a.tablinks{min-width:20px;}
	fieldset{width:50%;}
	legend{min-width:100%;margin:0;}
	.inp{width:100%;float: left;}
	.inp .inp_name{width:100%;text-align: left;height: 100%;font-weight: 600;}
	.inp .inp_value{width:100%;float: left;height: 100%;font-size:15px;}
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
  <?php
    if ($_SESSION['USER_TYPE'] == "student") {
      include_once "../../php/includes/sidebar_Student.php";
    }
    else{
      include_once "../../php/includes/sidebar_employee.php";
    }
  ?>
  <div class="container bg_white" style="padding:0 0 50px 0;">
    <ul class="bread">
      <li><a href="../" title=""><em><span class="fa fa-tachometer-alt"></span> Dashboard</em></a></li>
      <li><a href="./" title=""><em><span class="fa fa-headphones-alt"> </span> Grievance Dashboard</em></a></li>
      <li class="breadcurrent"><a href="#" title=""><em><span class="fa fa-users"> </span> Users </em></a></li>
    </ul>
    <div id="show"></div>
  </div>
  <?php include_once "../../php/includes/footer.php";?>
  <script type="text/javascript" src="../../assets/js/jquery-1.9.1.min.js"></script>
  <script type="text/javascript" src="../../assets/fontawesome/js/all.js"></script>
  <script type="text/javascript" src="../../assets/js/jquery.min.js"></script>
  <script type="text/javascript" src="../../assets/js/main.js"></script>
  <script type="text/javascript" src="../../assets/js/Student.js"></script>
  <script>
    showComplaints('<?php echo$userId; ?>');
    function showComplaints(userId){
      var values=["gre_show_complaints",userId];
      var msg=SendToPhp(values,"../../php/controllers/Grievance.php");
      var obj = JSON.parse(msg);
      var oldDate="",i=0;
      if((obj.Message).length!=0){
        var oldDate='<table id="addressbooktable" class="table-responsive table-bordered table-active table-hover" style="width:100%;"><thead class="header"><tr><th>S No</th><th>ID Number</th><th>Subject</th><th>Status</th><th>Actions</th></tr></thead> <tbody>';
        for(i in obj.Message){
          oldDate +="<tr>";
          var ashwini=Number(i)+1;
          oldDate+="<td>"+ashwini+"</td>";
          oldDate+="<td>"+obj.Message[i].userId+"</td>";
          oldDate+="<td>"+obj.Message[i].dept+"</td>";
          oldDate+="<td>"+obj.Message[i].status+"</td>";
          oldDate+="<td>";
          oldDate+="<button class='btn btn-xs btn-primary'><span class='fa fa-eye'> </span> View</button> ";
          oldDate+=" <button class='btn btn-xs btn-warning' onclick='deleteComplaint(\""+obj.Message[i].sno+"\")'><span class='fa fa-trash'> </span> Delete</button>";
          oldDate+="</td>";
          oldDate +="</tr>";
        }
        oldDate+="</tbody></table>";
        selectionListDisplay("show",oldDate);
      }
      else{
        selectionListDisplay("show","<div class='notfound'>No Records found</div>");
      }
    }
    function deleteUser(sno){
      var values=["gre_delete_user",sno];
      var msg=SendToPhp(values,"../../php/controllers/Grievance.php");
      var obj = JSON.parse(msg);
      if(obj.message="success"){
        snackbar("The user was successfully deleted.");
        showComplaints('<?php echo$userId; ?>');
      }
    }
  </script>
</body>
</html>
