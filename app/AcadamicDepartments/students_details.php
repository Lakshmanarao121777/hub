<?php session_start();
if($_GET['userId']){

if(!$_SESSION){
  header("Location:../../php/includes/logout.php");
}
else
{
	if($_SESSION['USER_TYPE']!="employee"){
		header("Location:../../php/includes/logout.php");
	}
	$stuIds=$_GET['userId'];
}
?> 

<style type="text/css">
.container ul{width:100%;margin: 0;float: left;}
.container ul>li {display: inline;float: left;margin:0 0 0 3px;}
.container ul>li a.tablinks{padding:5px 15px;font-size:16px;float: left;margin: 0;border:1px solid rgba(0,0,0,0.3);border-radius: 10px 10px 0 0;min-width:150px;color:rgba(0,0,0,0.9);text-decoration: none;}
.container ul>li:hover{background:rgba(0,0,0,0.2);color:rgba(0,0,0,.7);border-radius:10px 10px 0 0;}
.tabcontents{width:100%;border:1px solid gray;float: left;padding:10px;}
.active_tab_top{font-size:180px;border-bottom:2px solid green;border-radius: 10px 10px 0 0;background:rgba(0,0,0,0.05);color:rgba(0,0,0,.7);border:0;}
.inp_value input[type="text"]{max-width:90%;}
.inp_value input[type="date"]{max-width:90%;}
fieldset{width:50%;float:left;}
.inp_name{text-align: left;}
@media only screen and (max-width: 768px) { 
	fieldset{width:100%;}
	legend{min-width:100%;margin:0;}
	.inp{width:100%;float: left;}
	.inp .inp_name{width:100%;text-align: left;height: 100%;font-weight: 600;}
	.inp .inp_value{width:100%;float: left;height: 100%;font-size:15px;}
	.inp_value input[type="text"]{max-width:90%;}
	.inp_value input[type="date"]{max-width:90%;}
	.br{border-bottom:1px solid gray;}
	.container ul>li a.tablinks{padding:5px 10px;font-size:14px;border-radius: 10px 10px 0 0;min-width:50%;}
}
}

</style>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>AIR-HUB :: RGUKT-RKV</title>
  
  <?php include_once("../../php/meta/meta.php"); ?>

  <link rel="stylesheet" type="text/css" href="../../assets/bootstrap/css/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="../../assets/fontawesome/css/all.css">
  <link rel="stylesheet" type="text/css" href="../../assets/css/_main.css">
  <link rel="stylesheet" type="text/css" href="../../assets/css/Student.css">
</head>
<body>
  <?php include_once("../../php/includes/head_logobox.php"); ?>
  <?php include_once("../../php/includes/top_nav.php"); ?>
  <?php include_once("../../php/includes/sidebar_Student.php"); ?>
  <div class="container bg_white">
<br>
  	<ul class="tab">
		<li><a href="#Personal" class="tablinks" onclick="openprofile(event,'Personal');return false;"> Personal </a></li>
		<li><a href="#Acadamic" class="tablinks" onclick="openprofile(event,'Acadamic');return false;" id="defaultOpen">Acadamic </a></li>
		<li><a href="#Misc" class="tablinks" onclick=" openprofile(event,'Misc');return false;">Misc/Achivements </a></li>
	</ul>
	<div id="Personal" class="tabcontents"></div>
	<div id="Acadamic" class="tabcontents"></div>
	<div id="Misc" class="tabcontents"></div>


  </div>
  <?php include_once("../../php/includes/footer.php"); ?>
  <script type="text/javascript" src="../../assets/js/jquery-1.9.1.min.js"></script>
  <script type="text/javascript" src="../../assets/fontawesome/js/all.js"></script>
  <script type="text/javascript" src="../../assets/fontawesome/js/fontawesome.js"></script>
  <script type="text/javascript" src="../../assets/js/jquery.min.js"></script>
  <script type="text/javascript" src="../../assets/js/main.js"></script>
  <script type="text/javascript" src="../../assets/js/Student.js"></script>
  <script type="text/javascript">
		function openprofile(evt,cityName) {
		    var i, tabcontent, tablinks;
		    tabcontent = document.getElementsByClassName("tabcontents");
		    for (i = 0; i < tabcontent.length; i++) {
		        tabcontent[i].style.display = "none";
		    }
		    tablinks = document.getElementsByClassName("tablinks");
		    for (i = 0; i < tablinks.length; i++) {
		        tablinks[i].className = tablinks[i].className.replace(" active_tab_top", "");
		    }
		    document.getElementById(cityName).style.display = "block";
		    evt.currentTarget.className += " active_tab_top";
		} 
		document.getElementById("defaultOpen").click();

		personal("<?php echo $stuIds ?>","Personal");
		personal("<?php echo $stuIds ?>","Acadamic");
		personal("<?php echo $stuIds ?>","Misc");
		function personal(stuId,showId)
		{
		  var values =[showId,stuId];
		  var msg=SendToPhp(values,"../../php/controllers/Student.php");
		  selectionListDisplay(showId,msg);
		}
		function edit_persoanl(a,b,c){
			var editid=a+"_edit";
			document.getElementById(a).innerHTML="<input type='text' id='"+editid+"' value='"+c+"''><span class='fa fa-check' style='font-size:24px;' onclick='save_personal(\""+a+"\",\""+b+"\");return false'></span>";
		}
		function save_personal(a,stuId){
			var editid=a+"_edit";
			var val=document.getElementById(editid).value;
			var tbl="students_details";
			var values =["update_profile",a,stuId,val,tbl];
      		var msg=SendToPhp(values,"../../php/controllers/Student.php");
      		if(msg==" success"){
      			selectionListDisplay(a,val);
      		}
		}
		function edit_academic(a,b,c){
			var editid=a+"_edit";
			document.getElementById(a).innerHTML="<input type='text' id='"+editid+"' value='"+c+"''><span class='fa fa-check' style='font-size:24px;' onclick='save_academic(\""+a+"\",\""+b+"\");return false'></span>";
		}
		function save_academic(a,stuId){
			var editid=a+"_edit";
			var val=document.getElementById(editid).value;
			var tbl="students_academices";
			var values =["update_profile",a,stuId,val,tbl];
      		var msg=SendToPhp(values,"../../php/controllers/Student.php");
      		if(msg==" success"){
      			selectionListDisplay(a,val);
      		}
		}
		function add_achivement(uid){
			var atype    = document.forms['new_achivement']['achive_inp_type'].value;
  			var atitle   = document.forms['new_achivement']['achive_inp_title'].value;
  			var aarea    = document.forms['new_achivement']['achive_inp_area'].value;
  			var adis   = document.forms['new_achivement']['achive_inp_dis'].value;
  			var ayear    = document.forms['new_achivement']['achive_inp_year'].value;
  			var aref   = document.forms['new_achivement']['achive_inp_reference'].value;
  			var values =['add_achivement',atype,atitle,aarea,adis,ayear,aref,uid];
			var msg=SendToPhp(values,"../../php/controllers/Student.php");
			alert(msg);
			window.location.href="./profile.php";
		}
		function delete_achivement(sno){
			var values =['delete_achivement',sno];
			var msg=SendToPhp(values,"../../php/controllers/Student.php");
			alert(msg);
			window.location.href="./profile.php";
		}
		function edit_achivement(sno){
			var values =['edit_achivement',sno];
			//var msg=SendToPhp(values,"../../php/controllers/Student.php");
			alert('updatesoon...');
			window.location.href="./profile.php";
		}
	</script>
</body>
</html>
<?php } ?>