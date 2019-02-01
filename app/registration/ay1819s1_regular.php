<?php session_start();
if (!$_SESSION) {
    header("Location:../../php/includes/logout.php");
} else {
    if ($_SESSION['USER_TYPE'] != "student") {
        header("Location:../../php/includes/logout.php");
    }
    $stuId = $_SESSION['USER_ID'];
}
?>
<style type="text/css">
td,th{padding:10px;border:1px solid black;}
select{width:100%;}
option{width:100%;}
</style>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>AIR-HUB :: RGUKT-RKV</title>

  <?php include_once "../../php/meta/meta.php";?>

  <link rel="stylesheet" type="text/css" href="../../assets/bootstrap/css/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="../../assets/fontawesome/css/all.css">
  <link rel="stylesheet" type="text/css" href="../../assets/css/_main.css">
  <link rel="stylesheet" type="text/css" href="../../assets/css/Student.css">
</head>
<body>
  <?php include_once "../../php/includes/head_logobox.php";?>
  <?php include_once "../../php/includes/top_nav.php";?>
  <?php include_once "../../php/includes/sidebar_Student.php";?>
  <div class="container bg_white" style="padding:0;">
    <ul class="bread">
      <li><a href="../" title=""><em><span class="fa fa-tachometer-alt"></span> Dashboard</em></a></li>
      <li><a href="./" title=""><em><span class="fa fa-pencil-alt"> </span> Registrations</em></a></li>
      <li><a href="stu_regular" title=""><em><span class="fa fa-book"> </span> Regular Semister</em></a></li>
      <li class="breadcurrent"><a href="#" title=""><em><span class="fa fa-graduation-cap"></span> AY18-19 Regular Sem-1</em></a></li>
    </ul>
   <div class="stu_reg bg_white ball">
        </br>
        <b>Registred subject List:</b>
        <br><br>
        <?php
          include "../../php/config/config.inc.php";
          try { $sid = $stuId;
              $pdoaa = new PDO("mysql:host=$server_servername;dbname=$server_database", $server_username, $server_password);
              $sqlaa = "SELECT * FROM ay1819s1reg where userId='$sid'";
              $qaa = $pdoaa->query($sqlaa);
              $qaa->setFetchMode(PDO::FETCH_ASSOC);
              $countaa = 0;
              while ($rowaa = $qaa->fetch()): $countaa++;
                if($countaa ==1 ){echo'<table class="table table-condensed table-bordered table-striped table-responsive">
          <thead><tr><th>Subject Code</th> <th>Subject Name</th> <th>Credits</th> </tr>
          <tbody>';}
                echo"
	                  <tr>
	                  <td>".$rowaa['subjectCode']."</td>
	                  <td>".$rowaa['subName']."</td>
	                  <td>".$rowaa['credits']."</td>
	                </tr>";
            endwhile;
            } catch (PDOException $e) {
                die("<div class='notfound'>An error occured Please contact Admin for more details</div>");
            }
            ?>
          </tbody>
        </table></br>
      </div>

  </div>
  <?php include_once "../../php/includes/footer.php";?>
  <script type="text/javascript" src="../../assets/js/jquery-1.9.1.min.js"></script>
  <script type="text/javascript" src="../../assets/fontawesome/js/all.js"></script>
  <script type="text/javascript" src="../../assets/fontawesome/js/fontawesome.js"></script>
  <script type="text/javascript" src="../../assets/js/jquery.min.js"></script>
  <script type="text/javascript" src="../../assets/js/main.js"></script>
  <script type="text/javascript" src="../../assets/js/Student.js"></script>
</body>
</html>