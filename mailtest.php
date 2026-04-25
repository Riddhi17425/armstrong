<?php

$smtp_host = 'smtp.gmail.com';
$smtp_port = 587;
$smtp_username = 'info@armstrongex.com';    // Must match Azure SMTP username
$smtp_password = 'rymchlfqprkbrxfw';  // Use full password from Azure portal
$from_email = 'info@armstrongex.com';       // Must match username exactly
$to_email = 'jeet@intelliworkz.tech';

$subject = 'SMTP Test from PHP';
$body = "This is a plain-text SMTP test from PHP script.\r\nCheck if this arrives.";
$headers = "From: $from_email\r\n";
$headers .= "Reply-To: $from_email\r\n";

$socket = fsockopen($smtp_host, $smtp_port, $errno, $errstr, 10);
if (!$socket) {
    echo "❌ Connection failed: $errstr ($errno)\n";
    exit;
}
echo "✅ Connected to $smtp_host:$smtp_port\n";

function readResponse($socket) {
    $response = '';
    while ($str = fgets($socket, 515)) {
        $response .= $str;
        if (substr($str, 3, 1) == ' ') break;
    }
    return $response;
}

function sendCommand($socket, $cmd) {
    fputs($socket, $cmd . "\r\n");
    echo ">> $cmd\n";
    $response = readResponse($socket);
    echo $response;
    return $response;
}

// initial handshake
echo readResponse($socket);
sendCommand($socket, "EHLO localhost");

// STARTTLS
$response = sendCommand($socket, "STARTTLS");
if (strpos($response, "220") !== false) {
    stream_socket_enable_crypto($socket, true, STREAM_CRYPTO_METHOD_TLS_CLIENT);
    echo "✅ TLS encryption enabled successfully.\n";
} else {
    echo "❌ STARTTLS not accepted by server.\n";
    exit;
}

// EHLO again after TLS
sendCommand($socket, "EHLO localhost");

// AUTH LOGIN

sendCommand($socket, "AUTH LOGIN");
sendCommand($socket, base64_encode($smtp_username));
sendCommand($socket, base64_encode($smtp_password));

// Send envelope commands
$response = sendCommand($socket, "MAIL FROM:<$smtp_username>");
if (strpos($response, '250') === false) {
    echo "❌ MAIL FROM rejected. Check that username and from match.\n".$from_email;
    fclose($socket);
    exit;
}

sendCommand($socket, "RCPT TO:<$to_email>");
sendCommand($socket, "DATA");

// Send message body and terminate correctly with CRLF.CRLF
fputs($socket, "Subject: $subject\r\n$headers\r\n\r\n$body\r\n.\r\n");
$response = readResponse($socket);
echo $response;

// Quit properly
sendCommand($socket, "QUIT");

fclose($socket);
echo "✅ Email sent successfully.\n";