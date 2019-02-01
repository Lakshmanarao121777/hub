<?php
include "../config/config.inc.php";

try {
  $pdo = new PDO("mysql:host=$server_servername;dbname=$server_database", $server_username, $server_password);
  $sql = "SELECT * FROM employee";
  $q = $pdo->query($sql);
  $q->setFetchMode(PDO::FETCH_ASSOC);
  $count = 0;
  while ($row = $q->fetch()): $count++;
      try {
          $pdos = new PDO("mysql:host=$server_servername;dbname=$server_database", $server_username, $server_password);
          $pdos->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          $userId = $row['id'];
          $userName = $row['name'];
          $designation = $row['designation'];
          $doj = $row['doj'];
          $dept = $row['dept'];
          if($dept=='Chemical Engineering')$dept='CH';
          if($dept=='Civil Engineering')$dept='CE';
          if($dept=='Mechanical Engineering')$dept='ME';
          if($dept=='Metallurgy & Materials Engineering')$dept='MM';
          if($dept=='Computer Science & Engineering')$dept='CS';
          if($dept=='Electronics & Communication Engg.')$dept='EC';

          //$sqls = "update employe_login set username='$userId', password='".$userId."@hub', regDate= '$time', type='employee', office='AcadamicDepartments', designation ='$designation',department='$dept', status='Active' ";
          //username='$userId', password='".$userId."@hub', regDate= '$time', type='employee', office='AcadamicDepartments', designation ='$designation',department='$dept', status='Active'

          //$sqls = "insert into employe_login (username,password,regDate,type,office,designation ,department, status) values('$userId','".$userId."@hub','$time','employee','AcadamicDepartments','$designation','$dept','Active')";
          //$sqls = "insert into employee_details (userId,userName,working_from,status,department ) values('$userId','$userName','$doj','Active','$dept')";
          //$sqls="UPDATE employee_details set aadhar='$row[aadhar]',pancard='$row[pan]',basicpay='$row[basicpay]',hra='$row[hra]',da='$row[da]',cps='$row[cps]', type ='$row[type]' where userId='$userId'";
          $cs = $pdos->exec($sqls);
          if ($cs > 0) {echo "success<br>";}
      } catch (PDOException $e) {
          die("<div class='notfound'>sAn error occured Please contact Admin for more details</div>");
      }
  endwhile;
} catch (PDOException $e) {
  die("<div class='notfound'>An error occured Please contact Admin for more details</div>");
}
?>