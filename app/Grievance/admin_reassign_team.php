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
td:nth-child(4){text-align:left;}
td:nth-child(5){width:180px;text-align:center;}
td:nth-child(2){width:100px;text-align:center;}
form{width:100%;padding:2px;}
.inp{width:100%;}
select,select > option{width:100%;padding:3px;}
.inp_value input[type="text"],select{max-width:100%;}
.inp_value input[type="date"]{max-width:100%;}
.inp_value textarea{width:100%;height:100%;}
.inp_value {height:100%;}
fieldset{width:45%;float:left;margin:10px 2% 2% 2%;}
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
	<div class="container bg_white" style="padding:0 0 50px 0;">
    <ul class="bread">
      <li><a href="../" title=""><em><span class="fa fa-tachometer-alt"></span> Dashboard</em></a></li>
      <li><a href="./" title=""><em><span class="fa fa-headphones-alt"> </span> Grievance Dashboard</em></a></li>
      <li><a href="admin_assign" title=""><em><span class="fa fa-users"> </span> Team </em></a></li>
      <li class="breadcurrent"><a href="#" title=""><em><span class="fa fa-users"> </span> Team Re-Assignment</em></a></li>
    </ul>
    <fieldset style="display:none;">
      <div class="inp">
        <div class="inp_name">Select Compalint Status : </div>
        <div class="inp_value"><select id="statuss">
        <option value="Viewed">Team Assigned</option>
        </select> </div>
      </div>
    </fieldset>
    <fieldset style="display:none;">
      <div class="inp">
        <div class="inp_name">Select Compalint Date: </div>
        <div class="inp_value"><input type="date" id="date" /> </div>
      </div>
    </fieldset>
    <center  style="display:none;"><button class="btn btn-primary" onclick="showComplaints('<?php echo $userId; ?>')"> Show Results </button></center>
    <div id="show"></div>
    <div id="viewDetails" class="modal" style="display:none;"></div>
  </div>
  <?php include_once "../../php/includes/footer.php";?>
  <script type="text/javascript" src="../../assets/js/jquery-1.9.1.min.js"></script>
  <script type="text/javascript" src="../../assets/fontawesome/js/all.js"></script>
  <script type="text/javascript" src="../../assets/js/jquery.min.js"></script>
  <script type="text/javascript" src="../../assets/js/main.js"></script>
  <script>
    showComplaints("<?php echo $userId;?>");
    function views(sno){
      var modal = document.getElementById('viewDetails');
      modal.style.display = "block";
      var values=['gre_show_complaint',sno];
      var msg = SendToPhp(values,"../../php/controllers/Grievance.php");
      var obj = JSON.parse(msg);
      var inner='',i=0;
      inner+='<div class="modal-content">';
      inner+='erterter';
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
    function showComplaints(userId){
      var status =document.getElementById('statuss').value;
      var date =document.getElementById('date').value;
      var values=["admin_show_complaints",userId,status,date];
      var msg=SendToPhp(values,"../../php/controllers/Grievance.php");
      var obj = JSON.parse(msg);
      var oldDate='',i=0;
      if((obj.Message).length!=0){
        var oldDate='<table id="addressbooktable" class="table-responsive table-bordered table-active table-hover" style="width:100%;"><thead class="header"><tr><th>S No</th><th>ID Number</th><th>Complaint Reg Date</th><th>Subject</th><th>Status</th><th>Actions</th></tr></thead> <tbody>';
        for(i in obj.Message){
          oldDate +="<tr>";
          var ashwini=Number(i)+1;
          oldDate+="<td>"+ashwini+"</td>";
          oldDate+="<td>"+obj.Message[i].userId+"</td>";
          oldDate+="<td>"+obj.Message[i].regDate+"</td>";
          oldDate+="<td>"+obj.Message[i].subject+"</td>";
          oldDate+="<td>"+obj.Message[i].status+"</td>";
          oldDate+="<td>";
          oldDate+="<button class='btn btn-xs btn-primary' onclick='viewComplaint(\""+obj.Message[i].sno+"\")'><span class='fa fa-eye'> </span> View</button> ";
          if(obj.Message[i].status=='Posted'){
            oldDate+="<button class='btn btn-xs btn-warning' onclick='reject(\""+obj.Message[i].sno+"\")'><span class='fa fa-times'> </span> Reject</button> ";
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
    function reject(sno){
      var values=["admin_show_complaint_reject",sno];
      var msg=SendToPhp(values,"../../php/controllers/Grievance.php");
      var obj = JSON.parse(msg);
      if(obj.Message=="success"){
        snackbar("Comaplaint was sucessfully rejected");
        showComplaints('<?php echo $userId; ?>');
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
        oldDate +=  '<div class="_value"> '+getColValuess("students_details","userId='"+obj.Message[i].userId+"'","userName")+'</div>';
        oldDate +=  '<div class="_name">User Department : </div>';
        oldDate +=  '<div class="_value" >'+getColValuess("students_details","userId='"+obj.Message[i].userId+"'","Department")+'</div>';
        oldDate +=  '<div class="_name">Complaint Filed Department : </div>';
        oldDate +=  '<div class="_value" >'+getColValuess("gre_departments","sno='"+obj.Message[i].department+"'","deptName")+'</div>';
        oldDate +=  '<div class="_name">Complaint Filed On : </div>';
        oldDate +=  '<div class="_value" >'+obj.Message[i].regDate+'</div>';
        oldDate +=  '<div class="_name">Complaint Status : </div>';
        oldDate +=  '<div class="_value" >'+obj.Message[i].status+'</div>';
        if(obj.Message[i].status =="Posted"){
          changeStatus(obj.Message[i].sno,'Viewed');
        }
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
          oldDate +=  stringToTable(obj.Message[i].techTeam,obj.Message[i].sno);
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
    function stringToTable(inp,sno){
      var oldDate='';
      oldDate += '<table class="table table-responsive table-striped table-bordered table-hover"><thead><tr><th> Sno </th><th> UserId </th><th> Name </th><th> Department </th> <th> Designation </th></tr></thead><tbody>';
        var data = inp.split(',');
        for(var ln=0;ln < data.length;ln++){ 
          oldDate += '<tr>';
          var ll=Number(ln)+1;
          oldDate += '<td>'+ll+'</td>';
          var Name=getColValuess("employee_details","userId='"+data[ln]+"'","userName");
          oldDate += '<td>'+data[ln]+'</td>';
          oldDate += '<td>'+Name+'</td>';
          var dept=getColValuess("gre_users"," userId='"+data[ln]+"'","department")
          oldDate += '<td>'+getColValuess("gre_departments"," sno='"+dept+"'","deptName")+'</td>';
          oldDate += '<td>'+getColValuess("gre_users"," userId='"+data[ln]+"'","designation")+'</td>';
          oldDate += '</tr>';
        }
        oldDate += '<tr>';
        oldDate += '<td colspan="3"><select id="selectUser">'+selectUser("<?php echo $userId; ?>")+'</select></td>';
        oldDate += '<td colspan="2"><button onclick="addTeam('+sno+')" class="btn btn-success btn-xs"><span class="fa fa-check"></span> Add to Team </button</td>';
        oldDate += '<tr>';
      oldDate += '</tbody></table>';
      return oldDate;
    }
    function addTeam(sno){
      var userId = document.getElementById("selectUser").value;
      var values=["gre_addtoteam_state",sno,userId];
      var msg = SendToPhp(values,"../../php/controllers/Grievance.php");
      changeStatus(sno,'Team Assigned');
      showComplaints("<?php echo $userId;?>");
      viewComplaint(sno);
    }
    function selectUser(userId){
      var values=["gre_get_user_value",userId];
      var msg = SendToPhp(values,"../../php/controllers/Grievance.php");
      var oldDate='',i=0;
      var obj = JSON.parse(msg);
      for(i in obj.Message){
        oldDate +='<option value="'+obj.Message[i].userId+'">'+obj.Message[i].userId+'</option>';
      }
      return oldDate;
    }
    function changeStatus(sno,stae){
      var values=["gre_change_state",sno,stae];
      var msg = SendToPhp(values,"../../php/controllers/Grievance.php");
    }
    function getColValuess(table,wheresql,col){
      var values=["gre_get_col_value",table,wheresql,col];
      var msg=SendToPhp(values,"../../php/controllers/Grievance.php");
      return msg;
    }
  </script>
</body>
</html>
