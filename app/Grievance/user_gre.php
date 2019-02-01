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
td:nth-child(6){width:150px;text-align:center;}
td:nth-child(4){width:120px;text-align:center;}
td:nth-child(5){width:150px;text-align:center;}
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
  .modal {display: none;position: fixed;z-index: 5; left: 0;top: 0;width: 100%;height: 100%;overflow: auto;background-color: rgba(0,0,0,0.4);}
  .modal-content {background-color:#fefefe;margin:3% 5%;padding:20px;border:1px solid #888;width:90%;height:85%;overflow-y:scroll;position:fixed;}
  .close {color: #aaa; float: right;font-size: 28px;font-weight: bold;}
  .gre_half{width:50%;border-right:1px solid gray;float:left;padding:30px;}
  ._name{font-weight:700;font-size:12px;padding:3px 10px;width:30%;float:left;min-height:40px;text-align:right;}
  ._value{float:left;width:70%;font-size:14px;padding:3px 10px;min-height:40px;}
@media only screen and (max-width: 768px) {
  .gre_half{width:100%;border:0;}
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
  <div class="container bg_white" style="padding:0 0 100px 0;">
    <ul class="bread">
      <li><a href="../" title=""><em><span class="fa fa-tachometer-alt"></span> Dashboard</em></a></li>
      <li><a href="./" title=""><em><span class="fa fa-headphones-alt"> </span> Grievance Dashboard</em></a></li>
      <li class="breadcurrent"><a href="#" title=""><em><span class="fa fa-headphones-alt"> </span> File Complaint</em></a></li>
    </ul>
    <fieldset style="border:1px solid gray;border-radius:5px;">
      <center><h3> <i> COMPLAINT </i> </h3></center>
      <div class="border-double"></div><br>
        <form method="post" name="fileComplaint" onsubmit="fileNewComplaint('<?php echo$userId; ?>'); return false;">
          <div class="inp">
            <div class="inp_name">Select Department : </div>
            <div class="inp_value"><select name="department" id="dept"></select></div>
          </div>
          <div class="inp">
            <div class="inp_name">Subject : </div>
            <div class="inp_value"><input type="text" name="subject" placeholder="Please discribe your problem shortly" /></div>
          </div>
          <div class="inp">
            <div class="inp_name">Complaint : </div>
            <div class="inp_value"><textarea name="problem" placeholder="Please discribe your problem Here breifly"></textarea></div>
          </div>
          <div class="inp">
            <div class="inp_name">Location : </div>
            <div class="inp_value"><textarea name="location" placeholder="Please discribe the loction"></textarea></div>
          </div>
          <center>
            <button class="btn btn-primary" type="submit"><span class="fa fa-check"></span> File Complaint</button>
            <button class="btn btn-warning" type="reset"><span class="fa fa-sync"></span> RESET </button>
          </center>
        </form>
    </fieldset>
    <?php
    include_once "../../php/config/DBActivityPHP.php";
    $designation = new DBActivityPHP();
      $posted = $designation->getCount("gre_complaints", "userId='$_SESSION[USER_ID]' and status='Posted' ");
      $solved = $designation->getCount("gre_complaints", "userId='$_SESSION[USER_ID]' and status='Solved' ");
      $rejected = $designation->getCount("gre_complaints", "userId='$_SESSION[USER_ID]' and status='Rejected' ");
      $pending = $designation->getCount("gre_complaints", "userId='$_SESSION[USER_ID]' ");
      $pending=$pending-$posted-$solved-$rejected;
    ?>
    <div class="sarath pp">
      <b style="color:rgba(255,255,255,0.8);">Compalint(s) Posted </b><br> <span class="numbershow"><i class="fa fa-sync-alt ico"></i> <?php echo $posted; ?> </span> 
    </div>
    <div class="sarath ss">
      <b style="color:rgba(255,255,255,0.8);">Compalint(s) Solved </b><br> <span class="numbershow"><i class="fa fa-check ico" ></i> <?php echo $solved; ?> </span> 
    </div>
    <div class="sarath pe">
      <b style="color:rgba(255,255,255,0.8);">Compalint(s) Pending </b><br> <span class="numbershow"><i class="fa fa-sync-alt ico" ></i> <?php echo $pending; ?> </span> 
    </div>
    <div class="sarath rj">
      <b style="color:rgba(255,255,255,0.8);">Compalint(s) Rejected </b><br> <span class="numbershow"><i class="fa fa-times ico" ></i> <?php echo $rejected; ?> </span> 
    </div>


    <div id="show"></div>
    <div id="viewDetails" class="modal" style="display:none;"></div>
  </div>
  <?php include_once "../../php/includes/footer.php";?>
  <script type="text/javascript" src="../../assets/js/jquery-1.9.1.min.js"></script>
  <script type="text/javascript" src="../../assets/fontawesome/js/all.js"></script>
  <script type="text/javascript" src="../../assets/js/jquery.min.js"></script>
  <script type="text/javascript" src="../../assets/js/main.js"></script>
  <script>
    showDept();
    showComplaints('<?php echo$userId; ?>');
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
    function showComplaints(userId){
      var values=["gre_show_complaints",userId];
      var msg=SendToPhp(values,"../../php/controllers/Grievance.php");
      var obj = JSON.parse(msg);
      var oldDate="",i=0;
      if((obj.Message).length!=0){
        var oldDate='<table id="addressbooktable" class="table-responsive table-bordered table-active table-hover" style="width:100%;"><thead class="header"><tr><th>S No</th><th>ID Number</th><th>Subject</th><th> Department </th><th> Status</th> <th>Actions</th></tr></thead> <tbody>';
        for(i in obj.Message){
          oldDate +="<tr>";
          var ashwini=Number(i)+1;
          oldDate+="<td>"+ashwini+"</td>";
          oldDate+="<td>"+obj.Message[i].userId+"</td>";
          oldDate+="<td>"+obj.Message[i].subject+"</td>";
          oldDate+="<td>"+obj.Message[i].department+"</td>";
          oldDate+="<td>"+obj.Message[i].status+"</td>";
          oldDate+="<td>";
          oldDate+="<button class='btn btn-xs btn-primary' onclick='viewComplaint(\""+obj.Message[i].sno+"\")'><span class='fa fa-eye'> </span> View</button> ";
          if(obj.Message[i].status=="Posted"){
          oldDate+=" <button class='btn btn-xs btn-warning' onclick='deleteComplaint(\""+obj.Message[i].sno+"\")'><span class='fa fa-trash'> </span> Delete</button>";}
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
    function viewComplaint(sno){
      var modal = document.getElementById('viewDetails');
      modal.style.display = "block";
      var values=['gre_show_complaint',sno];
      var msg = SendToPhp(values, "../../php/controllers/Grievance.php");
      var obj = JSON.parse(msg);
      var oldDate='',i=0;
      oldDate+='<div class="modal-content">';
      for(i in obj.Message){
        oldDate += '<h3> Complaint Review/View </h3><div class="border-double"></div>';
        oldDate += '<div class="gre_half">';
        oldDate +=  '<h4><u>Subject : </u> </h4>'+obj.Message[i].subject;
        oldDate +=  '<br><h4><u>Problem : </u> </h4>'+obj.Message[i].problem;
        oldDate +=  '<br><h4><u>Solution : </u> </h5>'+obj.Message[i].solution;
        oldDate +=  '<br><h4><u>Location : </u> </h4>'+obj.Message[i].location;
        if(obj.Message[i].status =="Solved"){
          if(obj.Message[i].feedback ==""){
            oldDate +=  '<br><h4><u>Feedback : </u> </h4><textarea id="" style="width:100%;padding:10px;height:100px;"></textarea>';
            oldDate += '<button class="btn btn-success" onclick="updateFeedback(\''+obj.Message[i].sno+'\')"> Submit Feedback </button> ';
          }
          else{
            oldDate +=  '<br><h4><u>Feedback : </u> </h4>'+obj.Message[i].feedback;
          }
          
        }
        oldDate += '</div>';
        oldDate += '<div class="gre_half">';
        oldDate +=  '<div class="_name">UserId : </div>';
        oldDate +=  '<div class="_value" >'+obj.Message[i].userId+'</div>';
        oldDate +=  '<div class="_name">User Name : </div>';
        oldDate +=  '<div class="_value"> '+obj.Message[i].userId+'</div>';
        oldDate +=  '<div class="_name">User Department : </div>';
        oldDate +=  '<div class="_value" >'+obj.Message[i].userId+'</div>';
        oldDate +=  '<div class="_name">Complaint Filed Department : </div>';
        oldDate +=  '<div class="_value" >'+obj.Message[i].department+'</div>';
        oldDate +=  '<div class="_name">Complaint Filed On : </div>';
        oldDate +=  '<div class="_value" >'+obj.Message[i].regDate+'</div>';
        oldDate +=  '<div class="_name">Complaint Status : </div>';
        oldDate +=  '<div class="_value" >'+obj.Message[i].status+'</div>';
        if(obj.Message[i].status !="Posted" && obj.Message[i].status !="Rejected"){
          oldDate +=  '<div class="_name">Estimated Cost for Solution : </div>';
          oldDate +=  '<div class="_value" >'+obj.Message[i].eCost+'</div>';
          oldDate +=  '<div class="_name">Spended Cost for Solution : </div>';
          oldDate +=  '<div class="_value" >'+obj.Message[i].sCost+'</div>';
          oldDate +=  '<div class="_name">Estimated time to Solve Problem: </div>';
          oldDate +=  '<div class="_value" >'+obj.Message[i].eTime+'</div>';
          oldDate +=  '<div class="_name">Problem Solved On: </div>';
          oldDate +=  '<div class="_value" >'+obj.Message[i].solDate+'</div>';
          oldDate +=  '<br><h5><u> Technical Team : </u> </h5>';
          oldDate +=  stringToTable(obj.Message[i].techTeam);
        }
        oldDate += '</div>';
      }
      oldDate+='<span id="close" ></span>';
      oldDate+='</div>';
      modal.innerHTML=oldDate;
      var span = document.getElementById("close");
      span.onclick = function() {modal.style.display = "none";}
      window.onclick = function(event) {
          if (event.target == modal) {
              modal.style.display = "none";
          }
      }
    }
    function stringToTable(inp){
      var data = inp.split(',');
      var oldDate='';
      oldDate += '<table class="table table-responsive table-striped table-bordered table-hover"><thead><tr><th> Sno </th><th> UserId </th><th> Name </th><th> Department </th> <th> Designation </th></tr></thead><tbody>';
      for(var ln=0;ln < data.length;ln++){ 
        oldDate += '<tr>';
        oldDate += '<td>'+ln+'</td>';
        var Name=getColValuess("employee_details","userId='"+data[ln]+"'","userName");
        oldDate += '<td>'+data[ln]+'</td>';
        oldDate += '<td>'+Name+'</td>';
        var dept=getColValuess("gre_users"," userId='"+data[ln]+"'","department")
        oldDate += '<td>'+getColValuess("gre_departments"," sno='"+dept+"'","deptName")+'</td>';
        oldDate += '<td>'+getColValuess("gre_users"," userId='"+data[ln]+"'","designation")+'</td>';
        oldDate += '</tr>';
      }
      oldDate += '</tbody></table>';
      return oldDate;
    }
    function getColValuess(table,wheresql,col){
      var values=["gre_get_col_value",table,wheresql,col];
      var msg=SendToPhp(values,"../../php/controllers/Grievance.php");
      return msg;
    }
    function fileNewComplaint(userId){
      var dept=document.forms['fileComplaint']['department'].value;
      var subject=document.forms['fileComplaint']['subject'].value;
      var problem=document.forms['fileComplaint']['problem'].value;
      var location=document.forms['fileComplaint']['location'].value;
      var values=["gre_insert_complaint",userId,subject,dept,problem,location];
      var msg=SendToPhp(values,"../../php/controllers/Grievance.php");
      var obj = JSON.parse(msg);
      if(obj.message="success"){
        snackbar("Your Complaint was recorder succesfuly.And our technicians will attempt it ASAP .");
        showComplaints(userId);
      }
    }
    function deleteComplaint(sno){
      var values=["gre_delete_complaint",sno];
      var msg=SendToPhp(values,"../../php/controllers/Grievance.php");
      var obj = JSON.parse(msg);
      if(obj.message="success"){
        snackbar("Your Complaint was successfully removed from the records.");
        showComplaints('<?php echo$userId; ?>');
      }
    }
  </script>
</body>
</html>
