<?php
// Database connection settings
$host     = "your-rds-endpoint.rds.amazonaws.com"; // RDS endpoint or localhost
$dbname   = "appdb";       // Database name
$username = "appuser";     // Database user
$password = "apppassword"; // Database password
$port     = 3306;          // Default MySQL port

try {
    // Create PDO connection
    $dsn = "mysql:host=$host;port=$port;dbname=$dbname;charset=utf8mb4";
    $pdo = new PDO($dsn, $username, $password);

    // Set error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    echo "✅ Database connected successfully!";
} catch (PDOException $e) {
    echo "❌ Connection failed: " . $e->getMessage();
}
?>
