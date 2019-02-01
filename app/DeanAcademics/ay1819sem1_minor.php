<?php session_start(); 
if(!$_SESSION){ 
  echo'<script>window.location.href="../../php/includes/logout.php"</script>';
}
else
{
  if($_SESSION['USER_TYPE']!="employee"){
    echo'<script>window.location.href="../../php/includes/logout.php"</script>';
  }
}
$designation=$_SESSION['USER_DESIGNATION'];
$uid=$_SESSION['USER_ID'];
include("../../php/config/DeanAcademics.php")
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>AIR-HUB :: RGUKT-RKV</title>
  
  <?php include_once("../../php/meta/meta.php"); ?>

  <link rel="stylesheet" type="text/css" href="../../assets/bootstrap/css/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="../../assets/fontawesome/css/all.css">
  <link rel="stylesheet" type="text/css" href="../../assets/css/_main.css">
  <link rel="stylesheet" type="text/css" href="../../assets/css/DA.css">
</head>
<style type="text/css">
	table,th,td{border:1px solid gray;}
	th{padding:10px;text-align:center;text-transform: uppercase;}
	td{text-align:center;padding:5px;}
	form{width:100%;float: left;}
	.inp{padding:10px;float: left;width: 50%;font-size:18px;}
	select{width:60%;padding:10px;font-size: 18px;}
  #reg_g  {background:rgba(50,250,150,1);color:black;}
  #unreg_g{background:rgba(250,50,150,1);color:black;}
  #total_g{background:rgba(200,200,150,1);color:black;}

  #reg_b  {background:rgba(50,250,200,1);color:black;}
  #unreg_b{background:rgba(250,50,200,1);color:black;}
  #total_b{background:rgba(200,200,200,1);color:black;}
</style>
<body>
  <?php include_once("../../php/includes/head_logobox.php"); ?>
  <?php include_once("../../php/includes/top_nav.php"); ?>
  <?php include_once("../../php/includes/sidebar_DeanAcadamices.php"); ?>
  <?php 
  $branch_array=['CH','CE','CS','EC','MM','ME'];
  $batch_array=['ENGG-4','ENGG-3','ENGG-2','ENGG-1'];
  $batch_name_array=['R13 Batch','R14 Batch','R15 Batch','R16 Batch'];
  ?>
  <div class="container bg_white"  style="overflow-x:auto;">
    <br>
  	<h3><center><i>-: <u>AY 18-19 Sem-1 Engineering Registration Statistices</u> :-</i></center></h3>
    <br>
  	<table>
  		<tr>
  			<td colspan="2">Branch</td>
        <?php 
          for($kk=0;$kk<sizeof($branch_array);$kk++){ ?>
  			<td colspan="3"><?php echo $branch_array[$kk]; ?></td>
          <?php }
        ?>
  			<td colspan="3">Total</td>
  		</tr>
  		<tr>
  			<td colspan="2">Batch</td>
        <?php 
          for($kk=0;$kk<=sizeof($branch_array);$kk++){ ?>
        <td>Reg</td>
        <td>Un-Reg</td>
        <td>Total</td>
          <?php }
        ?>
  		</tr>
      <?php for ($k=0;$k<sizeof($batch_array);$k++) { ?>
    		<tr>
    			<td rowspan="3"> <?php echo $batch_name_array[$k]; ?></td>
    			<td>Girls</td>
          <?php 
          for($i=0;$i<sizeof($branch_array);$i++){ ?>
          <td id="reg_g"><?php echo getRowCount("reg_subjects","where currentYear='$batch_array[$k]' and Dept='$branch_array[$i]' and gender='FEMALE' GROUP BY userId");?></td>
          <td id="unreg_g"><?php echo getRowCount("students_details","where currentYear='$batch_array[$k]' and Department='$branch_array[$i]' and gender='FEMALE'")-getRowCount("reg_subjects","where currentYear='$batch_array[$k]' and Dept='$branch_array[$i]' and gender='FEMALE' GROUP BY userId");?></td>
          <td id="total_g"><?php echo getRowCount("students_details","where currentYear='$batch_array[$k]' and Department='$branch_array[$i]' and gender='FEMALE'");?></td>
            <?php }  ?>
    			<td id="reg_g"><?php echo getRowCount("reg_subjects","where currentYear='$batch_array[$k]' and gender='FEMALE' GROUP BY userId");?></td>
          <td id="unreg_g"><?php echo getRowCount("students_details","where currentYear='$batch_array[$k]' and gender='FEMALE'")-getRowCount("reg_subjects","where currentYear='$batch_array[$k]' and gender='FEMALE' GROUP BY userId");?></td>
          <td id="total_g"><?php echo getRowCount("students_details","where currentYear='$batch_array[$k]' and gender='FEMALE'");?></td>
    		</tr>
    		<tr>
    			<td>Boys</td>
    			<?php 
          for($i=0;$i<sizeof($branch_array);$i++){ ?>
            <td id="reg_b"><?php echo getRowCount("reg_subjects","where currentYear='$batch_array[$k]' and Dept='$branch_array[$i]' and gender='MALE' GROUP BY userId");?></td>
            <td id="unreg_b"><?php echo getRowCount("students_details","where currentYear='$batch_array[$k]' and Department='$branch_array[$i]' and gender='MALE'")-getRowCount("reg_subjects","where currentYear='$batch_array[$k]' and Dept='$branch_array[$i]' and gender='MALE' GROUP BY userId");?></td>
            <td id="total_b"><?php echo getRowCount("students_details","where currentYear='$batch_array[$k]' and Department='$branch_array[$i]' and gender='MALE'");?></td>
          <?php }
          ?>
          <td id="reg_b"><?php echo getRowCount("reg_subjects","where currentYear='$batch_array[$k]' and gender='MALE' GROUP BY userId");?></td>
          <td id="unreg_b"><?php echo getRowCount("students_details","where currentYear='$batch_array[$k]' and gender='MALE'")-getRowCount("reg_subjects","where currentYear='$batch_array[$k]' and gender='MALE' GROUP BY userId");?></td>
          <td id="total_b"><?php echo getRowCount("students_details","where currentYear='$batch_array[$k]' and gender='MALE'");?></td>
        </tr>
    		<tr>
    			<td>Total</td>
          <?php
    			for($i=0;$i<sizeof($branch_array);$i++){ ?>
            <td><?php echo getRowCount("reg_subjects","where currentYear='$batch_array[$k]' and Dept='$branch_array[$i]' GROUP BY userId");?></td>
            <td><?php echo getRowCount("students_details","where currentYear='$batch_array[$k]' and Department='$branch_array[$i]' ")-getRowCount("reg_subjects","where currentYear='$batch_array[$k]' and Dept='$branch_array[$i]' GROUP BY userId");?></td>
            <td><span class="fa fa-download" style="cursor:pointer;" title="Download as CSV File" onclick="download('<?php echo $batch_array[$k]; ?>','<?php echo $branch_array[$i]; ?>')"> </span> <?php echo getRowCount("students_details","where currentYear='$batch_array[$k]' and Department='$branch_array[$i]' ");?></td>
          <?php }
          ?>
          <td><?php echo getRowCount("reg_subjects","where currentYear='$batch_array[$k]' GROUP BY userId");?></td>
            <td><?php echo getRowCount("students_details","where currentYear='$batch_array[$k]' ")-getRowCount("reg_subjects","where currentYear='$batch_array[$k]' GROUP BY userId");?></td>
            <td><span class="fa fa-download" style="cursor:pointer;" title="Download as CSV File" onclick="download('<?php echo $batch_array[$k]; ?>','total')"> </span> <?php echo getRowCount("students_details","where currentYear='$batch_array[$k]' ");?></td>
        </tr> 
      <?php } ?>
  		


  			
  	</table>
    <div id="kk"></div>
  </div>
  <?php include_once("../../php/includes/footer.php"); ?>
  <script type="text/javascript" src="../../assets/js/jquery-1.9.1.min.js"></script>
  <script type="text/javascript" src="../../assets/fontawesome/js/all.js"></script>
  <script type="text/javascript" src="../../assets/fontawesome/js/fontawesome.js"></script>
  <script type="text/javascript" src="../../assets/js/jquery.min.js"></script>
  <script type="text/javascript" src="../../assets/js/main.js"></script>
</body>
</html>
<script type="text/javascript">
  function download(batch,branch)
  {
    var values =['exportTable',batch,branch];
    var msg=SendToPhp(values,"../../php/controllers/DeanAcademics.php");
    selectionListDisplay("kk",msg);
  }
</script>