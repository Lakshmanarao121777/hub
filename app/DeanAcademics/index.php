<?php session_start(); 
if(!$_SESSION){
  header("Location:../../php/includes/logout.php");
}
else
{
  if($_SESSION['USER_TYPE']!="employee"){
    header("Location:../../php/includes/logout.php");
  }
}
$designation=$_SESSION['USER_DESIGNATION'];
$uid=$_SESSION['USER_ID'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>AIR-HUB :: RGUKT-RKV</title>
  
  <?php include_once("../../php/meta/meta.php"); ?>

  <link rel="stylesheet" type="text/css" href="../../assets/bootstrap/css/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="../../assets/fontawesome/css/all.css">
  <link rel="stylesheet" type="text/css" href="../../assets/fontawesome/css/fontawesome.css">
  <link rel="stylesheet" type="text/css" href="../../assets/css/_main.css">
  <link rel="stylesheet" type="text/css" href="../../assets/css/DA.css">
</head>
<body>
  <?php include_once("../../php/includes/head_logobox.php"); ?>
  <?php include_once("../../php/includes/top_nav.php"); ?>
  <?php include_once("../../php/includes/sidebar_DeanAcadamices.php"); ?>
  <div class="container bg_white"><style type="text/css">
table,th,td{border:1px solid gray;}
th{padding:10px;text-align:center;text-transform: uppercase;}
td{text-align:center;padding:5px;}
form{width:100%;float: left;}
.inp{padding:10px;float: left;width: 50%;font-size:18px;}
select{width:60%;padding:10px;font-size: 18px;}
</style>
    <div class="dash_box">
      <a href="registrations"> 
        <span class="fa fa-pencil-alt icon" ></span> <div class="link_text">  Registrations  <span class="fa fa-arrow-alt-circle-right sm-icon"> </span></div>
      </a>
     </div>
     <div class="dash_box">
      <a href="students"> 
        <span class="fa fa-users icon" ></span> <div class="link_text"> Students <span class="fa fa-arrow-alt-circle-right sm-icon"> </span></div>
      </a>
     </div>
    <div class="dash_box">
      <a href="updatesoon"> 
        <span class="fa fa-user-secret icon" ></span> <div class="link_text"> Faculty <span class="fa fa-arrow-alt-circle-right sm-icon"> </span></div>
      </a>
     </div>
    <div class="dash_box">
      <a href="updatesoon"> 
        <span class="fa fa-users icon" ></span> <div class="link_text"> Staff <span class="fa fa-arrow-alt-circle-right sm-icon"> </span></div>
      </a>
     </div>
    <div class="dash_box">
      <a href="updatesoon"> 
        <span class="fa fa-chart-pie icon" ></span> <div class="link_text"> Results <span class="fa fa-arrow-alt-circle-right sm-icon"> </span></div>
      </a>
     </div>
     <div class="dash_box">
      <a href="updatesoon"> 
        <span class="fa fa-user icon" ></span> <div class="link_text"> Profile <span class="fa fa-arrow-alt-circle-right sm-icon"> </span></div>
      </a>
     </div>
     <div class="dash_box">
      <a href="updatesoon"> 
        <span class="fa fa-calendar-alt icon" ></span> <div class="link_text"> Attendance <span class="fa fa-arrow-alt-circle-right sm-icon"> </span></div>
      </a>
     </div>
     <div class="dash_box">
      <a href="updatesoon"> 
        <span class="fa fa-headphones icon" ></span> <div class="link_text"> Grievance <span class="fa fa-arrow-alt-circle-right sm-icon"> </span></div>
      </a>
     </div>
     <div class="dash_box">
      <a href="updatesoon"> 
        <span class="fa fa-book icon" ></span> <div class="link_text"> Study Circle <span class="fa fa-arrow-alt-circle-right sm-icon"> </span></div>
      </a>
     </div>
     <div class="dash_box">
      <a href="updatesoon"> 
        <span class="fa fa-book icon" ></span> <div class="link_text"> Leaves <span class="fa fa-arrow-alt-circle-right sm-icon"> </span></div>
      </a>
     </div>
     <div class="dash_box">
      <a href="updatesoon"> 
        <span class="fa fa-envelope icon" ></span> <div class="link_text"> AIR-Mail <span class="fa fa-arrow-alt-circle-right sm-icon"> </span></div>
      </a>
     </div>
     <div class="dash_box">
      <a href="updatesoon"> 
        <span class="fa fa-comments icon" ></span> <div class="link_text"> Discussions <span class="fa fa-arrow-alt-circle-right sm-icon"> </span></div>
      </a>
     </div>
     <div class="dash_box">
      <a href="updatesoon"> 
        <span class="fa fa-paragraph icon" ></span> <div class="link_text"> NoticeBoard <span class="fa fa-arrow-alt-circle-right sm-icon"> </span></div>
      </a>
     </div>
     <div class="dash_box">
      <a href="updatesoon"> 
        <span class="fa fa-money-bill-wave icon" ></span> <div class="link_text"> Due Clearance <span class="fa fa-arrow-alt-circle-right sm-icon"> </span></div>
      </a>
     </div>
     <div class="dash_box">
      <a href="updatesoon"> 
        <span class="fa fa-flask icon" ></span> <div class="link_text"> Projects <span class="fa fa-arrow-alt-circle-right sm-icon"> </span></div>
      </a>
     </div>
     <div class="dash_box">
      <a href="updatesoon"> 
        <span class="fa fa-arrow-alt-circle-right icon" ></span> <div class="link_text"> Others <span class="fa fa-arrow-alt-circle-right sm-icon"> </span></div>
      </a>
     </div>
      
    
  </div>
  <?php include_once("../../php/includes/footer.php"); ?>
  <script type="text/javascript" src="../../assets/js/jquery-1.9.1.min.js"></script>
  <script type="text/javascript" src="../../assets/fontawesome/js/all.js"></script>
  <script type="text/javascript" src="../../assets/fontawesome/js/fontawesome.js"></script>
  <script type="text/javascript" src="../../assets/js/jquery.min.js"></script>
  <script type="text/javascript" src="../../assets/js/main.js"></script>
  
</body>
</html>