<?php
$host = gethostname();
$ip = gethostbyname($host);
//echo $_SERVER['SERVER_NAME'];
$server_servername = "localhost";
if ($_SERVER['SERVER_NAME'] == 'localhost' || $_SERVER['SERVER_NAME'] == '10.29.22.252' || $_SERVER['SERVER_NAME'] == '192.168.43.133' || $_SERVER['SERVER_NAME'] == '10.31.99.188') {
    $server_username = "root";
    $server_password = "hubadmin@ece";
} else if ($_SERVER['SERVER_NAME'] == '10.50.50.56' || $_SERVER['SERVER_NAME'] == '10.29.22.253') {
    $server_username = "root";
    $server_password = "mythought";
} else if($_SERVER['SERVER_NAME'] == 'hub.abhiyanth.org') {
    $server_servername = "shareddb-g.hosting.stackcp.net";
    $server_username = "rgukt-hub-32376adc";
    $server_password = "hubadmin@ece";
    $server_database = "rgukt-hub";
}else{
    $server_username = "rgukt";
    $server_password = "MURTHY009";
}


$time = date_default_timezone_set('Asia/Kolkata');
$time = new DateTime();
$time = $time->format("H:i:s d:m:Y");
$times = date_default_timezone_set('Asia/Kolkata');
$times = new DateTime();
$year_original = $times->format("Y");
$month_original = $times->format("m");
$date_original = $times->format("d");


