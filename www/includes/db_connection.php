<?php
$servername = "db";
$username   = "user";
$password   = "test";
$dbname     = "myDb";

try {
    $pdo = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch(PDOException $e) {
    echo "Database connection failed: " . $e->getMessage();
    die();
}
