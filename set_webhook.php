<?php

$botToken = '7225700924:AAFQbefX9Tc2eR4xQxRSU_M-7vmIHb87Ohk';
$apiUrl = "https://api.telegram.org/bot$botToken/";

// Substitua 'yourusername' pelo seu nome de usuário no PythonAnywhere
$webhookUrl = 'https://Paruccikk.pythonanywhere.com/bot.php';

$setWebhookUrl = $apiUrl . "setWebhook?url=" . $webhookUrl;

$response = file_get_contents($setWebhookUrl);

echo $response;

?>
