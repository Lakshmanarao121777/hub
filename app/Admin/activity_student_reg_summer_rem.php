<?php session_start();
if (!$_SESSION) {
    header("Location:../../php/includes/logout.php");
} else {
    if ($_SESSION['USER_TYPE'] != "employee") {
        header("Location:../../php/includes/logout.php");
    }
    $stuId;
}
?><!DOCTYPE html>
<html lang="en">
<head>
	<title>AIR-HUB :: RGUKT-RKV</title>

	<?php include_once "../../php/meta/meta.php";?>

	<link rel="stylesheet" type="text/css" href="../../assets/bootstrap/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="../../assets/fontawesome/css/all.css">
	<link rel="stylesheet" type="text/css" href="../../assets/css/_main.css">
	<link rel="stylesheet" type="text/css" href="../../assets/css/Admin.css">

</head>
<body>
	<?php include_once "../../php/includes/head_logobox.php";?>
	<?php include_once "../../php/includes/top_nav.php";?>
	<?php include_once "../../php/includes/sidebar_Admin.php";?>
	<div class="container bg_white">
    <style type="text/css">
      form {width:100%;}
      .cc{background:green;color:white;font-weight: 600;}
      .inp{width:100%;text-align:center;border:1px solid gray;border-top:0;}
      .inp .inp_name{width:10%;padding:0;text-align:center;}
      .inp .inp_value{width:70%;padding:0;border-left:2px solid gray;border-right:2px solid gray;text-align:center;}
      @media screen only(max-width: 768px){
      .cc{background:green;color:white;font-weight: 600;}
      .inp{width:100%;text-align:center;border:1px solid gray;border-top:0;}
      .inp .inp_name{min-width:15%;padding:0;text-align:center;}
      .inp .inp_value{width:70%;padding:0;border-left:2px solid gray;border-right:2px solid gray;text-align:center;}
      }
    </style>
    <div class="container bg_white" style="padding:0;">
      <ul class="bread">
        <li><a href="./" title=""><em><span class="fa fa-tachometer-alt"></span> Dashboard</em></a></li>
        <li><a href="registrations" title=""><em><span class="fa fa-user"> </span> Student Activityes</em></a></li>
        <li class="breadcurrent"><a href="#" title=""><em><span class="fa fa-graduation-cap"> </span> Summer Sum Remidial Registrations</em></a></li>
      </ul>
      <div class="inp">
        <div class="inp_name">Student Id : </div>
        <div class="inp_name"><input type="text" id="stu"> </div>
      </div>
      <?php $stuId;?>
      <?php
        include "../../php/config/config.inc.php";
        try {
            $pdo = new PDO("mysql:host=$server_servername;dbname=$server_database", $server_username, $server_password);
            $sql = "SELECT * FROM ay1819summersem where userId='$stuId' and status ='Registred' ORDER BY sno DESC";
            $q = $pdo->query($sql);
            $q->setFetchMode(PDO::FETCH_ASSOC);
            $count = 0;
            $credit;
            while ($row = $q->fetch()): $count++;
                if ($count == 1) {?>
                    <br/><h3><center>-: <u> Summer Semister Remedial Registraions </u> :-</center></h3>
                  <div class="inp cc">
                    <div class="inp_name">S.No.</div>
                    <div class="inp_value">Subject Name</div>
                    <div class="inp_name">Status</div>
                  </div> <?php }?>
                  <div class="inp">
                    <div class="inp_name"><?php echo $count; ?></div>
                    <div class="inp_value"><?php echo $row['subName']; ?></div>
                    <div class="inp_name"><?php echo $row['status']; ?></div>
                  </div>
                  <?php
          endwhile;?><br/><br/><?php
          if ($count == 0) {
                      try {
                          $pdo1 = new PDO("mysql:host=$server_servername;dbname=$server_database", $server_username, $server_password);
                          $sql1 = "SELECT * FROM ay1819summersem where userId='$stuId' ORDER BY sno DESC";
                          $q1 = $pdo1->query($sql1);
                          $q1->setFetchMode(PDO::FETCH_ASSOC);
                          $count1 = 0;
                          $credit1;
                          while ($row1 = $q1->fetch()): $count1++;
                              if ($count1 == 1) {?>
                              <form action="" method="post" class="summer_sum_reg" onsubmit='sumremreg("<?php echo $stuId; ?>");return false;'>
                                <br/><h3><center>-: <u> Summer Semister Remedial Registraions </u> :-</center></h3>
                              <div class="inp cc">
                                <div class="inp_name">S.No.</div>
                                <div class="inp_value">Subject Name</div>
                                <div class="inp_name">Action</div>
                              </div> <?php }?>
                              <div class="inp">
                                <div class="inp_name"><?php echo $count1; ?></div>
                                <div class="inp_value"><?php echo $row1['subName']; ?></div>
                                <div class="inp_name"><input type="checkbox" name="<?php echo 'sub' . $count1; ?>" value="<?php echo $row1['sno']; ?>"></div>
                              </div>
                              <?php
              endwhile;
                if ($count1 >= 1) {?><div class="inp">
                        <div class="inp_name"></div>
                        <div class="inp_value">
                          <button type="Submit" class="btn btn-success">Register</button>
                          <button type="reset" class="btn btn-warning">Reset</button><br/></div>
                      </div></form><br/><br/><?php } else {echo "
                        <div class='notfound'>You Don't any subjects to register in Summer Semister Remedial Mode</div>";
                    }
                } catch (PDOException $e) {
                    die("<div class='notfound'>An error occured Please contact Admin for more details</div>");
                }
            }
        } catch (PDOException $e) {
            die("<div class='notfound'>An error occured Please contact Admin for more details</div>");
        }
      ?>
    </div>
	</div>
	<?php include_once "../../php/includes/footer.php";?>
	<script type="text/javascript" src="../../assets/js/jquery-1.9.1.min.js"></script>
	<script type="text/javascript" src="../../assets/fontawesome/js/all.js"></script>
	<script type="text/javascript" src="../../assets/fontawesome/js/fontawesome.js"></script>
	<script type="text/javascript" src="../../assets/js/jquery.min.js"></script>
  <script type="text/javascript" src="../../assets/js/main.js"></script>
  <script type="text/javascript">
    function sumremreg(stuId){
    var form_data=$(".summer_sum_reg").serialize();
      var res = (form_data.replace("+","")).split("&");
      var values=[];
      for (var i=0;i<=(res.length+2);i++){
        if(i==0) { values[i]="summer_sem_rem_reg"; }
        else if(i==1) { values[i]=res.length; }
        else if(i==2) { values[i]=stuId; }
        else{
          values[i]=res[i-3];
          var ress = values[i].split("=");
          kk = ress[1];
          values[i]=kk.replace("+","");
        }
      }
      var msg=SendToPhp(values,"../../php/controllers/Student.php");
      snackbar(msg);
      window.loaction.href="ay1819summersemrem";
    }
  </script>
</body>
</html>