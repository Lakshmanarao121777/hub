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
.modal-content {background-color:#fefefe;margin:3% auto;padding:20px;border:1px solid #888;width:90%;height:85%;overflow-y:scroll;}
.close {color: #aaa; float: right;font-size: 28px;font-weight: bold;}

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
	.inp{min-height:100%;width:95%}
	.inp_value input[type="text"]{max-width:90%;}
	.inp_value input[type="date"]{max-width:90%;}
	.inp_value textarea,.inp_value select{width:90%;height:100%;padding:3px 5px;}
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
	@media only screen and (max-width: 768px) { 
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
        <li><a href="activity_employee" title=""><em><span class="fa fa-user-tie"></span> Employee Activity</em></a></li>
        <li class="breadcurrent"><a href="" title=""><em><span class="fa fa-search"></span> Employee Search</em></a></li>
      </ul>
    <br>
    <fieldset style="width:100%;">
      <div class="inp">
        <div class="inp">
          <div class="inp_name"> Employee ID Number : </div>
          <div class="inp_value"><input type="text" id="userId" placeholder="Enter Employee ID Number" autofocus></div>
        </div>
        <div class="inp">
          <div class="inp_name"> Employee Name : </div>
          <div class="inp_value"> <input type="text" id="userName" placeholder="Enter Employee Name"></div>
        </div>
      </div>
      <div class="clear"></div>
      <br>
      <center><button class="btn btn-primary" onclick="showuserDetails()"><span class="fa fa-search"></span> Search</button></center>
    </fieldset>
    <div id="details"></div>
    <div id="viewDetails" class="modal" style="display:none;"></div>
    <div id="editDetails" class="modal" style="display:none;"></div>
  </div>
  <?php include_once "../../php/includes/footer.php";?>
  <script type="text/javascript" src="../../assets/js/jquery-1.9.1.min.js"></script>
  <script type="text/javascript" src="../../assets/fontawesome/js/all.js"></script>
  <script type="text/javascript" src="../../assets/js/jquery.min.js"></script>
  <script type="text/javascript" src="../../assets/js/main.js"></script>
  <script>
  function openprofile(evt,cityName) {
		    var i, tabcontent, tablinks;
		    tabcontent = document.getElementsByClassName("tabcontents");
		    for (i = 0; i < tabcontent.length; i++) {
		        tabcontent[i].style.display = "none";
		    }
		    tablinks = document.getElementsByClassName("tablinks");
		    for (i = 0; i < tablinks.length; i++) {
		        tablinks[i].className = tablinks[i].className.replace(" active_tab_top", "");
		    }
		    document.getElementById(cityName).style.display = "block";
		    evt.currentTarget.className += " active_tab_top";
		} 
		document.getElementById("defaultOpen").click();
    function hasAccess(viewId){
      var userOfc= "<?php echo $user_ofc; ?>";
      var userDesignation= "<?php echo $user_ofc; ?>";
      var  actions = "";
      if(userOfc == "admin" || userOfc == "DA" || userOfc == "Director" || userOfc == "FO" || userOfc == "AO"){
      actions +='<button class="btn btn-sm btn-primary" onclick="openDetails(\''+viewId+'\')"><span class="fa fa-eye"></span> View </button> ';}
      if(userOfc == "admin"){
        actions +=' <button class="btn btn-sm btn-warning" onclick="editDetails(\''+viewId+'\')"><span class="fa fa-pencil-alt"></span> Edit </button>';
      }
      return actions;
    }
    function editDetails(viewId){
      var modal = document.getElementById('editDetails');
      modal.style.display = "block";
      var values=['getFullInfoEmployee',viewId];
      var msg = SendToPhp(values,"../../php/controllers/employee.php");
      var obj = JSON.parse(msg);
      var values1=['getFullInfoEmployeeAchivment',viewId];
      var msg1 = SendToPhp(values1,"../../php/controllers/employee.php");
      var obj1 = JSON.parse(msg1);
      var i,inner='';
      inner+='<div class="modal-content">';
      inner+='<ul class="tab"><li title="Personal"><a href="#Personaledit" class="tablinks" onclick="openprofile(event,\'Personaledit\');return false;"><span class="hide-md fa fa-user-alt"> </span> <span class="hide-sm"> Personal </span></a></li><li title="Acadamic"><a href="#Acadamicedit" class="tablinks" onclick= "openprofile(event,\'Acadamicedit\');return false;" ><span class="hide-md fa fa-user-graduate"> </span> <span class="hide-sm"> Acadamics </span></a></li><li title="Achivements"><a href="#Miscedit" class="tablinks" onclick="openprofile(event,\'Miscedit\');return false;"><span class="hide-md fa fa-award"> </span> <span class="hide-sm">  Achivements </span></a></li><li title="Past Expeiences"><a href="#experienceedit" class="tablinks" onclick="openprofile(event,\'experienceedit\');return false;"><span class="hide-md fa fa-briefcase"> </span> <span class="hide-sm"> Experience </span></a></li>';
      var oldDate1='',i;
			var values1 = ['showpersonal',viewId];
			msg1= SendToPhp(values1,"../../php/controllers/employee.php");
			var obj1 = JSON.parse(msg1);
			for(i in obj1.Message){
				oldDate1+='<fieldset class="br"><legend>Personal Details </legend><div class="inp"><div class="inp_name">Employee Id</div><div class="inp_value">'+obj1.Message[i].userId+'</div></div><div class="inp"><div class="inp_name">Employee Name</div><div class="inp_value">'+obj1.Message[i].userName+'</div></div><div class="inp"><div class="inp_name">Mobile -1</div><div class="inp_value">'+obj1.Message[i].mobile+'</div></div><div class="inp"><div class="inp_name">Email (Primary)</div><div class="inp_value">'+obj1.Message[i].email_1+'</div></div><div class="inp"><div class="inp_name">Email(Secondary)</div><div class="inp_value">'+obj1.Message[i].email_2+'</div></div><div class="inp"><div class="inp_name">Aadhar</div><div class="inp_value">'+obj1.Message[i].aadhar+'</div></div><div class="inp"><div class="inp_name">Passport</div><div class="inp_value">'+obj1.Message[i].passport+'</div></div><div class="inp"><div class="inp_name">Date of Joining</div><div class="inp_value">'+obj1.Message[i].working_from+'</div></div><div class="inp"><div class="inp_name">Status</div><div class="inp_value">'+obj1.Message[i].status+'</div></div></fieldset>';
			}
      inner+='<div id="Personaledit" class="tabcontents" style="display:block;">'+oldDate1+'</div>';
      inner+='<div id="Miscedit" class="tabcontents" style="display:none;">update soon</div>';
      
			var oldDate6='',i;
			var values = ['showexperience',viewId];
			msg6= SendToPhp(values,"../../php/controllers/employee.php");
			var obj6 = JSON.parse(msg6);
			if((obj6.Message).length==0){
				oldDate6+="No Past Experience Records Found.";
			}
      else{
        for(i in obj6.Message){
          oldDate6+='<fieldset class="br"><legend>Job Experience </legend><div class="inp"><div class="inp_name">Employee Id</div><div class="inp_value">'+obj6.Message[i].userId+'</div></div><div class="inp"><div class="inp_name">Job Title</div><div class="inp_value">'+obj6.Message[i].jobTitle+'</div></div><div class="inp"><div class="inp_name">Designation</div><div class="inp_value">'+obj6.Message[i].designation+'</div></div><div class="inp"><div class="inp_name">Worked From</div><div class="inp_value">'+obj6.Message[i].workedFrom+'</div></div><div class="inp"><div class="inp_name">Worked To</div><div class="inp_value">'+obj6.Message[i].workedTo+'</div></div><div class="inp"><div class="inp_name">Job Discription</div><div class="inp_value">'+obj6.Message[i].discription+'</div></div><div class="inp"><div class="inp_name">Organization/Company Name</div><div class="inp_value">'+obj6.Message[i].organizationName+'</div></div><div class="inp"><div class="inp_name">Organization/Company website</div><div class="inp_value">'+obj6.Message[i].organizationAddress+'</div></div><div class="inp"><div class="inp_name">Organization/Company Address</div><div class="inp_value">'+obj6.Message[i].organizationwebsite+'</div></div></fieldset>';
        }
      }
			inner+='<div id="experienceedit" class="tabcontents" style="display:none;">'+oldDate6+'</div>';
      inner+='<div id="Acadamicedit" class="tabcontents" style="display:none;">updatesoon</div>';
      inner+='</div>';
      inner+='<span id="close" ></span></div>';
      modal.innerHTML=inner;
      var span = document.getElementById("close");
      span.onclick = function() {modal.style.display = "none";}
      window.onclick = function(event) {
          if (event.target == modal) {
              modal.style.display = "none";
          }
      }
    }
    function openDetails(viewId){
      var modal = document.getElementById('viewDetails');
      modal.style.display = "block";
      var values=['getFullInfoEmployee',viewId];
      var msg = SendToPhp(values,"../../php/controllers/employee.php");
      var obj = JSON.parse(msg);
      var values1=['getFullInfoEmployeeAchivment',viewId];
      var msg1 = SendToPhp(values1,"../../php/controllers/employee.php");
      var obj1 = JSON.parse(msg1);
      var i,inner='';
      inner+='<div class="modal-content">';
      inner+='<ul class="tab"><li title="Personal"><a href="#Personal" class="tablinks" onclick="openprofile(event,\'Personal\');return false;"><span class="hide-md fa fa-user-alt"> </span> <span class="hide-sm"> Personal </span></a></li><li title="Acadamic"><a href="#Acadamic" class="tablinks" onclick= "openprofile(event,\'Acadamic\');return false;" ><span class="hide-md fa fa-user-graduate"> </span> <span class="hide-sm"> Acadamics </span></a></li><li title="Achivements"><a href="#Misc" class="tablinks" onclick="openprofile(event,\'Misc\');return false;"><span class="hide-md fa fa-award"> </span> <span class="hide-sm">  Achivements </span></a></li><li title="Past Expeiences"><a href="#experience" class="tablinks" onclick="openprofile(event,\'experience\');return false;"><span class="hide-md fa fa-briefcase"> </span> <span class="hide-sm"> Experience </span></a></li>';
      var oldDate1='',i;
			var values1 = ['showpersonal',viewId];
			msg1= SendToPhp(values1,"../../php/controllers/employee.php");
			var obj1 = JSON.parse(msg1);
			for(i in obj1.Message){
				oldDate1+='<fieldset class="br"><legend>Personal Details </legend><div class="inp"><div class="inp_name">Employee Id</div><div class="inp_value">'+obj1.Message[i].userId+'</div></div><div class="inp"><div class="inp_name">Employee Name</div><div class="inp_value">'+obj1.Message[i].userName+'</div></div><div class="inp"><div class="inp_name">Mobile -1</div><div class="inp_value">'+obj1.Message[i].mobile+'</div></div><div class="inp"><div class="inp_name">Email (Primary)</div><div class="inp_value">'+obj1.Message[i].email_1+'</div></div><div class="inp"><div class="inp_name">Email(Secondary)</div><div class="inp_value">'+obj1.Message[i].email_2+'</div></div><div class="inp"><div class="inp_name">Aadhar</div><div class="inp_value">'+obj1.Message[i].aadhar+'</div></div><div class="inp"><div class="inp_name">Passport</div><div class="inp_value">'+obj1.Message[i].passport+'</div></div><div class="inp"><div class="inp_name">Date of Joining</div><div class="inp_value">'+obj1.Message[i].working_from+'</div></div><div class="inp"><div class="inp_name">Status</div><div class="inp_value">'+obj1.Message[i].status+'</div></div></fieldset>';
			}
      inner+='<div id="Personal" class="tabcontents" style="display:block;">'+oldDate1+'</div>';
      inner+='<div id="Misc" class="tabcontents" style="display:none;">update soon</div>';
      
			var oldDate6='',i;
			var values = ['showexperience',viewId];
			msg6= SendToPhp(values,"../../php/controllers/employee.php");
			var obj6 = JSON.parse(msg6);
			if((obj6.Message).length==0){
				oldDate6+="No Past Experience Records Found.";
			}
      else{
        for(i in obj6.Message){
          oldDate6+='<fieldset class="br"><legend>Job Experience </legend><div class="inp"><div class="inp_name">Employee Id</div><div class="inp_value">'+obj6.Message[i].userId+'</div></div><div class="inp"><div class="inp_name">Job Title</div><div class="inp_value">'+obj6.Message[i].jobTitle+'</div></div><div class="inp"><div class="inp_name">Designation</div><div class="inp_value">'+obj6.Message[i].designation+'</div></div><div class="inp"><div class="inp_name">Worked From</div><div class="inp_value">'+obj6.Message[i].workedFrom+'</div></div><div class="inp"><div class="inp_name">Worked To</div><div class="inp_value">'+obj6.Message[i].workedTo+'</div></div><div class="inp"><div class="inp_name">Job Discription</div><div class="inp_value">'+obj6.Message[i].discription+'</div></div><div class="inp"><div class="inp_name">Organization/Company Name</div><div class="inp_value">'+obj6.Message[i].organizationName+'</div></div><div class="inp"><div class="inp_name">Organization/Company website</div><div class="inp_value">'+obj6.Message[i].organizationAddress+'</div></div><div class="inp"><div class="inp_name">Organization/Company Address</div><div class="inp_value">'+obj6.Message[i].organizationwebsite+'</div></div></fieldset>';
        }
      }
			inner+='<div id="experience" class="tabcontents" style="display:none;">'+oldDate6+'</div>';
      inner+='<div id="Acadamic" class="tabcontents" style="display:none;">updatesoon</div>';
      inner+='</div>';
      inner+='<span id="close" ></span></div>';
      modal.innerHTML=inner;
      var span = document.getElementById("close");
      span.onclick = function() {modal.style.display = "none";}
      window.onclick = function(event) {
          if (event.target == modal) {
              modal.style.display = "none";
          }
      }
    }
    function showuserDetails()
    {
      var userId   = document.getElementById('userId').value;
      var userName = document.getElementById('userName').value;
      var values   = ['getBasicInfoEmployee',userId,userName];
      if(userId !="" || userName !=""){
        var msg = SendToPhp(values,"../../php/controllers/employee.php");
        var obj = JSON.parse(msg);
        var oldDate='';
        if((obj.Message).length==0){
          oldDate+='<table id="addressbooktable" class="table table-responsive table-bordered table-active table-hover" style="width:100%;"><thaed><tr><th>Sno</th><th>Photo</th> <th>ID Number</th><th>Name</th><th>Status</th><th>Actions</th></tr></thaed><tbody><tr> <td colspan="5">No records found.Please add User <a href="activity_student_add"><button class="btn btn-md btn-warning"> Add New User </button></a></td></tr></tbody></table>';
          snackbar("No Employee Found. ");
        }
        if((obj.Message).length>0){
          oldDate+='<table id="addressbooktable" class="table table-responsive table-bordered table-active table-hover" style="width:100%;"><thaed><tr><th>Sno</th><th style="width:80px;"> </th> <th onclick="sortTable(2,\'addressbooktable\')"> ID Number </th><th onclick="sortTable(3,\'addressbooktable\')">Name</th><th onclick="sortTable(4,\'addressbooktable\')"> Status </th> <th> Actions </th> </tr></thaed><tbody>';
          for(i in obj.Message){
            var ashwini=Number(i)+1;
            var actions =hasAccess(obj.Message[i].userId);
            oldDate+='<tr><td>'+ashwini +'</td><td><img src="../../users/'+obj.Message[i].userId+'/'+obj.Message[i].userId+'_icon.png" alt="'+obj.Message[i].userId+', '+obj.Message[i].userName+'" style="width:50px;height:50px;" /></td><td>'+obj.Message[i].userId+'</td><td> '+obj.Message[i].userName+'</td><td>'+obj.Message[i].status+'</td>';
            oldDate+='<td>'+actions+'</td>';
            oldDate+='</tr>';
          }
          oldDate+='</tbody></table>';
        }
      selectionListDisplay("details",oldDate);
      }
    }
  </script>
</body>
</html>
