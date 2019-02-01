
<?php session_start();
if (!$_SESSION) {
    header("Location:php/includes/logout.php");
} 
else {
  if ($_SESSION['USER_TYPE'] != "employee"){
    if($_SESSION['USER_ID'] != "R121777") {
      header("Location:php/includes/logout.php");
    }
  }
  else{
    if($_SESSION['USER_ID'] == "R121777") {
      header("Location:php/includes/logout.php");
    }
  }
}
?><!DOCTYPE html>
<html lang="en">
<head>
  <title>AIR-HUB :: RGUKT-RKV</title>

  <?php include_once "../php/meta/meta.php";?>

  <link rel="stylesheet" type="text/css" href="../assets/bootstrap/css/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="../assets/fontawesome/css/all.css">
  <link rel="stylesheet" type="text/css" href="../assets/css/_main.css">
  <link rel="stylesheet" type="text/css" href="../assets/css/Student.css">

</head>
<style type="text/css">
  form{width:100%;}
  .inp{min-height:100%;width:100%;}
  .inp_value input[type="text"]{max-width:100%;}
  .inp_value input[type="file"]{max-width:100%;}
  .inp_value select{width:100%;height:100%;padding:3px 5px;}
  .inp_value {height:100%;}
  fieldset{width:100%;float:left;margin:0;border:1px solid gray;}
  .inp_name{text-align: left;}
  .inp{width:100%;float: left;}
  .inp .inp_name{text-align: right;height: 100%;font-weight: 600;width:50%;}
  .inp .inp_value{float: left;height: 100%;font-size:15px;width:50%;}
  @media only screen and (max-width: 768px) { 
    .container ul.tab>li a.tablinks{min-width:20px;}
    fieldset{width:100%;}
    legend{min-width:100%;margin:0;}
    .inp{width:100%;float: left;}
    .inp .inp_name{width:100%;text-align: left;height: 100%;font-weight: 600;}
    .inp .inp_value{width:100%;float: left;height: 100%;font-size:15px;}
    .inp_value input[type="text"]{max-width:100%;}
    .inp_value input[type="date"]{max-width:100%;}
  }
</style>
<body>
  <?php include_once "../php/includes/head_logobox.php";?>
  <?php include_once "../php/includes/top_nav.php";?>
  <div class="container bg_white" style="padding:20px;width:100%;left:0;">
    <div class="col-md-12 no-padding"> 
      <center>
        <button class="btn btn-info btn-md">
          <a href="index_old" class="btn-link"> Go to uploader </a>
        </button>
      </center>
      <?php
        if(isset($_POST["submit"])) {
          $total = count($_FILES['fileToUpload']['name']);
          $target_dir = $_POST["fileDir"];
          $uploadOk = 1;
          for( $i=0 ; $i < $total ; $i++ ) {
          $target_file = basename($_FILES["fileToUpload"]["name"][$i]);
            if (file_exists($target_dir.'/'.$target_file)) {
              if(unlink($target_dir. "/" . $target_file))
              { 
                if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"][$i], $target_dir.'/'.$target_file)) {
                  echo "<div class='notfound'>The file ". basename( $_FILES["fileToUpload"]["name"][$i]). " has been uploaded.</div>";
                } else {
                    echo "<div class='btn btn-warning'>Sorry, there was an error uploading your file.</div>";
                }
              }
            }
            else {
              if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"][$i], $target_dir.'/'.$target_file)) {
                  echo "<div class='notfound'>The file ". basename( $_FILES["fileToUpload"]["name"][$i]). " has been uploaded.</div>";
              } else {
                  echo "<div class='btn btn-warning'>Sorry, there was an error uploading your file.</div>";
              }
            }
          }
        }
      ?>
    </div>
  </div>
  <?php include_once "../php/includes/footer.php";?>
  <script type="text/javascript" src="../assets/js/jquery-1.9.1.min.js"></script>
  <script type="text/javascript" src="../assets/fontawesome/js/all.js"></script>
  <script type="text/javascript" src="../assets/fontawesome/js/fontawesome.js"></script>
  <script type="text/javascript" src="../assets/js/jquery.min.js"></script>
  <script type="text/javascript" src="../assets/js/main.js"></script>
</body>
</html>