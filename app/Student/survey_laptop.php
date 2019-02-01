<?php session_start();
if (!$_SESSION) {
    header("Location:../../php/includes/logout.php");
} else {
    if ($_SESSION['USER_TYPE'] != "student") {
        header("Location:../../php/includes/logout.php");
    }
    $uid = $_SESSION['USER_ID'];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>AIR-HUB :: RGUKT-RKV</title>

  <?php include_once "../../php/meta/meta.php";
include_once "../../php/config/Student.php";
?>

  <link rel="stylesheet" type="text/css" href="../../assets/bootstrap/css/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="../../assets/fontawesome/css/all.css">
  <link rel="stylesheet" type="text/css" href="../../assets/css/_main.css">
  <link rel="stylesheet" type="text/css" href="../../assets/css/Student.css">
</head>
<style type="text/css">
  form{padding:10px;width:70%;border:1px solid gray;margin:10px 0;}
  .inp .inp_value,.inp .inp_name{padding:5px;font-size: 16px;font-weight: 500;margin:1px 0;height:50px;}
  input[type="text"],select{width:100%;border:1px solid gray;border-radius:2px;padding:5px;margin:1px 0;}
  @media only screen and (max-width: 600px) { form{width:100%;}.inp .inp_value,.inp .inp_name{height:45px;padding:5px;font-size: 16px;font-weight: 500;width:100%;float: left;text-align: left;}
   }
</style>
<body>
  <?php include_once "../../php/includes/head_logobox.php";?>
  <?php include_once "../../php/includes/top_nav.php";?>
  <?php include_once "../../php/includes/sidebar_Student.php";?>
  <div class="container bg_white" style="padding:0;">
    <ul class="bread">
      <li><a href="./" title=""><em><span class="fa fa-tachometer-alt"></span> Dashboard</em></a></li>
      <li><a href="survey" title=""><em><span class="fa fa-question"> </span> Suervey</em></a></li>
      <li class="breadcurrent"><a href="#" title=""><em><span class="fa fa-laptop"></span> Lapttop Survey</em></a></li>
    </ul>
    <?php if (getCount("laptop_survey", "where userId='$uid'") == 0) {?>
    <form name="laptop_survey" onsubmit="survey_laptop('<?php echo $uid; ?>')" method="post" action="">
      <fieldset>
        <legend>Laptop Survey</legend>
        <div class="inp">
          <div class="inp_name">Student Id : </div>
          <div class="inp_value"><?php echo $uid; ?></div>
          <div class="inp_name">Student Name : </div>
          <div class="inp_value"><?php echo getDetfresh('students_details', "where userId='" . $_SESSION['USER_ID'] . "'", 'userName'); ?></div>
          <div class="inp_name">Laptop Serail No. : </div>
          <div class="inp_name"><input type="text" name="laptop_serial" autocomplete="off"></div>
          <div class="inp_name">Any Physical Problem with Laptop : </div>
          <div class="inp_name"><select name="laptop_prob_select" onchange="showhide()" id="statusp"><option value="no">No Problem</option><option value="yes">Yes,I have a Problem</option></select></div>
        </div>
        <div class="inp" id="statusprob" style="display:none;">
          <div class="inp_name">Discribe Your Problem Here : </div>
          <div class="inp_name"><textarea style="width: 100%;" placeholder="Discribe Your Problem Here" name="laptop_prob"></textarea></div>
        </div>
        <div class="clear"></div>
        <br/>
        <div class="inp">
          <button class="btn btn-info"><span class="fa fa-recycle"> </span>Reset </button> <button class="btn btn-success"><span class="fa fa-check"> </span> Save </button>
        </div>
      </fieldset>

    </form>
  <?php } else {echo "<br><div class='notfound'>Dear Student have alreaduy taken the survey</div>";?>
    <div class="inp" style="border:1px solid black;padding:10px;">
      <div class="inp_name">Student Id : </div>
      <div class="inp_value"><?php echo $uid; ?></div>
      <div class="inp_name">Student Name : </div>
      <div class="inp_value"><?php echo getDetfresh('laptop_survey', "where userId='" . $_SESSION['USER_ID'] . "'", 'userName'); ?></div>
      <div class="inp_name">Laptop Serial Number : </div>
      <div class="inp_value"><?php echo getDetfresh('laptop_survey', "where userId='" . $_SESSION['USER_ID'] . "'", 'laptop_serial'); ?></div>
      <div class="inp_name">Laptop Problem : </div>
      <div class="inp_value"><?php echo getDetfresh('laptop_survey', "where userId='" . $_SESSION['USER_ID'] . "'", 'problem'); ?></div>
    </div>

<?php
}?>
  </div>
  <?php include_once "../../php/includes/footer.php";?>
  <script type="text/javascript" src="../../assets/js/jquery-1.9.1.min.js"></script>
  <script type="text/javascript" src="../../assets/fontawesome/js/all.js"></script>
  <!--<script type="text/javascript" src="../../assets/fontawesome/js/fontawesome.js"></script>-->
  <script type="text/javascript" src="../../assets/js/jquery.min.js"></script>
  <script type="text/javascript" src="../../assets/js/main.js"></script>
  <script type="text/javascript" src="../../assets/js/Student.js"></script>
  <script type="text/javascript">
    showhide();
    function survey_laptop(userId){
       var laptop  = document.forms['laptop_survey']['laptop_serial'].value;
       var problemstatus  = document.forms['laptop_survey']['laptop_prob_select'].value;

      if(problemstatus=="yes"){
        var problem  = document.forms['laptop_survey']['laptop_prob'].value;
        var values =["laptop_survey",userId,laptop,problemstatus,problem];
      }
      else{
        var values =["laptop_survey",userId,laptop,problemstatus];
      }
      var msg=SendToPhp(values,"../../php/controllers/Student.php");
      if(msg="Success")
      {
        alert("Survey Successfully Completed.");
        window.location.href="survey_laptop";
      }
    }
    function showhide(){
      if(document.getElementById('statusp').value=="yes"){
        document.getElementById('statusprob').style.display = "block";
      }
      else{
        document.getElementById('statusprob').style.display = "none";
      }
    }
  </script>
</body>
</html>
