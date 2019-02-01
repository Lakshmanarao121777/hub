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
  include("../../php/config/config.inc.php");
        try { 
          $pdo = new PDO("mysql:host=$server_servername;dbname=$server_database", $server_username, $server_password);
          //$sql = "SELECT * FROM ay1819s1reg  GROUP BY userId ORDER BY sno DESC";
          $q = $pdo->query($sql);
          $q->setFetchMode(PDO::FETCH_ASSOC); 
          $count=0;$credit;
	$columnHeader = "Student Id" . "\t" . "Student Name" . "\t" . "Department" . "\t". "Year" . "\t". "Subjects Registred" . "\t";
	$setData = '';
    while ($rec  =$q->fetch() ):
    	$rowData = '';
			foreach ($rec as $value) {
			$value = '"' . $value . '"' . "\t";
			$rowData .= $value;
			}
			$setData .= trim($rowData) . "\n";
    endwhile;
      	} 
catch (PDOException $e) {
  die("<div class='notfound'>An error occured Please contact Admin for more details</div>");
} 

header("Content-type: application/octet-stream");
header("Content-Disposition: attachment; filename=".$times.".xlsx");
header("Pragma: no-cache");
header("Expires: 0");
echo ucwords($columnHeader) . "\n" . $setData . "\n";
?> 