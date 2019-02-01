<?php session_start();
if (!$_SESSION) {
    header("Location:../../php/includes/logout.php");
} else {
    if ($_SESSION['USER_TYPE'] != "employee") {
        header("Location:../../php/includes/logout.php");
    } else {
        function readCSV($csvFile)
        {
            $file = fopen($csvFile, 'r');
            while (!feof($file)) {$line[] = fgetcsv($file, 2048);}
            fclose($file_handle);
            return $line;
        }
        include_once "../../php/config/config.inc_results.php";
        $conn = mysqli_connect("$server_servername", "$server_username", "$server_password", "$server_database");
    }
}
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
  <link rel="stylesheet" type="text/css" href="../../assets/css/Exams.css">
</head>
<style type="text/css">
  table{width:90%;margin:10px;border:1px solid gray;}
  td{width:49%;padding:10px;font-size:16px;border:1px solid gray;}
</style>
<body>
  <?php include_once "../../php/includes/head_logobox.php";?>
  <?php include_once "../../php/includes/top_nav.php";?>
  <?php include_once "../../php/includes/sidebar_ExamSection.php";?>

  <div class="container bg_white">
    <!--<div class="bread">
     <ul class="breadcrumb"> You are here <span class="fa fa-angle-double-right"></span>
      <li><a href="index">Dashboard</a></li>
      <li><a href="#">Upload</a></li>
      <li>Results & Seating</li>
     </ul>
    </div> -->
    <div class="csv_uploadchip bg_white">
      <div class="result_upload_title">Upload Results WAT-1</div>
      <div class="csv_uplode">
        <form class="form-horizontal" action="" method="post" name="uploadCSV" enctype="multipart/form-data">
          <div class="input-row">
            <label class="control-label" style="width: 50%;">Select Year: </label> <select name="year" >
              <option value="ENGG-1">Engg-1</option><option value="ENGG-2">Engg-2</option><option value="ENGG-3">Engg-3</option><option value="ENGG-4">Engg-4</option><option value="PUC-1">PUC-1</option><option value="PUC-2">PUC-2</option>
            </select>
            <label class="control-label" style="width: 50%;">Select Exam: </label> <select name="exam">
              <option value="WAT-1">WAT-1</option><option value="WAT-2">WAT-2</option><option value="WAT-3">WAT-3</option><option value="WAT-4">WAT-4</option><option value="WAT-5">WAT-5</option><option value="WAT-6">WAT-6</option><option value="WAT-7">WAT-7</option><option value="WAT-8">WAT-8</option><option value="WAT-9">WAT-9</option><option value="WAT-10">WAT-10</option><option value="WAT-1">MID-1</option><option value="WAT-2">MID-2</option><option value="WAT-3">MID-3</option><option value="ENDSEM">END-SEM</option>
            </select>
            <label class="control-label">Choose CSV File : </label> <input
                  type="file" name="file" id="file" accept=".csv" class="upload">
            <button type="submit" id="submit" name="check_results" class="btn btn-submit" > Check and Import Results</button>
              <br />
          </div>
        </form>
      </div>
      <div clsaa="note_upload_csv">
        <?php if (isset($_POST["check_results"])) {
    $fileName = $_FILES["file"]["tmp_name"];
    $exam = $_POST['exam'];
    $year = $_POST['year'];
    echo "
            <table>
              <tr><td>Current Year</td> <td> " . $year . "</td></tr>
              <tr><td>Name of Examination </td> <td>" . $exam . "</td></tr>
              <tr><td>Name of Lines to be effected </td> <td>" . sizeof(readCSV($fileName)) . "</td></tr>
            </table>";
    if ($_FILES["file"]["size"] > 0) {
        $file = fopen($fileName, "r");
        while (($column = fgetcsv($file, 20000, ",")) !== false) {
            $sqlInsert = "INSERT into sem1_regular_result_temp (studentId,studentName,subjectName,subjectCode,w1,w1uploadBy,w1regDate,w1Date,exam,year)values ('" . $column[1] . "','" . $column[2] . "','" . $column[3] . "','" . $column[4] . "','" . $column[5] . "','" . $column[6] . "','" . $time . "','" . $column[7] . "','" . $exam . "','" . $year . "')";
            $result = mysqli_query($conn, $sqlInsert);
            if (!empty($result)) {
                $type = "success";
                $message = "CSV Data Imported into the Database";
            } else {
                $type = "error";
                $message = "Problem in Importing CSV Data";
            }
        }
    }
}
?>
      </div>
    </div>




















    <div class="csv_uploadchip bg_white">
      <div class="result_upload_title">Upload Seating </div>
      <div class="csv_uplode">
        <form class="form-horizontal" action="" method="post" name="uploadCSV" enctype="multipart/form-data">
          <div class="input-row">
            <label class="control-label" style="width: 50%;">Select Year: </label> <select name="year">
              <option value="ENGG-1">Engg-1</option><option value="ENGG-2">Engg-2</option><option value="ENGG-3">Engg-3</option><option value="ENGG-4">Engg-4</option><option value="PUC-1">PUC-1</option><option value="PUC-2">PUC-2</option>
            </select>
            <label class="control-label" style="width: 50%;">Select Exam: </label> <select name="exam">
              <option value="WAT-1">WAT-1</option><option value="WAT-2">WAT-2</option><option value="WAT-3">WAT-3</option><option value="WAT-4">WAT-4</option><option value="WAT-5">WAT-5</option><option value="WAT-6">WAT-6</option><option value="WAT-7">WAT-7</option><option value="WAT-8">WAT-8</option><option value="WAT-9">WAT-9</option><option value="WAT-10">WAT-10</option><option value="WAT-1">MID-1</option><option value="WAT-2">MID-2</option><option value="WAT-3">MID-3</option><option value="ENDSEM">END-SEM</option>
            </select>
            <label class="control-label">Choose CSV File : </label> <input
                  type="file" name="file" id="file" accept=".csv" class="upload">
            <button type="submit" id="submit" name="check_seating" class="btn btn-submit" > Check and Import Seating</button>
              <br />
          </div>
          <div id="labelError">    </div>
        </form>
      </div>
      <div clsaa="note_upload_csv">
        <?php if (isset($_POST["check_seating"])) {
    $fileName = $_FILES["file"]["tmp_name"];
    $exam = $_POST['exam'];
    $year = $_POST['year'];?>
          <table border="1">
            <tr><td>Current Year</td> <td><?php echo $year; ?></td></tr>
            <tr><td>Name of Examination </td> <td><?php echo $exam; ?></td></tr>
            <tr><td>Name of Lines to be effected </td> <td><?php echo sizeof(readCSV($fileName)); ?></td></tr>
          </table>
          <?php
$fileName = $_FILES["file"]["tmp_name"];
    if ($_FILES["file"]["size"] > 0) {
        $file = fopen($fileName, "r");
        while (($column = fgetcsv($file, 20000, ",")) !== false) {
            $sqlInsert = "INSERT into sem1_regular_seating_temp (studentId,studentName,subjectName,subjectCode,w1,w1uploadBy,w1regDate,w1Date,exam,year) values ('" . $column[1] . "','" . $column[2] . "','" . $column[3] . "','" . $column[4] . "','" . $column[5] . "','" . $column[6] . "','" . $time . "','" . $column[7] . "','" . $exam . "','" . $year . "')";
            $result = mysqli_query($conn, $sqlInsert);
            if (!empty($result)) {
                $type = "success";
                $message = "CSV Data Imported into the Database";
            } else {
                $type = "error";
                $message = "Problem in Importing CSV Data";
            }
        }
    }
}
?>
      </div>
    </div>
    <div class="clear"></div>
    <br>
    <div class="border-double"></div>
  </div>
  <?php include_once "../../php/includes/footer.php";?>
  <script type="text/javascript" src="../../assets/js/jquery-1.9.1.min.js"></script>
  <script type="text/javascript" src="../../assets/fontawesome/js/all.js"></script>
  <script type="text/javascript" src="../../assets/fontawesome/js/fontawesome.js"></script>
  <script type="text/javascript" src="../../assets/js/jquery.min.js"></script>
  <script type="text/javascript" src="../../assets/js/main.js"></script>
</body>
</html>