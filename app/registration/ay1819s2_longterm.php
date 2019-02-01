<?php session_start();
if (!$_SESSION) {
    header("Location:../../php/includes/logout.php");
} else {
    if ($_SESSION['USER_TYPE'] != "student") {
        header("Location:../../php/includes/logout.php");
    }
    $userId = $_SESSION["USER_ID"];
    include_once "../../php/config/DBActivityPHP.php";
    $designation = new DBActivityPHP();
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
  <link rel="stylesheet" type="text/css" href="../../assets/css/Student.css">
</head>
<style type="text/css">
form {width:100%;}
.cc{width:90%;margin:10px auto;}
.inp{width:50%;min-height:40px;}
.inp_name::after{content:":"}
.inp .inp_name{font-weight:600;font-size:13px;}
.inp .inp_name,.inp .inp_value{height: 100%;}
#sh{padding:10px;font-weight:900;font-size:16px;text-decoration: underline;}
@media only screen and (max-width: 768px) { 
  .cc{width:100%;margin:0;}
  .inp{width:100%;}
  .inp_name,.inp_value{width:50%;}
  
}
</style>
<body>
  <?php include_once "../../php/includes/head_logobox.php";?>
  <?php include_once "../../php/includes/top_nav.php";?>
  <?php include_once "../../php/includes/sidebar_Student.php";?>
  <div class="container bg_white" style="padding:0 0 50px 0;">
    <ul class="bread">
      <li><a href="../" title=""><em><span class="fa fa-tachometer-alt"></span> Dashboard</em></a></li>
      <li><a href="./" title=""><em><span class="fa fa-pencil-alt"> </span> Registrations</em></a></li>
      <li><a href="stu_longterm" title=""><em><span class="fa fa-book"> </span> Long Term</em></a></li>
      <li class="breadcurrent"><a href="#" title=""><em><span class="fa fa-graduation-cap"></span> AY18-19 Longterm Sem-2</em></a></li>
    </ul>
    <br>
    <center><h3><u>Sem-2 Long Term Registration</u></h3></center>

    <form method="POST" onsubmit="submitLongIntern('<?php echo $userId;?>');return false;" name='longintern'>
      <div class="cc">
        <div class="clear"></div>
        <hr></hr>
        <div class="clear"></div>
        <div id="sh">Student Details :-</div>
        <div class="clear"></div>
        <div class="inp">
          <div class="inp_name">UserId  </div>
          <div class="inp_value"><?php echo $userId; ?></div>
        </div>
        <div class="inp">
          <div class="inp_name">Name  </div>
          <div class="inp_value"><?php echo $designation->getColValue("students_details", "userId='$userId'", "userName"); ?></div>
        </div>
        <div class="inp">
          <div class="inp_name">Mobile  </div>
          <div class="inp_value"><?php echo $designation->getColValue("students_details", "userId='$userId'", "m1"); ?> , <?php echo $designation->getColValue("students_details", "userId='$userId'", "m2"); ?></div>
        </div>
        <div class="inp">
          <div class="inp_name">Email  </div>
          <div class="inp_value"><?php echo $designation->getColValue("students_details", "userId='$userId'", "email"); ?></div>
        </div>
        <div class="clear"></div>
        <hr></hr>
        <div id="sh">Parent Details :-</div>
        <div class="inp">
          <div class="inp_name">Parent Name  </div>
          <div class="inp_value"><?php echo $designation->getColValue("students_details", "userId='$userId'", "pname1"); ?></div>
        </div>
        <div class="inp">
          <div class="inp_name">Marent Mobile  </div>
          <div class="inp_value"><?php echo $designation->getColValue("students_details", "userId='$userId'", "pm1"); ?></div>
        </div>
        <div class="inp">
          <div class="inp_name">Perminent Address  </div>
          <div class="inp_value"><?php echo $designation->getColValue("students_details", "userId='$userId'", "paddress"); ?></div>
        </div>
        <div class="clear"></div>
        <hr></hr>
        <div id="sh">Company/Industry Details :-</div>
        <div class="inp">
          <div class="inp_name">Name of Company/Industry  </div>
          <div class="inp_value"><input type="text" name="nameofcompany" required="required" placeholder="Company/Industry Name" /></div>
        </div>
        <div class="inp">
          <div class="inp_name">How long the Internship  </div>
          <div class="inp_value"><input type="text" name="internlength" required="required" placeholder="Intern Period" />(In Months only)</div>
        </div>
        <div class="inp">
          <div class="inp_name">Address of Company/Industry  </div>
          <div class="inp_value"><input type="text" name="address" required="required" placeholder="Company/Industry Address" /></div>
        </div>
        <div class="inp">
          <div class="inp_name">Joining Date  </div>
          <div class="inp_value"><input type="date" name="joindate" required="required" /></div>
        </div>
        <div class="inp">
          <div class="inp_name">External Guide/HR Name  </div>
          <div class="inp_value"><input type="text" name="hrname" required="required" placeholder="External Guide/HR Name" /></div>
        </div>
        <div class="inp">
          <div class="inp_name">External Guide/HR Mobile  </div>
          <div class="inp_value"><input type="text" name="hrmobile" required="required" placeholder="External Guide/HR Mobile" /></div>
        </div>
        <div class="inp">
          <div class="inp_name">External Guide/HR Email  </div>
          <div class="inp_value"><input type="email" name="hremail" required="required" placeholder="External Guide/HR Email" /></div>
        </div>
        <div class="clear"></div>
        <hr></hr>
        <div id="sh">Internal Guide Details :-</div>
        <div class="inp">
          <div class="inp_name">Releving date from Institute  </div>
          <div class="inp_value"><input type="date" name="releving" required="required" /></div>
        </div>
        <div class="inp">
          <div class="inp_name">Internal Guide Name  </div>
          <div class="inp_value"><input type="text" name="guidename" required="required" placeholder="Internal Guide Name" /></div>
        </div>
        <div class="inp">
          <div class="inp_name">Internal Guide Mobile  </div>
          <div class="inp_value"><input type="text" name="guidemobile" required="required" placeholder="Internal Guide Mobile" /></div>
        </div>
        <div class="inp">
          <div class="inp_name">Internal Guide Email  </div>
          <div class="inp_value"><input type="email" name="guideemail" required="required" placeholder="Internal Guide Email" /></div>
        </div>
        <div class="clear"></div>
        <center>
         <button type="submit" class="btn btn-md btn-success"> <span class="fa fa-check"></span> Submit</button> 
         <button type="reset" class="btn btn-md btn-warning"> <span class="fa fa-sync"></span> reset</button> 
       </center>
      </div>
    </form>
  </div>
  <?php include_once "../../php/includes/footer.php";?>
  <script type="text/javascript" src="../../assets/js/jquery-1.9.1.min.js"></script>
  <script type="text/javascript" src="../../assets/fontawesome/js/fontawesome.js"></script>
  <script type="text/javascript" src="../../assets/js/jquery.min.js"></script>
  <script type="text/javascript" src="../../assets/js/main.js"></script>
  <script type="text/javascript">
    function submitLongIntern(userId){
      var nameofcompany = document.forms['longintern']['nameofcompany'].value;
      var internlength = document.forms['longintern']['internlength'].value;
      var address = document.forms['longintern']['address'].value;
      var joindate = document.forms['longintern']['joindate'].value;
      var hrname = document.forms['longintern']['hrname'].value;
      var hrmobile = document.forms['longintern']['hrmobile'].value;
      var hremail = document.forms['longintern']['hremail'].value;
      var releving = document.forms['longintern']['releving'].value;
      var guidename = document.forms['longintern']['guidename'].value;
      var guidemobile = document.forms['longintern']['guidemobile'].value;
      var guideemail = document.forms['longintern']['guideemail'].value;
      var values = ['lonterninsert',userId,nameofcompany,address,internlength,joindate,hrname,hrmobile,hremail,releving,guidename,guidemobile,guideemail];
      var msg = SendToPhp(values,"../../php/controllers/Student_New.php");
      alert(msg);
      var obj = JSON.parse(msg);
      if(obj.message=="success"){
        snackbar("Your response was recorded. We wish a very happy future. All the very Best.");
      }
    }
  </script>
</body>
</html>