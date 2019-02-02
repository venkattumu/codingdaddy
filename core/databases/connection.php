<?php
$DSN = "mysql:host=localhost;dbname=codingdaddy";
$username = "root";
$password = "";

$options = array(PDO::ATTR_PERSISTENT => true);

try {
    $pdo = new PDO($DSN, $username, $password, $options);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // echo "connectiond";

} catch (PDOException $ex) {
    echo "Database is not connected!.. ".$ex->getMessage();
}
?>