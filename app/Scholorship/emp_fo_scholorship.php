<?php session_start();
if (!$_SESSION) {
    header("Location:../../php/includes/logout.php");
} 
if($_SESSION['USER_TYPE'] !='employee'){header("Location:../../php/includes/logout.php");}
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
    <?php include_once "../../php/includes/sidebar_employee.php";?>
    <div class="container bg_white" style="padding:0 10px 100px 0;">
    <ul class="bread">
      <li><a href="../" title=""><em><span class="fa fa-tachometer-alt"></span> Dashboard</em></a></li>
      <li><a href="./" title=""><em><span class="fa fa-money-bill-alt"> </span> Scholorship</em></a></li>
      <li class="breadcurrent"><a href="#" title=""><em><span class="fa fa-money-bill-alt"> </span> Scholorship Details</em></a></li>
    </ul>
        <br>
        <div id="print-div">
            <table class="noborder" style="background-color: white;" width="100%">
                <tbody>
                    <tr class="noborder">
                        <td class="noborder"><img src="../../assets/images/logo.png" alt="AP IIIT RAJIV KNOWLEDGE VALLEY (IDUPULAPAYA) LOGO" height="100" width="100">
                        </td>
                        <td class="noborder"><img src="../../assets/images/jnb_logo.png" alt="AP IIIT RAJIV KNOWLEDGE VALLEY (IDUPULAPAYA) LOGO" height="100" width="100">
                        </td>
                        <td class="noborder"><img src="../../assets/images/ap_gov_logo.jpeg" alt="AP IIIT RAJIV KNOWLEDGE VALLEY (IDUPULAPAYA) LOGO" height="100" width="100">
                        <td class="noborder"><img src="../../assets/images/tg_gov_logo.jpeg" alt="AP IIIT RAJIV KNOWLEDGE VALLEY (IDUPULAPAYA) LOGO" height="100" width="100">
                        </td>
                        <td class="noborder"><img src="../../users/<?php echo$userId.'/'.$userId.'_icon.png';?>" alt="<?php echo $userId; ?>" height="100" width="100">
                        </td>
                    </tr>
                </tbody>
            </table>
            <br>
            <fieldset>
                <font color="blue"><legend>Scholarship History (ePASS)</legend> </font>
                <table class="table table-condensed table-bordered table-striped table-responsive">
                  <tbody>
                    <tr>
                      <th></th>
                      <th>Student ID</th>
                      <th>Application ID</th>
                      <th>College</th>
                      <th>Course/Year</th>
                      <th>Amount Released(MTF/RTF)</th>
                    </tr>
                  </tbody>
                  <tbody id='sclDet'>
                  </tbody>
                </table>
            </fieldset>
            <fieldset>
                <font color="blue"><legend>Scholarship Due Details</legend> </font>
                <table class="table table-condensed table-bordered table-striped table-responsive">
                    <tbody>
                        <tr>
                          <th></th>
                          <th>Student ID</th>
                          <th>Student Name</th>
                          <th>Application ID</th>
                          <th>Year</th>
                          <th>Total Fee </th>
                          <th>Amount Released</th>
                          <th>Amount Pending</th>
                          <th>Amount Paid</th>
                          <th>Amount Due</th>
                        </tr>
                      </tbody>
                      <tbody id='getScrSec'>
                        <tr>
                            <td>R121777</td>
                            <td>KURAPATI LAKSHMANRAO</td>
                            <td>201205152930</td>
                            <td>1<sup>st</sup> year</td>
                            <td>36000</td>
                            <td>30956</td>
                            <td>0 </td>
                            <td>5044 </td>
                        </tr>
                        
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
        getScrSec('<?php echo $userId ; ?>');
        function getColValuess(table,userIds,col){
            wheresql =" userId='"+userIds+"' ";
            var values=["get_col_value",table,wheresql,col];
            var msg=SendToPhp(values,"../../php/controllers/Student_New.php");
            return msg;
        }
        function getrowSum(table,userIds,col){
            wheresql =" userId='"+userIds+"' and accountOf='Tution/Hostel Fee' ";
            var values=["get_col_valueSum",table,wheresql];
            var msg=SendToPhp(values,"../../php/controllers/Student_New.php");
            var obj=JSON.parse(msg);
            var i=0;var obd=0;for(i in obj.Message){obd +=Number(obj.Message[i].amount);}
            return obd;
        }
        function getScr(userId){
            var values =['getSclValues',userId];
            var msg=SendToPhp(values,"../../php/controllers/Student_New.php");
            var obj = JSON.parse(msg);
            var i=0,oldadate='',ashu=0;
            if((obj.Message).length != ""){
              for(i in obj.Message){
                ashu= Number(i)+1;
                oldadate += '<tr>';
                oldadate +=   '<td>'+ashu+'</td>';
                oldadate +=   '<td>'+obj.Message[i].userId+'</td>';
                oldadate +=   '<td>'+obj.Message[i].applicationId+'</td>';
                oldadate +=   '<td> AP IIIT RAJIV KNOWLEDGE VALLEY (IDUPULAPAYA)</td>';
                oldadate +=   '<td>B.TECH (INTEGRATED-6Yrs)/ '+ashu+' Yr</td>';
                oldadate +=   '<td>'+obj.Message[i].mtf+'  /'+obj.Message[i].rtf+' </td>';
                oldadate += '</tr>';
              }
            }
            else{
              oldadate +='<tr><td colspan="6"><center> No Data Found. Please Contact Administrator or concern Department.</center></td></tr>';
            }
            selectionListDisplay('sclDet',oldadate)
        }
        function getScrSec(userId){
            var values =['getSclValues',userId];
            var msg=SendToPhp(values,"../../php/controllers/Student_New.php");
            var obj = JSON.parse(msg);
            var i=0,oldadate='',ashu=0;
            len=(obj.Message).length;
            var paid=getrowSum("students_chalan","<?php echo $userId; ?>","amount");
            if((obj.Message).length != ""){
              fee=[36000,36000,40000,40000,40000,40000];
              for(i in obj.Message){
                ashu= Number(i)+1;
                oldadate += '<tr>';
                oldadate +=   '<td>'+ashu+'</td>';
                oldadate +=   '<td>'+obj.Message[i].userId+'</td>';
                oldadate +=   '<td>'+obj.Message[i].userId+'</td>';
                oldadate +=   '<td>'+obj.Message[i].applicationId+'</td>';
                oldadate +=   '<td>'+ashu+' Yr</td>';
                oldadate +=   '<td>'+fee[i]+'</td>';
                var amtReleased =parseFloat(obj.Message[i].mtf)+parseFloat(obj.Message[i].rtf);
                amtReleased=Math.round(amtReleased*100)/100;
                oldadate +=   '<td>'+amtReleased+' </td>';
                var due =fee[i]-amtReleased;
                oldadate +=   '<td>'+Math.round(due*100)/100+' </td>';
                if(paid >= due ){
                  oldadate +=   '<td>'+Math.round(due*100)/100+' </td>';
                }
                else{
                  oldadate +=   '<td>'+Math.round(paid*100)/100+' </td>';
                }
                
                var pend = due-paid;
                if(len >= ashu+1){
                  if(paid>pend){
                    if(pend<0){
                      oldadate +=   '<td> 0 </td>';
                    }
                    else{
                      oldadate +=   '<td> '+Math.round(pend*100)/100+' </td>';
                    }
                  }
                  else{
                    if(pend<0){
                      oldadate +=   '<td> 0 </td>';
                    }
                    else{
                      oldadate +=   '<td> '+Math.round(pend*100)/100+' </td>';
                    }
                  }
                }
                else{
                  oldadate +=   '<td>'+Math.round(pend*100)/100+' </td>';
                }

                if(pend < 0){paid=Math.round(-pend*100)/100;}
                else{
                  if(due>0)paid=0;
                  else{paid=Math.round(pend*100)/100;}
                }
                oldadate += '</tr>';
              }
            }
            else{
              oldadate +='<tr><td colspan="10"><center> No Data Found. Please Contact Administrator or concern Department.</center></td></tr>';
            }
            selectionListDisplay('getScrSec',oldadate)
        }
    </script>
</body>
</html>
