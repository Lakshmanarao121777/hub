<?php session_start();
if (!$_SESSION) {
    header("Location:../../php/includes/logout.php");
} 
if($_SESSION['USER_TYPE'] !='student'){header("Location:../../php/includes/logout.php");}
  include_once "../../php/config/DBActivityPHP.php";
  $designation = new DBActivityPHP();
  $userId=$_SESSION['USER_ID'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>AIR-HUB :: RGUKT-RKV</title>

  <?php include_once "../../php/meta/meta.php";?>

  <link rel="stylesheet" type="text/css" href="../../assets/bootstrap/css/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="../../assets/fontawesome/css/all.css">
  <link rel="stylesheet" type="text/css" href="../../assets/css/_main.css">
  <link rel="stylesheet" type="text/css" href="../../assets/css/Student.css">
</head>
<style>
fieldset {border: 1px solid #ddd !important;margin-bottom: 30px;min-width: 0; padding: 10px;  position: relative; border-radius: 4px;background-color: #f5f5f5;padding-left: 10px !important;}
legend {font-size: 14px;font-weight: bold;margin-top: -25px;width: 35%;border: 1px solid #ddd;border-radius: 4px;padding: 5px 5px 5px 10px;background-color: #ffffff;color: #D97214;}
.table-bordered>thead>tr th{ border : 1px solid #ffffff; padding: 7px !important;background: #3f51b5;color: #ffffff;text-align: center;}
.table-bordered>thead>tr th,.table-bordered>tbody>tr td{padding: 7px !important;}
.table-striped>tbody>tr:nth-child(odd)>td,.table-striped>tbody>tr:nth-child(odd)>th { background-color: #e8f1fb !important;color: #183f62;}
[color="blue"]{color: #D97214;}
#print-div{padding:10px;}

</style>
<body>
    <?php include_once "../../php/includes/head_logobox.php";?>
    <?php include_once "../../php/includes/top_nav.php";?>
    <?php include_once "../../php/includes/sidebar_Student.php";?>
    <div class="container bg_white" style="padding:0 10px 100px 0;">
    <ul class="bread">
      <li><a href="../" title=""><em><span class="fa fa-tachometer-alt"></span> Dashboard</em></a></li>
      <li><a href="./" title=""><em><span class="fa fa-money-bill-alt"> </span> Scholorship</em></a></li>
      <li class="breadcurrent"><a href="#" title=""><em><span class="fa fa-money-bill-alt"> </span> Challan Details</em></a></li>
    </ul>
        <br>
        <div id="print-div">
            <br>
            <fieldset>
                <font color="blue"><legend>Challan Details</legend> </font>
                <table class="table table-condensed table-bordered table-striped table-responsive">
                  <tbody>
                    <tr>
                      <th></th>
                      <th>Student ID</th>
                      <th>Challan Number</th>
                      <th>Account Of</th>
                      <th>Challan Date</th>
                      <th>Challan Verified On</th>
                      <th>Amount</th>
                      <th>Remarks</th>
                    </tr>
                  </tbody>
                  <tbody id='sclDet'>
                  </tbody>
                </table>
            </fieldset>
        </div>
    </div>
    <?php include_once "../../php/includes/footer.php";?>
    <script type="text/javascript" src="../../assets/js/jquery-1.9.1.min.js"></script>
    <script type="text/javascript" src="../../assets/fontawesome/js/all.js"></script>
    <script type="text/javascript" src="../../assets/js/jquery.min.js"></script>
    <script type="text/javascript" src="../../assets/js/main.js"></script>
    <script type="text/javascript" src="../../assets/js/Student.js"></script>
    <script type="text/javascript">
        getScr('<?php echo $userId ; ?>');
        function getScr(userId){
            var values =['getChaValues',userId];
            var msg=SendToPhp(values,"../../php/controllers/Student_New.php");
            var obj = JSON.parse(msg);
            var i=0,oldadate='',ashu=0;
            if((obj.Message).length != ""){
              for(i in obj.Message){
                ashu= Number(i)+1;
                oldadate += '<tr>';
                oldadate +=   '<td>'+ashu+'</td>';
                oldadate +=   '<td>'+obj.Message[i].userId+'</td>';
                oldadate +=   '<td>'+obj.Message[i].chalanNo+'</td>';
                oldadate +=   '<td>'+obj.Message[i].accountOf+'</td>';
                oldadate +=   '<td>'+obj.Message[i].chalandate+'</td>';
                oldadate +=   '<td>'+obj.Message[i].verifiedDate+'</td>';
                oldadate +=   '<td>'+obj.Message[i].amount+'</td>';
                oldadate +=   '<td>'+obj.Message[i].remarks+'</td>';
                oldadate += '</tr>';
              }
            }
            else{
              oldadate +='<tr><td colspan="6"><center> No Data Found. Please Contact Administrator or concern Department.</center></td></tr>';
            }
            selectionListDisplay('sclDet',oldadate)
        }
    </script>
</body>
</html>
