<?php session_start();
if (!$_SESSION) {
    header("Location:../../php/includes/logout.php");
} else {
    if ($_SESSION['USER_TYPE'] != "employee") {
        header("Location:../../php/includes/logout.php");
    }
}
include_once "../../php/config/config.inc.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>AIR-HUB :: RGUKT-RKV</title>

  <?php include_once "../../php/meta/meta.php";?>

  <link rel="stylesheet" type="text/css" href="../../assets/bootstrap/css/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="../../assets/fontawesome/css/all.css">
  <link rel="stylesheet" type="text/css" href="../../assets/fontawesome/css/fontawesome.css">
  <link rel="stylesheet" type="text/css" href="../../assets/css/_main.css">
  <link rel="stylesheet" type="text/css" href="../../assets/css/CheifWarden.css">
</head>
<body>
  <?php include_once "../../php/includes/head_logobox.php";?>
  <?php include_once "../../php/includes/top_nav.php";?>
  <?php include_once "../../php/includes/sidebar_CheifWarden.php";?>
  <div class="container bg_white">
  	<div class="notice_push">
	    <form method="post" name="notice_push" enctype="multipart/form-data">
	    	<div class="inp">
	    		<div class="inp_name">select year : </div>
		    	<div class="inp_value">
		    		<select name="year">
			    		<option value="ALL">All</option>
			    		<option value="ENGG-1">Engg-1</option>
			    		<option value="ENGG-1">Engg-2</option>
			    		<option value="ENGG-1">Engg-3</option>
			    		<option value="ENGG-1">Engg-4</option>
			    		<option value="ENGG-1">Staff</option>
		    		</select>
		    	</div>
		    	<textarea class="notice_push" name="notice"></textarea>
		    	<br/>
		    	<button type="submit" class="btn btn-success" name="push_notice"> Send Notice</button>
	    	<button type="submit" class="btn btn-warning"> Reset</button>
		    </div>
		    <div class="inp">
		    	<div class="notice_push">Select Attachments : </div>
		    	<div class="notice_push">
		    		<input type="file" name="att1" accept=".zip,.jpg,.png,.jpeg,.docx,.doc,.xlsx,.pdf">
		    	</div>
		    	<div class="notice_push">
		    		<input type="file" name="att2" accept=".zip,.jpg,.png,.jpeg,.docx,.doc,.xlsx,.pdf">
		    	</div>
		    	<div class="notice_push">
		    		<input type="file" name="att3" accept=".zip,.jpg,.png,.jpeg,.docx,.doc,.xlsx,.pdf">
		    	</div>
		    	<div class="notice_push">
		    		<input type="file" name="att4" accept=".zip,.jpg,.png,.jpeg,.docx,.doc,.xlsx,.pdf">
		    	</div>
		    	<div class="notice_push">
		    		<input type="file" name="att5" accept=".zip,.jpg,.png,.jpeg,.docx,.doc,.xlsx,.pdf">
		    	</div>
		    	<div class="notice_push">
		    		<input type="file" name="att6" accept=".zip,.jpg,.png,.jpeg,.docx,.doc,.xlsx,.pdf">
		    	</div>
		    	<div class="notice_push">
		    		<input type="file" name="att7" accept=".zip,.jpg,.png,.jpeg,.docx,.doc,.xlsx,.pdf">
		    	</div>
		    	<div class="notice_push">
		    		<input type="file" name="att8" accept=".zip,.jpg,.png,.jpeg,.docx,.doc,.xlsx,.pdf">
		    	</div>
		    	<div class="notice_push">
		    		<span style="font-size:12px;">Note : if the attachemts are more than eight(8) plase make those into zip and upload.<br/>
		    		Supported Formats : .zip,.jpg,.png,.jpeg,.docx,.doc,.xlsx<br/>
		    		If the your file type is not supplorted then also too zip that and upload</span>
		    	</div>
		    </div>
	    </form>
	</div>
    <div class="clear"></div>
    <div class="border-double"></div>
    <?php
if (isset($_POST["push_notice"])) {
    $fileName1 = $_FILES["att1"]["tmp_name"];
    $fileN1 = $_FILES["att1"]["name"];
    $fileName2 = $_FILES["att2"]["tmp_name"];
    $fileN2 = $_FILES["att2"]["name"];
    $fileName3 = $_FILES["att3"]["tmp_name"];
    $fileN3 = $_FILES["att3"]["name"];
    $fileName4 = $_FILES["att4"]["tmp_name"];
    $fileN4 = $_FILES["att4"]["name"];
    $fileName5 = $_FILES["att5"]["tmp_name"];
    $fileN5 = $_FILES["att5"]["name"];
    $fileName6 = $_FILES["att6"]["tmp_name"];
    $fileN6 = $_FILES["att6"]["name"];
    $fileName7 = $_FILES["att7"]["tmp_name"];
    $fileN7 = $_FILES["att7"]["name"];
    $fileName8 = $_FILES["att8"]["tmp_name"];
    $fileN8 = $_FILES["att8"]["name"];

    $notice = $_POST['notice'];
    $year = $_POST['year'];
    if ($notice != "") {
        $pdo = new PDO("mysql:host=$server_servername;dbname=$server_database", $server_username, $server_password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "INSERT INTO notice_board (notice,regBy,regDate,office, att1,att2, att3,att4,att5,att6,att7,att8,year) VALUES ('$notice','$_SESSION[USER_ID]','$time','$_SESSION[USER_OFFICE]','$fileN1','$fileN2','$fileN3','$fileN4','$fileN5','$fileN6','$fileN7','$fileN8','$year')";
        $pdo->exec($sql);
        $last_sno = $pdo->lastInsertId();
        $directoryName = "../NoticeBoard/" . $last_sno;
        mkdir($directoryName, 0777, true);
        if ($fileName1 != "") {move_uploaded_file($_FILES["att1"]["tmp_name"], $directoryName . "/" . $fileN1);}
        if ($fileName2 != "") {move_uploaded_file($_FILES["att2"]["tmp_name"], $directoryName . "/" . $fileN2);}
        if ($fileName3 != "") {move_uploaded_file($_FILES["att3"]["tmp_name"], $directoryName . "/" . $fileN3);}
        if ($fileName4 != "") {move_uploaded_file($_FILES["att4"]["tmp_name"], $directoryName . "/" . $fileN4);}
        if ($fileName5 != "") {move_uploaded_file($_FILES["att5"]["tmp_name"], $directoryName . "/" . $fileN5);}
        if ($fileName6 != "") {move_uploaded_file($_FILES["att6"]["tmp_name"], $directoryName . "/" . $fileN6);}
        if ($fileName7 != "") {move_uploaded_file($_FILES["att7"]["tmp_name"], $directoryName . "/" . $fileN7);}
        if ($fileName8 != "") {move_uploaded_file($_FILES["att8"]["tmp_name"], $directoryName . "/" . $fileN8);}
        ?><script type="text/javascript">window.location.href='NoticeBoard';</script><?php
}
}
?>
    <br/>
    <div id="notice">   </div>
  </div>
  <?php include_once "../../php/includes/footer.php";?>
  <script type="text/javascript" src="../../assets/js/jquery-1.9.1.min.js"></script>
  <script type="text/javascript" src="../../assets/fontawesome/js/all.js"></script>
  <script type="text/javascript" src="../../assets/fontawesome/js/fontawesome.js"></script>
  <script type="text/javascript" src="../../assets/js/jquery.min.js"></script>
  <script type="text/javascript" src="../../assets/js/main.js"></script>
  <script type="text/javascript" src="../../assets/js/nicEdit-latest.js"></script> <script type="text/javascript">
	//<![CDATA[
        bkLib.onDomLoaded(function() { nicEditors.allTextAreas() });
  	//]]>
	  load_notice(0);
	  function  load_notice(began){
	  	var end=began+20;
	  	var values =["load_notice",began,end];
  		var msg=SendToPhp(values,"../../php/controllers/CheifWarden.php");
  		addto("notice",msg);
	  }
	  function addto(id,msg){
	  	var aa=$("#"+id).html();
	  	selectionListDisplay(id,aa+msg);
	  }
	</script>
</body>
</html>