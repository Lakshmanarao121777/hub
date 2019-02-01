<?php session_start();
if (!$_SESSION) {
    header("Location:../../php/includes/logout.php");
} else {
    if ($_SESSION['USER_TYPE'] == "") {
        header("Location:../../php/includes/logout.php");
    }
    $userId=$_SESSION['USER_ID'];
    include_once "../../php/config/DBActivityPHP.php";
    $designation = new DBActivityPHP();
    $dept = $designation->getColValue("gre_users", "userId='$_SESSION[USER_ID]'","department");
    $deptName = $designation->getColValue("gre_departments", "sno='$dept'","deptName");
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
  th,tr{padding:7px 3px;text-align:center;}
  #show {width:48%;margin:10px 1%;float:left;padding:3px;}
  #show1{width:48%;margin:10px 1%;float:left;padding:3px;}
  #show2{width:48%;margin:10px 1%;float:left;padding:3px;}
  td:nth-child(1){width:50px;text-align:center;}
  td:nth-child(5){width:150px;text-align:center;}
  td:nth-child(3){text-align:left;}
  td:nth-child(4){width:180px;text-align:center;}
  td:nth-child(2){width:100px;text-align:center;}
  form{width:100%;padding:0 2px;}
  .inp{min-height:100%;width:100%;}
  select,select > option{width:100%;padding:3px;}
  .inp_value input[type="text"],select{max-width:100%;}
  .inp_value input[type="date"]{max-width:100%;}
  .inp_value textarea{width:100%;height:100%;}
  .inp_value {height:100%;}
  fieldset{width:48%;float:left;margin:10px 1% 2% 1%;padding:10px 10px;}
  .inp_name{text-align: left;width:35%;}
  .inp{width:100%;float: left;}
	.inp .inp_name{text-align: right;height: 100%;font-weight: 600;}
	.inp .inp_value{float: left;height: 100%;font-size:15px;width:60%;}
	.hide-md{display:none;} 
  .hide-sm{display:block;}
  .sarath{width:18%;border:1px solid gray;border-radius:5px;float:left;margin:10px 1% 5px 0;font-size:14px;}
  .ss{background:rgba(250,150,0,1);color:white;padding:20px 10px 11px 10px;margin:10px;}
  .ico{float:left;font-size:50px;color:rgba(255,255,255,0.4);}
  .numbershow{width:100%;position:relative;font-size:30px;text-align:right;float:right;padding:2px 20px;padding-top:20px;}
  @media only screen and (max-width: 768px) { 
    .sarath{width:46%;border:1px solid gray;border-radius:5px;float:left;margin:10px 2% 2% 2%;padding:10px;}
    .container ul.tab>li a.tablinks{min-width:20px;}
    fieldset{width:98%;}
    legend{min-width:100%;margin:0;}
    .inp{width:100%;float: left;}
    .inp .inp_name{width:100%;text-align: left;height: 100%;font-weight: 600;}
    .inp .inp_value{width:100%;float: left;height: 100%;font-size:15px;}
    .inp_value input[type="text"]{max-width:100%;}
    .inp_value input[type="date"]{max-width:100%;}
    .br{border-bottom:1px solid gray;border-right:0;}
    .container ul.tab{width:100%;margin: 0;float: left;}
    ul.tab{padding:5px 10px;font-size:14px;border-radius: 10px 10px 0 0;min-width:40%;}
    .hide-sm{display:none;}
    .hide-md{display:block}
    
  #show {width:98%;margin:10px 1%;float:left;padding:3px;}
  #show1{width:98%;margin:10px 1%;float:left;padding:3px;}
  #show2{width:98%;margin:10px 1%;float:left;padding:3px;}
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
      <li><a href="admin_users" title=""><em><span class="fa fa-users"> </span> Users </em></a></li>
      <li class="breadcurrent"><a href="#" title=""><em><span class="fa fa-user-plus"> </span> User Add </em></a></li>
    </ul>
    <?php
    $Tech = $designation->getCount("gre_users", "designation='Technecian' and department='$dept' ");
    $ascoor = $designation->getCount("gre_users", "designation='Associate CoOrdinator' and department='$dept' ");
    $coor = $designation->getCount("gre_users", "designation='CoOrdinator' and department='$dept' ");
    $total = $designation->getCount("gre_users", "department='$dept' ");
    ?>
    <div class="sarath ss"><b style="color:rgba(255,255,255,0.8);">Techecians </b><br> <span class="numbershow"><i class="fa fa-wrench ico"></i> <?php echo $Tech; ?> </span> </div>
    <div class="sarath ss"><b style="color:rgba(255,255,255,0.8);">Associate CoOrdinator </b><br> <span class="numbershow"><i class="fa fa-user-tie ico" ></i> <?php echo $ascoor; ?></span> </div>
    <div class="sarath ss"><b style="color:rgba(255,255,255,0.8);">Co-Ordinators </b><br> <span class="numbershow"><i class="fa fa-user-tie ico" ></i> <?php echo $coor; ?> </span> </div>
    <div class="sarath ss"><b style="color:rgba(255,255,255,0.8);">Total Users </b><br> <span class="numbershow"><i class="fa fa-users ico" ></i> <?php echo $total; ?> </span> </div>

    <fieldset style="border:1px solid gray;border-radius:5px;">
      <center><h3> <i> New User Registration </i> </h3></center>
      <div class="border-double"></div><br>
        <form method="post" name="greNewUser" onsubmit="fileNewUser(); return false;">
        <div class="inp">
            <div class="inp_name">User ID : </div>
            <div class="inp_value"><input type="text" name="userId" id="userId" onblur="chekUser()" /></div>
          </div>
          <div class="inp">
            <div class="inp_name">Select Designation : </div>
            <div class="inp_value"><select name="designation"><option value="Technecian">Technecian</option><option value="Associate CoOrdinator">Associate CoOrdinator</option><option value="CoOrdinator">CoOrdinator</option></select></div>
          </div>
          <div class="inp">
            <div class="inp_name">Select Department : </div>
            <div class="inp_value"><input type="text" name="department" placeholder="Please discribe your problem shortly" value="<?php echo $dept; ?>" readonly="readonly" /></div>
          </div>
          <center>
            <button class="btn btn-primary" type="submit"><span class="fa fa-check"></span> Add User</button>
            <button class="btn btn-warning" type="reset"><span class="fa fa-sync"></span> Reset </button>
          </center>
        </form>
    </fieldset>
    <fieldset style="border:1px solid gray;border-radius:5px;">
      <center><h3> <i> User Details </i> </h3></center>
      <div class="border-double"></div><br>
      <div id="swarna"></div>
    </fieldset>
<div class="clear"></div>
    <div id="show"style="border:1px solid gray;border-radius:5px;"></div>
    <div id="show1"style="border:1px solid gray;border-radius:5px;"></div>
    <div id="show2"style="border:1px solid gray;border-radius:5px;"></div>
  </div>
  <?php include_once "../../php/includes/footer.php";?>
  <script type="text/javascript" src="../../assets/js/jquery-1.9.1.min.js"></script>
  <script type="text/javascript" src="../../assets/fontawesome/js/all.js"></script>
  <script type="text/javascript" src="../../assets/js/jquery.min.js"></script>
  <script type="text/javascript" src="../../assets/js/main.js"></script>
  <script type="text/javascript" src="../../assets/js/Student.js"></script>
  <script>
    showDept();
    showusers('<?php echo$userId; ?>');
    showusersAscor('<?php echo$userId; ?>');
    showusersCoor('<?php echo$userId; ?>');
    function showDept(){
      var values=["gre_show_dept"];
      var msg=SendToPhp(values,"../../php/controllers/Grievance.php");
      var obj = JSON.parse(msg);
      var oldDate="",i=0;
      if((obj.Message).length!=0){
        for(i in obj.Message){
          oldDate +="<option value='"+obj.Message[i].sno+"'>";
          oldDate +=""+obj.Message[i].deptName+"</option>";
        }
        selectionListDisplay("dept",oldDate);
      }
    }
    function showusers(userId){
      var values=["gre_show_users",userId];
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
          oldDate+="<td>"+obj.Message[i].designation+"</td>";
          oldDate+="<td>"+obj.Message[i].status+"</td>";
          oldDate+="<td>";
          oldDate+="<button class='btn btn-xs btn-primary'><span class='fa fa-eye'> </span> View</button> ";
          if(obj.Message[i].userId !=userId){
            oldDate+=" <button class='btn btn-xs btn-warning' onclick='deleteUser(\""+obj.Message[i].sno+"\")'><span class='fa fa-trash'> </span> Delete</button>";
          }
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
    function showusersAscor(userId){
      var values=["gre_show_usersAsCoor",userId];
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
          oldDate+="<td>"+obj.Message[i].designation+"</td>";
          oldDate+="<td>"+obj.Message[i].status+"</td>";
          oldDate+="<td>";
          oldDate+="<button class='btn btn-xs btn-primary'><span class='fa fa-eye'> </span> View</button> ";
          if(obj.Message[i].userId !=userId){
            oldDate+=" <button class='btn btn-xs btn-warning' onclick='deleteUser(\""+obj.Message[i].sno+"\")'><span class='fa fa-trash'> </span> Delete</button>";
          }
          oldDate+="</td>";
          oldDate +="</tr>";
        }
        oldDate+="</tbody></table>";
        selectionListDisplay("show1",oldDate);
      }
      else{
        selectionListDisplay("show1","<div class='notfound'>No Records found</div>");
      }
    }
    function showusersCoor(userId){
      var values=["gre_show_usersCoor",userId];
      var msg=SendToPhp(values,"../../php/controllers/Grievance.php");
      var obj = JSON.parse(msg);
      var oldDate="",i=0;
      if((obj.Message).length!=0){
        var oldDate='<table id="addressbooktable" class="table-responsive table-bordered table-active table-hover" style="width:100%;"><thead class="header"><tr><th>S No</th><th>ID Number</th><th>Designation</th><th>Status</th><th>Actions</th></tr></thead> <tbody>';
        for(i in obj.Message){
          oldDate +="<tr>";
          var ashwini=Number(i)+1;
          oldDate+="<td>"+ashwini+"</td>";
          oldDate+="<td>"+obj.Message[i].userId+"</td>";
          oldDate+="<td>"+obj.Message[i].designation+"</td>";
          oldDate+="<td>"+obj.Message[i].status+"</td>";
          oldDate+="<td>";
          oldDate+="<button class='btn btn-xs btn-primary'><span class='fa fa-eye'> </span> View</button> ";
          if(obj.Message[i].userId !=userId){
            oldDate+=" <button class='btn btn-xs btn-warning' onclick='deleteUser(\""+obj.Message[i].sno+"\")'><span class='fa fa-trash'> </span> Delete</button>";
          }
          
          oldDate+="</td>";
          oldDate +="</tr>";
        }
        oldDate+="</tbody></table>";
        selectionListDisplay("show2",oldDate);
      }
      else{
        selectionListDisplay("show2","<div class='notfound'>No Records found</div>");
      }
    }
    function fileNewUser(){
      var userId=document.forms['greNewUser']['userId'].value;
      var department=document.forms['greNewUser']['department'].value;
      var designation=document.forms['greNewUser']['designation'].value;
      var values=["gre_insert_user",userId,department,designation];
      var msg=SendToPhp(values,"../../php/controllers/Grievance.php");
      var obj = JSON.parse(msg);
      if(obj.message="success"){
        snackbar("Your Complaint was recorder succesfuly.And our technicians will attempt it ASAP .");
        showComplaints(userId);
      }
    }
    function deleteUser(sno){
      var values=["gre_delete_user",sno];
      var msg=SendToPhp(values,"../../php/controllers/Grievance.php");
      var obj = JSON.parse(msg);
      if(obj.message="success"){
        snackbar("User removed from the records.");
        showusers('<?php echo$userId; ?>');
        showusersAscor('<?php echo$userId; ?>');
        showusersCoor('<?php echo$userId; ?>');
      }
    }
    function chekUser(){
      var userId=document.getElementById('userId').value;
      var values=["gre_show_users_details",userId];
      var msg=SendToPhp(values,"../../php/controllers/Grievance.php");
      var obj = JSON.parse(msg);
      var oldDate="",i=0;
      if((obj.Message).length!=0){
        for(i in obj.Message){
          oldDate+='  <div class="inp">';
          oldDate+='    <div class="inp_name">User ID : </div>';
          oldDate+='    <div class="inp_value">'+obj.Message[i].userId+'</div>';
          oldDate+='  </div>';
          oldDate+='  <div class="inp">';
          oldDate+='    <div class="inp_name">User Name : </div>';
          oldDate+='    <div class="inp_value">'+obj.Message[i].userName+'</div>';
          oldDate+='  </div>';
          oldDate+='  <div class="inp">';
          oldDate+='    <div class="inp_name">User Mobile : </div>';
          oldDate+='    <div class="inp_value">'+obj.Message[i].mobile+'</div>';
          oldDate+='  </div>';
          oldDate+='  <div class="inp">';
          oldDate+='    <div class="inp_name">Status : </div>';
          oldDate+='    <div class="inp_value">'+obj.Message[i].status+'</div>';
          oldDate+='  </div>';
        }
        selectionListDisplay("swarna",oldDate);
      }
      else{
        selectionListDisplay("swarna","<div class='notfound'>No Records found</div>");
      }
    }
  </script>
</body>
</html>
