<?php 

$username = 'root';
$password = '';
$host = 'localhost';
$table = 'surfbrew_web';
try {
    $conn = new PDO('mysql:host='.$host.';dbname='.$table, $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    echo 'ERROR: ' . $e->getMessage();
}

?>