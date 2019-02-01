<?php session_start();
if (!$_SESSION) {
    header("Location:../../php/includes/logout.php");
} else {
    if ($_SESSION['USER_TYPE'] != "employee") {
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
.inp{width:14.2%;float: left;}
.inp .inp_name{width:100%;float: left;font-size:14px;font-weight:600;padding:10px 0;}
.inp .inp_value{width:100%;float: left;}
input[type="text"],input[type="date"],select{width:100%;font-size: 16px;height: 30px;border:1px solid gray;}
@media only screen and (max-width: 600px) {
  .inp{width:100%; }
  }
</style>
<body>
  <?php include_once "../../php/includes/head_logobox.php";?>
  <?php include_once "../../php/includes/top_nav.php";?>
  <?php include_once "../../php/includes/sidebar_CheifWarden.php";?>
  <div class="container bg_white">

    <div class="dash_box">
        <a href="olms_approved">
          <span class="fa fa-user-check icon" ></span> <div class="link_text" style="background:#337AB7;"> Approved Leaves <span class="fa fa-arrow-alt-circle-right sm-icon"> </span></div>
        </a>
      </div>
    <div class="dash_box">
        <a href="olms_pending">
          <span class="fa fa-user-clock icon" ></span> <div class="link_text" style="background:#5BC0DE;"> Pending Leaves <span class="fa fa-arrow-alt-circle-right sm-icon"> </span></div>
        </a>
      </div>
      <div class="dash_box">
        <a href="olms_rejected">
          <span class="fa fa-user-times icon" ></span> <div class="link_text" style="background:#D9534F"> Rejected Leaves <span class="fa fa-arrow-alt-circle-right sm-icon"> </span></div>
        </a>
      </div>
      <div class="dash_box">
        <a href="olms_checkout">
          <span class="fa fa-sign-out-alt icon" ></span> <div class="link_text" style="background:#EEA53D;"> Checked-Out <span class="fa fa-arrow-alt-circle-right sm-icon"> </span></div>
        </a>
      </div>
      <div class="dash_box">
        <a href="olms_checkin">
          <span class="fa fa-sign-in-alt icon" ></span> <div class="link_text" style="background:#337AB7;"> Checked-In <span class="fa fa-arrow-alt-circle-right sm-icon"> </span></div>
        </a>
      </div>
      <!--<div class="dash_box">
        <a href="olms_stat">
          <span class="fa fa-chart-bar icon" ></span> <div class="link_text"> Statistices <span class="fa fa-arrow-alt-circle-right sm-icon"> </span></div>
        </a>
      </div>
      <div class="dash_box">
        <a href="olms_all">
          <span class="fa fa-sign-out-alt icon" ></span> <div class="link_text"> All <span class="fa fa-arrow-alt-circle-right sm-icon"> </span></div>
        </a>
      </div>-->
      <div class="clear"></div><br/>
    <h3><center><i>Student Out-Pass System (Statistices)</i></center></h3>
    <div class="inp">
      <div class="inp_name">Student ID </div>
      <div class="inp_value"><input type="text" id="userId" placeholder="ID Number" onkeyup="load_olms_query()"></div>
    </div>
    <div class="inp">
      <div class="inp_name">Status </div>
      <div class="inp_value"><select id="status" onchange="load_olms_query()">
        <option value="all">All</option>
        <option value="pending">Pending</option>
        <option value="approved">Approved</option>
        <option value="rejected">Rejected</option>
        <option value="chekedOut">Sign-out</option>
        <option value="chekedIn">Sign-In</option>
        <option value="Cancel">Canceled</option>
      </select></div>
    </div>
    <?php
if ($_SESSION['USER_ID'] == "WBP1" || $_SESSION['USER_ID'] == "WGP1") {?>
      <input type="hidden" id="cYear" value="PUC-1">
      <input type="hidden" id="branch" value="PUC-1">
    <?php } else if ($_SESSION['USER_ID'] == "WBP2" || $_SESSION['USER_ID'] == "WGP2") {?>
      <input type="hidden" id="cYear" value="PUC-2">
      <input type="hidden" id="branch" value="PUC-2">
    <?php } else if ($_SESSION['USER_ID'] == "WGPA" || $_SESSION['USER_ID'] == "WBPA") {?>
      <div class="inp">
        <div class="inp_name">Current Year </div>
        <div class="inp_value"><select id="cYear" onchange ="load_olms_query()">
          <option value="PUC-ALL">All</option>
          <option value="PUC-1">PUC-1</option>
          <option value="PUC-2">PUC-2</option>
        </select></div>
      </div>
      <div class="inp">
        <div class="inp_name">Branch </div>
        <div class="inp_value"><select id="branch" onchange="load_olms_query()">
          <option value="PUC-ALL">All</option>
          <option value="PUC-1">PUC-1</option>
          <option value="PUC-2">PUC-2</option>
        </select></div>
      </div>
    <?php } else if ($_SESSION['USER_ID'] == "WBE1" || $_SESSION['USER_ID'] == "WGE1") {?>
      <input type="hidden" id="cYear" value="ENGG-1">
      <div class="inp">
        <div class="inp_name">Branch </div>
        <div class="inp_value"><select id="branch" onchange="load_olms_query()">
          <option value="ENGG-ALL">All</option>
          <option value="CH">CHE</option>
          <option value="CE">CE</option>
          <option value="CS">CSE</option>
          <option value="EC">EC</option>
          <option value="ME">ME</option>
          <option value="MM">MM</option>
        </select></div>
      </div>
    <?php } else if ($_SESSION['USER_ID'] == "WBE2" || $_SESSION['USER_ID'] == "WGE2") {?>
      <input type="hidden" id="cYear" value="ENGG-2">
      <div class="inp">
        <div class="inp_name">Branch </div>
        <div class="inp_value"><select id="branch" onchange="load_olms_query()">
          <option value="ENGG-ALL">All</option>
          <option value="CH">CHE</option>
          <option value="CE">CE</option>
          <option value="CS">CSE</option>
          <option value="EC">EC</option>
          <option value="ME">ME</option>
          <option value="MM">MM</option>
        </select></div>
      </div>
    <?php } else if ($_SESSION['USER_ID'] == "WBE3" || $_SESSION['USER_ID'] == "WGE3") {?>
      <input type="hidden" id="cYear" value="ENGG-3">
      <div class="inp">
        <div class="inp_name">Branch </div>
        <div class="inp_value"><select id="branch" onchange="load_olms_query()">
          <option value="ENGG-ALL">All</option>
          <option value="CH">CHE</option>
          <option value="CE">CE</option>
          <option value="CS">CSE</option>
          <option value="EC">EC</option>
          <option value="ME">ME</option>
          <option value="MM">MM</option>
        </select></div>
      </div>
    <?php } else if ($_SESSION['USER_ID'] == "WBE4" || $_SESSION['USER_ID'] == "WGE4") {?>
      <input type="hidden" id="cYear" value="ENGG-4">
      <div class="inp">
        <div class="inp_name">Branch </div>
        <div class="inp_value"><select id="branch" onchange="load_olms_query()">
          <option value="ENGG-ALL">All</option>
          <option value="CH">CHE</option>
          <option value="CE">CE</option>
          <option value="CS">CSE</option>
          <option value="EC">EC</option>
          <option value="ME">ME</option>
          <option value="MM">MM</option>
        </select></div>
      </div>
    <?php } else if ($_SESSION['USER_ID'] == "WGEA" || $_SESSION['USER_ID'] == "WBEA") {?>
      <div class="inp">
        <div class="inp_name">Current Year </div>
        <div class="inp_value"><select id="cYear" onchange ="load_olms_query()">
          <option value="ENGG-ALL">All</option>
          <option value="ENGG-1">Engg-1</option>
          <option value="ENGG-2">Engg-2</option>
          <option value="ENGG-3">Engg-3</option>
          <option value="ENGG-4">Engg-4</option>
        </select></div>
      </div>
      <div class="inp">
        <div class="inp_name">Branch </div>
        <div class="inp_value"><select id="branch" onchange="load_olms_query()">
          <option value="ENGG-ALL">All</option>
          <option value="CH">CHE</option>
          <option value="CE">CE</option>
          <option value="CS">CSE</option>
          <option value="EC">EC</option>
          <option value="ME">ME</option>
          <option value="MM">MM</option>
        </select></div>
      </div>
    <?php } else {?>
      <div class="inp">
        <div class="inp_name">Current Year </div>
        <div class="inp_value"><select id="cYear" onchange ="load_olms_query()">
          <option value="ALL">All</option>
          <option value="PUC-1">PUC-1</option>
          <option value="PUC-2">PUC-2</option>
          <option value="ENGG-1">Engg-1</option>
          <option value="ENGG-2">Engg-2</option>
          <option value="ENGG-3">Engg-3</option>
          <option value="ENGG-4">Engg-4</option>
        </select></div>
      </div>
      <div class="inp">
        <div class="inp_name">Branch </div>
        <div class="inp_value"><select id="branch" onchange="load_olms_query()">
          <option value="ALL">All</option>
          <option value="PUC-1">PUC-1</option>
          <option value="PUC-2">PUC-2</option>
          <option value="CH">CHE</option>
          <option value="CE">CE</option>
          <option value="CS">CSE</option>
          <option value="EC">EC</option>
          <option value="ME">ME</option>
          <option value="MM">MM</option>
        </select></div>
      </div>
    <?php }
?>
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
    <div class="border-double"></div>
    <div class="clear"></div>
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
  		var msg=SendToPhp(values,"../../php/controllers/CheifWarden.php");
  		addto("olms",msg);
	  }
	  function addto(id,msg){
	  	var aa=$("#"+id).html();
	  	selectionListDisplay(id,aa+msg);
	  }
    function olms_action(ac,actions)
    {
      var values =["load_olms_update",ac,actions];
      var msg=SendToPhp(values,"../../php/controllers/CheifWarden.php");
      alert(msg);
      if(msg==" Sucessfull"){
        window.location.href="olms_stat";
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
    load_olms_query();
    function load_olms_query(){
      var userId=document.getElementById("userId").value;
      var status=document.getElementById("status").value;
      var branch=document.getElementById("branch").value;
      var cyear =document.getElementById("cYear").value;
      var cclass=document.getElementById("cClass").value;
      var apdate=document.getElementById("apdate").value;
      var lvdate=document.getElementById("lvdate").value;
      var values =["load_olms_query",userId,status,branch,cyear,cclass,apdate,lvdate];
      var msg=SendToPhp(values,"../../php/controllers/CheifWarden.php");
      selectionListDisplay("olms",msg);
    }
	</script>
</body>
</html>