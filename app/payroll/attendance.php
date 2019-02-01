<?php session_start();
if (!$_SESSION) {
    header("Location:../../php/includes/logout.php");
} else {
    if ($_SESSION['USER_TYPE'] != "employee") {
        header("Location:../../php/includes/logout.php");
    }
    else if($_SESSION['USER_ID']=="admin"){
     // header("Location:admin_leaves");
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
  <style>
  td{padding:0;}</style>
  <?php include_once "../../php/includes/head_logobox.php";?>
  <?php include_once "../../php/includes/top_nav.php";?>
  <?php include_once "../../php/includes/sidebar_payroll.php";?>
  <div class="container bg_white" style="padding:0 0 100px 0;">
    <ul class="bread">
      <li><a href="../" title=""><em><span class="fa fa-tachometer-alt"></span> Dashboard</em></a></li>
      <li><a href="./" title=""><em><span class="fa fa-tachometer-alt"></span> Payroll Dashboard</em></a></li>
      <li class="breadcurrent"><a href="" title=""><em><span class="fa fa-calendar-alt"></span> Attendance</em></a></li>
    </ul>

  updatesoon
  <?php include_once "../../php/includes/footer.php";?>
  <script type="text/javascript" src="../../assets/js/jquery-1.9.1.min.js"></script>
	<script type="text/javascript" src="../../assets/fontawesome/js/all.js"></script>
	<script type="text/javascript" src="../../assets/fontawesome/js/fontawesome.js"></script>
	<script type="text/javascript" src="../../assets/js/jquery.min.js"></script>
	<script type="text/javascript" src="../../assets/js/main.js"></script>
  
  <script type="text/javascript">
    //show_pay_slip(); 
    function show_pay_slip(){
      userId=document.getElementById('userId').value;
      userDate=document.getElementById('inputMonth').value;
      usermonth=document.getElementById('inputYear').value;
      userdats=usermonth+"-"+userDate;
      var values=['show_paystatement_user',userId,userdats];
      var msg=SendToPhp(values ,"../../php/controllers/payroll.php");
      var obj = JSON.parse(msg);
      var i,tablebody='<table class="table table-bordered table-hover table-light"><thead><tr><th>Sno</th>';
      //tablebody+='<th>Employee Id/Name</th><th>Date</th>';
      tablebody+='<th>Payment type</th><th>Debit</th><th>Credit</th><th>Net Amount</th><th>Remarks</th></tr></thead><tbody >',attendance='';
      for (i in obj.Message) {
        var values1=['show_paystatement_getuserDetails',obj.Message[i].EMPID];
        var msg1=SendToPhp(values1 ,"../../php/controllers/payroll.php");
        var obj1 = JSON.parse(msg1);
        attendance+="<table class='table table-bordered table-hover table-light'><tr><td rowspan='4'><img src='../../Registrations/upload/"+obj.Message[i].EMPID +"/"+obj.Message[i].EMPID +".png' style='width:90px;'/></td><td>Employee ID</td><td>"+obj.Message[i].EMPID +"</td><td> Total Working Days</td><td>"+obj.Message[i].WORKING+"</td></tr><tr><td>Employee Name</td><td>"+obj1.Message[i].userName +"</td><td> Total Attended Days</td><td>"+obj.Message[i].PRESENT+"</td></tr><tr><td>Employee Department</td><td>"+obj1.Message[i].department +"</td><td> Total Absent Days</td><td>"+obj.Message[i].ABSENT+"</td></tr><tr><td> Payment Slip Details</td><td>20"+obj.Message[i].MMYY+"</td><td> Net Amount Earned</td><td>Rs. "+obj.Message[i].NET+".00/-</td></tr></table>";
        tablebody +="<tr>";
        var ashwini=Number(i)+1;
        tablebody+="<td>"+ashwini +"</td>";/*
        tablebody+="<td>"+obj.Message[i].EMPID +"</td>";
        tablebody+="<td>"+obj.Message[i].MMYY+"</td>";*/
        tablebody+="<td>Basic Pay<br>Grade Pay <br>DA<br>HRT<br> TA<br>CPS <br>CPSA <br> PT <br> Income Tax <br> ELECTICAL  <br>PF  <br> Others <br><span style='font-size:16px;text-align:right;width:100%;'>Total Earnings</span> <br><span style='font-size:16px;text-align:right;width:100%;'>Total Deductions</span> <br><span style='font-size:20px;text-align:right;width:100%;'>Net Total </span></td>";
        tablebody+="<td align='left'> <br><br><br> <br>  <br>Rs. "+obj.Message[i].CPS+" <br>Rs. "+obj.Message[i].CPSA+" <br> Rs. "+obj.Message[i].PT+" <br>Rs. "+obj.Message[i].IT+" <br> Rs. "+obj.Message[i].ELECTICAL+"  <br>Rs. "+obj.Message[i].PF+"  <br> Rs. "+obj.Message[i].OTHER+"<br><span style='font-size:16px;'>- </span> <br><span style='font-size:16px;border-top:1px solid black;'>Rs. "+obj.Message[i].DEDUCTIONS+".00</span></td>";

        tablebody+="<td align='left'>Rs. "+obj.Message[i].BASIC+"<br>Rs. "+obj.Message[i].GRADE+"<br>Rs. "+obj.Message[i].DA+"<br>Rs. "+obj.Message[i].HRA+"<br>Rs. "+obj.Message[i].TA+"<br><br><br><br><br><br><br><br><span style='font-size:16px;border-top:1px solid black;'>Rs. "+obj.Message[i].EARNINGS+".00</span></td>";

        tablebody+="<td align='left'><br><br><br><br><br><br><br><br><br><br><br><br><span style='font-size:16px;'> </span><br><span style='font-size:16px;'> </span><br><span style='font-size:20px;border-bottom:1px solid black;border-top:1px solid black;'>Rs. "+obj.Message[i].NET+".00</span></td>";
        tablebody+="<td align='center'>"+obj.Message[i].REMARK+"</td>";
        tablebody +="</tr>";
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
    var kk='<div class="col-12"><img src="../../assets/images/letterhead.jpg" style="height:100px;width:100%;"></div>';
    var printContents = document.getElementById('printer').innerHTML;
    var originalContents = document.body.innerHTML;
    document.body.innerHTML = kk+printContents;
    window.print();
    document.body.innerHTML = originalContents;
    }
</script>
</body>
</html>
