<?php

// Token do seu bot
$botToken = '7225700924:AAFQbefX9Tc2eR4xQxRSU_M-7vmIHb87O';
$apiUrl = "https://api.telegram.org/bot$botToken/";

// Função para enviar mensagens
function sendMessage($chatId, $message) {
    global $apiUrl;
    $url = $apiUrl . "sendMessage?chat_id=$chatId&text=" . urlencode($message);
    file_get_contents($url);
}

// Função para ler contagens do arquivo JSON
function getCounts() {
    if (!file_exists('counts.json')) {
        return ['Green' => 0, 'Red' => 0];
    }
    $counts = file_get_contents('counts.json');
    return json_decode($counts, true);
}

// Função para salvar contagens no arquivo JSON
function saveCounts($counts) {
    file_put_contents('counts.json', json_encode($counts));
}

// Receber atualização do Telegram
$content = file_get_contents("php://input");
$update = json_decode($content, true);

if (!$update) {
    exit;
}

$message = $update['message'];
$text = $message['text'];
$chatId = $message['chat']['id'];

// Obter contagens atuais
$counts = getCounts();

// Contar mensagens específicas
if (stripos($text, 'Green') !== false) {
    $counts['Green'] += 1;
} elseif (stripos($text, 'Vamos para o gale 1') !== false) {
    $counts['Red'] += 1;
}

// Salvar contagens atualizadas
saveCounts($counts);

// Enviar resposta
$response = "Green: {$counts['Green']} Red: {$counts['Red']}";
sendMessage($chatId, $response);

?>
