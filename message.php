<?php
require "db_connect.php"; // include connection file

// Insert message (example: from form POST)
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["text"])) {
    $stmt = $pdo->prepare("INSERT INTO messages (text) VALUES (:text)");
    $stmt->execute([":text" => $_POST["text"]]);
    echo "✅ Message added!";
}

// Fetch messages
$stmt = $pdo->query("SELECT * FROM messages ORDER BY id DESC LIMIT 10");
$messages = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo "<h2>Recent Messages</h2><ul>";
foreach ($messages as $msg) {
    echo "<li><strong>#{$msg['id']}</strong> {$msg['text']} <small>({$msg['created_at']})</small></li>";
}
echo "</ul>";
?>
