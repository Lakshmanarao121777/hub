<?php session_start();
if (!$_SESSION) {
    header("Location:../../php/includes/logout.php");
} else {
    if ($_SESSION['USER_TYPE'] != "student") {
        header("Location:../../php/includes/logout.php");
    }
}

?><!DOCTYPE html>
<html lang="en">
<head>
	<title>N-Board AIR-HUB :: RGUKT-RKV</title>

	<?php include_once "../../php/meta/meta.php";?>

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
	<?php include_once "../../php/includes/head_logobox.php";?>
	<?php include_once "../../php/includes/top_nav.php";?>
	<?php include_once "../../php/includes/sidebar_Student.php";?>
	<div class="container bg_white" style="padding:0;">
    <ul class="bread">
      <li><a href="./" title=""><em><span class="fa fa-tachometer-alt"></span> Dashboard</em></a></li>
      <li class="breadcurrent"><a href="#" title=""><em><span class="fa fa-graduation-cap"></span> Results </em></a></li>
    </ul>
		<h1><center>Results</center></h1>
		<div class="results">
			<table class="table table-condensed table-RESPONSIVE">
	                <tbody>
	                	<tr>
		                  <th style="width:30px;"><center>#</center></th>
		                  <th style="width:50px;"><center>Subject Code</center></th>
		                  <th style="width:150px;"><center>Subject Name</center></th>
		                  <th style="width:30px;"><center>Credit Points</center></th>
		                  <th style="width:30px;"><center>WAT(s) <br>(best of 5 /10)</center></th>
		                  <th style="width:30px;"><center>MID-I </center></th>
		                  <th style="width:30px;"><center>MID-II </center></th>
		                  <th style="width:30px;">MID-III </center></th>
		                  <th style="width:30px;"><center>MID(s) <br>(best of 2 /3)</center></th>
		                  <th style="width:30px;"><center>Sem </center></th>
		                </tr>
	                	<?php include("php/config/config.inc_results.php");
	  									try { //93810691330
	    									$pdo = new PDO("mysql:host=$server_servername;dbname=$server_database", $server_username, $server_password);
	    									$sql = "SELECT * FROM ay1819s1 WHERE userId ='$userId' ";
	    									$q = $pdo->query($sql);
									      $q->setFetchMode(PDO::FETCH_ASSOC); 
									      $count=0;$totalcredit=0;$totalsem=0;
									      while ($row =$q->fetch() ): 
									      	$count++;$totalcredit+=$row['subCredit'];
									      	if($row['sem']=="EX") $totalsem += $row['subCredit'] * 10;
									      	else if($row['sem']=="A") $totalsem += $row['subCredit'] * 9;
									      	else if($row['sem']=="B") $totalsem += $row['subCredit'] * 8;
									      	else if($row['sem']=="C") $totalsem += $row['subCredit'] * 7;
									      	else if($row['sem']=="D") $totalsem += $row['subCredit'] * 6;
									      	else $totalsem += $row['subCredit']*0;
									      	?>
									        <tr>
								            <td><?php echo $count; ?></td>
								            <td><?php echo $row['subCode']; ?></td>
								            <td><?php echo $row['subName']; ?> </td>
								            <td><?php echo $row['subCredit']; ?></td>
								            <td><?php echo $row['wat']; ?></td>
								            <td><?php echo $row['m1']; ?></td>
								            <td><?php echo $row['m2']; ?></td>
								            <td><?php echo $row['m3']; ?></td>
								            <td>
								            	<?php 
								            		$m1=$row['m1'];$m2=$row['m2'];$m3=$row['m3'];
								            		if($m1 >= $m2 && $m1 >= $m3){
								            			if($m2 >= $m3){
								            				echo $m1+$m2;
								            			}
								            			else{
								            				echo $m1+$m3;
								            			}
								            		}
								            		else if($m2 >= $m1 && $m2 >= $m3){
								            			if($m1 >= $m3){
								            				echo $m2+$m1;
								            			}
								            			else{
								            				echo $m2+$m3;
								            			}
								            		}
								            		else if($m3 >= $m1 && $m3 >= $m2){
								            			if($m1 >= $m2){
								            				echo $m3+$m1;
								            			}
								            			else{
								            				echo $m3+$m2;
								            			}
								            		}
								            	?>
								            	</td>
								            <td><?php echo $row['sem']; ?></td></td>
									         </tr><?php
									      endwhile; 
									    } 
									    catch (PDOException $e) {
									      die("");
									    }  
										
                    if($totalcredit>0){?>
		                <tr>
		                	<td colspan="8" style="text-align:right;font-weight:900;font-size:18px;"><b> SGPA : </b></td>
		                	<td colspan="2" style="text-align:left;font-weight:900;font-size:18px;"><b>
		                		<?php $sgpa =$totalsem/$totalcredit;echo $sgpa; ?></b>
		                	</td>
		                </tr>
                    <?php }else{ ?>
                    <tr>
                      <td colspan="10">Results not yet released.</td>
                    </tr>
                    <?php }
                    ?>

	              	</tbody>
	              </table>
		</div>
		<div class="clear"></div>
		<hr></hr>
		<h3>Note :</h3> <br>
		<ul style="width:50%;float:left">
			<li>WAT/W : Weekend Assignment Test</li>
			<li>MAT/MID : Monthend Assignment Test</li>
			<li>SG : Semister Grade Points</li>
			<li>CP : Credit Points</li>
		</ul>
		<ul style="width:50%;float:left">
			<li>SubName : Subject Name</li>
			<li>WH : With Held(Consult Exam section)</li>
			<li>MP : Mall Practice(Consult Exam section)</li>
			<li>AB : Absent(Consult Exam section)</li>
		</ul>
	</div>
	<?php include_once "../../php/includes/footer.php";?>
	<script type="text/javascript" src="../../assets/js/jquery-1.9.1.min.js"></script>
	<script type="text/javascript" src="../../assets/fontawesome/js/all.js"></script>
	<script type="text/javascript" src="../../assets/fontawesome/js/fontawesome.js"></script>
	<script type="text/javascript" src="../../assets/js/jquery.min.js"></script>
	<script type="text/javascript" src="../../assets/js/main.js"></script>
	<script type="text/javascript">
		results("<?php echo $_SESSION['USER_ID']; ?>");
		function results(stuId)
		{
		  var values =['showresults',stuId];
		  var msg=SendToPhp(values,"../../php/controllers/Student.php");
		  selectionListDisplay("results",msg);
		}
	</script>
</body>
</html>