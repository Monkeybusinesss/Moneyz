<?php
$serverName = "localhost";
$db_name = "moneyz";
$db_username = "root";
$db_password = "";

try {
    $con = new PDO("mysql:host=$serverName; dbname=$db_name", $db_username, $db_password);
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch (PDOException $e) {
    die($e->getMessage());
}

?>