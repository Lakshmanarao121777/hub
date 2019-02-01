<?php session_start(); 
if(!$_SESSION){
  header("Location:../../php/includes/logout.php");
}
else
{
  if($_SESSION['USER_TYPE']!="employee"){
    header("Location:../../php/includes/logout.php");
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
  	<h3><center><i>-: <u>AY 18-19 Sem-1 Engineering Registration (Minor)</u> :-</i></center></h3>
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
          <?php $batch_female_reg_total=0;$batch_female_unreg_total=0;$batch_female_total=0;
          for($i=0;$i<sizeof($branch_array);$i++){ 
            
          $branch_female_reg=getRowCount("ay1819s1reg","where currentYear='$batch_array[$k]' and Dept='$branch_array[$i]' and gender='FEMALE' GROUP BY userId");
          $all_female=getRowCount("students_details","where currentYear='$batch_array[$k]' and Department='$branch_array[$i]' and gender='FEMALE'");
          $batch_female_reg_total=$branch_female_reg+$batch_female_reg_total;
          $batch_female_unreg_total=$all_female-$branch_female_reg+$batch_female_unreg_total;
          $batch_female_total=$batch_female_reg_total+$batch_female_unreg_total;
          ?>
          <td id="reg_g"><?php echo $branch_female_reg;?></td>
          <td id="unreg_g"><?php echo $all_female-$branch_female_reg;?></td>
          <td id="total_g"><?php echo $all_female;?></td>
            <?php }       ?>
    			<td id="reg_g"><?php echo $batch_female_reg_total; ?></td>
          <td id="unreg_g"><?php echo $batch_female_unreg_total;?></td>
          <td id="total_g"><?php echo $batch_female_total;?></td>
    		</tr>
    		<tr>
    			<td>Boys</td>
    			<?php $batch_male_reg_total=0;$batch_male_unreg_total=0;$batch_male_total=0;
          for($i=0;$i<sizeof($branch_array);$i++){ 
            
          $branch_male_reg=getRowCount("ay1819s1reg","where currentYear='$batch_array[$k]' and Dept='$branch_array[$i]' and gender='MALE' GROUP BY userId");
          $all_male=getRowCount("students_details","where currentYear='$batch_array[$k]' and Department='$branch_array[$i]' and gender='MALE'");
          $batch_male_reg_total=$branch_male_reg+$batch_male_reg_total;
          $batch_male_unreg_total=$all_male-$branch_female_reg+$batch_male_unreg_total;
          $batch_male_total=$batch_male_reg_total+$batch_male_unreg_total;
          ?>
          <td id="reg_g"><?php echo $branch_male_reg;?></td>
          <td id="unreg_g"><?php echo $all_male-$branch_male_reg;?></td>
          <td id="total_g"><?php echo $all_male;?></td>
            <?php }       ?>
    			<td id="reg_g"><?php echo $batch_male_reg_total; ?></td>
          <td id="unreg_g"><?php echo $batch_male_unreg_total;?></td>
          <td id="total_g"><?php echo $batch_male_total;?></td>
        </tr>
    		<tr>
    			<td>Total</td>
          <?php
    			for($i=0;$i<sizeof($branch_array);$i++){ 
            $branch_batch_reg=getRowCount("ay1819s1reg","where currentYear='$batch_array[$k]' and Dept='$branch_array[$i]' GROUP BY userId");
            $branch_batch_total=getRowCount("students_details","where currentYear='$batch_array[$k]' and Department='$branch_array[$i]' "); ?>
            <td><?php echo $branch_batch_reg;?></td>
            <td><?php echo $branch_batch_total-$branch_batch_reg;?></td>
            <td><span class="fa fa-download" style="cursor:pointer;" title="download_csv as CSV File" onclick="download_csv('<?php echo $batch_array[$k]; ?>','<?php echo $branch_array[$i]; ?>')"> </span> <?php echo $branch_batch_total;?></td>
          <?php }
          $toal_batch_reg=getRowCount("ay1819s1reg","where currentYear='$batch_array[$k]' GROUP BY userId");
          $total_batch_all=getRowCount("students_details","where currentYear='$batch_array[$k]' ");
          ?>
          <td><?php echo $toal_batch_reg;?></td>
            <td><?php echo $total_batch_all-$toal_batch_reg;?></td>
            <td><span class="fa fa-download" style="cursor:pointer;" title="download_csv as CSV File" onclick="download_csv('<?php echo $batch_array[$k]; ?>','total')"> </span> <?php echo $total_batch_all;?></td>
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
  function download_csv(batch,branch)
  {
    var values =['exportTable',batch,branch];
    var msg=SendToPhp(values,"../../php/controllers/DeanAcademics.php");
  }
</script>