<?php session_start(); 
if(!$_SESSION){
  header("Location:../../php/includes/logout.php");
}
else
{
  if($_SESSION['USER_TYPE']!="student"){
    header("Location:../../php/includes/logout.php");
  }
  $stuIds=$_SESSION['USER_ID'];
}
?>  
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
<style type="text/css">
.tab{margin:0;}
.container ul.tab{width:100%;margin: 0;float: left;}
.container ul.tab>li {display: inline;float: left;margin:0 0 0 2px;}
.container ul.tab>li a.tablinks{padding:4.5px 11px;font-size:16px;float: left;margin: 0;border:1px solid rgba(0,0,0,0.3);border-radius: 10px 10px 0 0;min-width:100px;color:rgba(0,0,0,0.9);text-decoration: none;}
.container ul.tab>li:hover{background:rgba(0,0,0,0.2);color:rgba(0,0,0,.7);border-radius:10px 10px 0 0;}
.tabcontents{width:100%;border:1px solid gray;float: left;padding:10px;display:none;}
.active_tab_top{font-size:180px;border-bottom:2px solid green;border-radius: 10px 10px 0 0;background:rgba(0,0,0,0.05);color:rgba(0,0,0,.7);border:0;}
.inp{min-height:100%;width:95%}
.inp_value input[type="text"]{max-width:90%;}
.inp_value input[type="date"]{max-width:90%;}
.inp_value textarea{width:90%;height:100%;}
.inp_value {height:100%;}
fieldset{width:50%;float:left;}
.inp_name{text-align: left;}
.inp{width:100%;float: left;}
	.inp .inp_name{text-align: right;height: 100%;font-weight: 600;}
	.inp .inp_value{float: left;height: 100%;font-size:15px;}
	.hide-md{display:none;}
	.hide-sm{display:block;}
@media only screen and (max-width: 768px) { 
	.container ul.tab>li a.tablinks{min-width:20px;}
	fieldset{width:100%;}
	legend{min-width:100%;margin:0;}
	.inp{width:100%;float: left;}
	.inp .inp_name{width:100%;text-align: left;height: 100%;font-weight: 600;}
	.inp .inp_value{width:100%;float: left;height: 100%;font-size:15px;}
	.inp_value input[type="text"]{max-width:90%;}
	.inp_value input[type="date"]{max-width:90%;}
	.br{border-bottom:1px solid gray;border-right:0;}
	.container ul.tab{width:100%;margin: 0;float: left;}
	ul.tab{padding:5px 10px;font-size:14px;border-radius: 10px 10px 0 0;min-width:40%;}
	.hide-sm{display:none;}
	.hide-md{display:block}
}
</style>
<body>
  <?php include_once("../../php/includes/head_logobox.php"); ?>
  <?php include_once("../../php/includes/top_nav.php"); ?>
  <?php include_once("../../php/includes/sidebar_Student.php"); ?>
  <div class="container bg_white" style="padding:0;">
    <ul class="bread">
      <li><a href="./" title=""><em><span class="fa fa-tachometer-alt"></span> Dashboard</em></a></li>
      <li class="breadcurrent"><a href="#" title=""><em><span class="fa fa-user"></span> My Profile</em></a></li>
    </ul>
<br>
<img src="../../php/config/captcha.php" />
  	<ul class="tab">
		<li><a href="#Personal" class="tablinks" onclick="openprofile(event,'Personal');return false;"> Personal </a></li>
		<li><a href="#Security" class="tablinks" onclick="openprofile(event,'Security');return false;">Security </a></li>
		<li><a href="#Acadamic" class="tablinks" onclick="openprofile(event,'Acadamic');return false;" id="defaultOpen">Acadamic </a></li>
		<li><a href="#Misc" class="tablinks" onclick=" openprofile(event,'Misc');return false;">Misc/Achivements </a></li>
	</ul>
	<div id="Personal" class="tabcontents"></div>
	<div id="Acadamic" class="tabcontents"></div>
	<div id="Security" class="tabcontents">
		<form action="" method="POST" onsubmit="changePassword('<?php echo $stuIds; ?>');" name="changepass" style="width:100%;">
			<fieldset>
				<legend>Login Details:-</legend>
				<div class="inp">
					<div class="inp_name">Old Password : </div> 
					<div class="inp_value"><input type="password" name="oldpass" autocomplete="off"></div>
				</div>
			  	<div class="inp">
					<div class="inp_name">New Password : </div> 
					<div class="inp_value"><input type="password" name="newpass" autocomplete="off"></div>
				</div>
				<div class="inp">
					<div class="inp_name">Confirm Password : </div> 
					<div class="inp_value"><input type="password" name="cpass" onkeyup="checkPassword()" autocomplete="off"></div>
					<span id="error"></span>
				</div>
				<div class="inp">
					<div class="inp_name"><button type="submit">Change Password</button></div>
					<div class="inp_value"></div>
				</div>
			</fieldset>
		</form>
	</div>
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

		function changePassword(stuId){
			var oldp    = document.forms['changepass']['oldpass'].value;
  			var newp   = document.forms['changepass']['newpass'].value;
  			var cp    = document.forms['changepass']['cpass'].value;
  			if(newp!=oldp){
  				if(newp==cp){
	  				var values =["changepassword",stuId,newp,oldp];
			  		var msg=SendToPhp(values,"../../php/controllers/Student.php");
			  		snackbar(showId,msg);
			  	}
			  	else{
			  		snackbar("New password and confirm password must be same")
			  	}
  			}
  			else{
  				snackbar("New Password must be differ from Old one")
  			}
		}
		function personal(stuId,showId)
		{
		  if(showId=="Acadamic"){
		  		var v =["getAcaCount",stuId];
		  		var m=SendToPhp(v,"../../php/controllers/Student.php");
		  		if(m==0) {
		  			var v =["addtoacadamics",stuId];
			   		var m=SendToPhp(v,"../../php/controllers/Student.php");
			   		var values =[showId,stuId];
		  			var msg=SendToPhp(values,"../../php/controllers/Student.php");
		  		}
		  		else{
		  			var values =[showId,stuId];
		  			var msg=SendToPhp(values,"../../php/controllers/Student.php");
		  		}
		  }
		  else{
		  	var values =[showId,stuId];
		  	var msg=SendToPhp(values,"../../php/controllers/Student.php");
		  }
		  
		selectionListDisplay(showId,msg);
		}
		function edit_personal(a,b,c){
			var editid=a+"_edit";
			if(a=="dob"){
				document.getElementById(a).innerHTML="<input type='date' id='"+editid+"' value='"+c+"''><span class='fa fa-check' style='font-size:24px;' onclick='save_personal(\""+a+"\",\""+b+"\");return false'></span>";
			}
			else if(a=="blood"){
				document.getElementById(a).innerHTML="<select id='"+editid+"' value='"+c+"''><option value='A+'>A\+</option><option value='A\-'>A\-</option><option value='B+'>B\+</option><option value='B\-'>B\-</option><option value='AB+'>AB\+</option><option value='AB\-'>AB\-</option><option value='O+'>O\+</option><option value='O\-'>O\+</option></select><span class='fa fa-check' style='font-size:24px;' onclick='save_personal(\""+a+"\",\""+b+"\");return false'></span>";
			}
			else if(a=="cast"){
				document.getElementById(a).innerHTML="<select id='"+editid+"' value='"+c+"''><option value='SC'>SC</option><option value='ST'>ST</option><option value='BC-A'>BC-A</option><option value='BC-B'>BC-B</option><option value='BC-C'>BC-C</option><option value='BC-D'>BC-D</option><option value='BC-E'>BC-E</option><option value='OC'>OC</option></select><span class='fa fa-check' style='font-size:24px;' onclick='save_personal(\""+a+"\",\""+b+"\");return false'></span>";
			}
			else{document.getElementById(a).innerHTML="<input type='text' id='"+editid+"' value='"+c+"''><span class='fa fa-check' style='font-size:24px;' onclick='save_personal(\""+a+"\",\""+b+"\");return false'></span>";}
		}
		function save_personal(a,stuId){
			alert();
			var editid=a+"_edit";
			var val=document.getElementById(editid).value;
			var tbl="students_details";
			var values =["update_profile",a,stuId,val,tbl];
				var msg=SendToPhp(values,"../../php/controllers/Student.php");
				if(msg=="success"){
					selectionListDisplay(a,val);
				}
		}
		function edit_academic(a,b,c){
			var editid=a+"_edit";
			if(a=="sscBoard"){ 
				document.getElementById(a).innerHTML="<select id='"+editid+"'><option value='"+c+"'>"+c+"</option><option value='State Board-AP'> State Board-AP</option><option value='State Board-TG'> State Board-TG</option><option value='CBSE'> CBSE</option><option value='CSTA'> CTSA</option><option value='ICSE'> ICSE</option></select><span class='fa fa-check' style='font-size:24px;' onclick='save_academic(\""+a+"\",\""+b+"\");return false'></span>";
			}
			else if(a=="hostel"){
				document.getElementById(a).innerHTML="<select id='"+editid+"'><option value='"+c+"'>"+c+"</option><option value='BH1'> BH-1</option><option value='BH2'> BH-2</option><option value='GH1'> GH-1</option><option value='GH2'> GH-2</option>-</select><span class='fa fa-check' style='font-size:24px;' onclick='save_academic(\""+a+"\",\""+b+"\");return false'></span>";
			} 
			else if(a=="hostelroom"){
				document.getElementById(a).innerHTML="<input type='text' id='"+editid+"' value='"+c+"'' placeholder='Ex: G-001'><span class='fa fa-check' style='font-size:22px;' onclick='save_academic(\""+a+"\",\""+b+"\");return false'></span>";
			}
			else{
				document.getElementById(a).innerHTML="<input type='text' id='"+editid+"' value='"+c+"''><span class='fa fa-check' style='font-size:24px;' onclick='save_academic(\""+a+"\",\""+b+"\");return false'></span>";
			}
		}
		function save_academic(a,stuId){
			var editid=a+"_edit";
			var val=document.getElementById(editid).value;
			var tbl="students_academices";
			var values =["update_profile",a,stuId,val,tbl];
      		var msg=SendToPhp(values,"../../php/controllers/Student.php");
      		if(msg=="success"){
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
	<?php
    
        if(isset($_POST["submit_profile"])){
          $total = count($_FILES['fileToUploadPic']['name']);
          $username = $_POST['userId'];
          $uploadOk = 1;
          $disr="../../users/".$username;$target_dir=$disr;
          if(!is_dir($disr)){
            mkdir($disr, 0777, true);
          }
          else{
            array_map('unlink', glob("$disr/*.*"));
            if(!rmdir($disr)){
               echo ("Could not remove $path");
            }
          }
          for( $i=0 ; $i < $total ; $i++ ) {
          $target_file = basename($_FILES["fileToUploadPic"]["name"][$i]);
            if (file_exists($target_dir.'/'.$target_file)) {
              if(unlink($target_dir. "/" . $target_file))
              { 
                if (move_uploaded_file($_FILES["fileToUploadPic"]["tmp_name"][$i], $target_dir.'/'.$target_file)) {
                  echo "<div class='notfound'>The file ". basename( $_FILES["fileToUploadPic"]["name"][$i]). " has been uploaded.</div>";
                } else {
                    echo "<span>Sorry, there was an error uploading your file.</span>";
                }
              }
            }
            else {
              if (move_uploaded_file($_FILES["fileToUploadPic"]["tmp_name"][$i], $target_dir.'/'.$target_file)) {
                  echo "<div class='notfound'>The file ". basename( $_FILES["fileToUploadPic"]["name"][$i]). " has been uploaded.</div>";
              } else {
                  echo "<div class='btn btn-warning'>Sorry, there was an error uploading your file.</div>";
              }
            }
          }
        }
    ?>
</body>
</html>