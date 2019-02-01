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
  <div class="container bg_white" style="padding:0 0 100px 0;">
    <ul class="bread">
      <li><a href="./" title=""><em><span class="fa fa-tachometer-alt"></span> Dashboard</em></a></li>
      <li><a href="survey" title=""><em><span class="fa fa-question"> </span> Suervey</em></a></li>
      <li class="breadcurrent"><a href="#" title=""><em><span class="fab fa-shirtsinbulk"></span> Amenities Survey</em></a></li>
    </ul>
    <br><br>
    <div class="notfound" id="display_fomr" style="display:none"> You have already submited the feedback </div>
    <div id="show_form"  style="display:none">
      <div class="inp">
        <div class="inp_name"> Did You Recived the College Uniform Dress? </div>
        <div class="inp_value"><select id="rec_uni_dress"  required="required" onchange="uniform('rec_uni_dress')"><option value="">-- Select Your Option --</option><option value="Yes">Recived</option><option value="No">Not-Recived</option></select></div>
      </div>
      <div id="qua_rec_uni_dress" style="display:none;">
        <div class="inp">
          <div class="inp_name"> What is quality of the College Uniform Dress?  </div>
          <div class="inp_value"><select id="qua_rec_uni_dress_state" onchange=""><option value="">-- Select Your Option --</option><option value="verygood">Very Good</option><option value="good">Good</option><option value="fine">Fine</option><option value="bad">Bad</option><option value="verybad">Very Bad</option></select></div>
        </div>  
      </div>
      <div class="inp">
        <div class="inp_name"> Did You Recived the College Sports Dress? </div>
        <div class="inp_value"><select id="rec_sports_dress"  required="required" onchange="uniform('rec_sports_dress')"><option value="">-- Select Your Option --</option><option value="Yes">Recived</option><option value="No">Not-Recived</option></select></div>
      </div>
      <div id="qua_rec_sports_dress" style="display:none;">
        <div class="inp">
          <div class="inp_name"> What is quality of the College Sports Dress?  </div>
          <div class="inp_value"><select id="qua_rec_sports_dress_state" onchange=""><option value="">-- Select Your Option --</option><option value="verygood">Very Good</option><option value="good">Good</option><option value="fine">Fine</option><option value="bad">Bad</option><option value="verybad">Very Bad</option></select></div>
        </div>  
      </div>
      <div class="inp">
        <div class="inp_name"> Did You Recived the College Formal Shoe? </div>
        <div class="inp_value"><select id="rec_formal_show"  required="required" onchange="uniform('rec_formal_show')"><option value="">-- Select Your Option --</option><option value="Yes">Recived</option><option value="No">Not-Recived</option></select></div>
      </div>
      <div id="qua_rec_formal_show" style="display:none;">
        <div class="inp">
          <div class="inp_name"> What is quality of the College Foraml shoe?  </div>
          <div class="inp_value"><select id="qua_rec_formal_show_state" onchange=""><option value="">-- Select Your Option --</option><option value="verygood">Very Good</option><option value="good">Good</option><option value="fine">Fine</option><option value="bad">Bad</option><option value="verybad">Very Bad</option></select></div>
        </div>  
      </div>
      <div class="inp">
        <div class="inp_name"> Did You Recived the College Sports Shoe? </div>
        <div class="inp_value"><select id="rec_sports_show"  required="required" onchange="uniform('rec_sports_show')"><option value="">-- Select Your Option --</option><option value="Yes">Recived</option><option value="No">Not-Recived</option></select></div>
      </div>
      <div id="qua_rec_sports_show" style="display:none;">
        <div class="inp">
          <div class="inp_name"> What is quality of the Sports Shoe?  </div>
          <div class="inp_value"><select id="qua_rec_sports_show_state" onchange=""><option value="">-- Select Your Option --</option><option value="verygood">Very Good</option><option value="good">Good</option><option value="fine">Fine</option><option value="bad">Bad</option><option value="verybad">Very Bad</option></select></div>
        </div>  
      </div>
      <div class="inp">
        <div class="inp_name"> Did You Recived the Blancket? </div>
        <div class="inp_value"><select id="rec_blancket"  required="required" onchange="uniform('rec_blancket')"><option value="">-- Select Your Option --</option><option value="Yes">Recived</option><option value="No">Not-Recived</option></select></div>
      </div>
      <div id="qua_rec_blancket" style="display:none;">
        <div class="inp">
          <div class="inp_name"> What is quality of the Blancket?  </div>
          <div class="inp_value"><select id="qua_rec_blancket_state" onchange=""><option value="">-- Select Your Option --</option><option value="verygood">Very Good</option><option value="good">Good</option><option value="fine">Fine</option><option value="bad">Bad</option><option value="verybad">Very Bad</option></select></div>
        </div>  
      </div>
      <div class="inp">
        <div class="inp_name"> Did You Recived the Pillow Cover? </div>
        <div class="inp_value"><select id="rec_pillow"  required="required" onchange="uniform('rec_pillow')"><option value="">-- Select Your Option --</option><option value="Yes">Recived</option><option value="No">Not-Recived</option></select></div>
      </div>
      <div id="qua_rec_pillow" style="display:none;">
        <div class="inp">
          <div class="inp_name"> What is quality of the Pillow Cover?  </div>
          <div class="inp_value"><select id="qua_rec_pillow_state" onchange=""><option value="">-- Select Your Option --</option><option value="verygood">Very Good</option><option value="good">Good</option><option value="fine">Fine</option><option value="bad">Bad</option><option value="verybad">Very Bad</option></select></div>
        </div>  
      </div>
      <div id="subbtn" style="display:none;">
        <center>
          <button class="btn btn-success btn-md" onclick="submitform('<?php echo $uid; ?>')"><span class="fa fa-check"></span> Submit Feedback </button> <button class="btn btn-warning btn-md" type="reset"><span class="fa fa-sync"></span> Reset </button>
        </center>
      </div>
    </div>
  </div>
  <?php include_once "../../php/includes/footer.php";?>
  <script type="text/javascript" src="../../assets/js/jquery-1.9.1.min.js"></script>
  <script type="text/javascript" src="../../assets/fontawesome/js/all.js"></script>
  <script type="text/javascript" src="../../assets/js/jquery.min.js"></script>
  <script type="text/javascript" src="../../assets/js/main.js"></script>
  <script type="text/javascript" src="../../assets/js/Student.js"></script>
  <script type="text/javascript">
    getcs('<?php echo $uid; ?>');
    function getcs(userId){
      values =['survey_aamities',userId];
      var msg = SendToPhp(values,"../../php/controllers/Student_New.php");
      alert(msg);
      if(msg >= 1){
        disBlock("display_fomr");
        disNone("show_form");
      }
      else{
        disNone("display_fomr");
        disBlock("show_form");
      }
      
    }
    function disBlock(divId){
      document.getElementById(divId).style.display = "block"; 
    }
    function disNone(divId){
      document.getElementById(divId).style.display = "none"; 
    }
    function uniform(divId){
      var unif= document.getElementById(divId).value;
      var div="qua_"+divId;
      if(unif=="Yes"){
        disBlock(div);
      }
      else{
        disNone(div);
      }
      submitbtn();
    }
    function submitbtn(){
      var unif= document.getElementById('rec_uni_dress').value;
      var sport_unif= document.getElementById('rec_sports_dress').value;
      var shoe= document.getElementById('rec_formal_show').value;
      var sport_shoe= document.getElementById('rec_sports_show').value;
      var blanket= document.getElementById('rec_blancket').value;
      var pillow= document.getElementById("rec_pillow").value;
      if( unif !="" && sport_unif !="" && shoe !="" && sport_shoe !="" && blanket !="" && pillow !=""){
        disBlock("subbtn");
      }
      else{
        disNone("subbtn");
      }
    }
    function submitform(userId){
      var unif= document.getElementById('rec_uni_dress').value;
      var sport_unif= document.getElementById('rec_sports_dress').value;
      var shoe= document.getElementById('rec_formal_show').value;
      var sport_shoe= document.getElementById('rec_sports_show').value;
      var blanket= document.getElementById('rec_blancket').value;
      var pillow= document.getElementById("rec_pillow").value;

      var unif_state="", sport_unif_state="", shoe_state="", sport_shoe_state="", blanket_state="", pillow_state="";

      if(unif=="Yes") { unif_state=document.getElementById("qua_rec_uni_dress_state").value; }
      if(sport_unif=="Yes"){sport_unif_state=document.getElementById('qua_rec_sports_dress_state').value; }
      if(shoe=="Yes"){shoe_state=document.getElementById('qua_rec_formal_show_state').value; }
      if(sport_shoe=="Yes"){sport_shoe_state=document.getElementById('qua_rec_sports_show_state').value; }
      if(blanket=="Yes"){blanket_state=document.getElementById('qua_rec_blancket_state').value; }
      if(pillow=="Yes"){pillow_state=document.getElementById('qua_rec_pillow_state').value; }

      values =['aamities',userId,unif,unif_state,sport_unif,sport_unif_state,shoe,shoe_state,sport_shoe,sport_shoe_state,blanket,blanket_state,pillow,pillow_state];
      var msg = SendToPhp(values,"../../php/controllers/Student_New.php");
      var obj = JSON.parse(msg);
      alert(msg);
      if(obj.message == "success"){
        snackbar("Feedback submitted Sucessfully.");
      }
      else{
        snackbar("Feedback not submitted.Please try again.");
      }
      getcs(userId);
    }

  </script>
</body>
</html>
