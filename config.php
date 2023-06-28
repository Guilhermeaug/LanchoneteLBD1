<?php

/*const DB_USER = "ECLBDIT203";
const DB_PASSWORD = "@jxD9IKa!001";
const DB_DATABASE = "bdengcomp_high";

$conn = oci_connect(DB_USER, DB_PASSWORD, DB_DATABASE);
if (!$conn) {
    $e = oci_error();
    trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
}*/

$host = 'localhost';        // MySQL server hostname
$db   = 'lanchonete';    // Your database name
$user = 'root';    // Your MySQL username
$pass = '';    // Your MySQL password

$pdo = new PDO('mysql:host=127.0.0.1:3308;dbname=lanchonete','root','');
/*try {
    $pdo = new PDO('mysql:host=127.0.0.1:3308;dbname=lanchonete','root','');
    // Set PDO error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully";
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}*/

?>