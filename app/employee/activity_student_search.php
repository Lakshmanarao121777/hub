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
        <li><a href="activity_student" title=""><em><span class="fa fa-user"></span> Sutdent Activity</em></a></li>
        <li class="breadcurrent"><a href="" title=""><em><span class="fa fa-search"></span> Sutdent Search</em></a></li>
      </ul>
    <br>
    <fieldset>
      <div class="inp">
        <div class="inp">
          <div class="inp_name"> Student ID Number : </div>
          <div class="inp_value"><input type="text" id="userId" placeholder="Enter Student ID Number" autofocus></div>
        </div>
        <div class="inp">
          <div class="inp_name"> Student Name : </div>
          <div class="inp_value"> <input type="text" id="userName" placeholder="Enter Student Name"></div>
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
      actions +='<button class="btn btn-sm btn-primary" onclick="openDetails(\''+viewId+'\')"><span class="fa fa-eye"></span> View </button> ';
      if(userOfc == "admin"){
        actions +=' <button class="btn btn-sm btn-warning" onclick="editDetails(\''+viewId+'\')"><span class="fa fa-pencil-alt"></span> Edit </button>';
      }
      return actions;
    }
    function openDetails(viewId){
      var modal = document.getElementById('viewDetails');
      modal.style.display = "block";
      var values=['getFullInfoStu',viewId];
      var msg = SendToPhp(values,"../../php/controllers/employee.php");
      var obj = JSON.parse(msg);
      var values1=['getFullInfoStuAchivment',viewId];
      var msg1 = SendToPhp(values1,"../../php/controllers/employee.php");
      var obj1 = JSON.parse(msg1);
      var i,inner='';
      inner+='<div class="modal-content">';
      inner+='<ul class="tab"><li><a href="#Personal" class="tablinks" onclick="openprofile(event,\'Personal\');return false;" id="defaultOpen"> Personal </a></li><li><a href="#Acadamic" class="tablinks" onclick="openprofile(event,\'Acadamic\'); return false;">Acadamic </a></li><li><a href="#Misc" class="tablinks" onclick=" openprofile(event,\'Misc\');return false;">Misc/Achivements </a></li></ul>';
      inner+='<div id="Personal" class="tabcontents" style="display:block;">';
      if((obj.Message).length==0){
        inner+="No data found.";
      }
      else{
        for(i in obj.Message){
          inner+='<fieldset class="br"><legend>Student Details</legend>';
          inner+='<div class="inp">';
          inner+='  <div class="inp_name">ID Number : </div>';
          inner+='  <div class="inp_value"> '+obj.Message[i].userId+'</div>';
          inner+='</div>';
          inner+='<div class="inp"><div class="inp_name">Name : </div>';
          inner+='  <div class="inp_value"> '+obj.Message[i].userName+'</div>';
          inner+='</div>';
          inner+='<div class="inp">';
          inner+='  <div class="inp_name">Gender : </div>';
          inner+='  <div class="inp_value"> '+obj.Message[i].gender+'</div>';
          inner+='</div>';
          inner+='<div class="inp">';
          inner+='  <div class="inp_name">Primary Mobile : </div>';
          inner+='  <div class="inp_value"> +91 '+obj.Message[i].m1+'</div>';
          inner+='</div>';
          inner+='<div class="inp">';
          inner+='  <div class="inp_name">Secondary Mobile : </div>';
          inner+='  <div class="inp_value"> +91 '+obj.Message[i].m2+'</div> ';
          inner+='</div>';
          inner+='<div class="inp"> ';
          inner+='  <div class="inp_name">Date of Birth : </div>';
          inner+='  <div class="inp_value"> '+obj.Message[i].dob+'</div>';
          inner+='</div>';
          inner+='<div class="inp">';
          inner+='  <div class="inp_name">Primary Email : </div>';
          inner+='  <div class="inp_value"> '+obj.Message[i].userId +'@rguktrkv.ac.in</div>';
          inner+='</div>';
          inner+='<div class="inp">';
          inner+='  <div class="inp_name">Seconadary Email : </div> ';
          inner+='  <div class="inp_value"> '+obj.Message[i].email+'</div>';
          inner+='</div>';
          inner+='<div class="inp">';
          inner+='  <div class="inp_name">Cast/Community : </div>';
          inner+='  <div class="inp_value"> '+obj.Message[i].cast+'</div> ';
          inner+='</div>';
          inner+='<div class="inp">  ';
          inner+='  <div class="inp_name">Community pplication ID : </div> ';
          inner+='  <div class="inp_value"> '+obj.Message[i].castId+'</div>';
          inner+='</div>'
          inner+='</fieldset>';
          inner+='<fieldset><legend>Identity Details</legend>';
          inner+='<div class="inp">';
          inner+='  <div class="inp_name">Aadharcard Number : </div>';
          inner+='  <div class="inp_value"> '+obj.Message[i].aadhar+'</div>';
          inner+='</div>';
          inner+='<div class="inp"> ';
          inner+='  <div class="inp_name">PAN Card Number : </div> ';
          inner+='  <div class="inp_value"> '+obj.Message[i].pan+'</div>';
          inner+='</div>';
          inner+='<div class="inp">';
          inner+='  <div class="inp_name">Passport Number : </div>';
          inner+='  <div class="inp_value"> '+obj.Message[i].passport+'</div>';
          inner+='</div>';
          inner+='<div class="inp">';
          inner+='  <div class="inp_name">Rationcard Number : </div> ';
          inner+='  <div class="inp_value"> '+obj.Message[i].rationcard+'</div>';
          inner+='</div> ';
          inner+='<div class="inp">';
          inner+='  <div class="inp_name">Blood Group : </div> ';
          inner+='  <div class="inp_value"> '+obj.Message[i].blood+'</div>';
          inner+='</div>';
          inner+='</fieldset>';
          inner+='<fieldset><legend>Profile Picture Details</legend>';
          inner+='<img src="http://<?php echo$link; ?>/registrations/upload/'+obj.Message[i].userId+'/'+obj.Message[i].userId+'.jpg" style="width:100px;height:100px;"/>';
          inner+='</fieldset> ';
          inner+='<fieldset><legend>Parent(s)/Guardian Details</legend>';
          inner+='<div class="inp">';
          inner+='  <div class="inp_name">Father Name : </div>';
          inner+='  <div class="inp_value"> '+obj.Message[i].pname1+'</div>';
          inner+='</div>';
          inner+='<div class="inp">';
          inner+='  <div class="inp_name">Primary Mobile : </div>';
          inner+='  <div class="inp_value"> +91 '+obj.Message[i].pm1+'</div> ';
          inner+='</div> ';
          inner+='<div class="inp">';
          inner+='  <div class="inp_name">Mother Name : </div>';
          inner+='  <div class="inp_value">'+obj.Message[i].pname2+'</div> ';
          inner+='</div>';
          inner+='<div class="inp">';
          inner+='  <div class="inp_name">Primary Mobile : </div> ';
          inner+='  <div class="inp_value"> +91 '+obj.Message[i].pm2+'</div>';
          inner+='</div> ';
          inner+='<div class="inp">';
          inner+='  <div class="inp_name">Guardian Name : </div> ';
          inner+='  <div class="inp_value">'+obj.Message[i].pname3+'</div>';
          inner+='</div>';
          inner+='<div class="inp">';
          inner+='  <div class="inp_name">Primary Mobile : </div>';
          inner+='  <div class="inp_value"> +91 '+obj.Message[i].pm3+'</div>';
          inner+='</div></fieldset> ';
          inner+='<fieldset><legend>Address Details</legend>  ';
          inner+='<div class="inp">';
          inner+='  <div class="inp_name">Current Address : </div>';
          inner+='  <div class="inp_value" style="height:75px;"> '+obj.Message[i].caddress+'</div>';
          inner+='</div>';
          inner+='<div class="inp">';
          inner+='  <div class="inp_name">Perminent Address : </div> ';
          inner+='  <div class="inp_value" style="height:75px;"> '+obj.Message[i].paddress+'</div>';
          inner+='</div></fieldset>';
          inner+='<fieldset><legend>Income Details</legend>';
          inner+='<div class="inp">';
          inner+='  <div class="inp_name">Family Annual Income : </div>';
          inner+='  <div class="inp_value"> '+obj.Message[i].income+'</div>';
          inner+='</div>';
          inner+='<div class="inp">';
          inner+='  <div class="inp_name">Source of Income : </div>';
          inner+='  <div class="inp_value"> '+obj.Message[i].incomesource+'</div>';
          inner+=' </div></fieldset>';
        }
      }
      inner+='</div> ';
      inner+='<div id="Acadamic" class="tabcontents">erterterter</div>';
      inner+='<div id="Misc" class="tabcontents">';
      if((obj1.Message).length==0){
        inner+="No data found.";
      }
      else{
        for(i in obj1.Message){
          inner+='<fieldset class="br" >';
          inner+='  <legend style="min-width:90%;">'+obj1.Message[i].achivementTitle+'</legend>';
          inner+='  <div class="inp">';
          inner+='    <div class="inp_name">achivementType : </div>';
          inner+='      <div class="inp_value"> '+obj1.Message[i].achivementType+'</div>';
          inner+='    </div>';
          inner+='    <div class="inp">';
          inner+='      <div class="inp_name">Achivement Title : </div>';
          inner+='      <div class="inp_value">'+obj1.Message[i].achivementTitle+'</div>';
          inner+='    </div>';
          inner+='    <div class="inp">';
          inner+='      <div class="inp_name">achivementArea : </div>';
          inner+='      <div class="inp_value">'+obj1.Message[i].achivementArea+'</div>';
          inner+='    </div>';
          inner+='   <div class="inp" style="height:100px;">';
          inner+='      <div class="inp_name">achivementDis : </div>';
          inner+='      <div class="inp_value"> '+obj1.Message[i].achivementDis+'</div>';
          inner+='    </div>';
          inner+='    <div class="inp">';
          inner+='      <div class="inp_name">achivementYear : </div>';
          inner+='      <div class="inp_value"> '+obj1.Message[i].achivementYear+'</div>';
          inner+='    </div>';
          inner+='    <div class="inp" style="height:82px;">';
          inner+='      <div class="inp_name">achivementreference : </div>';
          inner+='      <div class="inp_value"> '+obj1.Message[i].achivementreference+'</div>';
          inner+='    </div>';
          inner+='</fieldset>';
        }
      }
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
    function editDetails(viewId){
      var modal = document.getElementById('editDetails');
      modal.style.display = "block";
      var values=['getFullInfoStu',viewId];
      var msg = SendToPhp(values,"../../php/controllers/employee.php");
      var obj = JSON.parse(msg);
      var values1=['getFullInfoStuAchivment',viewId];
      var msg1 = SendToPhp(values1,"../../php/controllers/employee.php");
      var obj1 = JSON.parse(msg1);
      var i,inner='';
      inner+='<div class="modal-content">';
      inner+='<ul class="tab"><li><a href="#Personaledit" class="tablinks" onclick="openprofile(event,\'Personaledit\');return false;" id="defaultOpen"> Personal </a></li><li><a href="#Acadamicedit" class="tablinks" onclick="openprofile(event,\'Acadamicedit\'); return false;">Acadamic </a></li><li><a href="#Miscedit" class="tablinks" onclick=" openprofile(event,\'Miscedit\');return false;">Misc/Achivements </a></li></ul>';
      inner+='<div id="Personaledit" class="tabcontents" style="display:block;">';
      if((obj.Message).length==0){
        inner+="No data found.";
      }
      else{
        for(i in obj.Message){
          inner+='<fieldset class="br"><legend>Student Details</legend>';
          inner+='<div class="inp">';
          inner+='  <div class="inp_name">ID Number : </div>';
          inner+='  <div class="inp_value" id="idnumber"> '+obj.Message[i].userId+'</div>';
          inner+='</div>';
          inner+='<div class="inp"><div class="inp_name">Name : </div>';
          inner+='  <div class="inp_value"> '+obj.Message[i].userName+'</div>';
          inner+='</div>';
          inner+='<div class="inp">';
          inner+='  <div class="inp_name">Gender : </div>';
          inner+='  <div class="inp_value" id="gender"> '+obj.Message[i].gender+'</div>';
          inner+='</div>';
          inner+='<div class="inp">';
          inner+='  <div class="inp_name">Primary Mobile : </div>';
          inner+='  <div class="inp_value" id="m1"> +91 '+obj.Message[i].m1+'</div>';
          inner+='</div>';
          inner+='<div class="inp">';
          inner+='  <div class="inp_name">Secondary Mobile : </div>';
          inner+='  <div class="inp_value" id="m2"> +91 '+obj.Message[i].m2+'</div> ';
          inner+='</div>';
          inner+='<div class="inp"> ';
          inner+='  <div class="inp_name">Date of Birth : </div>';
          inner+='  <div class="inp_value" id="dob"> '+obj.Message[i].dob+'</div>';
          inner+='</div>';
          inner+='<div class="inp">';
          inner+='  <div class="inp_name">Primary Email : </div>';
          inner+='  <div class="inp_value"> '+obj.Message[i].userId +'@rguktrkv.ac.in</div>';
          inner+='</div>';
          inner+='<div class="inp">';
          inner+='  <div class="inp_name">Seconadary Email : </div> ';
          inner+='  <div class="inp_value" id="email"> '+obj.Message[i].email+'</div>';
          inner+='</div>';
          inner+='<div class="inp">';
          inner+='  <div class="inp_name">Cast/Community : </div>';
          inner+='  <div class="inp_value" id="cast"> '+obj.Message[i].cast+'</div> ';
          inner+='</div>';
          inner+='<div class="inp">  ';
          inner+='  <div class="inp_name">Community pplication ID : </div> ';
          inner+='  <div class="inp_value" id="castId"> '+obj.Message[i].castId+'</div>';
          inner+='</div>'
          inner+='</fieldset>';
          inner+='<fieldset><legend>Identity Details</legend>';
          inner+='<div class="inp">';
          inner+='  <div class="inp_name">Aadharcard Number : </div>';
          inner+='  <div class="inp_value" id="aadhar"> '+obj.Message[i].aadhar+'</div>';
          inner+='</div>';
          inner+='<div class="inp"> ';
          inner+='  <div class="inp_name">PAN Card Number : </div> ';
          inner+='  <div class="inp_value" id="pan"> '+obj.Message[i].pan+'</div>';
          inner+='</div>';
          inner+='<div class="inp">';
          inner+='  <div class="inp_name">Passport Number : </div>';
          inner+='  <div class="inp_value" id="passport"> '+obj.Message[i].passport+'</div>';
          inner+='</div>';
          inner+='<div class="inp">';
          inner+='  <div class="inp_name">Rationcard Number : </div> ';
          inner+='  <div class="inp_value" id="rationcard"> '+obj.Message[i].rationcard+'</div>';
          inner+='</div> ';
          inner+='<div class="inp">';
          inner+='  <div class="inp_name">Blood Group : </div> ';
          inner+='  <div class="inp_value" id="blood"> '+obj.Message[i].blood+'</div>';
          inner+='</div>';
          inner+='</fieldset>';
          inner+='<fieldset><legend>Profile Picture Details</legend>';
          inner+='<img src="http://<?php echo$link; ?>/registrations/upload/'+obj.Message[i].userId+'/'+obj.Message[i].userId+'.jpg" style="width:100px;height:100px;"/>';
          inner+='</fieldset> ';
          inner+='<fieldset><legend>Parent(s)/Guardian Details</legend>';
          inner+='<div class="inp">';
          inner+='  <div class="inp_name">Father Name : </div>';
          inner+='  <div class="inp_value" id="pname1"> '+obj.Message[i].pname1+'</div>';
          inner+='</div>';
          inner+='<div class="inp">';
          inner+='  <div class="inp_name">Primary Mobile : </div>';
          inner+='  <div class="inp_value" id="pm1"> +91 '+obj.Message[i].pm1+'</div> ';
          inner+='</div> ';
          inner+='<div class="inp">';
          inner+='  <div class="inp_name">Mother Name : </div>';
          inner+='  <div class="inp_value" id="pname2">'+obj.Message[i].pname2+'</div> ';
          inner+='</div>';
          inner+='<div class="inp">';
          inner+='  <div class="inp_name">Primary Mobile : </div> ';
          inner+='  <div class="inp_value" id="pm2"> +91 '+obj.Message[i].pm2+'</div>';
          inner+='</div> ';
          inner+='<div class="inp">';
          inner+='  <div class="inp_name">Guardian Name : </div> ';
          inner+='  <div class="inp_value" id="pname3">'+obj.Message[i].pname3+'</div>';
          inner+='</div>';
          inner+='<div class="inp">';
          inner+='  <div class="inp_name">Primary Mobile : </div>';
          inner+='  <div class="inp_value" id="pm3"> +91 '+obj.Message[i].pm3+'</div>';
          inner+='</div></fieldset> ';
          inner+='<fieldset><legend>Address Details</legend>  ';
          inner+='<div class="inp">';
          inner+='  <div class="inp_name">Current Address : </div>';
          inner+='  <div class="inp_value" style="height:75px;" id="caddress"> '+obj.Message[i].caddress+'</div>';
          inner+='</div>';
          inner+='<div class="inp">';
          inner+='  <div class="inp_name">Perminent Address : </div> ';
          inner+='  <div class="inp_value" style="height:75px;" id="paddress"> '+obj.Message[i].paddress+'</div>';
          inner+='</div></fieldset>';
          inner+='<fieldset><legend>Income Details</legend>';
          inner+='<div class="inp">';
          inner+='  <div class="inp_name">Family Annual Income : </div>';
          inner+='  <div class="inp_value" id="income"> '+obj.Message[i].income+'</div>';
          inner+='</div>';
          inner+='<div class="inp">';
          inner+='  <div class="inp_name">Source of Income : </div>';
          inner+='  <div class="inp_value" id="incomesource"> '+obj.Message[i].incomesource+'</div>';
          inner+=' </div></fieldset>';
        }
      }
      inner+='</div> ';
      inner+='<div id="Acadamicedit" class="tabcontents">erterterter</div>';
      inner+='<div id="Miscedit" class="tabcontents">';
      if((obj1.Message).length==0){
        inner+="No data found.";
      }
      else{
        for(i in obj1.Message){
          inner+='<fieldset class="br" >';
          inner+='  <legend style="min-width:90%;">'+obj1.Message[i].achivementTitle+'</legend>';
          inner+='  <div class="inp">';
          inner+='    <div class="inp_name">achivementType : </div>';
          inner+='      <div class="inp_value"> '+obj1.Message[i].achivementType+'</div>';
          inner+='    </div>';
          inner+='    <div class="inp">';
          inner+='      <div class="inp_name">Achivement Title : </div>';
          inner+='      <div class="inp_value">'+obj1.Message[i].achivementTitle+'</div>';
          inner+='    </div>';
          inner+='    <div class="inp">';
          inner+='      <div class="inp_name">achivementArea : </div>';
          inner+='      <div class="inp_value">'+obj1.Message[i].achivementArea+'</div>';
          inner+='    </div>';
          inner+='   <div class="inp" style="height:100px;">';
          inner+='      <div class="inp_name">achivementDis : </div>';
          inner+='      <div class="inp_value"> '+obj1.Message[i].achivementDis+'</div>';
          inner+='    </div>';
          inner+='    <div class="inp">';
          inner+='      <div class="inp_name">achivementYear : </div>';
          inner+='      <div class="inp_value"> '+obj1.Message[i].achivementYear+'</div>';
          inner+='    </div>';
          inner+='    <div class="inp" style="height:82px;">';
          inner+='      <div class="inp_name">achivementreference : </div>';
          inner+='      <div class="inp_value"> '+obj1.Message[i].achivementreference+'</div>';
          inner+='    </div>';
          inner+='</fieldset>';
        }
      }
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
      var values   = ['getBasicInfoStu',userId,userName];
      if(userId!="" || userName !=""){
        var msg = SendToPhp(values,"../../php/controllers/employee.php");
        var obj = JSON.parse(msg);
        var oldDate='';
        if((obj.Message).length==0){
          oldDate+='<table id="addressbooktable" class="table-responsive table-bordered table-active table-hover" style="width:100%;"><thaed><tr><th>Sno</th><th>Photo</th> <th>ID Number</th><th>Name</th><th>Status</th><th>Actions</th></tr></thaed><tbody><tr> <td colspan="5">No records found.Please add User <button class="btn btn-md btn-warning" onclick="addUser()"> Add New User </button></td></tr></tbody></table>';
          snackbar("No Student Found. ");
        }
        if((obj.Message).length>0){
          oldDate+='<table id="addressbooktable" class="table-responsive table-bordered table-active table-hover" style="width:100%;"><thaed><tr><th>Sno</th><th style="width:80px;"> </th> <th onclick="sortTable(2,\'addressbooktable\')"> ID Number </th><th onclick="sortTable(3,\'addressbooktable\')">Name</th><th onclick="sortTable(4,\'addressbooktable\')"> Status </th> <th> Actions </th> </tr></thaed><tbody>';
          for(i in obj.Message){
            var ashwini=Number(i)+1;
            var actions =hasAccess(obj.Message[i].userId);
            oldDate+='<tr><td>'+ashwini +'</td><td><img src="http://<?php echo $link;?>/Registrations/upload/'+obj.Message[i].userId+'/'+obj.Message[i].userId+'.jpg" alt="'+obj.Message[i].userId+', '+obj.Message[i].userName+'" style="width:50px;height:50px;" /></td><td>'+obj.Message[i].userId+'</td><td> '+obj.Message[i].userName+'</td><td>'+obj.Message[i].status+'</td>';
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
