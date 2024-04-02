<?php
// Database connection settings
$host = 'mysql-db';
$dbname = 'test_database';
$username = 'db_user';
$password = 'password';

// Connect to the database
try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "<strong>Connected !!!</strong><br/>";
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}
?>