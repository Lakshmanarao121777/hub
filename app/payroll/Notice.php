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
  <?php include_once "../../php/includes/head_logobox.php";?>
  <?php include_once "../../php/includes/top_nav.php";?>
  <?php include_once "../../php/includes/sidebar_payroll.php";?>
  <div class="container bg_white" style="padding:0;">
    <ul class="bread">
      <li><a href="../" title=""><em><span class="fa fa-tachometer-alt"></span> Dashboard</em></a></li>
      <li><a href="./" title=""><em><span class="fa fa-tachometer-alt"></span> Payroll Dashboard</em></a></li>
      <li class="breadcurrent"><a href="" title=""><em><span class="fa fa-clipboard"></span> NOtice Board</em></a></li>
    </ul>
<!-- Button trigger modal 

  <input type="text" value="<?php echo$_SESSION['USER_ID']; ?>" id="userId">
  <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModalCenter"><span class="fa fa-plus"></span> Apply for Leave  </button>
  <br><br>
-->
    <div class="col-12" id="main"></div>
      <table class="table table-bordered table-hover table-light" style="margin:0 2%;width:96%;">
        <thead>
          <tr>
            <th>Sno</th>
            <th>Date</th>
            <th>Subject</th>
            <th>Notice</th>
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
  <script type="text/javascript" src="../../assets/bootstrap/js/bootstrap.min.js" ></script>
  <script type="text/javascript" src="../../assets/fontawesome/js/all.js"></script>
  <script type="text/javascript" src="../../assets/js/jquery.min.js"></script>
  <script type="text/javascript" src="../../assets/js/main.js"></script>
  <script type="text/javascript">
    showLeaves();
    function showLeaves(){
     // userId=document.getElementById('userId').value
      var values=['show_notice_user'];
      var msg=SendToPhp(values ,"../../php/controllers/payroll.php");
      var obj = JSON.parse(msg);
      var i,tablebody="";

      for (i in obj.Message) {
        tablebody +="<tr>";
        var ashwini=Number(i)+1;
        tablebody+="<td>"+ashwini +"</td>";
        tablebody+="<td>"+obj.Message[i].regDate+"</td>";
        tablebody+="<td>"+obj.Message[i].noticeTitle+"</td>";
        tablebody+="<td>"+obj.Message[i].noticeBody+"</td>";
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
    function cancel_leave(sno){
      var values=['cancel_leave_user',sno];
      var msg=SendToPhp(values ,"../../php/controllers/payroll.php");
      var obj = JSON.parse(msg);
      if( obj.Message[i].status=="Success" )
      {
        showLeaves();
      }
    }
  </script>
</body>
</html>
