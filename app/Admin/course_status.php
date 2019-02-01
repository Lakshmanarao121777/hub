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
  <link rel="stylesheet" type="text/css" href="../../assets/css/AcadamicDepartments.css">
</head>
<style type="text/css">
.inp{width:40%;}
  .inp .inp_name,.inp .inp_value{width:50%;float: left;font-size:20px;}
  .inp .inp_value select,.inp .inp_value option{width:99%;padding:4px 1px;}
  .inp .inp_value input{width:99%;padding:2px 1px;border:1px solid gray;}
  td,th{border:1px solid gray;padding:2px;}
  table{width:100%;}
  th{text-align:center;}


</style>
<body>
  <?php include_once "../../php/includes/head_logobox.php";?>
  <?php include_once "../../php/includes/top_nav.php";?>
  <?php include_once "../../php/includes/sidebar_AcadamicDepartments.php";
$user_dept = $_SESSION['USER_DEPARTMENT'];?>
  <div class="container bg_white">
    <br>
    <h3><center>-: <i> <u>Course Distribution</u></i> :-</center></h3>
    <div id="listofsub">

<?php
include "../../php/config/config.inc.php";
try {
    $pdo = new PDO("mysql:host=$server_servername;dbname=$server_database", $server_username, $server_password);
    if ($_SESSION['USER_DESIGNATION'] == 'hod') {
        $sql = "SELECT * FROM course_allotment where subDept='$_SESSION[USER_DEPARTMENT]' GROUP BY subName ORDER BY sno DESC ";
    } else if ($_SESSION['USER_DESIGNATION'] == 'admin') {
        $sql = "SELECT * FROM course_allotment GROUP BY subName ORDER BY sno DESC ";
    } else {
        $sql = "SELECT * FROM course_allotment where userId='$_SESSION[USER_ID]' GROUP BY subName ORDER BY sno DESC ";
    }

    $q = $pdo->query($sql);
    $q->setFetchMode(PDO::FETCH_ASSOC);
    $count = 0;
    $snos;
    ?>
    <table>
      <thead>
        <tr>
          <th>S.No</th>
          <th>Course Details</th>
          <th>Subject Name <?php if ($_SESSION['USER_DESIGNATION'] == 'hod') {echo '/ Faculty Name';}?></th>
          <th>Unit-Name</th>
        </tr>
      </thead>
      <tbody>
      <?php
while ($row = $q->fetch()): $count++;?>
	        <tr>
	          <td style="width:80px;text-align: center;font-weight: 700;"><?php echo $count; ?></td>
	          <td style="width:100px;text-align: center;"><?php echo $row['currentYear']; ?><br><?php echo $row['sem']; ?><br><?php echo $row['subDept']; ?><br><?php echo $row['ayYear']; ?></td>
	          <td style="text-align: center;width:250px;"><?php echo $row['subName']; ?><?php if ($_SESSION['USER_DESIGNATION'] == 'hod') {echo '</br><b> Faculty Assigned : ' . $row['userName'] . '</b>';}?></td>
	          <td style="padding: 0;">
	              <?php
    try
        {
            $pdoss = new PDO("mysql:host=$server_servername;dbname=$server_database", $server_username, $server_password);
            $sqlss = "SELECT * FROM course_distribution where subCode='$row[subCode]' GROUP BY unitName ORDER BY sno ASC ";
            $qss = $pdoss->query($sqlss);
            $qss->setFetchMode(PDO::FETCH_ASSOC);
            $countss = 0;
            ?>
	                  <table style="border:0;">
	                      <!--<thead>
	                        <tr>
	                          <th>Sno</th><th>Unit Name</th><th>Module Name</th>
	                        </tr>
	                      </thead>-->
	                      <tbody><?php
    while ($rowss = $qss->fetch()): $countss++;
                $sss = $rowss['sno'];?>
		                        <tr>
		                          <!--<td><?php echo $countss; ?></td>-->
		                          <td style="width:25%;text-align:center;border-left:0;border-top:0;">
		                            <span id="<?php echo 'unitnameedit' . $sss; ?>">
		                              <?php echo $rowss['unitName']; ?></span>
		                            </td>
		                          <td style="padding: 0;border-top:0;border-right:0;">
		                            <?php
        try
                {
                    $pdossa = new PDO("mysql:host=$server_servername;dbname=$server_database", $server_username, $server_password);
                    $sqlssa = "SELECT * FROM course_modules where unitName='$rowss[unitName]' and subCode='$rowss[subCode]' ORDER BY sno ASC ";
                    $qssa = $pdossa->query($sqlssa);
                    $qssa->setFetchMode(PDO::FETCH_ASSOC);
                    $countssa = 0;
                    ?>
		                                  <table>
		                                      <!--<thead>
		                                        <tr>
		                                          <th>Sno</th>
		                                          <th>Module Name</th>
		                                          <th>Current Status</th>
		                                          <th>Update Status</th>
		                                        </tr>
		                                      </thead>-->
		                                      <tbody>
		                                        <?php
        while ($rowssa = $qssa->fetch()): $countssa++;?>
			                                        <tr>
			                                          <!--<td><?php echo $countssa; ?></td>-->
			                                          <td style="width:25%;text-align:center;border-left:0;border-top:0;">
			                                            <?php echo $rowssa['moduleName']; ?></td>
			                                          <td style="width:20%;text-align:center;border-top:0;">
			                                            <?php if ($rowssa['status'] == "Pending") {
                            echo "<b>Pending</b>";
                        } else {
                            echo "Completed <br>" . $rowssa['regDate2'];
                        }
                        ?>
			                                          </td>
			                                          <?php $modulesno = $rowssa['sno'];?>

			                                        </tr>
			                                    <?php
        endwhile;
                    ?>
		                                  </tbody>
		                                    </table><?php
        } catch (PDOException $e) {
                    die("<div class='notfound'>An error occured Please contact Admin for more details</div>");
                }?>
		                          </td>
		                        </tr>
		                    <?php
    endwhile;
            ?>
	                  </tbody>
	                    </table><?php
    } catch (PDOException $e) {
            die("<div class='notfound'>An error occured Please contact Admin for more details</div>");
        }?>
	          </td>
	        </tr>
	      <?php endwhile;?>
      </tbody>
    </table>
    <?php
} catch (PDOException $e) {
    die("<div class='notfound'>An error occured Please contact Admin for more details</div>");
}

?>




  </div>
  </div>
  <?php include_once "../../php/includes/footer.php";?>
  <script type="text/javascript" src="../../assets/js/jquery-1.9.1.min.js"></script>
  <script type="text/javascript" src="../../assets/js/jquery.min.js"></script>
  <script type="text/javascript" src="../../assets/js/main.js"></script>
  <script type="text/javascript">
    function addnewModule(unitName,c) {
      //var unitName= document.getElementById('unitNamesssa').value;
      var moduleName= document.getElementById('moduleNamekk_'+c).value;
      var userNameName= document.getElementById('userNmaekk_'+c).value;
      values=['addnewmodule',unitName,moduleName,userNameName];
      if(moduleName!=""){
        var msg=SendToPhp(values,"../../php/controllers/AcadamicDepartments.php");
        window.location.href="course_allotment";
      }
    }
    function addnewUnit(subCode,count) {
      var unitName= document.getElementById('unitNamekk_'+count).value;
      var userId= document.getElementById('userIdkk').value;
      values=['addnewunit',subCode,unitName,userId];
      if(unitName!=""){
        var msg=SendToPhp(values,"../../php/controllers/AcadamicDepartments.php");
        window.location.href="course_allotment";
      }
    }
    function updateModuless(sno){
      var cdate= document.getElementById('currentDate'+sno).value;
      var cstatus= document.getElementById('currentstatus'+sno).value;
      var userId= document.getElementById('userIDdep'+sno).value;
      values=['updateModuleStatus',sno,cdate,cstatus,userId];
      if(cdate!=""){
        var msg=SendToPhp(values,"../../php/controllers/AcadamicDepartments.php");
        alert(msg);
        window.location.href="course_allotment";
      }
    }
    function DeleteModuless (sno){
      values=['DeleteModule',sno];
      var msg=SendToPhp(values,"../../php/controllers/AcadamicDepartments.php");
      window.location.href="course_allotment";
    }
    function deleteUnits (sno){
      values=['DeleteUnit',sno];
      var msg=SendToPhp(values,"../../php/controllers/AcadamicDepartments.php");
      window.location.href="course_allotment";
    }
    function editUnits (sno){
      var kkid=document.getElementById('unitnameedit'+sno);
      var kkval=document.getElementById('unitnameeditval'+sno).value;
      var kkbtn=document.getElementById('unitnameeditbtn'+sno);
      var cv='unitnameeditval'+sno;
      kkid.innerHTML="<input type='text' id='"+cv+"' value='"+kkval+"'>";
      kkbtn.innerHTML='<button class="btn btn-primary btn-sm" style="float:right;margin:1px;" onclick="editUnitsUpdate(\''+sno+'\')"><span class="fa fa-check"></span></button>';
    }
    function editUnitsUpdate(sno){
      var kkval=document.getElementById('unitnameeditval'+sno).value;
      var kkbtn=document.getElementById('unitnameeditbtn'+sno);
      values=['editUnit',sno,kkval];
      var msg=SendToPhp(values,"../../php/controllers/AcadamicDepartments.php");
      alert(msg);
      var kkid=document.getElementById('unitnameedit'+sno);
      kkid.innerHTML=kkval;
      kkbtn.innerHTML='<button class="btn btn-primary btn-sm" style="float:right;margin:1px;" onclick="editUnits(\''+sno+'\')"><span class="fa fa-pencil-alt"></span></button>';
      //window.location.href="course_allotment";
    }
  </script>
</body>
</html>