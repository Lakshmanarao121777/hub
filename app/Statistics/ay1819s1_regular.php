<?php session_start();
if (!$_SESSION) {
	header("Location:../../php/includes/logout.php");
} else {
	if ($_SESSION['USER_TYPE'] != "employee") {
		header("Location:../../php/includes/logout.php");
	}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>AIR-HUB :: RGUKT-RKV</title>

  <?php include_once "../../php/meta/meta.php";?>

  <link rel="stylesheet" type="text/css" href="../../assets/bootstrap/css/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="../../assets/fontawesome/css/all.css">
  <link rel="stylesheet" type="text/css" href="../../assets/css/_main.css">
  <link rel="stylesheet" type="text/css" href="../../assets/css/employee.css">
</head>
<style>
  form{width:100%;}
	fieldset{width:48%;border:1px solid teal;float:left;margin:.65%}
	select{width:100%;padding:4px;}
	input{width:100%;}
	@media only screen and (max-width: 768px) {
		fieldset{width:100%;}
	}
  #dis{width:97%;margin:10px 1%;}

</style>
<body>
  <?php include_once "../../php/includes/head_logobox.php";?>
  <?php include_once "../../php/includes/top_nav.php";?>
  <?php include_once "../../php/includes/sidebar_employee.php";?>
  <?php
include_once "../../php/config/DBActivityPHP.php";
$designation = new DBActivityPHP();
$user_ofc = $designation->getColValue("employee_designations", "userID='$_SESSION[USER_ID]'", "office");
$user_designation = $designation->getColValue("employee_designations", "userID='$_SESSION[USER_ID]'", "designation");
//$years =['ENGG-1','ENGG-2','ENGG-3','ENGG-4','PUC-1','PUC-2'];
//$deptd =['CH','CE','CS','EC','MM','ME','PUC-1','PUC-2'];
$years = ['ENGG-1', 'ENGG-2', 'ENGG-3', 'ENGG-4'];
$deptd = ['CH', 'CE', 'CS', 'EC', 'MM', 'ME'];
?>
  <div class="container bg_white" style="padding: 0 0 20px 0;">
    <ul class="bread">
      <li><a href="../" title=""><em><span class="fa fa-tachometer-alt"></span> Dashboard</em></a></li>
		  <li><a href="./" title=""><em><span class="fa fa-chart-pie"></span>  Statistics</em></a></li>
      <li class="sem"><a href="" title=""><em><span class="fa fa-chart-pie"></span> Semister Data</em></a></li>
      <li class="breadcurrent"><a href="" title=""><em><span class="fa fa-chart-pie"></span> AY1819 S1</em></a></li>
    </ul>
    <br>
    <div class="table-responsive" style="width:100%;" id="dis">
    	<table class="table table-hover table-bordered">
    		<thead>
    			<tr>
	    			<th>Branch</th>
	    			<th colspan="3">CH</th>
	    			<th colspan="3">CE</th>
	    			<th colspan="3">CSE</th>
	    			<th colspan="3">ECE</th>
	    			<th colspan="3">MM</th>
	    			<th colspan="3">ME</th>
	    			<th colspan="3">Total</th>
	    		</tr>
	    		<tr>
	    			<th> Gender </th>
	    			<th>F</th><th>M</th><th>T</th><th>F</th><th>M</th><th>T</th>
	    			<th>F</th><th>M</th><th>T</th><th>F</th><th>M</th><th>T</th>
	    			<th>F</th><th>M</th><th>T</th><th>F</th><th>M</th><th>T</th>
	    			<th>F</th><th>M</th><th>T</th>
	    		</tr>
    		</thead>
    		<tbody>
    			<?php for ($i = 0; $i < sizeof($years); $i++) {	?>
    					<tr>
    						<td> <?php echo $years[$i]; ?> </td>
    						<?php $f=0;$m=0;for ($k = 0; $k < sizeof($deptd); $k++) {		?>
									<td><?php $fd = $designation->getCountDistinct("reg_subjects", "Dept='$deptd[$k]' and gender= 'FEMALE' and currentYear ='$years[$i]' ", "userId");$f +=$fd;		echo $fd;?> </td>
		    					<td><?php $md = $designation->getCountDistinct("reg_subjects", "Dept='$deptd[$k]' and gender= 'MALE' and currentYear ='$years[$i]' ", "userId");$m += $md;echo $md;?></td>
		    					<td><?php echo $md + $fd; ?></td>
    						<?php }?>
				    			<th><?php echo $f;?></th>
				    			<th><?php echo $m;?></th>
				    			<th><?php echo $m + $f; ?></th>
    					</tr>
    			<?php }?>
    		</tbody>
    	</table>
      <?php for ($cyc = 0; $cyc < sizeof($deptd) ; $cyc++) { ?>
        <table class="table table-hover table-bordered" >
          <thead>
            <tr>
              <th>Year</th>
              <th> Subject Code </th>
              <th> Department </th>
              <th> Subject Name </th>
              <th> Credit Points </th>
              <th>F</th><th>M</th><th>T</th>
            </tr>
          </thead>
          <tbody>
            <?php for ($y = 0; $y < sizeof($years) ; $y++) { ?>
    	    		<tr>
                <?php $ff = $designation->getDistinct("reg_subjects", " currentYear ='$years[$y]' and Dept='$deptd[$cyc]' ", "subjectName");$sff=sizeof($ff['Message']) +1 ; ?>
    	    			<th rowspan="<?php echo$sff;?>" style="vertical-align: middle;"> <?php echo $years[$y]; ?>  </th>
                <?php if(sizeof($ff['Message'])==1){ ?>
                  <tr>
                    <td></td><td></td><td></td><td></td><td> </td><td> </td><td> </td>
                  </tr>
                  
                <?php } ?>
                
              </tr>
              <?php 
                $ff = $designation->getDistinct("reg_subjects", "currentYear ='$years[$y]' and Dept='$deptd[$cyc]' ", "subjectName");
                for($i=0;$i<sizeof($ff['Message']);$i++){
                  echo"<tr>";
                   ?>
                   <td><?php echo $designation->getColValue("reg_subjects","subjectName = '".$ff['Message'][$i][0]."'", 'subCode'); ?></td>
                  <td> <?php echo $deptd[$cyc]; ?> </td>
                  <?php print_r("<td>". $ff['Message'][$i][0]."</td>") ; ?>
                  <td><?php echo $designation->getColValue("reg_subjects","subjectName = '".$ff['Message'][$i][0]."'", 'CreditPoint'); ?></td>

                  <td><?php $fd = $designation->getCountDistinct("reg_subjects", "Dept='$deptd[$cyc]' and gender= 'FEMALE' and currentYear ='$years[$y]' and subjectName='".$ff['Message'][$i][0]."' ", "userId");    echo $fd;?> </td>
                  <td><?php $md = $designation->getCountDistinct("reg_subjects", "Dept='$deptd[$cyc]' and gender= 'MALE' and subjectName='".$ff['Message'][$i][0]."' and currentYear ='$years[$y]' ", "userId");echo $md;?></td>
                  <td><?php echo $md + $fd; ?></td>

                 <?php echo"</tr>";
                }
                ?>
            <?php } ?>
          </tbody>
        </table>
      <?php } ?>
    </div>
    


  </div>
  <?php include_once "../../php/includes/footer.php";?>
  <script type="text/javascript" src="../../assets/js/jquery-1.9.1.min.js"></script>
  <script type="text/javascript" src="../../assets/fontawesome/js/all.js"></script>
  <script type="text/javascript" src="../../assets/js/jquery.min.js"></script>
  <script type="text/javascript" src="../../assets/js/main.js"></script>
  <script type="text/javascript">
  	function openb(dept,year,gender){

  	}
	</script>
</body>
</html>
