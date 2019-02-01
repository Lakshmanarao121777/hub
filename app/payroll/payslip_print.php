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
  <link rel="stylesheet" type="text/css" href="../../assets/fontawesome/css/fontawesome.css">
  <link rel="stylesheet" type="text/css" href="../../assets/css/_main.css">
  <link rel="stylesheet" type="text/css" href="../../assets/css/AcadamicDepartments.css">
</head>
<body>
  <?php include_once "../../php/includes/head_logobox.php";?>
  <?php include_once "../../php/includes/top_nav.php";?>
  <?php include_once "../../php/includes/sidebar_AcadamicDepartments.php";?>
  <style>
  td{padding:0;}</style>
  <div class="container bg_white" style="height:100%;width:100%;left:0;top:0">

  
  <input type="hidden" value="<?php echo$_SESSION['USER_ID']; ?>" id="userId">
  <div class="border-double"></div>
    <div class="col-10" style="margin:10px 0 0 10%;">
        <input type="hidden" id="userId" value="<?php echo $_POST['userIds']; ?>">
        <input type="hidden" id="inputMonth" value="<?php echo $_POST['usermonth']; ?>">
        <input type="hidden" id="inputYear" value="<?php echo $_POST['useryer']; ?>">
        <input type="hidden" id="inputDES" value="<?php echo $_SESSION['USER_DESIGNATION']; ?>">
    </div>
    <div class="col-12" id="main"></div>
    <div id="printer">
      <div class="col-12" id="main_att"></div>
      <div class="col-12" id="tablebodys"></div>
    </div>
    <div class="col-12"><button class="btn btn-primary btn-md" onclick="printDiv()"><span class="fa fa-print"> </span> Print this page</button></div>
  </div>
  <script type="text/javascript" src="../../assets/js/jquery-1.9.1.min.js"></script>
  <script type="text/javascript" src="../../assets/fontawesome/js/all.js"></script>
  <script type="text/javascript" src="../../assets/fontawesome/js/fontawesome.js"></script>
  <script type="text/javascript" src="../../assets/js/jquery.min.js"></script>
  <script type="text/javascript" src="../../assets/js/main.js"></script>
  
  <script type="text/javascript">
    show_pay_slip(); 
    function show_pay_slip(){
      userId=document.getElementById('userId').value;
      userDate=document.getElementById('inputMonth').value;
      usermonth=document.getElementById('inputYear').value;
      inputDES=document.getElementById('inputDES').value;
      userdats=usermonth+"-"+userDate;
      var values=['show_paystatement_user',userId,userdats];
      var msg=SendToPhp(values ,"../../php/controllers/payroll.php");
      var obj = JSON.parse(msg);
      var i,tablebody='<table class="table table-bordered table-hover table-light"><thead><tr>';
      //tablebody+='<th>Employee Id/Name</th><th>Date</th>';
      tablebody+='<th> Earnings </th><th> Amount </th><th> Deductions </th><th>Amount</th></tr></thead><tbody >',attendance='';
      for (i in obj.Message) {
        var values1=['show_paystatement_getuserDetails',obj.Message[i].EMPID];
        var msg1=SendToPhp(values1 ,"../../php/controllers/payroll.php");
        var obj1 = JSON.parse(msg1);
        attendance+="<br><div class='col-12'><img src='../../assets/images/letterhead.jpg'  style='height:100px;width:100%'/></div><br>"
        attendance+="<table class='table table-bordered table-hover table-light'><thead><tr><th colspan='4'>Employee Details</th></tr></thead> <tbody> <tr> <td>Emplyoee ID Number</td><td>"+obj.Message[i].EMPID+"</td><td>Employee Name</td> <td>"+obj1.Message[i].userName+"</td> </tr> <tr><td>Designation </td><td>"+inputDES+"</td> <td>Department</td><td>"+obj1.Message[i].department+"</td> </tr> </tbody></table> <table class='table table-bordered table-hover table-light'><thead><tr><th colspan='4'>Attendance Report</th></tr></thead><tbody><tr><td>No of Working Days</td><td>"+obj.Message[i].WORKING+"</td><td>No of Present Days</td><td>"+obj.Message[i].PRESENT+"</td> </tr> </tbody> </table>";
        tablebody +="<tr>";
        var ashwini=Number(i)+1;
        /*tablebody+="<td>"+ashwini +"</td>";
        tablebody+="<td>"+obj.Message[i].EMPID +"</td>";
        tablebody+="<td>"+obj.Message[i].MMYY+"</td>";*/
        tablebody+="<tr><td style='width:25%;'>Basic Pay</td><td>Rs. "+obj.Message[i].BASIC+"</td>";
        tablebody+="<td style='width:20%;'>CPS</td><td>Rs. "+obj.Message[i].CPS+"</td></tr>";

        tablebody+="<tr><td style='width:20%;'>Consolidated Salary</td><td style='width:30%;'>Rs. "+obj.Message[i].CONSOLIDATED+"</td>";
        tablebody+="<td style='width:20%;'>CPSA</td><td style='width:30%;'>Rs. "+obj.Message[i].CPSA+"</td></td>";
        
        tablebody+="<tr><td>Grade Pay</td><td>Rs. "+obj.Message[i].GRADE+"</td>";
        tablebody+="<td>PT</td><td>Rs. "+obj.Message[i].PT+"</td></tr>";
        
        tablebody+="<tr><td>D.A.</td><td>Rs. "+obj.Message[i].DA+"</td>";
        tablebody+="<td>IT</td><td>Rs. "+obj.Message[i].IT+"</td></tr>";
        
        tablebody+="<tr><td>HRA</td><td>Rs. "+obj.Message[i].HRA+"</td>";
        tablebody+="<td>ELECTICAL</td><td>Rs. "+obj.Message[i].ELECTICAL+"</td></tr>";
        
        tablebody+="<tr><td>TA</td><td>Rs. "+obj.Message[i].TA+"</td>";
        tablebody+="<td>PF</td><td>Rs. "+obj.Message[i].PF+"</td></tr>";

        tablebody+="<tr><td>Total Earnings</td><td>Rs. "+obj.Message[i].EARNINGS+"</td>";
        tablebody+="<td>Total Deductions</td><td>Rs. "+obj.Message[i].DEDUCTIONS+"</td></tr>";

        tablebody+="<td>Net Amount</td><td colspan='3'><B>Rs. "+obj.Message[i].NET+".00/-</B><!--( In Words :: <b>"+numberToEnglish(JSON.stringify(obj.Message[i].NET),',') +"</b>  )--></td></tr>";
      }
      tablebody+="</tbody></table>";
      var notes='<div class="col-10" style="font-size:10px;"><h6>*NOTE : </h6><ol><li>This is Computer Generated Pay Slip. Hence, no signature is required.</li><li>This is for information of the Individual only. </li><li>This is not valid for any other purpose.</li><li>If any individual requests in writing for submission of pay slip for any other purpose,On his/her request, this same certificate will be issued by clearly mentioning the Purpose and signed by the Finance Officer or by the Director concerned.</ol></div>';
      if(obj.status=="Success" )
        {
          if(obj.Message.length>=1){
            selectionListDisplay("tablebodys",tablebody+notes);
            selectionListDisplay("main_att",attendance);
            document.getElementById("prbtn").style.display="block";
        }
      }
      else{
        tablebody="<div class='notfound'> An error occured Please contact Admin for more details </div>";
        selectionListDisplay("main",tablebody);
      }
    }
  </script>
  <script type="text/javascript">
    function printDiv() {  
    var printContents = document.getElementById('printer').innerHTML;
    var originalContents = document.body.innerHTML;
    document.body.innerHTML = printContents;
    window.print();
    document.body.innerHTML = originalContents;
    }
</script>
</body>
</html>
