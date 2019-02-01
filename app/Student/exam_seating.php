<?php session_start(); 
if(!$_SESSION){
  header("Location:../../php/includes/logout.php");
}
else
{
  if($_SESSION['USER_TYPE']!="student"){
    header("Location:../../php/includes/logout.php");
  }
}
?><!DOCTYPE html>
<html lang="en">
<head>
	<title>N-Board AIR-HUB :: RGUKT-RKV</title>
	
	<?php include_once("../../php/meta/meta.php"); ?>

	<link rel="stylesheet" type="text/css" href="../../assets/bootstrap/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="../../assets/fontawesome/css/all.css">
	<link rel="stylesheet" type="text/css" href="../../assets/css/_main.css">
	<link rel="stylesheet" type="text/css" href="../../assets/css/Student.css">

</head>
<style type="text/css">
.results,.Seating{padding:1%;float: left;width: 100%}
	table{width:100%;border-collapse: collapse;float: left;}
	thead,tbody{border:1px solid black;}
	thead tr:nth-child(2n+1){background:teal;color:white;font-size:14px;font-weight: 500;}
	th{padding:5px 10px ;border:1px solid gray;}
	td{padding:10px;border:1px solid green;}
</style>
<body>
	<?php include_once("../../php/includes/head_logobox.php"); ?>
	<?php include_once("../../php/includes/top_nav.php"); ?>
	<?php include_once("../../php/includes/sidebar_Student.php"); ?>
	<div class="container bg_white" style="padding:0;">
    <ul class="bread">
      <li><a href="./" title=""><em><span class="fa fa-tachometer-alt"></span> Dashboard</em></a></li>
      <li class="breadcurrent"><a href="#" title=""><em><span class="fa fa-graduation-cap"></span> Exam Seating</em></a></li>
    </ul>
		<h1><center>Seating</center></h1>
		<div class="Seating">
			<table class="table table-condensed table-bordered table-striped table-responsive">
				<thead>
					<tr>
						<th>S.No</th>
						<th>SubName</th>
						<th>CP </th>
						<th>WAT-1</th>
						<th>WAT-2</th>
						<th>WAT-3</th>
						<th>WAT-4</th>
						<th>WAT-5</th>
						<th>WAT-6</th>
						<th>WAT-7</th>
						<th>WAT-8</th>
						<th>WAT-9</th>
						<th>WAT-10</th>
						<th>MID-1</th>
						<th>MID-2</th>
						<th>MID-3</th>
						<th>Sem Grade</th>
					</tr>
				</thead>
				<tbody id="seating">
					<tr></tr>
				</tbody>
			</table>
		</div>
	</div>
	<?php include_once("../../php/includes/footer.php"); ?>
	<script type="text/javascript" src="../../assets/js/jquery-1.9.1.min.js"></script>
	<script type="text/javascript" src="../../assets/fontawesome/js/all.js"></script>
	<script type="text/javascript" src="../../assets/fontawesome/js/fontawesome.js"></script>
	<script type="text/javascript" src="../../assets/js/jquery.min.js"></script>
	<script type="text/javascript" src="../../assets/js/main.js"></script>
	<script type="text/javascript">
		seating("<?php echo $_SESSION['USER_ID']; ?>");
		function seating(stuId)
		{
		  var values =['showrseating',stuId];
		  var msg=SendToPhp(values,"../../php/controllers/Student.php");
		  selectionListDisplay("seating",msg);
		}
	</script>
</body>
</html>