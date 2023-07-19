<?php
// db_conn.php
$host = 'localhost';
$db = 'drug_dispenser';
$user = 'root';
$password = '';

$mysqli = new mysqli($host, $user, $password, $db);

if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: " . $mysqli->connect_error;
    exit();
}
?>
