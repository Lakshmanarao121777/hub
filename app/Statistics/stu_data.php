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
  .inp{width:50%;}
  .inp .inp {width:50%;height:100%;padding:10px;}
  .inp .inp .inp_name{font-size:20px;}
  .inp .inp .inp_value{font-size:20px;}
  #details{width:90%;margin:auto;}
  th{background:teal;color:white;padding:6px 10px;border-left:0;border-right:0;}
  td{padding:10px;border-left:0;border-right:0;}
  .modal {display: none;position: fixed; /* Stay in place */
    z-index: 5; /* Sit on top */
    left: 0;
    top: 0;width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}
.modal-content {background-color:#fefefe;margin:100px auto;padding:20px;border:1px solid #888;width:80%;}
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
      <li><a href="../" title=""><em><span class="fa fa-tachometer-alt"></span> Dashboard</em></a></li>
      <li><a href="./" title=""><em><span class="fa fa-chart-pie"></span> Statistics</em></a></li>
      <li class="breadcurrent"><a href="" title=""><em><span class="fa fa-paste"></span> Registration Data</em></a></li>
    </ul>
    <br>
    <div class="dash_box">
      <a href="ay0809studata">
        <span class="fa fa-user-secret icon" ></span> <div class="link_text"> AY08-09 <span class="fa fa-arrow-alt-circle-right sm-icon"> </span></div>
      </a>
    </div>
    <div class="dash_box">
      <a href="ay0910studata">
        <span class="fa fa-user-secret icon" ></span> <div class="link_text"> AY09-10 <span class="fa fa-arrow-alt-circle-right sm-icon"> </span></div>
      </a>
    </div>
    <div class="dash_box">
      <a href="ay1011studata">
        <span class="fa fa-user-secret icon" ></span> <div class="link_text"> AY10-11 <span class="fa fa-arrow-alt-circle-right sm-icon"> </span></div>
      </a>
    </div>
    <div class="dash_box">
      <a href="ay1112studata">
        <span class="fa fa-user-secret icon" ></span> <div class="link_text"> AY11-12 <span class="fa fa-arrow-alt-circle-right sm-icon"> </span></div>
      </a>
    </div>
    <div class="dash_box">
      <a href="ay1314studata">
        <span class="fa fa-user-tie icon" ></span> <div class="link_text"> AY13-14 <span class="fa fa-arrow-alt-circle-right sm-icon"> </span></div>
      </a>
    </div>
    <div class="dash_box">
      <a href="ay1415studata">
        <span class="fa fa-user-tie icon" ></span> <div class="link_text"> AY14-15 <span class="fa fa-arrow-alt-circle-right sm-icon"> </span></div>
      </a>
    </div>
    <div class="dash_box">
      <a href="ay1516studata">
        <span class="fa fa-user-tie icon" ></span> <div class="link_text"> AY15-16 <span class="fa fa-arrow-alt-circle-right sm-icon"> </span></div>
      </a>
    </div>
    <div class="dash_box">
      <a href="ay1617studata">
        <span class="fa fa-user-tie icon" ></span> <div class="link_text"> AY16-17 <span class="fa fa-arrow-alt-circle-right sm-icon"> </span></div>
      </a>
    </div>
    <div class="dash_box">
      <a href="ay1718studata">
        <span class="fa fa-user-tie icon" ></span> <div class="link_text"> AY17-18 <span class="fa fa-arrow-alt-circle-right sm-icon"> </span></div>
      </a>
    </div>
    <div class="dash_box">
      <a href="ay1819studata">
        <span class="fa fa-user-tie icon" ></span> <div class="link_text"> AY18-19 <span class="fa fa-arrow-alt-circle-right sm-icon"> </span></div>
      </a>
    </div>
    
    
    
  </div>
  <?php include_once "../../php/includes/footer.php";?>
  <script type="text/javascript" src="../../assets/js/jquery-1.9.1.min.js"></script>
  <script type="text/javascript" src="../../assets/fontawesome/js/all.js"></script>
  <script type="text/javascript" src="../../assets/js/jquery.min.js"></script>
  <script type="text/javascript" src="../../assets/js/main.js"></script>
</body>
</html>
