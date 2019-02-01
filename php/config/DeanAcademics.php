<?php /*function getYear($userid){
include("config.inc.php");
try {
$pdo = new PDO("mysql:host=$server_servername;dbname=$server_database", $server_username, $server_password);
$sql = "SELECT * FROM students_login where username ='$userid' ORDER BY sno DESC";
$q = $pdo->query($sql);
$q->setFetchMode(PDO::FETCH_ASSOC);
$count="";
while ($row =$q->fetch() ): $count=$row['year'];
endwhile;
}
catch (PDOException $e) {
die("<div class='notfound'>An error occured Please contact Admin for more details</div>");
}
return $count;
}*/
function subCount($userid)
{
    include "config.inc.php";
    try {
        $pdo = new PDO("mysql:host=$server_servername;dbname=$server_database", $server_username, $server_password);
        $sql = "SELECT * FROM reg_subjects where userId='$userid' ORDER BY sno DESC";
        $q = $pdo->query($sql);
        $q->setFetchMode(PDO::FETCH_ASSOC);
        $count = 0;
        while ($row = $q->fetch()): $count++;
        endwhile;
    } catch (PDOException $e) {
        die("<div class='notfound'>An error occured Please contact Admin for more details</div>");
    }
    return $count;
}
function count_da($table, $select, $where, $year)
{
    include "config.inc.php";
    try {
        $pdo = new PDO("mysql:host=$server_servername;dbname=$server_database", $server_username, $server_password);
        $sql = "SELECT $select FROM $table where $where";
        $q = $pdo->query($sql);
        $q->setFetchMode(PDO::FETCH_ASSOC);
        $count = 0;
        while ($row = $q->fetch()):
            /*checkyear($row['userId'],$year)=="yes"*/
            if ($table != "reg_subjects") {if ($row['currentYear'] == $year) {$count++;}} else {if ($row['regBy'] == "ecee1" || $row['regBy'] == "csee1" || $row['regBy'] == "cheme1" || $row['regBy'] == "civile1" || $row['regBy'] == "meche1" || $row['regBy'] == "mmee1") {
                $cyear = "ENGG-1";
            }

                if ($row['regBy'] == "ecee2" || $row['regBy'] == "csee2" || $row['regBy'] == "cheme2" || $row['regBy'] == "civile2" || $row['regBy'] == "meche2" || $row['regBy'] == "mmee2") {
                    $cyear = "ENGG-2";
                }

                if ($row['regBy'] == "ecee3" || $row['regBy'] == "csee3" || $row['regBy'] == "cheme3" || $row['regBy'] == "civile3" || $row['regBy'] == "meche3" || $row['regBy'] == "mmee3") {
                    $cyear = "ENGG-3";
                }

                if ($row['regBy'] == "ecee4" || $row['regBy'] == "csee4" || $row['regBy'] == "cheme4" || $row['regBy'] == "civile4" || $row['regBy'] == "meche4" || $row['regBy'] == "mmee4") {
                    $cyear = "ENGG-4";
                }
                if ($cyear == $year) {$count++;}}
        endwhile;
    } catch (PDOException $e) {
        die("<div class='notfound'>An error occured Please contact Admin for more details</div>");
    }
    return $count;
}
function checkyear($userid, $year)
{
    include "config.inc.php";
    try {
        $pdo = new PDO("mysql:host=$server_servername;dbname=$server_database", $server_username, $server_password);
        $sql = "SELECT * FROM students_login where username='$userid' ";
        $q = $pdo->query($sql);
        $q->setFetchMode(PDO::FETCH_ASSOC);
        $count = "no";
        while ($row = $q->fetch()):
            if ($row['year'] == $year) {
                $count = "yes";
            }

        endwhile;
    } catch (PDOException $e) {
        die("<div class='notfound'>An error occured Please contact Admin for more details</div>");
    }
    return $count;
}
function showregdata($table_name, $select, $where)
{
    include "config.inc.php";
    try {
        $pdo = new PDO("mysql:host=$server_servername;dbname=$server_database", $server_username, $server_password);
        $sql = "SELECT $select FROM $table_name where $where ORDER BY sno DESC";
        //$sql = "SELECT * FROM reg_subjects  GROUP BY userId ORDER BY sno DESC";
        $q = $pdo->query($sql);
        $q->setFetchMode(PDO::FETCH_ASSOC);
        $count = 0;
        $credit;
        ?>
          <table>
              <thead>
                <tr>
                  <th> Sno</th>
                  <th> Id</th>
                  <th> Name</th>
                  <th> Department</th>
                  <th> Year</th>
                  <th> Total Subjects</th>
                  <th> Status</th>
                </tr>
              </thead>
              <tbody>
              <?php
while ($row = $q->fetch()): $count++;
            if ($row['regBy'] == "ecee1" || $row['regBy'] == "csee1" || $row['regBy'] == "cheme1" || $row['regBy'] == "civile1" || $row['regBy'] == "meche1" || $row['regBy'] == "mmee1") {
                $cyear = "ENGG-1";
            }

            if ($row['regBy'] == "ecee2" || $row['regBy'] == "csee2" || $row['regBy'] == "cheme2" || $row['regBy'] == "civile2" || $row['regBy'] == "meche2" || $row['regBy'] == "mmee2") {
                $cyear = "ENGG-2";
            }

            if ($row['regBy'] == "ecee3" || $row['regBy'] == "csee3" || $row['regBy'] == "cheme3" || $row['regBy'] == "civile3" || $row['regBy'] == "meche3" || $row['regBy'] == "mmee3") {
                $cyear = "ENGG-3";
            }

            if ($row['regBy'] == "ecee4" || $row['regBy'] == "csee4" || $row['regBy'] == "cheme4" || $row['regBy'] == "civile4" || $row['regBy'] == "meche4" || $row['regBy'] == "mmee4") {
                $cyear = "ENGG-4";
            }
            ?>
	                  <tr>
	                    <td><?php echo $count; ?></td>
	                    <td><?php echo $row['userId']; ?></td>
	                    <td><?php echo $row['userName']; ?></td>
	                    <td><?php echo $row['Dept']; ?></td>
	                    <td><?php echo $cyear; ?></td>
	                    <td><?php echo subCount($row['userId']); ?></td>
	                    <td>Registred</td>
	                  </tr>
	              <?php endwhile;?>
          </tbody>
            </table>
          <?php
if ($count == 0) {
            $credit = "Please Register";
        } else {
            $credit = "Registred";
        }
    } catch (PDOException $e) {
        die("<div class='notfound'>An error occured Please contact Admin for more details</div>");
    }
}
function GetYear($name)
{
    include "config.inc.php";
    try {
        $credit = "";
        $pdo = new PDO("mysql:host=$server_servername;dbname=$server_database", $server_username, $server_password);
        $sql = "SELECT * FROM students_details where username='$name' ";
        $q = $pdo->query($sql);
        $q->setFetchMode(PDO::FETCH_ASSOC);
        $count = 0;
        $credit;
        while ($row = $q->fetch()): $count++;
            $credit = $row['year'];
        endwhile;
    } catch (PDOException $e) {
        die("<div class='notfound'>An error occured Please contact Admin for more details</div>");
    }
    return $credit;
}
function stu_chip_Show($table_name, $select_list, $where, $year)
{
    include "config.inc.php";
    try {
        $pdo = new PDO("mysql:host=$server_servername;dbname=$server_database", $server_username, $server_password);
        $sql = "SELECT $select_list FROM $table_name where $where ORDER BY sno DESC ";
        $q = $pdo->query($sql);
        $q->setFetchMode(PDO::FETCH_ASSOC);
        $count = 0;
        while ($row = $q->fetch()): $count++;?>
	        <div class="user_chip">
	          <div class="img_box">
	            <?php echo ' <img src="http://10.50.50.56/Registrations/upload/' . $row['userId'] . '/' . $row['userId'] . '.jpg">'; ?>
	          </div>
	          <div class="details_box">
	            <div class="details"> <?php echo $row['userName']; ?> </div>
	            <div class="details"> <?php echo $row['userId']; ?> </div>
	            <div class="details"> <?php echo $row['currentYear'] . ',' . $row['Department']; ?> </div>
	            <div class="details"> Active </div>
	          </div>
	          <form action="students_details" method="GET">
	            <input type="hidden" name="userId" value="<?php echo $row['userId']; ?>">
	            <button type="submit">View More..</button>
	          </form>
	        </div>
	      <?php endwhile;
        if ($count == 0) {echo "<div class='notfound'>no User Found</div>";}
    } catch (PDOException $e) {
        die("<div class='notfound'>An error occured Please contact Admin for more details</div>");
    }
}
function getColValue($table_name, $where, $col)
{
    include "config.inc.php";
    try {
        $pdo = new PDO("mysql:host=$server_servername;dbname=$server_database", $server_username, $server_password);
        $sql = "SELECT * FROM $table_name $where";
        $q = $pdo->query($sql);
        $q->setFetchMode(PDO::FETCH_ASSOC);
        $count = 0;
        $credit;
        while ($row = $q->fetch()): $count++;
            $credit = $row["$col"];
        endwhile;
        if ($count >= 1) {
            return $credit;}
    } catch (PDOException $e) {
        die("<div class='notfound'>An error occured Please contact Admin for more details</div>");
    }
}

function getRowCount($table_name, $where)
{
    include "config.inc.php";
    try {
        $pdo = new PDO("mysql:host=$server_servername;dbname=$server_database", $server_username, $server_password);
        $sql = "SELECT * FROM $table_name $where";
        $q = $pdo->query($sql);
        $q->setFetchMode(PDO::FETCH_ASSOC);
        $count = 0;
        $credit;
        while ($row = $q->fetch()): $count++;
        endwhile;
        if ($count >= 1) {
            return $count;
        } else {
            return 0;
        }

    } catch (PDOException $e) {
        die("<div class='notfound'>An error occured Please contact Admin for more details</div>");
    }
}
function exportTables($table_name, $where, $filename, $colms, $rows)
{
    include "config.inc.php";
    try {
        $pdo = new PDO("mysql:host=$server_servername;dbname=$server_database", $server_username, $server_password);
        $sql = "SELECT * FROM $table_name $where";
        $q = $pdo->query($sql);
        $q->setFetchMode(PDO::FETCH_ASSOC);
        $count = 0;
        $f = fopen('php://output', 'w');
        $delimiter = ",";
        for ($i = 0; $i < sizeof($colms); $i++) {
            $fields[$i] = $colms[$i];
        }
        fputcsv($f, $fields, $delimiter);
        while ($row = $q->fetch()): $count++;
            for ($i = 0; $i < sizeof($rows); $i++) {
                if ($i == 0) {
                    $lineData[$i] = $count;
                } else {
                    $lineData[$i] = $row[$rows[$i]];
                }

            }
            fputcsv($f, $lineData, "$delimiter");
        endwhile;
        if ($count >= 1) {
            //fseek($f, 0);
            header('Content-Type: text/csv');
            header('Content-Disposition: attachment; filename="' . $filename . '";');
            fpassthru($f);
            fclose($f);
            //echo "Successfully Downloaded as ".$filename;
        } else {
            return 0;
        }

    } catch (PDOException $e) {
        die("<div class='notfound'>An error occured Please contact Admin for more details</div>");
    }
}

?>