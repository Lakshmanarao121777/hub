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
  <link rel="stylesheet" type="text/css" href="../../assets/css/_main.css">
  <link rel="stylesheet" type="text/css" href="../../assets/css/Student.css">
</head>
<style type="text/css">form{width:100%;}
.inp{padding:10px;}
textarea{height:50px;}
.container{width:100%;margin:0;}
.tab{position: relative;}
ul.tab {    list-style-type: none;   margin: 0 auto;   padding: 0;   overflow: hidden;   background-color: #f1f1f1;   width:75%;position: relative;}
ul.tab li {float: left;width: 30%;height: 45px;}
ul.tab li a {display: inline-block; color: black;text-align: center; padding: 10px 16px;text-decoration: none;transition: 0.3s;font-size: 17px;min-width:100%;}
ul.tab li a:hover {background-color: #ddd;border-radius: 10px 10px 0 0;}
ul.tab li a:focus{background-color:teal;border-radius: 10px 10px 0 0;color:white;font-size:18px;font-weight: 600;} .active_tab {background-color:teal;border-radius: 10px 10px 0 0;color:white;font-size:18px;font-weight: 600;}
.tabcontent {display: none;padding: 6px 12px;border-top: none;position:relative;border:1px solid rgba(150,150,150,0.2);width:90%;margin: 0 auto;}
.tab{width:100%;}
.tabcontent{width:100%;}
.login{min-width:100%;height:100%;}
</style>

<body>
  <?php include_once "../../php/includes/head_logobox.php";?>
  <?php include_once "../../php/includes/top_nav.php";?>
  <?php include_once "../../php/includes/sidebar_security.php";?>
  <div class="container bg_white">
    <div class="col-4 bg m10 boder1 login"style="padding:5px 2px 5px 2px">
      <ul class="tab">
        <li><a href="javascript:void(0)" class="tablinks" onclick="openpanel(event,'signout');return false;" id="defaultOpen"> Student Outing</a></li>
        <li><a href="javascript:void(0)" class="tablinks" onclick="openpanel(event,'signin')">Student In </a></li>
        <li><a href="javascript:void(0)" class="tablinks" onclick="openpanel(event,'search_stu')">Student Search </a></li>
      </ul>
      <div id="signout" class="tabcontent">
          <div id="olmsout"></div>
      </div>
      <div id="signin" class="tabcontent">
          <div id="olmsin"></div>
      </div>
      <div id="search_stu" class="tabcontent">
          <div id="olmsin_search"></div>
      </div>
    </div>
  </div>
  <?php include_once "../../php/includes/footer.php";?>

  <script type="text/javascript" src="../../assets/js/jquery.min.js"></script>
  <script type="text/javascript" src="../../assets/js/main.js"></script>
  <script type="text/javascript" src="../../assets/js/nicEdit-latest.js"></script> <script type="text/javascript">
	//<![CDATA[
        bkLib.onDomLoaded(function() { nicEditors.allTextAreas() });
  	//]]>
    function openpanel(evt,cityName) {
        var i, tabcontent, tablinks;
        tabcontent = document.getElementsByClassName("tabcontent");
        for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
        }
        tablinks = document.getElementsByClassName("tablinks");
        for (i = 0; i < tablinks.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(" active", "");
        }
        document.getElementById(cityName).style.display = "block";
        evt.currentTarget.className += " active_tab";
    }
    document.getElementById("defaultOpen").click();
  	load_olms_out(0);
    load_olms_in(0);
	  function  load_olms_out(began){
	  	var end=began+20;
	  	var values =["load_olms_out",began,end];
  		var msg=SendToPhp(values,"../../php/controllers/Security.php");
  		addto("olmsout",msg);
	  }
    function  load_olms_in(began){
      var end=began+20;
      var values =["load_olms_in",began,end];
      var msg=SendToPhp(values,"../../php/controllers/Security.php");
      addto("olmsin",msg);
    }
	  function addto(id,msg){
	  	var aa=$("#"+id).html();
	  	selectionListDisplay(id,aa+msg);
	  }
    function olms_action_security(ac,actions)
    {
      alert(ac+actions);
      if(actions=="chekedOut"){var values =["load_olms_update_out",ac,actions];}
      if(actions=="chekedIn"){var values =["load_olms_update_in",ac,actions];}
      var msg=SendToPhp(values,"../../php/controllers/Security.php");
      alert(msg);
      if(msg==" Sucessfull"){
        window.location.href="./";
      }

    }
	</script>
</body>
</html>