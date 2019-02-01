<?php session_start();
if (!$_SESSION) {
    header("Location:../../php/includes/logout.php");
} else {
    if ($_SESSION['USER_TYPE'] != "student") {
        header("Location:../../php/includes/logout.php");
    }
    $userId=$_SESSION['USER_ID'];
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
  <link rel="stylesheet" type="text/css" href="../../assets/css/Attendance.css">
</head>
<style>
  .inp{width:90%;margin:5px 5%;height:100%;}
  .inp_name{height:100%;}
  .inp_value input[type="text"],select{width:100%;padding:10px;}
</style>
<body>
  <?php include_once "../../php/includes/head_logobox.php";?>
  <?php include_once "../../php/includes/top_nav.php";?>
  <?php include_once "../../php/includes/sidebar_Student.php";?>
  <?php include_once "../../php/config/DBActivityPHP.php";$table_name='students_attendance';$activity_PHP = new DBActivityPHP;$userId=$userId;$date=date("d-m-Y");?>
  <div class="container bg_white" style="padding:0;">
    <ul class="bread">
      <li><a href="../" title=""><em><span class="fa fa-tachometer-alt"></span> Dashboard</em></a></li>
      <li><a href="./" title=""><em><span class="fa fa-calendar"> </span> Attendance Dashboard</em></a></li>
      <li class="breadcurrent"><a href="#" title=""><em><span class="fa fa-calendar-check"> </span> Attendance Marking</em></a></li>
    </ul>
    <?php if($activity_PHP->getColValue('students_details', "userId='$userId'" ,'currentClass')==""){  ?>
      <fieldset style="border:1px solid gray;border-radius:5px;width:90%;margin:5%;">
        <form name="classUpdate" method="post" onsubmit="updateClass('<?php echo $userId;?>')">
          <div class="inp">
            <div class="inp_name"> Select Acadamic Block : </div>
            <div class="inp_value"> 
              <select name="ab">
                <option value="AB1">Academic Block-1</option>
                <option value="AB2">Academic Block-2</option>
                <option value="CH">Chemical Dept. Block</option>
                <option value="CE">Civil Dept. Block</option>
                <option value="CS">CSE Dept. Block</option>
                <option value="EC">ECE Dept. Block</option>
                <option value="MM">MME Dept. Block</option>
                <option value="ME">Mechanical Dept. Block</option>
              </select>
            </div>
          </div>
          <div class="inp">
            <div class="inp_name"> Select Class : </div>
            <div class="inp_value"> 
              <select name="cc">
                <option value="G1">G-1</option><option value="G2">G-2</option>
                <option value="G3">G-3</option><option value="G4">G-4</option>
                <option value="G5">G-5</option><option value="G6">G-6</option>
                <option value="G7">G-7</option><option value="G8">G-8</option>
                <option value="G9">G-9</option><option value="G10">G-10</option>
                <option value="G11">G-11</option><option value="G12">G-12</option>
                <option value="G13">G-13</option><option value="G14">G-14</option>
                <option value="G15">G-15</option><option value="G16">G-16</option>
                <option value="G17">G-17</option><option value="G18">G-18</option>
                <option value="G19">G-19</option><option value="G20">G-20</option>
                <option value="G21">G-21</option><option value="G22">G-22</option>
                <option value="G23">G-23</option><option value="G24">G-24</option>

                <option value="F1">F-1</option><option value="F2">F-2</option>
                <option value="F3">F-3</option><option value="F4">F-4</option>
                <option value="F5">F-5</option><option value="F6">F-6</option>
                <option value="F7">F-7</option><option value="F8">F-8</option>
                <option value="F9">F-9</option><option value="F10">F-10</option>
                <option value="F11">F-11</option><option value="F12">F-12</option>
                <option value="F13">F-13</option><option value="F14">F-14</option>
                <option value="F15">F-15</option><option value="F16">F-16</option>
                <option value="F17">F-17</option><option value="F18">F-18</option>
                <option value="F19">F-19</option><option value="F20">F-20</option>
                <option value="F21">F-21</option><option value="F22">F-22</option>
                <option value="F23">F-23</option><option value="F24">F-24</option>

                <option value="S1">S-1</option><option value="S2">S-2</option>
                <option value="S3">S-3</option><option value="S4">S-4</option>
                <option value="S5">S-5</option><option value="S6">S-6</option>
                <option value="S7">S-7</option><option value="S8">S-8</option>
                <option value="S9">S-9</option><option value="S10">S-10</option>
                <option value="S11">S-11</option><option value="S12">S-12</option>
                <option value="S13">S-13</option><option value="S14">S-14</option>
                <option value="S15">S-15</option><option value="S16">S-16</option>
                <option value="S17">S-17</option><option value="S18">S-18</option>
                <option value="S19">S-19</option><option value="S20">S-20</option>
                <option value="S21">S-21</option><option value="S22">S-22</option>
                <option value="S23">S-23</option><option value="S24">S-24</option>

                <option value="T1">T-1</option><option value="T2">T-2</option>
                <option value="T3">T-3</option><option value="T04">T-4</option>
                <option value="T5">T-5</option><option value="T6">T-6</option>
                <option value="T7">T-7</option><option value="T8">T-8</option>
                <option value="T9">T-9</option><option value="T10">T-10</option>
                <option value="T11">T-11</option><option value="T12">T-12</option>
                <option value="T13">T-13</option><option value="T14">T-14</option>
                <option value="T15">T-15</option><option value="T16">T-16</option>
                <option value="T17">T-17</option><option value="T18">T-18</option>
                <option value="T19">T-19</option><option value="T20">T-20</option>
                <option value="T21">T-21</option><option value="T22">T-22</option>
                <option value="T23">T-23</option><option value="T24">T-24</option>
              </select>
            </div>
          </div>
          <center>
            <button class="btn btn-success btn-md" type="submit"><span class="fa fa-check"></span> Update </button>
            <button class="btn btn-warning btn-md" type="reset"><span class="fa fa-sync"></span> Re Set </button>
          </center>
        </form>
      </fieldset>
    <?php }
    else { ?>
      <div class="att_box">
        <div class="att_heading">Period -1</div>
        <div class="att_timeset">Period Timings</div>
        <div class="att_time">08:00 AM- 11:00 AM</div>
        <div class="att_timeset">Attendance Timings</div>
        <div class="att_time">08:00 AM- 09:30 PM</div>
        <?php 
          $count=$activity_PHP -> getCount($table_name,"userId='$userId' and date='$date' and s1time !='' ");
          $s1time=$activity_PHP->getColValue($table_name, "userId='$userId' and date='$date'" ,'s1time');
          if($count==0){
            if($s1time==""){
              if(date("H:i")>="08:00"&&date("H:i")<="09:30") {
              echo '<button onclick="markAttendance(\''.$userId.'\')" class="btn btn-primary btn-sm"><span class="fa fa-check"> </span> Mark Attendance (In-Time )</button>';
              }
              if(date("H:i")>="09:30"&&date("H:i")<="11:00") {
                echo '<button onclick="markAttendance(\''.$userId.'\')" class="btn btn-warning btn-sm"><span class="fa fa-check"> </span> Mark Attendance (In-Time )</button>';
              }
              else{
                echo'<div class="att_timeset">Attendance Not Marked.</div>';
              }
            }
            else{
              echo'<div class="att_timeset">Attendance Marked Successfully</div>';
            }
          }
          else{
            echo'<div class="att_timeset">Attendance Marked Successfully</div>';
          }
        ?>
      </div>
      <div class="att_box">
        <div class="att_heading">Period -2</div>
        <div class="att_timeset">Period Timings</div>
        <div class="att_time">11:00 AM- 01:00 PM</div>
        <div class="att_timeset">Attendance Timings</div>
        <div class="att_time">11:00 AM- 12:00 PM</div>
        <?php 
          $count=$activity_PHP -> getCount($table_name,"userId='$userId' and date='$date' and s2time !='' ");
          $s1time=$activity_PHP->getColValue($table_name, "userId='$userId' and date='$date'" ,'s2time');
          if($count==0){
            if($s1time==""){
              if(date("H:i")>="11:00"&&date("H:i")<="12:00") {
              echo '<button onclick="markAttendance(\''.$userId.'\')" class="btn btn-primary btn-sm"><span class="fa fa-check"> </span> Mark Attendance (In-Time )</button>';
              }
              if(date("H:i")>="12:00"&&date("H:i")<="13:00") {
                echo '<button onclick="markAttendance(\''.$userId.'\')" class="btn btn-warning btn-sm"><span class="fa fa-check"> </span> Mark Attendance (In-Time )</button>';
              }
              else{
                echo'<div class="att_timeset">Attendance Not Marked.</div>';
              }
            }
            else{
              echo'<div class="att_timeset">Attendance Marked Successfully</div>';
            }
          }
          else{
            echo'<div class="att_timeset">Attendance Marked Successfully</div>';
          }
        ?>
      </div>
      <div class="att_box">
        <div class="att_heading">Period -3</div>
        <div class="att_timeset">Period Timings</div>
        <div class="att_time">01:30 PM- 03:30 PM</div>
        <div class="att_timeset">Attendance Timings</div>
        <div class="att_time">01:30 PM- 02:30 PM</div>
        <?php 
          $count=$activity_PHP -> getCount($table_name,"userId='$userId' and date='$date' and s3time !='' ");
          $s1time=$activity_PHP->getColValue($table_name, "userId='$userId' and date='$date'" ,'s3time');
          if($count==0){
            if($s1time==""){
              if(date("H:i")>="13:30"&&date("H:i")<="14:30") {
              echo '<button onclick="markAttendance(\''.$userId.'\')" class="btn btn-primary btn-sm"><span class="fa fa-check"> </span> Mark Attendance (In-Time )</button>';
              }
              if(date("H:i")>="14:30"&&date("H:i")<="15:30") {
                echo '<button onclick="markAttendance(\''.$userId.'\')" class="btn btn-warning btn-sm"><span class="fa fa-check"> </span> Mark Attendance (In-Time )</button>';
              }
              else{
                echo'<div class="att_timeset">Attendance Not Marked.</div>';
              }
            }
            else{
              echo'<div class="att_timeset">Attendance Marked Successfully</div>';
            }
          }
          else{
            echo'<div class="att_timeset">Attendance Marked Successfully</div>';
          }
        ?>
      </div>
      <div class="att_box">
        <div class="att_heading">Period -4</div>
        <div class="att_timeset">Period Timings</div>
        <div class="att_time">03:30 AM- 05:30 PM</div>
        <div class="att_timeset">Attendance Timings</div>
        <div class="att_time">03:30 PM- 05:00 PM</div>
        <?php 
          $count=$activity_PHP -> getCount($table_name,"userId='$userId' and date='$date' and s4time !='' ");
          $s1time=$activity_PHP->getColValue($table_name, "userId='$userId' and date='$date'" ,'s4time');
          if($count==0){
            if($s1time==""){
              if(date("H:i")>="15:30"&&date("H:i")<="16:30") {
              echo '<button onclick="markAttendance(\''.$userId.'\')" class="btn btn-primary btn-sm"><span class="fa fa-check"> </span> Mark Attendance (In-Time )</button>';
              }
              if(date("H:i")>="16:30"&&date("H:i")<="17:30") {
                echo '<button onclick="markAttendance(\''.$userId.'\')" class="btn btn-warning btn-sm"><span class="fa fa-check"> </span> Mark Attendance (In-Time )</button>';
              }
              else{
                echo'<div class="att_timeset">Attendance Not Marked.</div>';
              }
            }
            else{
              echo'<div class="att_timeset">Attendance Marked Successfully</div>';
            }
          }
          else{
            echo'<div class="att_timeset">Attendance Marked Successfully</div>';
          }
        ?>
      </div>
      <div class="att_box">
        <div class="att_heading">Period -5</div>
        <div class="att_timeset">Period Timings</div>
        <div class="att_time">08:00 PM- 10:00 PM</div>
        <div class="att_timeset">Attendance Timings</div>
        <div class="att_time">08:00 PM- 08:45 PM</div>
        <?php 
          $count=$activity_PHP -> getCount($table_name,"userId='$userId' and date='$date' and s5time !='' ");
          $s1time=$activity_PHP->getColValue($table_name, "userId='$userId' and date='$date'" ,'s5time');
          if($count==0){
            if($s1time==""){
              if(date("H:i")>="20:00"&&date("H:i")<="20:45") {
              echo '<button onclick="markAttendance(\''.$userId.'\')" class="btn btn-primary btn-sm"><span class="fa fa-check"> </span> Mark Attendance (In-Time )</button>';
              }
              if(date("H:i")>="20:45"&&date("H:i")<="21:00") {
                echo '<button onclick="markAttendance(\''.$userId.'\')" class="btn btn-warning btn-sm"><span class="fa fa-check"> </span> Mark Attendance (In-Time )</button>';
              }
              else{
                echo'<div class="att_timeset">Attendance Not Marked.</div>';
              }
            }
            else{
              echo'<div class="att_timeset">Attendance Marked Successfully</div>';
            }
          }
          else{
            echo'<div class="att_timeset">Attendance Marked Successfully</div>';
          }
        ?>
      </div>
    <?php } ?>
  </div>
  <?php include_once "../../php/includes/footer.php";?>
  <script type="text/javascript" src="../../assets/js/jquery-1.9.1.min.js"></script>
  <script type="text/javascript" src="../../assets/fontawesome/js/all.js"></script>
  <script type="text/javascript" src="../../assets/js/jquery.min.js"></script>
  <script type="text/javascript" src="../../assets/js/main.js"></script>
  <script type="text/javascript" src="../../assets/js/Student.js"></script>
  <script type="text/javascript">
    function markAttendance(userId)
    {
      var values=['markingAtt_stu',userId];
      var msg=SendToPhp(values,"../../php/controllers/Attendance.php");
      var obj = JSON.parse(msg);
      if(obj.message=="success"||obj.Message=="success"){
        snackbar("Your Attendance was marked succssfully.");
        window.location.href="stu_attendance_marking";
      }
    }
    function updateClass(userId)
    {
      var cc=document.forms['classUpdate']['cc'].value;
      var ab=document.forms['classUpdate']['ab'].value;
      var values=['updateClasss',userId,ab+cc];
      var msg=SendToPhp(values,"../../php/controllers/Attendance.php");
      var obj = JSON.parse(msg);
      if(obj.Message=="success"){
        window.location.href="stu_attendance_marking";
      }
    }
  </script>
</body>
</html>
