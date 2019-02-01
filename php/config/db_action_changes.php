<?php
include "config.inc.php";
try {
    $pdo = new PDO("mysql:host=$server_servername;dbname=$server_database", $server_username, $server_password);
    //$sql = "DELETE students_details SET hostel = 'BH-2' WHERE currentYear  ='ENGG-4' or currentYear ='ENGG-1' and gender='MALE'";
    //$c = $pdo->exec($sql);
    //if ($c > 0) {echo "success<br>";}

    $sql = "SELECT userId, COUNT(userId) FROM students_details GROUP BY  userId HAVING  COUNT(userId) > 1";
    $c = $pdo->exec($sql);
    print_r($c);

    //$sql = "DELETE FROM students_details  WHERE userName='B BHANU TEJA' AND userId='N180982' ";
    //$c = $pdo->exec($sql);
    //if ($c > 0) {echo "success<br>";}
    
} catch (PDOException $e) {
    echo $e->getMessage();
}
/*include "config.inc.php";
try {
    $pdo = new PDO("mysql:host=$server_servername;dbname=$server_database", $server_username, $server_password);
    $sql = "SELECT * FROM employe_login";
    $q = $pdo->query($sql);
    $q->setFetchMode(PDO::FETCH_ASSOC);
    $count = 0;
    while ($row = $q->fetch()): $count++;
        try {
            $pdos = new PDO("mysql:host=$server_servername;dbname=$server_database", $server_username, $server_password);
            $pdos->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sqls = "UPDATE employee_designations set designation='$row[designation]' where userId='$row[username]'";
            $cs = $pdos->exec($sqls);
            if ($cs > 0) {echo "success<br>";}
        } catch (PDOException $e) {
            die("<div class='notfound'>An error occured Please contact Admin for more details</div>");
        }
    endwhile;
} catch (PDOException $e) {
    die("<div class='notfound'>An error occured Please contact Admin for more details</div>");
}
$tables = ['students_academices', 'students_details', 'students_olms'];
for ($i = 0; $i < sizeof($tables); $i++) {
    include "config.inc.php";
    try {
        $pdo = new PDO("mysql:host=$server_servername;dbname=$server_database", $server_username, $server_password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "update $tables[$i] set currentYear='ENGG-4' where currentYear LIKE '%4'";
        $c = $pdo->exec($sql);
        if ($c > 0) {echo "success<br>";}
        $sql = "update $tables[$i] set currentYear='ENGG-3' where currentYear LIKE '%3'";
        $c = $pdo->exec($sql);
        if ($c > 0) {echo "success<br>";}
        $sql = "update $tables[$i] set currentYear='ENGG-2' where currentYear LIKE 'E%' and currentYear LIKE '%2'";
        $c = $pdo->exec($sql);
        if ($c > 0) {echo "success<br>";}
        $sql = "update $tables[$i] set currentYear='ENGG-1' where currentYear LIKE 'E%' and currentYear LIKE '%1'";
        $c = $pdo->exec($sql);
        if ($c > 0) {echo "success<br>";}
        $sql = "update $tables[$i] set currentYear='PUC-2',Department='PUC-2' where currentYear LIKE 'P%' and currentYear LIKE '%2'";
        $c = $pdo->exec($sql);
        if ($c > 0) {echo "success<br>";}
        $sql = "update $tables[$i] set currentYear='PUC-1',Department='PUC-1' where currentYear LIKE 'P%' and currentYear LIKE '%1'";
        $c = $pdo->exec($sql);
        if ($c > 0) {echo "success<br>";}
    } catch (PDOException $e) {
        die("<div class='notfound'>An error occured Please contact Admin for more details</div>");
    }
}
for ($i = 0; $i < sizeof($tables); $i++) {
    include "config.inc.php";
    try {
        $pdo = new PDO("mysql:host=$server_servername;dbname=$server_database", $server_username, $server_password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "update $tables[$i] set Department='EC' where Department LIKE 'E%'";
        $c = $pdo->exec($sql);
        if ($c > 0) {echo "success<br>";}
        $sql = "update $tables[$i] set Department='CS' where Department LIKE 'CSE'";
        $c = $pdo->exec($sql);
        if ($c > 0) {echo "success<br>";}
        $sql = "update $tables[$i] set Department='ME' where Department LIKE 'MECH' or Department LIKE 'Mechanical'";
        $c = $pdo->exec($sql);
        if ($c > 0) {echo "success<br>";}
        $sql = "update $tables[$i] set Department='MM' where Department LIKE 'MME'";
        $c = $pdo->exec($sql);
        if ($c > 0) {echo "success<br>";}
        $sql = "update $tables[$i] set Department='CE' where Department LIKE 'civil'";
        $c = $pdo->exec($sql);
        if ($c > 0) {echo "success<br>";}
        $sql = "update $tables[$i] set Department='CH' where Department LIKE 'chemical' or Department= 'chem' ";
        $c = $pdo->exec($sql);
        if ($c > 0) {echo "success<br>";}
    } catch (PDOException $e) {
        die("<div class='notfound'>An error occured Please contact Admin for more details</div>");
    }
}
for ($i = 0; $i < sizeof($tables) - 1; $i++) {
    include "config.inc.php";
    try {
        $pdo = new PDO("mysql:host=$server_servername;dbname=$server_database", $server_username, $server_password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "update $tables[$i] set joining='2013' where userId LIKE '_13%'";
        $c = $pdo->exec($sql);
        if ($c > 0) {echo "success<br>";}
        $sql = "update $tables[$i] set joining='2014' where userId LIKE '_14%'";
        $c = $pdo->exec($sql);
        if ($c > 0) {echo "success<br>";}
        $sql = "update $tables[$i] set joining='2014' where userId LIKE '_15%'";
        $c = $pdo->exec($sql);
        if ($c > 0) {echo "success<br>";}
        $sql = "update $tables[$i] set joining='2016' where userId LIKE '_16%'";
        $c = $pdo->exec($sql);
        if ($c > 0) {echo "success<br>";}
        $sql = "update $tables[$i] set joining='2017' where userId LIKE '_17%'";
        $c = $pdo->exec($sql);
        if ($c > 0) {echo "success<br>";}
        $sql = "update $tables[$i] set joining='2018' where userId LIKE '_18%'";
        $c = $pdo->exec($sql);
        if ($c > 0) {echo "success<br>";}
        $sql = "update $tables[$i] set joining='2012' where userId LIKE '_12%'";
        $c = $pdo->exec($sql);
        if ($c > 0) {echo "success<br>";}
        $sql = "update $tables[$i] set joining='2011' where userId LIKE '_11%'";
        $c = $pdo->exec($sql);
        if ($c > 0) {echo "success<br>";}
    } catch (PDOException $e) {
        die("<div class='notfound'>An error occured Please contact Admin for more details</div>");
    }
}
for ($i = 0; $i < sizeof($tables) - 1; $i++) {
    include "config.inc.php";
    try {
        $pdo = new PDO("mysql:host=$server_servername;dbname=$server_database", $server_username, $server_password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "update $tables[$i] set status='ACTIVE' where (currentYear='ENGG-1' or currentYear='ENGG-2' or currentYear='ENGG-3' or currentYear='ENGG-4' or currentYear='PUC-1' or currentYear='PUC-2')";
        $c = $pdo->exec($sql);
        if ($c > 0) {echo "success<br>";}
    } catch (PDOException $e) {
        die("<div class='notfound'>An error occured Please contact Admin for more details</div>");
    }
}

include "config.inc.php";
try {
    $pdo = new PDO("mysql:host=$server_servername;dbname=$server_database", $server_username, $server_password);
    $sql = "SELECT * FROM subjects";
    $q = $pdo->query($sql);
    $q->setFetchMode(PDO::FETCH_ASSOC);
    $count = 0;
    while ($row = $q->fetch()): $count++;
        try {
            $pdos = new PDO("mysql:host=$server_servername;dbname=$server_database", $server_username, $server_password);
            $pdos->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sco = $row['subCode'];
            $scr = $row['subCredit'];
            $sqls = "update asdf set CreditPoint='$scr',subCode='$sco', sem='SEM-1'";
            $cs = $pdos->exec($sqls);
            if ($cs > 0) {echo "success<br>";}
        } catch (PDOException $e) {
            die("<div class='notfound'>An error occured Please contact Admin for more details</div>");
        }
    endwhile;
} catch (PDOException $e) {
    die("<div class='notfound'>An error occured Please contact Admin for more details</div>");
}
*/