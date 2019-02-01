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
<style type="text/css">
 #CH_ENGG-1_reg, #CH_ENGG-2_reg, #CH_ENGG-3_reg, #CH_ENGG-4_reg,
 #CS_ENGG-1_reg, #CS_ENGG-2_reg, #CS_ENGG-3_reg, #CS_ENGG-4_reg,
 #CE_ENGG-1_reg, #CE_ENGG-2_reg, #CE_ENGG-3_reg, #CE_ENGG-4_reg,
 #EC_ENGG-1_reg ,#EC_ENGG-2_reg ,#EC_ENGG-3_reg ,#EC_ENGG-4_reg,
 #ME_ENGG-1_reg ,#ME_ENGG-2_reg ,#ME_ENGG-3_reg ,#ME_ENGG-4_reg ,
 #MM_ENGG-1_reg ,#MM_ENGG-2_reg ,#MM_ENGG-3_reg, #MM_ENGG-4_reg{background:green;color:white;}
 #CH_ENGG-1_all, #CH_ENGG-2_all, #CH_ENGG-3_all, #CH_ENGG-4_all,
 #CS_ENGG-1_all, #CS_ENGG-2_all, #CS_ENGG-3_all, #CS_ENGG-4_all,
 #CE_ENGG-1_all, #CE_ENGG-2_all, #CE_ENGG-3_all, #CE_ENGG-4_all,
 #EC_ENGG-1_all ,#EC_ENGG-2_all ,#EC_ENGG-3_all ,#EC_ENGG-4_all,
 #ME_ENGG-1_all ,#ME_ENGG-2_all ,#ME_ENGG-3_all ,#ME_ENGG-4_all ,
 #MM_ENGG-1_all ,#MM_ENGG-2_all ,#MM_ENGG-3_all, #MM_ENGG-4_all{background:blue;color:white;}
 #CH_ENGG-1_un, #CH_ENGG-2_un, #CH_ENGG-3_un, #CH_ENGG-4_un,
 #CS_ENGG-1_un, #CS_ENGG-2_un, #CS_ENGG-3_un, #CS_ENGG-4_un,
 #CE_ENGG-1_un, #CE_ENGG-2_un, #CE_ENGG-3_un, #CE_ENGG-4_un,
 #EC_ENGG-1_un ,#EC_ENGG-2_un ,#EC_ENGG-3_un ,#EC_ENGG-4_un,
 #ME_ENGG-1_un ,#ME_ENGG-2_un ,#ME_ENGG-3_un ,#ME_ENGG-4_un ,
 #MM_ENGG-1_un ,#MM_ENGG-2_un ,#MM_ENGG-3_un, #MM_ENGG-4_un{background:red;color:white;}
table,th,td{border:1px solid gray;}
th{padding:10px;text-align:center;text-transform: uppercase;}
td{text-align:center;padding:5px;}
form{width:100%;float: left;}
select,input{width:60%;padding:10px;font-size: 18px;}
</style>
  <link rel="stylesheet" type="text/css" href="../../assets/bootstrap/css/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="../../assets/fontawesome/css/all.css">
  <link rel="stylesheet" type="text/css" href="../../assets/fontawesome/css/fontawesome.css">
  <link rel="stylesheet" type="text/css" href="../../assets/css/_main.css">
  <link rel="stylesheet" type="text/css" href="../../assets/css/DA.css">
</head>
<body>
  <?php include_once "../../php/includes/head_logobox.php";?>
  <?php include_once "../../php/includes/top_nav.php";?>
  <?php include_once "../../php/includes/sidebar_DeanAcadamices.php";?>
  <div class="container bg_white">
    <div class="clear"></div>
     <hr></hr>
     <table>
      <tr>
         <td>Dept</td>
         <td colspan="3">CH</td>
         <td colspan="3">CE</td>
         <td colspan="3">CS</td>
         <td colspan="3">EC</td>
         <td colspan="3">ME</td>
         <td colspan="3">MM</td>
       </tr>
       <tr>
         <td>Year</td>
         <td>Total</td><td>Registred</td><td>not-registred</td>
         <td>Total</td><td>Registred</td><td>not-registred</td>
         <td>Total</td><td>Registred</td><td>not-registred</td>
         <td>Total</td><td>Registred</td><td>not-registred</td>
         <td>Total</td><td>Registred</td><td>not-registred</td>
         <td>Total</td><td>Registred</td><td>not-registred</td>
       </tr>
       <tr>
         <td>E1</td>
         <td id="CH_ENGG-1_all"></td>
         <td id="CH_ENGG-1_reg"></td>
         <td id="CH_ENGG-1_un"></td>
         <td id="CE_ENGG-1_all"></td>
         <td id="CE_ENGG-1_reg"></td>
         <td id="CE_ENGG-1_un"></td>
         <td id="CS_ENGG-1_all"></td>
         <td id="CS_ENGG-1_reg"></td>
         <td id="CS_ENGG-1_un"></td>
         <td id="EC_ENGG-1_all"></td>
         <td id="EC_ENGG-1_reg"></td>
         <td id="EC_ENGG-1_un"></td>
         <td id="ME_ENGG-1_all"></td>
         <td id="ME_ENGG-1_reg"></td>
         <td id="ME_ENGG-1_un"></td>
         <td id="MM_ENGG-1_all"></td>
         <td id="MM_ENGG-1_reg"></td>
         <td id="MM_ENGG-1_un"></td>
       </tr>
       <tr>
         <td>E2</td>
         <td id="CH_ENGG-2_all"></td>
         <td id="CH_ENGG-2_reg"></td>
         <td id="CH_ENGG-2_un"></td>
         <td id="CE_ENGG-2_all"></td>
         <td id="CE_ENGG-2_reg"></td>
         <td id="CE_ENGG-2_un"></td>
         <td id="CS_ENGG-2_all"></td>
         <td id="CS_ENGG-2_reg"></td>
         <td id="CS_ENGG-2_un"></td>
         <td id="EC_ENGG-2_all"></td>
         <td id="EC_ENGG-2_reg"></td>
         <td id="EC_ENGG-2_un"></td>
         <td id="ME_ENGG-2_all"></td>
         <td id="ME_ENGG-2_reg"></td>
         <td id="ME_ENGG-2_un"></td>
         <td id="MM_ENGG-2_all"></td>
         <td id="MM_ENGG-2_reg"></td>
         <td id="MM_ENGG-2_un"></td>
       </tr>
       <tr>
         <td>E3</td>
         <td id="CH_ENGG-3_all"></td>
         <td id="CH_ENGG-3_reg"></td>
         <td id="CH_ENGG-3_un"></td>
         <td id="CE_ENGG-3_all"></td>
         <td id="CE_ENGG-3_reg"></td>
         <td id="CE_ENGG-3_un"></td>
         <td id="CS_ENGG-3_all"></td>
         <td id="CS_ENGG-3_reg"></td>
         <td id="CS_ENGG-3_un"></td>
         <td id="EC_ENGG-3_all"></td>
         <td id="EC_ENGG-3_reg"></td>
         <td id="EC_ENGG-3_un"></td>
         <td id="ME_ENGG-3_all"></td>
         <td id="ME_ENGG-3_reg"></td>
         <td id="ME_ENGG-3_un"></td>
         <td id="MM_ENGG-3_all"></td>
         <td id="MM_ENGG-3_reg"></td>
         <td id="MM_ENGG-3_un"></td>
       </tr>
       <tr>
         <td>E4</td>
         <td id="CH_ENGG-4_all"></td>
         <td id="CH_ENGG-4_reg"></td>
         <td id="CH_ENGG-4_un"></td>
         <td id="CE_ENGG-4_all"></td>
         <td id="CE_ENGG-4_reg"></td>
         <td id="CE_ENGG-4_un"></td>
         <td id="CS_ENGG-4_all"></td>
         <td id="CS_ENGG-4_reg"></td>
         <td id="CS_ENGG-4_un"></td>
         <td id="EC_ENGG-4_all"></td>
         <td id="EC_ENGG-4_reg"></td>
         <td id="EC_ENGG-4_un"></td>
         <td id="ME_ENGG-4_all"></td>
         <td id="ME_ENGG-4_reg"></td>
         <td id="ME_ENGG-4_un"></td>
         <td id="MM_ENGG-4_all"></td>
         <td id="MM_ENGG-4_reg"></td>
         <td id="MM_ENGG-4_un"></td>
        </tr>
     </table>
     <div class="clear"></div>
     <hr></hr>
    <div class="bg_white" style="width:100%;padding:10px;float: left;">
      <form action="" method="post" name="showdatalist">
        <div class="inp">
          Select Year :
          <select name="Selectyear" onchange="showCounting()">
            <option value="">All</option>
            <option value="ENGG-1">Engg-1</option>
            <option value="ENGG-2">Engg-2</option>
            <option value="ENGG-3">Engg-3</option>
            <option value="ENGG-4">Engg-4</option>
          </select>
        </div>
        <div class="inp">
          Select Branch :
          <select name="selectBranch" onchange="showCounting()">
            <option value="">All</option>
            <option value="EC">Chemical</option>
            <option value="CS">CSE</option>
            <option value="CE">Civil</option>
            <option value="EC">ECE</option>
            <option value="ME">Mech</option>
            <option value="MM">MME</option>
          </select>
        </div>
      </form>
  </div>
  <div class="clear"></div>
     <hr></hr>
    <div class="col-12 bg_white list" id="lists">
    </div>
  </div>
  <?php include_once "../../php/includes/footer.php";?>
  <script type="text/javascript" src="../../assets/js/jquery-1.9.1.min.js"></script>
  <script type="text/javascript" src="../../assets/fontawesome/js/all.js"></script>
  <script type="text/javascript" src="../../assets/fontawesome/js/fontawesome.js"></script>
  <script type="text/javascript" src="../../assets/js/jquery.min.js"></script>
  <script type="text/javascript" src="../../assets/js/main.js"></script>
  <script type="text/javascript">
fill_boxes();
function fill_boxes(){
  var branch=['CH','CE','CS','EC','ME','MM'];
  for(var i=0;i<branch.length;i++){
    c_total('ENGG-1','all',branch[i]);
    c_total('ENGG-1','reg',branch[i]);
    c_total('ENGG-1','un',branch[i]);

    c_total('ENGG-2','all',branch[i]);
    c_total('ENGG-2','reg',branch[i]);
    c_total('ENGG-2','un',branch[i]);

    c_total('ENGG-3','all',branch[i]);
    c_total('ENGG-3','reg',branch[i]);
    c_total('ENGG-3','un',branch[i]);

    c_total('ENGG-4','all',branch[i]);
    c_total('ENGG-4','reg',branch[i]);
    c_total('ENGG-4','un',branch[i]);
  }
}
function c_total(year,type,branch){
  var showid=branch+"_"+year+"_"+type;
  var values =['count_da_table',year,branch,type];
  var msg=SendToPhp(values,"../../php/controllers/DeanAcademics.php");
  selectionListDisplay(showid,msg);
}
function showCounting()
{
  var year    = document.forms['showdatalist']['Selectyear'].value;
  var branch   = document.forms['showdatalist']['selectBranch'].value;
  var values =['regshowdata',year,branch];
  var msg=SendToPhp(values,"../../php/controllers/DeanAcademics.php");
  selectionListDisplay("lists",msg);
}
  </script>
</body>
</html>