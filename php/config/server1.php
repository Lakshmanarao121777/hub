<?php 

$server_servername = "http://210.212.217.208/";
$server_database = "rkvhub";
$server_username = "rgukt";
$server_password = "MURTHY009";

try {
    $pdo = new PDO("mysql:host=$server_servername;dbname=$server_database", $server_username, $server_password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "select * from students_details where userid='R121777' ";
    $q = $pdo->query($sql);
    $q->setFetchMode(PDO::FETCH_ASSOC);
    $count = 0;
    while ($row = $q->fetch()): $count++;
    echo $row['userName'];
  endwhile;
} catch (PDOException $e) {
    die($e->getMessage());
}