<?php session_start(); 

?>
<!DOCTYPE html>
<html href="en">
<head>
	<title>R-Hub ::  RGUKT RKV</title>
	<link rel="shortcut icon" type="image/png" id="favicon" href="../../assets/images/logo.png" />
	<link rel="stylesheet" type="text/css" href="../../assets/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../../assets/fontawesome/css/all.css">
    <link rel="stylesheet" type="text/css" href="../../assets/css/_main.css">
    <link rel="stylesheet" type="text/css" href="../../assets/css/payroll.css">
	<?php include_once("../../php/meta/meta.php"); ?>
</head>
<style>
    .sidebar_left{width:20%;}
    .container{left:20%;width:80%;}
    .sidebar_left li.header{font-size:20px;text-transform:uppercase;}
    .shead{font-size:18px;text-decoration:underline;font-weight:800;padding:10px;float:left;width:75%;}
    .name{font-size:30px;font-style:italic;font-weight:bold;padding:10px;color:#80055A;}
    .designation{font-size:18px;font-weight:bold;padding:2px 10px;}
    .profession{font-size:14px;font-weight:bold;padding:2px 10px;}
    .address{font-size:14px;font-weight:bold;padding:2px 10px;}
    .Phone {text-align:right;float:left;width:50%;padding:10px;}
    .Phone .phone_head{width:25%;text-align:right;font-weight:600;float:left;padding:5px;}
    .Phone .phone_head::after{clear:both;}
    .Phone .phone_value{width:55%;text-align:left;min-width:300px;float:left;padding:5px;}
  @media only screen and (max-width: 768px) {
    .Phone {text-align:right;float:left;width:100%;padding:10px;}
    .Phone .phone_head{width:100%;text-align:left;font-weight:600;float:left;padding:5px;}
    .Phone .phone_head::after{clear:both;}
    .Phone .phone_value{width:55%;text-align:left;min-width:300px;float:left;padding:5px;}
  }
</style>
<body>
	<div class="headers">
		<div class="logo-box logo" style="width:100%">
			<img alt="RGUKT-RKV Logo" class="logo" src="../../assets/images/logo.png" style="position:absolute; top:5%; left:10% " title="RGUKT-RKV Logo">
            <a href="" class="logo-text text-center">
                <span class="header0 col-xs-12">Rajiv Gandhi University of Knowledge Technologies</span><br>
                <span class="subtitle hidden-xs hidden-sm" style="font-size:40px;"> IIIT R K Valley :: HUB</span> 
            </a>
        </div>
	</div>
    <?php include_once("../../php/includes/top_nav.php"); ?>
    <div class="sidebar_left hidden-sm hides" >
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header"> Administration </li>
            <li><a href="#" onclick="load('administration')">Administration    </a></li> 
            <li><a href="#" onclick="load('director')">Director Office  </a></li> 
            <li><a href="#" onclick="load('ao')">Administrative Officer Office </a></li> 
            <li><a href="#" onclick="load('da')">Dean of Academics Office </a></li> 
            <li><a href="#" onclick="load('sw')">Students' Welfare </a> </li> 
            <li><a href="#" onclick="load('fo')">Finance Officer Office</a> </li> 
            <li><a href="#" onclick="load('examcell')">Examination Cell</a> </li>       
            <li><a href="#" onclick="load('estd')">Establishment Section </a></li> 
            <li><a href="#" onclick="load('hod')">Staff</a></li> 
            <li><a href="#" onclick="load('it')">IT Infrastructure Office</a> </li>
            <li><a href="#" onclick="load('electrical')">Elctical works Office</a> </li>
            <li><a href="#" onclick="load('civilworks')">civil</a> </li>
            <li><a href="#" onclick="load('mechworks')">mechanical works office</li>
            <li><a href="#" onclick="load('hospital')">Hospital Staff</a> </li> 
            <li><a href="#" onclick="load('cdpc')">Training and Placement </a></li> 
            <li><a href="#" onclick="load('nss')">National Service Scheme </a> </li> 
            <li><a href="#" onclick="load('randd')">Research and Development Cell</a> </li> 
        </ul>
    </div>        
    <div class="container bg_white" id="body_load">
    </div> 
    <div class="footer">
        <div class="vendeor">
            Copyright &copy 2010 Rajiv Gandhi University of Knowledge Technologies, All Rights Reserved
        </div>
        <div class="designer">
            Designed and Developed By <a href="#"><b><u>Software Development Cell </u> </b> </a>. Version : V2.0.1
        </div>
    </div>
	<script type="text/javascript" src="../../assets/js/jquery-1.9.1.min.js"></script>
	<script type="text/javascript" src="../../assets/fontawesome/js/all.js"></script>
	<script type="text/javascript" src="../../assets/js/jquery.min.js"></script>
    <script type="text/javascript" src="../../assets/js/main.js"></script>
    <script>
        load('director');
    function load(pagename)
    {
        $('#body_load').load(pagename);
    }
    </script>
</body>
</html>
