<?php
$token = "TOKEN_USER_DARI_DATABASE";
$title = "Pengingat Ulangan!";
$body = "Jangan lupa ulangan hari ini jam 10.00!";

$notification = [
  'to' => $token,
  'notification' => [
    'title' => $title,
    'body' => $body
  ]
];

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send');
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, [
  'Authorization: key=SERVER_KEY_KAMU',
  'Content-Type: application/json'
]);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($notification));
$result = curl_exec($ch);
curl_close($ch);

echo $result;
?>
