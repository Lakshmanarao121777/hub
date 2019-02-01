<style type="text/css">
	table{border:1px solid black;border-collapse: collapse;}
	td{border:1px solid black;min-width:400px;}
</style>
<?php //Connect to MySQL using the PDO object.
include "config.inc.php";
$pdo = new PDO("mysql:host=$server_servername;", "$server_username", "$server_password");
$sql = "SHOW DATABASES";
$statement = $pdo->prepare($sql);
$statement->execute();
$dbs = $statement->fetchAll(PDO::FETCH_NUM);
foreach ($dbs as $db) {
    if($db[0]!='information_schema'){
        echo '<table border="1" style="margin-bottom:2px;max-width:100%;"><tr><td>' . $db[0], '</td><td>';
        $data = $db[0];
        $pdot = new PDO("mysql:host=$server_servername;dbname=$data", "$server_username", "$server_password");
        $sqlt = "SHOW TABLES";
        $statementt = $pdot->prepare($sqlt);
        $statementt->execute();
        $tables = $statementt->fetchAll(PDO::FETCH_NUM);
        foreach ($tables as $table) {$tb = $table[0];
            echo '<table><tr><td>' . $table[0], '</td><td><table>';
            $pdoc = new PDO("mysql:host=$server_servername;dbname=$data", "$server_username", "$server_password");
            $sqlc = "SHOW COLUMNS FROM $data.$tb;";
            $statementc = $pdoc->prepare($sqlc);
            $statementc->execute();
            $cols = $statementc->fetchAll(PDO::FETCH_NUM);
            foreach ($cols as $col) {
                echo '<tr><td>' . $col[0], '</td></tr>';
            }
            echo '</table></td></tr></table>';
        }
        echo '</td></tr></table>';
    }
    
}
?>