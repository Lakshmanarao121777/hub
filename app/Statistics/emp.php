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
      <li class="breadcurrent"><a href="" title=""><em><span class="fa fa-chart-pie"></span> Statistics</em></a></li>
    </ul>
    <br>
    <div class="dash_box">
      <a href="sem">
        <span class="fa fa-university icon" ></span> <div class="link_text"> Semister Data <span class="fa fa-arrow-alt-circle-right sm-icon"> </span></div>
      </a>
    </div>
    <div class="dash_box">
      <a href="stu_data">
        <span class="fa fa-user icon" ></span> <div class="link_text"> Students Data <span class="fa fa-arrow-alt-circle-right sm-icon"> </span></div>
      </a>
    </div>
    <div class="dash_box">
      <a href="faculty">
        <span class="fa fa-user-tie icon" ></span> <div class="link_text"> Employee Data <span class="fa fa-arrow-alt-circle-right sm-icon"> </span></div>
      </a>
    </div>
    <div class="dash_box">
      <a href="otpass">
        <span class="fa fa-sign-out-alt icon" ></span> <div class="link_text"> Outpass Data <span class="fa fa-arrow-alt-circle-right sm-icon"> </span></div>
      </a>
    </div>
    <div class="dash_box">
      <a href="mess">
        <span class="fa fa-hotel icon" ></span> <div class="link_text"> Mess Data <span class="fa fa-arrow-alt-circle-right sm-icon"> </span></div>
      </a>
    </div>
    <div class="dash_box">
      <a href="attendance">
        <span class="fa fa-calendar-alt icon" ></span> <div class="link_text"> Attendance Data <span class="fa fa-arrow-alt-circle-right sm-icon"> </span></div>
      </a>
    </div>
    <div class="dash_box">
      <a href="hostel">
        <span class="fa fa-hotel icon" ></span> <div class="link_text"> Hostel Data <span class="fa fa-arrow-alt-circle-right sm-icon"> </span></div>
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
