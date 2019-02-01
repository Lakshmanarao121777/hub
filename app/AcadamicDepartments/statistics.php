<?php session_start(); 
if(!$_SESSION){
  header("Location:../../php/includes/logout.php");
}
else
{
  if($_SESSION['USER_TYPE']!="employee"){
    header("Location:../../php/includes/logout.php");
  }
}
$dept=$_SESSION['USER_DEPARTMENT'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>AIR-HUB :: RGUKT-RKV</title>
  
  <?php include_once("../../php/meta/meta.php"); ?>

  <link rel="stylesheet" type="text/css" href="../../assets/bootstrap/css/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="../../assets/fontawesome/css/all.css">
  <link rel="stylesheet" type="text/css" href="../../assets/fontawesome/css/fontawesome.css">
  <link rel="stylesheet" type="text/css" href="../../assets/css/_main.css">
  <link rel="stylesheet" type="text/css" href="../../assets/css/AcadamicDepartments.css">
</head>
<body>
  <?php include_once("../../php/includes/head_logobox.php"); ?>
  <?php include_once("../../php/includes/top_nav.php"); ?>
  <?php include_once("../../php/includes/sidebar_AcadamicDepartments.php"); ?>
  <div class="container bg_white"><input type="hidden" name="selectBranch" id="selectBranch" value="<?php echo $dept; ?>"><style type="text/css">
table,th,td{border:1px solid gray;}
th{padding:10px;text-align:center;text-transform: uppercase;}
td{text-align:center;padding:5px;}
form{width:100%;float: left;}
select,input{width:60%;padding:10px;font-size: 18px;}
</style>
    <div class="bg_white" style="width:100%;padding:10px;float: left;">
    <div class="dash_box">
      <a href="statistics.php"> 
        <span class="fa fa-pencil-alt icon" ></span> <div class="link_text">  Sem Registration  <span class="fa fa-arrow-alt-circle-right sm-icon"> </span></div>
      </a>
    </div>
    <div class="dash_box">
      <div class="dash_inner_half">ENGG-1</div>
      <div class="dash_inner_half">ENGG-2</div>
      <div class="dash_inner_half">ENGG-3</div>
      <div class="dash_inner_half">ENGG-4</div>
      <div class="clear"></div>
      <div class="link_text"><span class="fa fa-chart-bar"></span><?php echo $dept; ?>  </div>
    </div>
    <div class="dash_box">
      <div class="dash_inner_half" id="ENGG-1_all"></div>
      <div class="dash_inner_half" id="ENGG-2_all"></div>
      <div class="dash_inner_half" id="ENGG-3_all"></div>
      <div class="dash_inner_half" id="ENGG-4_all"></div>
      <div class="clear"></div>
      <div class="link_text"><span class="fa fa-chart-bar"></span>  Total Students  </div>
    </div>
    <div class="dash_box">
      <div class="dash_inner_half" id="ENGG-1_reg"></div>
      <div class="dash_inner_half" id="ENGG-2_reg"></div>
      <div class="dash_inner_half" id="ENGG-3_reg"></div>
      <div class="dash_inner_half" id="ENGG-4_reg"></div>
      <div class="clear"></div>
      <div class="link_text"><span class="fa fa-chart-bar"></span> Registred Students </div>
    </div>
    <div class="dash_box">
      <div class="dash_inner_half" id="ENGG-1_un"></div>
      <div class="dash_inner_half" id="ENGG-2_un"></div>
      <div class="dash_inner_half" id="ENGG-3_un"></div>
      <div class="dash_inner_half" id="ENGG-4_un"></div>
      <div class="clear"></div>
      <div class="link_text"><span class="fa fa-chart-bar"></span> Un-Registred Students </div>
    </div>

     <div class="clear"></div>
     <hr></hr>
      <form action="" method="post" name="showdatalist">
        <div class="inp" >
          Select Year : 
          <select name="Selectyear" onchange="showCounting()">
            <option value="">All</option>
            <option value="ENGG-1">Engg-1</option>
            <option value="ENGG-2">Engg-2</option>
            <option value="ENGG-3">Engg-3</option>
            <option value="ENGG-4">Engg-4</option>
          </select>
        </div>
        <div class="inp">
          Branch : <input type="text" name="selectBranch" value="<?php echo $dept; ?>" readonly="readonly">
        </div>
      </form>
    </div>
    <div class="clear"></div>
     <hr></hr>
    <div class="col-12 bg_white list" id="lists">
    </div>
  </div>
  <?php include_once("../../php/includes/footer.php"); ?>
  <script type="text/javascript" src="../../assets/js/jquery-1.9.1.min.js"></script>
  <script type="text/javascript" src="../../assets/fontawesome/js/all.js"></script>
  <script type="text/javascript" src="../../assets/fontawesome/js/fontawesome.js"></script>
  <script type="text/javascript" src="../../assets/js/jquery.min.js"></script>
  <script type="text/javascript" src="../../assets/js/main.js"></script>
  <script type="text/javascript">
//showCounting();
fill_boxes();
function fill_boxes(){
  c_total('ENGG-1','all');c_total('ENGG-2','all');c_total('ENGG-3','all');c_total('ENGG-4','all');
  c_total('ENGG-1','reg');c_total('ENGG-2','reg');c_total('ENGG-3','reg');c_total('ENGG-4','reg');
  c_total('ENGG-1','un');c_total('ENGG-2','un');c_total('ENGG-3','un');c_total('ENGG-4','un');
}
function c_total(year,type){

  var branch   = document.getElementById('selectBranch').value;
  var showid=year+"_"+type;
  var values =['count_regshow_table',year,type,branch];
  var msg=SendToPhp(values,"../../php/controllers/AcadamicDepartments.php");

  //msg="00";
  selectionListDisplay(showid,msg);
  //alert(msg);
}
function showCounting()
{
  var year    = document.forms['showdatalist']['Selectyear'].value;
  var branch   = document.forms['showdatalist']['selectBranch'].value;

  var values =['regshowdata',year,branch];
  var msg=SendToPhp(values,"../../php/controllers/AcadamicDepartments.php");
  selectionListDisplay("lists",msg);
}
  </script>
</body>
</html>