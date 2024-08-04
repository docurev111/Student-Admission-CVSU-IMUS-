<?php

$dsn = "mysql:host=localhost;dbname=cvsuadmissionsystem";
$dbusername = "root";
$dbpassword = "";

try {
    $pdo = new PDO($dsn, $dbusername, $dbpassword);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Database connection successful.<br>"; // Debugging line
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage() . "<br>";
}
?>
