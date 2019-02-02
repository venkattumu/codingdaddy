<?php
$DSN = "mysql:host=localhost;dbname=codingdaddy";
$username = "root";
$password = "";

$options = array(PDO::ATTR_PERSISTENT => true);

try {
    $con = new PDO($DSN, $username, $password, $options);
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // echo "connectiond";

} catch (PDOException $ex) {
    echo "Database is not connected!.. ".$ex->getMessage();
}
?>