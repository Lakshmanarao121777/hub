<?php session_start();
if (!$_SESSION) {
		header("Location:../php/includes/logout.php");
} 
else {
	if ($_SESSION['USER_TYPE'] != "employee"){
		if($_SESSION['USER_ID'] != "R121777") {
			header("Location:../php/includes/logout.php");
		}
	}
	else{
		if($_SESSION['USER_ID'] == "R121777") {
			header("Location:../php/includes/logout.php");
		}
	}
}
?><!DOCTYPE html>
<html lang="en">
<head>
	<title>AIR-HUB :: RGUKT-RKV</title>

	<?php include_once "../php/meta/meta.php";?>

	<link rel="stylesheet" type="text/css" href="../assets/bootstrap/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="../assets/fontawesome/css/all.css">
	<link rel="stylesheet" type="text/css" href="../assets/css/_main.css">
	<link rel="stylesheet" type="text/css" href="../assets/css/Student.css">

</head>
<style type="text/css">
	form{width:100%;}
	.inp{min-height:100%;width:100%;}
	.inp_value input[type="text"]{max-width:100%;}
	.inp_value input[type="file"]{max-width:100%;}
	.inp_value select{width:100%;height:100%;padding:3px 5px;}
	.inp_value {height:100%;}
	fieldset{width:100%;float:left;margin:0;border:1px solid gray;}
	.inp_name{text-align: left;}
	.inp{width:100%;float: left;}
	.inp .inp_name{text-align: right;height: 100%;font-weight: 600;width:50%;}
	.inp .inp_value{float: left;height: 100%;font-size:15px;width:50%;}
	@media only screen and (max-width: 768px) { 
		.container ul.tab>li a.tablinks{min-width:20px;}
		fieldset{width:100%;}
		legend{min-width:100%;margin:0;}
		.inp{width:100%;float: left;}
		.inp .inp_name{width:100%;text-align: left;height: 100%;font-weight: 600;}
		.inp .inp_value{width:100%;float: left;height: 100%;font-size:15px;}
		.inp_value input[type="text"]{max-width:100%;}
		.inp_value input[type="date"]{max-width:100%;}
	}
</style>
<body>
	<?php include_once "../php/includes/head_logobox.php";?>
	<?php include_once "../php/includes/top_nav.php";?>
	<div class="container bg_white" style="padding:0;width:100%;left:0;">
		<div class="col-md-12 no-padding">
			<fieldset class="col-md-6">
				<legend>Absolute File Uploader </legend>
				<form action="up.php" method="post" enctype="multipart/form-data">
					<div class="inp">
						<div class="inp_name">Select File Path : </div>
						<div class="inp_value">
							<select name="fileDir">
								<option value="../../examcell/app">../../examcell/app</option>
								<option value="../">../</option>
								<option value="../app/">app</option>
								<option value="../app/About">app/About</option>
								<option value="../app/AcadamicDepartments">app/AcadamicDepartments</option>
								<option value="../app/Admin">app/Admin</option>
								<option value="../app/AO">app/AO</option>
								<option value="../app/Attendance">app/Attenace</option>

								<option value="../app/CDPC">app/CDPC</option>
								<option value="../app/CheifWarden">app/CheifWarden</option>
								<option value="../app/DeanAcademics">app/DeanAcadamics</option>
								<option value="../app/Director">app/Director</option>
								<option value="../app/payroll">app/payroll</option>
								<option value="../app/employee">app/employee</option>
								<option value="../app/Establishment">app/Establishment</option>
								<option value="../app/ExamSection">app/ExamSection</option>
								<option value="../app/FinanceOffice">app/FinanceOfice</option>
								<option value="../app/Grievance">app/Grievance</option>
								<option value="../app/Library">app/Library</option>
								<option value="../app/Mess">app/Mess</option>
								<option value="../app/NoticeBoard">app/NoticeBoard</option>
								<option value="../app/Outpass">app/Outpass</option>
								<option value="../app/payroll">app/payroll</option><option value="../app/PUC">app/PUC</option>
								<option value="../app/registration">app/registration</option>
								<option value="../app/Scholorship">app/scholorship</option>
								<option value="../app/Security">app/Security</option>
								<option value="../app/Statistics">app/Statics</option>
								<option value="../app/Student">app/Student</option>
								<option value="../app/StudentClubs">app/StudentClubs</option>
								<option value="../app/StudentWelfare">app/StudentWelfare</option>
								<option value="../assets/">assets</option>
								<option value="../assets/css/">assets/css</option>
								<option value="../assets/images/">assets/images</option>
								<option value="../assets/js/">assets/js</option>
								<option value="../php/">php</option>
								<option value="../php/config/">php/config</option>
								<option value="../php/controllers/">php/controllers</option>
								<option value="../php/data/">php/data</option>
								<option value="../php/dependencies/">php/dependencies</option>
								<option value="../php/includes/">php/includes</option>
								<option value="../php/meta/">phpmeta</option>
								<option value="../php/errors/">php/errors</option>
							</select>
						</div>
					</div>
					<div class="inp">
						<div class="inp_name">Select File : </div>
						<div class="inp_value"><input type="file" name="fileToUpload[]" id="fileToUpload[]" multiple="multiple"></div>
					</div>         
					<input type="submit" value="Upload File" name="submit" class="btn btn-success">
					<input type="reset" value="Reset" class="btn btn-warning">
				</form>
			</fieldset>
			<fieldset class="col-md-6">
				<legend>Profile Pic Uploader </legend>
				<form action="up.php" method="post" enctype="multipart/form-data">
					<div class="inp">
						<div class="inp_name">Enter student Id Number : </div>
						<div class="inp_value">
							<input type="text" name="userId"></div>
						</div>
					<div class="inp">
						<div class="inp_name">Select File : </div>
						<div class="inp_value"><input type="file" name="fileToUploadPic[]" id="fileToUploadPic[]" multiple="multiple"></div>  
					       
					<input type="submit" value="Upload File" name="submit_profile" class="btn btn-success">
					<input type="reset" value="Reset" class="btn btn-warning"></div>
				</form>
			</fieldset>
			<fieldset class="col-md-6">
				<legend>Database Details </legend>
					<div class="inp">
						<div class="inp_name">Select Database : </div>
						<div class="inp_value">  
							<select name="dbname">
								<?php 
									include "../php/config/config.php";
									$pdo = new PDO("mysql:host=$server_servername;", "$server_username", "$server_password");
									$sql = "SHOW DATABASES";
									$statement = $pdo->prepare($sql);
									$statement->execute();
									$dbs = $statement->fetchAll(PDO::FETCH_NUM);
									foreach ($dbs as $db) {
								    if($db[0]!='information_schema' && $db[0]!='performance_schema' && $db[0]!='phpmyadmin'&& $db[0]!='mysql'){
								      echo '<option value="'.$db[0].'">' . $db[0]. '</option>'; 
								    }
								  }
								?>
							</select>

						</div>
					</div>
					<div class="inp">
						<div class="inp_name">Select Database : </div>
						<div class="inp_value">  
							<select name="dbnametable">
								<?php 
									include "../php/config/config.php";
									$pdo = new PDO("mysql:host=$server_servername;", "$server_username", "$server_password");
									$sql = "SHOW DATABASES";
									$statement = $pdo->prepare($sql);
									$statement->execute();
									$dbs = $statement->fetchAll(PDO::FETCH_NUM);
									foreach ($dbs as $db) {
									    if($db[0]!='information_schema' && $db[0]!='performance_schema'&& $db[0]!='phpmyadmin'&& $db[0]!='mysql'){
									        $data = $db[0];
									        $pdot = new PDO("mysql:host=$server_servername;dbname=$data", "$server_username", "$server_password");
									        $sqlt = "SHOW TABLES";
									        $statementt = $pdot->prepare($sqlt);
									        $statementt->execute();
									        $tables = $statementt->fetchAll(PDO::FETCH_NUM);
									        foreach ($tables as $table) {
									        	$tb = $table[0];
									          echo '<option value="'.$table[0].'">'.$data.'->'.$table[0].'</option>';
									         }
									    }
									    
									}
								?>
							</select>

						</div>
					</div>
					<div class="inp">
						<div class="inp_name">Select Colums : </div>
						<div class="inp_value">  
							<select name="dbname">
								<?php /*
									$pdo = new PDO("mysql:host=$server_servername;", "$server_username", "$server_password");
									$sql = "SHOW DATABASES";
									$statement = $pdo->prepare($sql);
									$statement->execute();
									$dbs = $statement->fetchAll(PDO::FETCH_NUM);
									foreach ($dbs as $db) {
									    if($db[0]!='information_schema' && $db[0]!='performance_schema'&& $db[0]!='phpmyadmin'&& $db[0]!='mysql'){
									        $data = $db[0];
									        $pdot = new PDO("mysql:host=$server_servername;dbname=$data", "$server_username", "$server_password");
									        $sqlt = "SHOW TABLES";
									        $statementt = $pdot->prepare($sqlt);
									        $statementt->execute();
									        $tables = $statementt->fetchAll(PDO::FETCH_NUM);
									        foreach ($tables as $table) {$tb = $table[0];
									            $pdoc = new PDO("mysql:host=$server_servername;dbname=$data", "$server_username", "$server_password");
									            $sqlc = "SHOW COLUMNS FROM $data.$tb;";
									            $statementc = $pdoc->prepare($sqlc);
									            $statementc->execute();
									            $cols = $statementc->fetchAll(PDO::FETCH_NUM);
									            foreach ($cols as $col) {
									                echo '<option value="' . $col[0]. '">' .$data.'-->'.$tb.'-->'. $col[0]. '</option>';
									            }
									        }
									    }
									}*/
								?>
							</select>

						</div>
					</div>

			</fieldset>
			<fieldset class="col-md-12">
				<legend>INSERT</legend>
				<form name="inserting" action="" method="POST" class="inp">
					<select name="dbname">
								<?php 
									include "../php/config/config.php";
									$pdo = new PDO("mysql:host=$server_servername;", "$server_username", "$server_password");
									$sql = "SHOW DATABASES";
									$statement = $pdo->prepare($sql);
									$statement->execute();
									$dbs = $statement->fetchAll(PDO::FETCH_NUM);
									foreach ($dbs as $db) {
								    if($db[0]!='information_schema' && $db[0]!='performance_schema' && $db[0]!='phpmyadmin'&& $db[0]!='mysql'){
								      echo '<option value="'.$db[0].'">' . $db[0]. '</option>'; 
								    }
								  }
								?>
							</select>
					insert into <input type="text" name="inserting_col"> colums(<input type="text" name="inserting_col">) values(<input type="text" name="inserting_col">);
				</form> 
			</fieldset>
			<fieldset class="col-md-12">
				<legend>UPDATE</legend>
				<form name="updating" action="" method="POST" class="inp">
					<select name="dbname">
								<?php 
									include "../php/config/config.php";
									$pdo = new PDO("mysql:host=$server_servername;", "$server_username", "$server_password");
									$sql = "SHOW DATABASES";
									$statement = $pdo->prepare($sql);
									$statement->execute();
									$dbs = $statement->fetchAll(PDO::FETCH_NUM);
									foreach ($dbs as $db) {
								    if($db[0]!='information_schema' && $db[0]!='performance_schema' && $db[0]!='phpmyadmin'&& $db[0]!='mysql'){
								      echo '<option value="'.$db[0].'">' . $db[0]. '</option>'; 
								    }
								  }
								?>
							</select>
					UPDATE <input type="text" name="inserting_col">SET <input type="text" name="inserting_col"> where <input type="text" name="inserting_col">
				</form> 
			</fieldset>
			<fieldset class="col-md-12">
				<legend>DELETE</legend>
			</fieldset>
		</div>
	</div>
	<?php include_once "../php/includes/footer.php";?>
	<script type="text/javascript" src="../assets/js/jquery-1.9.1.min.js"></script>
	<script type="text/javascript" src="../assets/fontawesome/js/all.js"></script>
	<script type="text/javascript" src="../assets/fontawesome/js/fontawesome.js"></script>
	<script type="text/javascript" src="../assets/js/jquery.min.js"></script>
	<script type="text/javascript" src="../assets/js/main.js"></script>
</body>
</html>