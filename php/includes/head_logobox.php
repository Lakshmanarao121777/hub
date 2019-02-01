
<style type="text/css">
.preloader{ 
display: block; 
position: fixed; 
top: 0; 
left: 0; 
right: 0; 
bottom: 0; 
background: rgba(0,0,0,.6); 
text-indent: -9000px; 
z-index: 9000000; 
}
.preloader::before {
content: '';
height: 40px;
width: 40px;
position: absolute;
left: 50%; 
top: 50%; 
margin-top: -20px;
margin-left: -20px;
-webkit-animation: rotation .6s infinite linear;
-moz-animation: rotation .6s infinite linear;
-o-animation: rotation .6s infinite linear;
animation: rotation .6s infinite linear;
border-left: 6px solid rgba(255, 255, 255, .15);
border-right: 6px solid rgba(255, 255, 255, .15);
border-bottom: 6px solid rgba(255, 255, 255, .15);
border-top: 6px solid rgba(255, 255, 255, .8);
border-radius: 100%;
-webkit-box-sizing: border-box; 
-moz-box-sizing: border-box; 
box-sizing: border-box;
}
@-webkit-keyframes rotation { from { -webkit-transform: rotate(0deg); } to { -webkit-transform: rotate(359deg); } }
@-moz-keyframes rotation { from { -moz-transform: rotate(0deg); } to { -moz-transform: rotate(359deg); } }
@-o-keyframes rotation { from { -o-transform: rotate(0deg); } to { -o-transform: rotate(359deg); } }


</style>
<!--<div class="preloader" id="preloader">Loading...</div>-->
<div class="headers">
		<div class="logo-box logo" style="width:100%">
			<img alt="RGUKT-RKV Logo" class="logo" src="../../assets/images/logo.png" style="position:absolute; top:5%; left:10% " title="RGUKT-RKV Logo">
            <a href="" class="logo-text text-center">
				<span class="header0">Rajiv Gandhi University of Knowledge Technologies</span>
                <br>
                <span class="subtitle hidden-xs hidden-sm" style="font-size:40px;"> IIIT R K Valley :: HUB</span> 
			</a>
        </div>
	</div>
<?php
if($_SESSION){
    if(time() - $_SESSION['loggedAt'] > 9000) { 
        echo"<script>alert('Your are logged out');window.location.href='../../php/includes/logout.php';</script>";
        exit;
    } else {
        $_SESSION['loggedAt'] = time();
    }
}

if(file_exists("../../users/".$_SESSION['USER_ID']."/".$_SESSION['USER_ID']."_icon.png") ){
    $link="../../users/".$_SESSION['USER_ID']."/".$_SESSION['USER_ID']."_icon.png";
}else{
    if ($_SERVER['SERVER_NAME'] == 'localhost' || $_SERVER['SERVER_NAME'] == '10.29.22.252') {
        $link="http://10.50.50.56/Registrations/upload/".$_SESSION['USER_ID']."/".$_SESSION['USER_ID'].".jpg";
    } else if ($_SERVER['SERVER_NAME'] == '10.50.50.56' || $_SERVER['SERVER_NAME'] == '10.29.22.253') {
        $link="http://10.50.50.56/Registrations/upload/".$_SESSION['USER_ID']."/".$_SESSION['USER_ID'].".jpg";
    }
    else $link="http://210.212.217.208/Registrations/upload/".$_SESSION['USER_ID']."/".$_SESSION['USER_ID'].".jpg";
}
?>