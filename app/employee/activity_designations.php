<?php session_start();
if (!$_SESSION) {
    header("Location:../../php/includes/logout.php");
} else {
    if ($_SESSION['USER_TYPE'] != "employee") {
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
  <link rel="stylesheet" type="text/css" href="../../assets/css/employee.css">
</head>
<style>

  .inp{width:90%;}
  .inp .inp {width:50%;height:100%;padding:10px;}
  .inp .inp .inp_name{font-size:20px;width:50%;}
  .inp .inp .inp_value{font-size:20px;width:50%;}
  #details{width:99%;margin:auto;}
  .tabcontents fieldset{width:50%;float:left;}
  th{background:teal;color:white;padding:6px 10px;border-left:0;border-right:0;}
  td{padding:10px;border-left:0;border-right:0;}
  .tab{margin:0;}
.container ul.tab{width:100%;margin: 0;float: left;}
.container ul.tab>li {display: inline;float: left;margin:0 0 0 2px;}
.container ul.tab>li a.tablinks{padding:4.5px 11px;font-size:16px;float: left;margin: 0;border:1px solid rgba(0,0,0,0.3);border-radius: 10px 10px 0 0;min-width:100px;color:rgba(0,0,0,0.9);text-decoration: none;}
.container ul.tab>li:hover{background:rgba(0,0,0,0.2);color:rgba(0,0,0,.7);border-radius:10px 10px 0 0;}
.tabcontents{width:100%;border:1px solid gray;float: left;padding:10px;display:none;}
.active_tab_top{font-size:180px;border-bottom:2px solid green;border-radius: 10px 10px 0 0;background:rgba(0,0,0,0.05);color:rgba(0,0,0,.7);border:0;}
@media only screen and (max-width: 768px) { 
	.container ul.tab>li a.tablinks{min-width:20px;}
	fieldset{width:100%;}
	legend{min-width:100%;margin:0;}
  }
  .modal {display: none;position: fixed; /* Stay in place */
    z-index: 5; /* Sit on top */
    left: 0;
    top: 0;width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}
.modal-content {background-color:#fefefe;margin:3% auto;padding:20px 20px 30px 20px;border:1px solid #888;width:90%;overflow-y:scroll;}
.close {color: #aaa; float: right;font-size: 28px;font-weight: bold;}
.modal-content .inp{width:50%;}
.close:hover,
.close:focus {
    color: black;
    text-decoration: none;
    cursor: pointer;
}
.tab{margin:0;}
	.container ul.tab{width:100%;margin: 0;float: left;}
	.container ul.tab>li {display: inline;float: left;margin:0 0 0 2px;}
	.container ul.tab>li a.tablinks{padding:4.5px 11px;font-size:16px;float: left;margin: 0;border:1px solid rgba(0,0,0,0.3);border-radius: 10px 10px 0 0;min-width:100px;color:rgba(0,0,0,0.9);text-decoration: none;}
	.container ul.tab>li:hover{background:rgba(0,0,0,0.2);color:rgba(0,0,0,.7);border-radius:10px 10px 0 0;}
	.tabcontents{width:100%;border:1px solid gray;float: left;padding:10px;display:none;}
	.active_tab_top{font-size:180px;border-bottom:1px solid green;border-radius: 10px 10px 0 0;background:rgba(0,0,0,0.05);color:rgba(0,0,0,.7);border:0;}
	.inp{width:100%;padding:5px;}
	.inp_value input[type="text"]{max-width:90%;}
	.inp_value input[type="date"]{max-width:90%;}
	.inp_value textarea,.inp_value select,.inp_value option,.inp_value datalist{width:90%;height:100%;padding:3px 5px;}
	.inp_value {height:100%;}
	fieldset{width:50%;float:left;}
	.inp_name{text-align: left;}
	.inp{width:100%;float: left;}
		.inp .inp_name{text-align: right;height: 100%;font-weight: 600;}
		.inp .inp_value{float: left;height: 100%;font-size:15px;}
		.hide-md{display:none;}
		.hide-sm{display:block;}
		#addressbookshow th{background:teal;color:white;padding:8px 10px;}
		#addressbookshow td{padding:8px 10px;}
    td{border-left:0;border-right:0;}
    .test:after {
  content: '\2807';
  font-size: 100px;
  }
	@media only screen and (max-width: 768px) { 
    .modal-content .inp{width:100%;}
		.container ul.tab>li a.tablinks{min-width:20px;}
		fieldset{width:100%;}
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
  <?php include_once "../../php/includes/sidebar_employee.php";?>
  <?php
    include_once "../../php/config/DBActivityPHP.php";
    $designation = new DBActivityPHP();
    $user_ofc = $designation->getColValue("employee_designations", "userID='$_SESSION[USER_ID]'", "office");
    $user_designation = $designation->getColValue("employee_designations", "userID='$_SESSION[USER_ID]'", "designation");
    ?>
    <div class="container bg_white" style="padding:0 0 20px 0;">
      <ul class="bread">
        <li><a href="./" title=""><em><span class="fa fa-tachometer-alt"></span> Dashboard</em></a></li>
        <li class="breadcurrent"><a href="" title=""><em><span class="fa fa-id-card-alt"></span> Designations</em></a></li>
      </ul>
    <br>
     <button class="btn btn-md btn-primary" onclick="createNewRole()"> Create new Designation </button> <button class="btn btn-md btn-info" onclick="assignRoleToEmp()"> Assign Designation </button> <br>
    <div id="details"></div>
    <div id="viewDetails" class="modal" style="display:none;"></div>
  </div>
  <?php include_once "../../php/includes/footer.php";?>
  <script type="text/javascript" src="../../assets/js/jquery-1.9.1.min.js"></script>
  <script type="text/javascript" src="../../assets/fontawesome/js/all.js"></script>
  <script type="text/javascript" src="../../assets/js/jquery.min.js"></script>
  <script type="text/javascript" src="../../assets/js/main.js"></script>
  <script>
  function assignRoleToEmp(){
    var modal = document.getElementById('viewDetails');
    modal.style.display = "block";
    var inner='',i;
    inner+='<div class="modal-content"><div id="close" style="float:right;font-size:24px;padding:5px 10px;border-radius:2px;border:1px solid gray"> <span class="fa fa-times"></span> </div><div class="clear"></div><h3><center> Employee Designation Assignment  </center></h3><br>';
    inner+=''
    var values   = ['showUserDesignation','1171803'];
    var msg = SendToPhp(values,"../../php/controllers/employee.php");
    var obj = JSON.parse(msg);
    var oldData='';
    oldData+='<fieldset></fieldset><fieldset>';
    for(i in obj.Message){
      var ashwini=Number(i)+1;
      oldData+=ashwini +'</br>';
      oldData+=obj.Message[i].designation+'</br>';
      oldData+=obj.Message[i].office+'</br>';
      oldData+=obj.Message[i].department+'</br>';
      oldData+=obj.Message[i].status+'</br>';
    }
    inner+=oldData+'</fieldset></div>';
    modal.innerHTML=inner;
    var span = document.getElementById("close");
    span.onclick = function() {modal.style.display = "none";}
    window.onclick = function(event) {
      if (event.target == modal) {
        modal.style.display = "none";
      }
    }
  }
  function createNewRole(){
    var modal = document.getElementById('viewDetails');
    modal.style.display = "block";
    var inner='',i;
    var values   = ['showDepartments'];
    var msg = SendToPhp(values,"../../php/controllers/employee.php");
    var obj = JSON.parse(msg);
    var values1   = ['showOffice'];
    var msg1 = SendToPhp(values1,"../../php/controllers/employee.php");
    var obj1 = JSON.parse(msg1);
    var values2   = ['showDesignations'];
    var msg2 = SendToPhp(values2,"../../php/controllers/employee.php");
    var obj2 = JSON.parse(msg2);
    inner+='<div class="modal-content"><div id="close" style="float:right;font-size:24px;padding:5px 10px;border-radius:2px;border:1px solid gray"> <span class="fa fa-times"></span> </div><div class="clear"></div><h2><center>Designation registration</center> </h2><hr><br>';
    inner+=' <div class="inp">';
    inner+='   <div class="inp_name">Designation</div>';
    inner+='   <div class="inp_value"><input type="text" id="userDesignation" placeholder="Designation" list="designations" required="required" />	<datalist id="designations">	';
      for(i in obj2.Message){
        inner +='<option value="'+obj2.Message[i].designation+'">'+obj2.Message[i].designation+'</option>';
      }
    inner+='	</datalist></div>';
    inner+=' </div>';	
    inner+=' <div class="inp">';
    inner+='   <div class="inp_name">Office</div>';
    inner+='   <div class="inp_value"><input type="text" id="userOffice" placeholder="Office Name" list="offices" required="required" />	<datalist id="offices">	';
      for(i in obj1.Message){
        inner +='<option value="'+obj1.Message[i].office+'">'+obj1.Message[i].office+'</option>';
      }
    inner+='	</datalist></div>'; 
    inner+=' </div>';	
    inner+=' <div class="inp">';
    inner+='   <div class="inp_name">Department</div>';
    inner+='   <div class="inp_value"><input type="text" id="userDepartment" placeholder="Department" list="Departments" required="required" />	<datalist id="Departments">	';
      for(i in obj.Message){
        inner +='<option value="'+obj.Message[i].department+'">'+obj.Message[i].department+'</option>';
      }
    inner+='	</datalist></div>';
    inner+=' </div>';	
    inner+=' <div class="inp">';
    inner+='   <div class="inp_name">Designation Status</div>';
    inner+='   <div class="inp_value"><select id="userStatus"><option value="Active"> Active </option> <option value="In-Active"> In-Active</option></select></div>';
    inner+=' </div>';	
    inner+='<center><button onclick="addDesignation()" class="btn btn-success" ><span class="fa fa-check"></span> Add Designation </button></center>';
    inner+='</div>';
    modal.innerHTML=inner;
    var span = document.getElementById("close");
    span.onclick = function() {modal.style.display = "none";}
    window.onclick = function(event) {
      if (event.target == modal) {
          modal.style.display = "none";
      }
    }
  }
  function addDesignation(){
    var designation=document.getElementById("userDesignation").value;
    var department=document.getElementById("userDepartment").value;
    var office=document.getElementById("userOffice").value;
    var status=document.getElementById("userStatus").value;
    var values   = ['addDesignations',designation,department,office,status];
    var msg = SendToPhp(values,"../../php/controllers/employee.php");
    var obj = JSON.parse(msg);
    alert(msg);
    if(obj.message=="success"){
      snackbar("Designation Created Succesfully.");
      document.getElementById('viewDetails').style.display = "none";
      showuserDetails();
    }
    else{
      snackbar("Designation Creation Failed.");
      document.getElementById('viewDetails').style.display = "none";
      showuserDetails();
    }
  }

  showuserDetails();
  function showuserDetails()
  {
    var values   = ['showAllDesignations'];
    var msg = SendToPhp(values,"../../php/controllers/employee.php");
    var obj = JSON.parse(msg);
    var oldData='';
    if((obj.Message).length==0){
      oldData+='<table id="addressbooktable" class="table table-responsive table-bordered table-active table-hover" style="width:100%;"><thaed><tr><th>Sno</th><th>Photo</th> <th>ID Number</th><th>Name</th><th>Status</th><th>Actions</th></tr></thaed><tbody><tr> <td colspan="5">No records found.Please add User<!--<button class="btn btn-md btn-warning" onclick="addUser()"> Add New Designation </button>--></td></tr></tbody></table>';
      snackbar("No Designations Found. ");
    }
    if((obj.Message).length>0){
      oldData+='<table id="addressbooktable" class="table table-responsive table-bordered table-active table-hover" style="width:100%;"><thaed>';
      oldData+='<tr>';
      oldData+='<th>Sno</th>';
      oldData+=' <th onclick="sortTable(1,\'addressbooktable\')"> Designation </th>';
      oldData+='<th onclick="sortTable(2,\'addressbooktable\')">Office</th>';
      oldData+=' <th onclick="sortTable(3,\'addressbooktable\')"> Department </th>';
      oldData+='<th onclick="sortTable(4,\'addressbooktable\')"> Status </th> ';
      oldData+='<th> Actions </th> ';
      oldData+='</tr>';
      oldData+='</thaed><tbody>';
      for(i in obj.Message){
        var ashwini=Number(i)+1;
        oldData+='<tr><td>'+ashwini +'</td>';
        oldData+='<td> '+obj.Message[i].designation+'</td>';
        oldData+='<td> '+obj.Message[i].office+'</td>';
        oldData+='<td> '+obj.Message[i].department+'</td>';
        oldData+='<td> <span class="text-info">'+obj.Message[i].status+'</span></td>';
        oldData+='<td>';
        if(obj.Message[i].status=="Active")
        {oldData+='<button onclick="change_status(\''+obj.Message[i].sno+'\',\'In-Active\')" class="btn btn-xs btn-warning">Make Inactive</button> ';}
        else
        {oldData+='<button onclick="change_status(\''+obj.Message[i].sno+'\',\'Active\')" class="btn btn-xs btn-success">Make Active</button> ';}
        oldData+=' <button onclick="change_status(\''+obj.Message[i].sno+'\',\'Delete\')" class="btn btn-xs btn-danger"> Delete Designation </button>';
        oldData+='</td>';
        oldData+='</tr>';
      }
      oldData+='</tbody></table>';
    }
    selectionListDisplay("details",oldData);
  }
  function change_status(sno,state){
    values=['change_designation_status',sno,state];
    var msg = SendToPhp(values,"../../php/controllers/employee.php");
    var obj = JSON.parse(msg);
    if(obj.Message=="success")
    {
      snackbar("Designation "+state+" successfull");
      showuserDetails();
    }
  }
  </script>
</body>
</html>
