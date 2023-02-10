<?php
$servername = "db";
$username   = "user";
$password   = "test";
$dbname     = "myDb";

try {
    $pdo = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch(PDOException $e) {
    echo "Database connection failed: " . $e->getMessage();
    echo "<p>Don't worry, I experienced this on my local machine. Most likely Docker is still booting up.</p>";
    echo "<p>Please <a href='http://localhost:8001'>try again</a> after a few seconds.</p>";
    die();
}
