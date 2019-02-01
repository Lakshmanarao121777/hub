<?php session_start();
if (!$_SESSION) {
    header("Location:../../php/includes/logout.php");
} else {
    if ($_SESSION['USER_TYPE'] != "employee") {
      header("Location:../../php/includes/logout.php");
    }
    else if($_SESSION['USER_ID']!="admin"){
      header("Location:leaves.php");
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
  <link rel="stylesheet" type="text/css" href="../../assets/css/payroll.css">
</head>
<body>
  <?php include_once "../../php/includes/head_logobox.php";?>
  <?php include_once "../../php/includes/top_nav.php";?>
  <?php include_once "../../php/includes/sidebar_payroll.php";?>
  <div class="container bg_white" style="padding:0;">
    <ul class="bread">
      <li><a href="../" title=""><em><span class="fa fa-tachometer-alt"></span> Dashboard</em></a></li>
      <li><a href="./" title=""><em><span class="fa fa-tachometer-alt"></span> Payroll Dashboard</em></a></li>
      <li class="breadcurrent"><a href="" title=""><em><span class="fa fa-sign-out-alt"></span> Leaves</em></a></li>
    </ul>
<!-- Button trigger modal -->
    <input type="text" value="<?php echo$_SESSION['USER_ID']; ?>" id="userId" onchange="showLeaves()">
    <div class="col-12" id="main"></div>
      <table class="table table-bordered table-hover table-light" style="margin:0 2%;width:96%;">
        <thead>
          <tr>
            <th>Sno</th>
            <th>Employee Id/Name</th>
            <th>Applied Date</th>
            <th>Start Date</th>
            <th>End Date</th>
            <th>Reason</th>
            <th>Status</th>
            <th>Remarks</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody id="tablebodys">
          <tr><td colspan='9'>No Data Found.</td></tr>
        </tbody>
      </table>
    </div>
  </div>
  <?php include_once "../../php/includes/footer.php";?>
  <script type="text/javascript" src="../../assets/js/jquery-1.9.1.min.js"></script>
	<script type="text/javascript" src="../../assets/fontawesome/js/all.js"></script>
	<script type="text/javascript" src="../../assets/fontawesome/js/fontawesome.js"></script>
	<script type="text/javascript" src="../../assets/js/jquery.min.js"></script>
	<script type="text/javascript" src="../../assets/js/main.js"></script>
  <script type="text/javascript">
    function addLeave()
    {
      var userId=document.getElementById('userId').value;
      var values=['apply_leave','userId','1','1','1'];
      var msg=SendToPhp(values ,"../../php/controllers/payroll.php");
      alert(msg);
    }
    showLeaves(document.getElementById('userId').value);
    function showLeaves(userId){
      var values=['show_leave_admin',userId];
      var msg=SendToPhp(values ,"../../php/controllers/payroll.php");
      var obj = JSON.parse(msg);
      var i,tablebody="";

      for (i in obj.Message) {
        tablebody +="<tr>";
        if(obj.Message[i].status=="Pending"){var statuss='<span class="btn btn-info btn-sm">Pending</span>';}
        else if(obj.Message[i].status=="Approved"){var statuss='<span class="btn btn-success btn-sm">Approved</span>';}
        else if(obj.Message[i].status=="Cancled"){var statuss='<span class="btn btn-warning btn-sm">Cancled</span>';}
        else{var statuss='<span class="btn btn-danger btn-sm">Rejected</span>';}
        var ashwini=Number(i)+1;
        tablebody+="<td>"+ashwini +"</td>";
        tablebody+="<td>"+obj.Message[i].userId+"</td>";
        tablebody+="<td>"+obj.Message[i].regDate+"</td>";
        tablebody+="<td>"+obj.Message[i].fromDate+"</td>";
        tablebody+="<td>"+obj.Message[i].toDate+"</td>";
        tablebody+="<td>"+obj.Message[i].reason+"</td>";
        tablebody+="<td>"+statuss+"</td>";
        tablebody+="<td>"+obj.Message[i].remarks+"</td>";
        var sno=obj.Message[i].sno;
        if(obj.Message[i].status=="Pending"){
          var kk='<button class="btn-danger btn btn-sm" onclick="reject_leave('+sno+')"> Reject </button><button class="btn-success btn btn-sm" onclick="approve_leave('+sno+')"> Approve </button>'}
        else if(obj.Message[i].status=="Cancled") {var kk='<span class="btn btn-warning"> Leave cancled </span>';}
        else if(obj.Message[i].status=="Approved") {var kk='<span class="btn btn-success"> Leave Granted </span>';}
        else if(obj.Message[i].status=="Rejected") {var kk='<span class="btn btn-danger"> Leave Rejected </span>';}
        tablebody+='<td>'+kk+'</td>';
        tablebody +="</tr>";
      }
      if(obj.status=="Success" )
        {
          if(obj.Message.length>=1){selectionListDisplay("tablebodys",tablebody);
        }
      }
      else{
        tablebody="<div class='notfound'> An error occured Please contact Admin for more details </div>";
        selectionListDisplay("main",tablebody);
      }
      
    }
    function reject_leave(sno){
      var values=['reject_leave_user',sno];
      var msg=SendToPhp(values ,"../../php/controllers/payroll.php");
      var obj = JSON.parse(msg);
      if( obj.Message[i].status=="Success" )
      {
        showLeaves(document.getElementById('userId').value);
      }
    }
    function approve_leave(sno){
      var values=['approve_leave_user',sno];
      var msg=SendToPhp(values ,"../../php/controllers/payroll.php");
      var obj = JSON.parse(msg);
      if( obj.Message[i].status=="Success" )
      {
        showLeaves(document.getElementById('userId').value);
      }
    }
  </script>
</body>
</html>
