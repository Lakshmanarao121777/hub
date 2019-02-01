<style type="text/css">
	.c{font-size:22px;cursor:pointer;color:white;padding:5px 10px;border:1px solid white;border-radius:5px;width:60px;box-sizing:border-box;position:relative;}
	.topnav_menu{width:100%;font-size:16px;float:right;height:40px;font-weight:400;}
	.topnav_menu ul{float:right;height:30px;}
	.topnav_menu ul li{display:inline-block;float:right;}
	.topnav_menu ul li a{color: #ffffff;float:right;padding:8px 15px;text-decoration:none;}
	.topnav_menu ul li a:hover{background:#006060;text-decoration:none;border-bottom:2px solid green;}
	.topnav_menu ul li:first-child{padding-right:100px;}
</style>
<div class="top_nav">
	<?php if($_SESSION){ ?>
		<div class="hides-md" style="float: left;margin:4px;" id="sidenavsss">
			<span class="c" onclick="openSideNav()"> Menu &#9776; </span>
		</div> <?php

	} ?>
	<div class="hides-md"style="float: right;margin:4px;" id="topnavsss">
		<span class="c" class="" onclick="openTopNav()"> &#9776; </span>
	</div>
	<div class="topnav_menu hidden-sm">
		<ul>
			<li><a href="#"><span class="fa fa-headset"></span> Contact Us</a>	</li>
			<li><a href="#"><span class="fa fa-info-circle"></span> About Us</a>	</li>
			<li><a href="http://hub.rguktrkv.org/app/About"><span class="fa fa-user-tie"></span> Administration</a>	</li>
			<li><a href="http://hub.rguktrkv.org/app"><span class="fa fa-home"></span> Home</a>	</li>
		</ul>
	</div>
</div>
