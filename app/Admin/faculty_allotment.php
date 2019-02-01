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
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>AIR-HUB :: RGUKT-RKV</title>
  
  <?php include_once("../../php/meta/meta.php"); ?>

  <link rel="stylesheet" type="text/css" href="../../assets/bootstrap/css/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="../../assets/fontawesome/css/all.css">
  <link rel="stylesheet" type="text/css" href="../../assets/css/_main.css">
  <link rel="stylesheet" type="text/css" href="../../assets/css/Admin.css">
</head>
<style type="text/css">
.inp{width:40%;}
  .inp .inp_name,.inp .inp_value{width:50%;float: left;font-size:20px;}
  select{width:100%;padding:10px;}
  option{padding:5px;}
  td,th{border:1px solid gray;padding:1px 5px;}
  table{width:100%;}


</style>
<body>
  <?php include_once("../../php/includes/head_logobox.php"); ?>
  <?php include_once("../../php/includes/top_nav.php"); ?>
  <?php include_once("../../php/includes/sidebar_Admin.php"); $user_dept=$_SESSION['USER_DEPARTMENT'];?>
  <div class="container bg_white">
    <?php 
    if($_SESSION['USER_DESIGNATION']!="admin" )
      {
        echo("<div class='notfound'>Your are not Authorised to access the page.<br> Please contact your Administrator <a href='#'' onClick='javascript:history.go(-1);''>Go Back to previous Page </a></div>");
      }
      else{
    ?>
    <br>
    <h3><center>-: <i> <u>Course Allotment for Faculty</u></i> :-</center></h3>
    <?php 
      include("../../php/config/config.inc.php");
        try { 
          $pdo = new PDO("mysql:host=$server_servername;dbname=$server_database", $server_username, $server_password);
          $sql = "SELECT * FROM course_allotment ORDER BY sno DESC ";
          $q = $pdo->query($sql);
          $q->setFetchMode(PDO::FETCH_ASSOC); 
          $count=0;$snos;
          ?>
          <table>
            <thead>
              <tr>
                <th>S.No</th>
                <th>Course Year</th>
                <th>Course Semister</th>
                <th>Course Branch</th>
                <th>Course AY</th>
                <th>Subject Name</th>
                <th>Faculty Name</th>
              </tr>
            </thead>
            <tbody>
          <?php
          while ($row =$q->fetch() ): $count++; ?>
              <tr>
                <td><?php echo $count; ?></td>
                <td><?php echo $row['currentYear']; ?></td>
                <td><?php echo $row['sem']; ?></td>
                <td><?php echo $row['subDept']; ?></td>
                <td><?php echo $row['ayYear']; ?></td>
                <td><?php echo $row['subName']; ?></td>
                <td><?php echo $row['userName']; ?></td>
              </tr>
          <?php endwhile; ?>
              </tbody>
          </table>
          <?php
        }
        catch (PDOException $e) {
          die("<div class='notfound'>An error occured Please contact Admin for more details</div>");
        }
    ?>
    <div id="listofsub">
      <?php 
        include("../../php/config/config.inc.php");
        try { 
          $pdo = new PDO("mysql:host=$server_servername;dbname=$server_database", $server_username, $server_password);
          $sql = "SELECT * FROM subjects GROUP BY subYear,subDept ORDER BY sno ASC ";
          $q = $pdo->query($sql);
          $q->setFetchMode(PDO::FETCH_ASSOC); 
          $count=0;$snos;
          ?>
          <table>
            <thead>
              <tr>
                <th>S.No</th>
                <th>Course Year</th>
                <th>Course Semister</th>
                <th>Course Branch</th>
                <th>Course AY</th>
                <th>Subject Name</th>
                <th>Faculty Name</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <br>
          <?php
          while ($row =$q->fetch() ): $count++; ?>
              <tr>
                <td><?php echo $count; ?></td>
                <td><input type="hidden" id="selectYear" value="<?php echo $row['subYear']; ?>"><?php echo $row['subYear']; ?></td>
                <td><input type="hidden" id="selectSem" value="<?php echo $row['subSem']; ?>"><?php echo $row['subSem']; ?></td>
                <td><input type="hidden" id="selectDept" value="<?php echo $row['subDept']; ?>"><?php echo $row['subDept']; ?></td>
                <td><input type="hidden" id="selectAy" value="AY18-19"><?php echo "AY18-19"; ?></td>
                <td>
                  <select id="selectSub">
                    <?php
                      try { 
                        $pdoj = new PDO("mysql:host=$server_servername;dbname=$server_database", $server_username, $server_password);
                        $sqlj = "SELECT * FROM subjects where subDept='$row[subDept]' and subYear='$row[subYear]' ORDER BY sno DESC ";
                        $qj = $pdoj->query($sqlj);
                        $qj->setFetchMode(PDO::FETCH_ASSOC); 
                        $countj=0;
                        while ($rowj =$qj->fetch() ): $countj++;?>
                          <option value="<?php echo $rowj['subCode']; ?>"><?php echo $rowj['subName']; ?></option>
                        <?php endwhile;
                        
                      }
                      catch (PDOException $e) {
                        die("<div class='notfound'>An error occured Please contact Admin for more details</div>");
                      } 
                    ?>
                  </select>
                  
                </td>
                <td>
                  <select id="selectFac">
                    <?php
                      try { 
                        $pdok = new PDO("mysql:host=$server_servername;dbname=$server_database", $server_username, $server_password);
                        $sqlk = "SELECT * FROM employee_details where department='$row[subDept]' and status='ACTIVE' ORDER BY sno DESC ";
                        $qk = $pdok->query($sqlk);
                        $qk->setFetchMode(PDO::FETCH_ASSOC); 
                        $countk=0;
                        while ($rowk =$qk->fetch() ): $countk++;?>
                          <option value="<?php echo $rowk['userId']; ?>"><?php echo $rowk['userName']; ?></option>
                        <?php endwhile;
                      }
                      catch (PDOException $e) {
                        die("<div class='notfound'>An error occured Please contact Admin for more details</div>");
                      } 
                    ?>
                  </select>
                </td>
                <td><button class="btn btn-success" onclick="updatefaculty_list()">Assign Faculty</button></td>
              </tr>
          <?php endwhile; ?>
              </tbody>
          </table>
          <?php
        }
        catch (PDOException $e) {
          die("<div class='notfound'>An error occured Please contact Admin for more details</div>");
        }
      ?>
  </div>
<?php } ?>
<br>
  </div>
  <?php include_once("../../php/includes/footer.php"); ?>
  <script type="text/javascript" src="../../assets/js/jquery-1.9.1.min.js"></script>
  <script type="text/javascript" src="../../assets/js/jquery.min.js"></script>
  <script type="text/javascript" src="../../assets/js/main.js"></script>
  <script type="text/javascript">
    function updatefaculty_list(){
      var selectFac =document.getElementById('selectFac').value;
      var selectSub =document.getElementById('selectSub').value;
      var selectYear =document.getElementById('selectYear').value;
      var selectSem =document.getElementById('selectSem').value;
      var selectDept =document.getElementById('selectDept').value;
      var selectAy =document.getElementById('selectAy').value;
      var values=['course_allotment',selectFac,selectSub,selectYear,selectSem,selectDept,selectAy];
      var msg = SendToPhp(values,"../../php/controllers/Admin.php")
      alert(msg);
      window.location.href="faculty_allotment.php";
    }


  </script>
</body>
</html>