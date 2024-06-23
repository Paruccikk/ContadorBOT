<?php

$botToken = '7225700924:AAFQbefX9Tc2eR4xQxRSU_M-7vmIHb87Ohk';
$apiUrl = "https://api.telegram.org/bot$botToken/";

// Substitua 'your-vercel-domain' pelo seu domínio no Vercel
$webhookUrl = 'https://your-vercel-domain.vercel.app/api/bot.php';

$setWebhookUrl = $apiUrl . "setWebhook?url=" . $webhookUrl;

$response = file_get_contents($setWebhookUrl);

echo $response;

?>
