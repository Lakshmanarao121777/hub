<?php session_start();
if (!$_SESSION) {
    header("Location:../../php/includes/logout.php");
} else {
    if ($_SESSION['USER_TYPE'] != "student") {
        header("Location:../../php/includes/logout.php");
    }
}
include_once "../../php/config/config.inc.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>AIR-HUB :: RGUKT-RKV</title>

  <?php include_once "../../php/meta/meta.php";?>

  <link rel="stylesheet" type="text/css" href="../../assets/bootstrap/css/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="../../assets/fontawesome/css/all.css">
  <link rel="stylesheet" type="text/css" href="../../assets/fontawesome/css/fontawesome.css">
  <link rel="stylesheet" type="text/css" href="../../assets/css/_main.css">
  <link rel="stylesheet" type="text/css" href="../../assets/css/CheifWarden.css">
</head>
<style type="text/css">
.inp{width:23%;float: left;}
.inp .inp_name{width:100%;float: left;font-size:14px;font-weight:600;padding:10px 0;}
.inp .inp_value{width:100%;float: left;}
input[type="text"],input[type="date"],select{width:100%;font-size: 16px;height: 30px;border:1px solid gray;}
</style>
<body>
  <?php include_once "../../php/includes/head_logobox.php";?>
  <?php include_once "../../php/includes/top_nav.php";?>
  <?php include_once "../../php/includes/sidebar_Student.php";?>
  <div class="container bg_white" style="padding:0;">
    <ul class="bread">
      <li><a href="./" title=""><em><span class="fa fa-tachometer-alt"></span> Dashboard</em></a></li>
      <li><a href="olms_apply" title=""><em><span class="fa fa-logout"> </span> Leaves</em></a></li>
      <li class="breadcurrent"><a href="#" title=""><em><span class="fa fa-chart-bar"></span> Leavs Statistics</em></a></li>
    </ul>
    <br/>
    <h3><center><i>Student Out-Pass System (Pending Leaves)</i></center></h3>
    <input type="hidden" id="userId" placeholder="ID Number" value="<?php echo $_SESSION['USER_ID'] ?>">
    <?php include_once "../../php/config/Student.php";
$bb = getDetfresh('students_details', "where userId='" . $_SESSION['USER_ID'] . "'", 'Department');
$cyy = getDetfresh('students_details', "where userId='" . $_SESSION['USER_ID'] . "'", 'currentYear');?>
    <input type="hidden" id="cYear" value="<?php echo $cyy; ?>">
    <input type="hidden" id="branch" value="<?php echo $bb; ?>">
    <div class="inp">
      <div class="inp_name">Status </div>
      <div class="inp_value"><select id="status" onchange="load_olms_query()">
        <option value="all">All</option>
        <option value="pending">Pending</option>
        <option value="approved">Approved</option>
        <option value="rejected">Rejected</option>
        <option value="chekedOut">Sign-out</option>
        <option value="chekedOut">Sign-In</option>
        <option value="Cancel">Canceled</option>
      </select></div>
    </div>
    <div class="inp">
      <div class="inp_name">Current Class </div>
      <div class="inp_value"><select id="cClass" onchange="load_olms_query()">
        <option value="ALL">All</option>
      </select></div>
    </div>
    <div class="inp">
      <div class="inp_name">Applied Date </div>
      <div class="inp_value"><input type="date" name="" id="apdate" value='<?php echo date("Y-m-d"); ?>' onchange="load_olms_query()"></div>
    </div>
    <div class="inp">
      <div class="inp_name">leaving On </div>
      <div class="inp_value"><input type="date" name="" id="lvdate" value='<?php echo date("Y-m-d"); ?>' onchange="load_olms_query()"></div>
    </div>
    <div class="clear"></div><br>
    <div class="border-double"></div>
    <div id="olms">

    </div>
  </div>
  <?php include_once "../../php/includes/footer.php";?>
  <script type="text/javascript" src="../../assets/js/jquery-1.9.1.min.js"></script>
  <script type="text/javascript" src="../../assets/fontawesome/js/all.js"></script>
  <script type="text/javascript" src="../../assets/fontawesome/js/fontawesome.js"></script>
  <script type="text/javascript" src="../../assets/js/jquery.min.js"></script>
  <script type="text/javascript" src="../../assets/js/main.js"></script>
  <script type="text/javascript" src="../../assets/js/nicEdit-latest.js"></script> <script type="text/javascript">
  //<![CDATA[
        bkLib.onDomLoaded(function() { nicEditors.allTextAreas() });
    //]]>
    load_olms(0);
    function  load_olms(began){
      var end=began+20;
      var values =["load_olms",began,end,'all'];
      var msg=SendToPhp(values,"../../php/controllers/Student.php");
      addto("olms",msg);
    }
    function addto(id,msg){
      var aa=$("#"+id).html();
      selectionListDisplay(id,aa+msg);
    }
    function olms_action(ac,actions)
    {
      var values =["load_olms_update",ac,actions];
      var msg=SendToPhp(values,"../../php/controllers/Student.php");
      alert(msg);
      if(msg==" Sucessfull"){
        window.location.href="olms_all";
      }
    }
    $(function(){
      var dtToday = new Date();

      var month = dtToday.getMonth() + 1;
      var day = dtToday.getDate();
      var year = dtToday.getFullYear();
      if(month < 10)
          month = '0' + month.toString();
      if(day < 10)
          day = '0' + day.toString();
      var maxDate = year + '-' + month + '-' + day;
      datePickerSet('apdate','max',maxDate);
      datePickerSet('lvdate','min',maxDate);
  });
    function load_olms_query(){
      var userId=document.getElementById("userId").value;
      var status=document.getElementById("status").value;
      var branch=document.getElementById("branch").value;
      var cyear =document.getElementById("cYear").value;
      var cclass=document.getElementById("cClass").value;
      var apdate=document.getElementById("apdate").value;
      var lvdate=document.getElementById("lvdate").value;
      var values =["load_olms_query",userId,status,branch,cyear,cclass,apdate,lvdate];
      var msg=SendToPhp(values,"../../php/controllers/Student.php");
      selectionListDisplay("olms",msg);
    }
  </script>
</body>
</html>