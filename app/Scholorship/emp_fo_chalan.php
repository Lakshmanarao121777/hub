<?php session_start();
if (!$_SESSION) {
    header("Location:../../php/includes/logout.php");
} 
if($_SESSION['USER_TYPE'] !='employee'){header("Location:../../php/includes/logout.php");}
  $userId=$_SESSION['USER_ID'];

?> 
<!DOCTYPE html>
<html lang="en">
<head>
  <title>AIR-HUB :: RGUKT-RKV</title>

  <?php include_once "../../php/meta/meta.php";?>

  <link rel="stylesheet" type="text/css" href="../../assets/bootstrap/css/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="../../assets/fontawesome/css/all.css">
  <link rel="stylesheet" type="text/css" href="../../assets/css/_main.css">
  <link rel="stylesheet" type="text/css" href="../../assets/css/Attendance.css">
</head>
<style type="text/css">
  fieldset{width:48%;margin:10px 0 0 1.5%;border:1px solid gray;border-radius: 5px;float:left;border: 1px solid #ddd !important;min-width: 0; padding: 5px 5px 10px 5px;  position: relative; border-radius: 4px;background-color: #f5f5f5;}
  legend {font-size: 14px;font-weight: bold;width: 35%;border: 1px solid #ddd;border-radius: 4px;padding: 5px 5px 5px 10px;background-color: #ffffff;color: #D97214;}
  form{width:100%;}
  .inp{max-height:100%;margin:3px 0;}.inp.inp_name{max-height:100%;vertical-align: middle;padding:5px;}.inp_name::after{content:' : '}.inp.inp_value{max-height:100%;}.inp .inp_value input,select{border-radius:5px;border:1px solid gray;padding:5px;width:100%;}.inp::after{clear:both;}option{width:100%;padding:10px;font-size:14px;}
  red{color:red;}
  @media only screen and (max-width: 600px){
    fieldset{width:98%;margin:1%;}legend{width:100%;}
  }

</style>
<body>
  <?php include_once "../../php/includes/head_logobox.php";?>
  <?php include_once "../../php/includes/top_nav.php";?>
  <?php include_once "../../php/includes/sidebar_employee.php";?>
  <div class="container bg_white" style="padding:0 10px 50px 0;">
    <ul class="bread">
      <li><a href="../" title=""><em><span class="fa fa-tachometer-alt"></span> Dashboard</em></a></li>
      <li><a href="./" title=""><em><span class="fa fa-money-bill-alt"> </span> Scholorship</em></a></li>
      <li class="breadcurrent"><a href="" title=""><em><span class="fa fa-money-bill-alt"> </span> Challans</em></a></li>
    </ul>
    </ul>
    <?php if ($_SESSION['USER_TYPE'] == "employee") { ?>
    
    <fieldset><form name="ecd" method="POST" onsubmit='ecd();return false;'>
       <legend>Enter Challan Details</legend>
       <div class="inp">
         <div class="inp_name">UserId <red>*</red></div>
         <div class="inp_value"><input type="text" name="userId" required="required"></div>
       </div>
       <div class="inp">
         <div class="inp_name">Challan Number <red>*</red></div>
         <div class="inp_value"><input type="text" name="chalanNumber" required="required"></div>
       </div>
       <div class="inp">
         <div class="inp_name">Challan Date <red>*</red></div>
         <div class="inp_value"><input type="date" name="chalanDate" required="required"></div>
       </div>
       <div class="inp">
         <div class="inp_name">Credited Account <red>*</red></div>
         <div class="inp_value"><select name="account" required="required"><option value="">-- Select --</option><option value='Tution/Hostel Fee'>Tution/Hostel Fee</option><option value='Library'>Library Fee</option><option value='Examinations'>Examinations Fee</option><option value='Convocation'>Convocation Fee</option><option value='Certificates'>Certificates Fee</option><option value='Fine'>Fine Fee</option><option value='Rent'>Rent Fee</option><option value='Others'>Other Fee</option></select></div>
       </div>
       <div class="inp">
         <div class="inp_name">Remarks</div>
         <div class="inp_value"><input type="text" name=""></div>
       </div>
       <div class="clear"></div><br>
       <center><button type="submit" class="btn btn-success btn-sm"><span class="fa fa-check"></span> Get Details </button> <button type="reset" class="btn btn-warning btn-sm"><span class="fa fa-sync"></span> Reset </button> </center><br></form>
    </fieldset>
    <fieldset>
      <legend> Validate Challan</legend><form name="vc" method="POST" onsubmit>
      <div class="inp">
         <div class="inp_name">Challan Number<red>*</red></div>
         <div class="inp_value"><input type="text" name="chalanNumber"></div>
      </div>
      <div class="clear"></div><br>
      <center><button type="submit" class="btn btn-success btn-sm"><span class="fa fa-check"></span> Get Details </button> <button type="reset" class="btn btn-warning btn-sm"><span class="fa fa-sync"></span> Reset </button> </center><br></form>
    </fieldset>
    <fieldset>
      <legend> Upload Challan Details</legend>
    updatesoon.</br>
    </fieldset>
    <fieldset>
      <legend> Validate Challan</legend><form name="ec" method="POST" onsubmit>
      <div class="inp">
         <div class="inp_name">Challan Number<red>*</red></div>
         <div class="inp_value"><input type="text" name="chalanNumber"></div>
      </div>
      <div class="clear"></div><br>
      <center><button type="submit" class="btn btn-success btn-sm"><span class="fa fa-check"></span> Get Details </button> <button type="reset" class="btn btn-warning btn-sm"><span class="fa fa-sync"></span> Reset </button> </center><br></form>
    </fieldset>
    <?php } 
?>
<style type="text/css">#mydiv {
    position: absolute;
    z-index: 9;
    background-color: #f1f1f1;
    border: 1px solid #d3d3d3;
    text-align: center;
}

#mydivheader {
    padding: 10px;
    cursor: move;
    z-index: 10;
    background-color: #2196F3;
    color: #fff;
}</style>
  <!--<div id="mydiv">
   
    <div id="mydivheader">Click here to move</div>
    <p>Move</p>
    <p>this</p>
    <p>DIV</p>
  </div>-->


  </div>
  <?php include_once "../../php/includes/footer.php";?>
  <script type="text/javascript" src="../../assets/js/jquery-1.9.1.min.js"></script>
  <script type="text/javascript" src="../../assets/fontawesome/js/all.js"></script>
  <script type="text/javascript" src="../../assets/js/jquery.min.js"></script>
  <script type="text/javascript" src="../../assets/js/main.js"></script>
  <script type="text/javascript">
    // Make the DIV element draggable:
dragElement(document.getElementById("mydiv"));

function dragElement(elmnt) {
  var pos1 = 0, pos2 = 0, pos3 = 0, pos4 = 0;
  if (document.getElementById(elmnt.id + "header")) {
    // if present, the header is where you move the DIV from:
    document.getElementById(elmnt.id + "header").onmousedown = dragMouseDown;
  } else {
    // otherwise, move the DIV from anywhere inside the DIV: 
    elmnt.onmousedown = dragMouseDown;
  }

  function dragMouseDown(e) {
    e = e || window.event;
    e.preventDefault();
    // get the mouse cursor position at startup:
    pos3 = e.clientX;
    pos4 = e.clientY;
    document.onmouseup = closeDragElement;
    // call a function whenever the cursor moves:
    document.onmousemove = elementDrag;
  }

  function elementDrag(e) {
    e = e || window.event;
    e.preventDefault();
    // calculate the new cursor position:
    pos1 = pos3 - e.clientX;
    pos2 = pos4 - e.clientY;
    pos3 = e.clientX;
    pos4 = e.clientY;
    // set the element's new position:
    elmnt.style.top = (elmnt.offsetTop - pos2) + "px";
    elmnt.style.left = (elmnt.offsetLeft - pos1) + "px";
  }

  function closeDragElement() {
    // stop moving when mouse button is released:
    document.onmouseup = null;
    document.onmousemove = null;
  }
}
  </script>
</body>
</html>
