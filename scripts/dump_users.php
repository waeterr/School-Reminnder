<?php
$db = new PDO('sqlite:' . __DIR__ . '/../database/database.sqlite');
$stmt = $db->query('SELECT id, name, email, created_at FROM users');
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
if (empty($rows)) {
    echo "No users found\n";
    exit(0);
}
foreach ($rows as $r) {
    echo "{$r['id']} | {$r['name']} | {$r['email']} | {$r['created_at']}\n";
}
