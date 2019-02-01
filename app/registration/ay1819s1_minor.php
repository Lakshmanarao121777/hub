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
?> 
<!DOCTYPE html>
<html lang="en">
<head>
  <title>AIR-HUB :: RGUKT-RKV</title>
  
  <?php include_once("../../php/meta/meta.php"); ?>

  <link rel="stylesheet" type="text/css" href="../../assets/bootstrap/css/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="../../assets/fontawesome/css/all.css">
  <link rel="stylesheet" type="text/css" href="../../assets/css/_main.css">
  <link rel="stylesheet" type="text/css" href="../../assets/css/Student.css">
</head>

<body><style type="text/css">
  .inp{height:70px;}
  .inp .inp_name,.inp .inp_value{font-size:18px;padding-bottom: 10px;height:70px;}
  select{padding:10px;}
  table{width: 100%;border:1px solid black;}
  thead{background:green;color:white;}
  th{padding:10px;text-align:center;font-size:18px;border:1px solid white;}
  tbody td{padding:10px;text-align:center;text-align:left;border:1px solid black;}
  form{width:80%;margin-left:10%;}

</style>
  <?php include_once("../../php/includes/head_logobox.php"); ?>
  <?php include_once("../../php/includes/top_nav.php"); ?>
  <?php include_once("../../php/includes/sidebar_Student.php"); ?>
  <div class="container bg_white" style="padding:0;">
    <ul class="bread">
      <li><a href="../" title=""><em><span class="fa fa-tachometer-alt"></span> Dashboard</em></a></li>
      <li><a href="./" title=""><em><span class="fa fa-pencil-alt"> </span> Registrations</em></a></li>
      <li><a href="stu_minor" title=""><em><span class="fa fa-book"> </span> Minor Semister</em></a></li>
      <li class="breadcurrent"><a href="#" title=""><em><span class="fa fa-graduation-cap"></span> AY18-19 Minor Sem-1</em></a></li>
    </ul>
    <h2> <center><b>-:MINOR Registraions:-</b></center></h2><br/><?php
    include("../../php/config/config.inc.php");
    try { 
      $pdo1 = new PDO("mysql:host=$server_servername;dbname=$server_database", $server_username, $server_password);
      $sql1 = "SELECT * FROM minor_reg where userId='$_SESSION[USER_ID]' ORDER BY sno DESC";
      $q1 = $pdo1->query($sql1);
      $q1->setFetchMode(PDO::FETCH_ASSOC); 
      $count1=0;$credit1;
      while ($row1 =$q1->fetch() ): $count1++; if($count1==1){ ?>
        <table class="table table-condensed table-bordered table-striped table-responsive">
          <thead>
            <tr>
              <th>S.No</th><th>ID No</th><th>Minor Branch</th><th>Subject Name</th><th>Status</th>
            </tr>
          </thead>
          <tbody id="reg_form">
            <?php } ?>
          
        <tr>
            <td><?php echo $count1; ?></td>
            <td><?php echo $row1['userId']; ?></td>
            <td><?php echo $row1['minorBranch']; ?></td>
            <td><?php echo $row1['subName']; ?> </td>
            <td>Registred </td>
          </tr><?php
      endwhile; if($count1<= 0){ ?>
        <div class="inp">
        <div class="inp_name">Select Minor Department</div>
        <div class="inp_value">
          <?php $stuId=$_SESSION["USER_ID"]; ?>
          <select onchange="load_subjects('<?php echo$stuId;?>')" id="selcetBranch">
            <option value="">Select Department</option>
            <option value="MATHEMATICS">Mathematics</option>
            <option value="PHYSICS">Physics</option>
            <option value="CHEMISTRY">Chemistry</option>
            <option value="VOCAL">Vocal</option>
            <option value="KUCHIPUDI">Kuchiudi</option>
            <option value="CSE">CSE</option>
            <option value="ECE">ECE</option>
            <option value="TELUGU">Telugu</option>
            <option value="ENGLISH">English</option>
            <option value="MANAGEMENT">Management</option>
          </select>
        </div>
      </div>
      Note:-<br/>
          <ul>
            <li>You should register the subjects which belongs only one branch.</li>
            <li>Those who are willing to take Physics as minor they should register for 4 subjects.</li>
            <li>If Number of subjects in Physics is exceeds 4 ,The first 4 will be considered.</li>
            <li>If No of subjects in any other is exceeds 2 ,The first 2 will be considered.
            </li>
          </ul>
        <div class="clear"></div>
        <div class="border-double"></div>
      <div class="inp">
        <form action="" method="post" class="minor_regs" onsubmit='minor_reg("<?php echo $stuId; ?> ");return false;' >
          <table class="table table-condensed table-bordered table-striped table-responsive">
            <thead>
              <tr>
                <th>S.No</th><th>Minor Branch</th><th>Subject Name</th><th>C Year</th><th>Action</th>
              </tr>
            </thead>
            <tbody id="reg_form">
              
            </tbody>
          </table>
        </form>
      </div>
      <?php
      }
      else{
        ?></tbody>
        </table><br/><br/><?php
      }
    } 
    catch (PDOException $e) {
      die("<div class='notfound'>An error occured Please contact Admin for more details</div>");
    }
    ?>
  </div>
  <?php include_once("../../php/includes/footer.php"); ?>
  <script type="text/javascript" src="../../assets/js/jquery-1.9.1.min.js"></script>
  <script type="text/javascript" src="../../assets/fontawesome/js/all.js"></script>
  <script type="text/javascript" src="../../assets/fontawesome/js/fontawesome.js"></script>
  <script type="text/javascript" src="../../assets/js/jquery.min.js"></script>
  <script type="text/javascript" src="../../assets/js/main.js"></script>
  <script type="text/javascript" src="../../assets/js/Student.js"></script>
  <script type="text/javascript">
    function load_subjects(uid)
    {
      var branch=document.getElementById('selcetBranch').value;
      var values =["minor_show",branch,uid];
      var msg=SendToPhp(values,"../../php/controllers/Student.php");
      selectionListDisplay("reg_form",msg);
    }
    function minor_reg(stuId){
      var form_data=$(".minor_regs").serialize();
      var res = (form_data.replace("+","")).split("&");
      var values=[];
      for (var i=0;i<=(res.length+2);i++){
        if(i==0) { values[i]="minor"; }
        else if(i==1) { values[i]=res.length; }
        else if(i==2) { values[i]=stuId; }
        else{ 
          values[i]=res[i-3];
          var ress = values[i].split("=");
          kk = ress[1]; 
          values[i]=kk.replace("+","");
        }
      }if(res.length<=4 & res.length>=2)
      {
        var msg=SendToPhp(values,"../../php/controllers/Student.php");
        alert(msg);
        window.loaction.href="minor.php";
      }
      else{
        alert("You Must select 2 subjects,\nIncase of Physics you must select 4 Subjects");
      }
    }
  </script>
</body>
</html>