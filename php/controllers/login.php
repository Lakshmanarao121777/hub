<?php
//include_once("../config/config.inc.php");
if (isset($_POST['v0'])) {
	include_once "../config/login.php";
	include_once "../dependencies/os.php";
	include_once "../dependencies/functions.php";
	if ($_POST['v0'] == "STU_LOGIN" || $_POST['v0'] == "EMP_LOGIN") {
		
		$select_list = " * ";
		$op='';
		if ($_POST['v0'] == "EMP_LOGIN") {
			$username = secure_en_input($_POST['v1']);
			$password = $_POST['v2'];
			$where = "username='" . $username . "' AND password= '" . $password . " ' AND  status='Active' ";
			$op=logIn('employe_login', $select_list, $where);
			
		} else {
			$password = secure_en_input($_POST['v2']);
			$username = secure_input_uppercase(secure_en_input($_POST['v1']));
			$where = "userId='" . $username . "' AND password= '" . $password . " ' ";
			$op= logIn('students_details', $select_list, $where);
		}

		//if($op!=""){
			$disr="../../users/".$username;
			$url = "http://210.212.217.208/registrations/upload/".$username."/".$username.".png";
			$ft='png';
			if(!is_dir($disr)){
				mkdir($disr, 0777, true);
				if(file_exists($disr."/".$username.".png") ){$url = $disr."/".$username.".png";$ft='png';}
				else if(file_exists("http://210.212.217.208/registrations/upload/".$username."/".$username.".png") ){$url = "http://210.212.217.208/registrations/upload/".$username."/".$username.".png";$ft='png';}

				else if(file_exists($disr."/".$username.".jpg") ){$url = $disr."/".$username.".jpg";$ft='jpg';}
				else if(file_exists("http://210.212.217.208/registrations/upload/".$username."/".$username.".jpg") ){$url = "http://210.212.217.208/registrations/upload/".$username."/".$username.".jpg";$ft='jpg';}

				elseif(file_exists($disr."/".$username.".jpeg") ){$url = $disr."/".$username.".jpeg";$ft='jpeg';}
				else if(file_exists("http://210.212.217.208/registrations/upload/".$username."/".$username.".jpeg") ){$url = "http://210.212.217.208/registrations/upload/".$username."/".$username.".jpeg";$ft='jpeg';}

				$img = $disr."/".$username.".".$ft;
				if(!file_exists($img)){file_put_contents($img, file_get_contents($url));}
				if(!file_exists($disr."/".$username.".png")){make_thumb($disr."/".$username.".".$ft,$disr."/".$username.".png",600);}
				if(!file_exists($disr."/".$username."_icon.jpg")){
				make_thumb($disr."/".$username.".".$ft,$disr."/".$username."_icon.png",75);
				}
			} 
			else{
				if(file_exists($disr."/".$username.".png") ){$url = $disr."/".$username.".png";$ft='png';}
				else if(file_exists("http://210.212.217.208/registrations/upload/".$username."/".$username.".png") ){$url = "http://210.212.217.208/registrations/upload/".$username."/".$username.".png";$ft='png';}

				else if(file_exists($disr."/".$username.".jpg") ){$url = $disr."/".$username.".jpg";$ft='jpg';}
				else if(file_exists("http://210.212.217.208/registrations/upload/".$username."/".$username.".jpg") ){$url = "http://210.212.217.208/registrations/upload/".$username."/".$username.".jpg";$ft='jpg';}

				elseif(file_exists($disr."/".$username.".jpeg") ){$url = $disr."/".$username.".jpeg";$ft='jpeg';}
				else if(file_exists("http://210.212.217.208/registrations/upload/".$username."/".$username.".jpeg") ){$url = "http://210.212.217.208/registrations/upload/".$username."/".$username.".jpeg";$ft='jpeg';}

				$img = $disr."/".$username.".".$ft;
				if(!file_exists($img)){file_put_contents($img, file_get_contents($url));}
				if(!file_exists($disr."/".$username.".png")){make_thumb($disr."/".$username.".".$ft,$disr."/".$username.".png",600);}
				if(!file_exists($disr."/".$username."_icon.jpg")){
				make_thumb($disr."/".$username.".".$ft,$disr."/".$username."_icon.png",75);
				}
			}
		//}
		echo $op;
	}
}
else{
 header("Location:../includes/logout.php");
}
?>

 