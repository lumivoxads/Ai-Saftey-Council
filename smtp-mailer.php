<?php
/**
 * Minimal dependency-free SMTP client (AUTH LOGIN) for sending mail through
 * an authenticated mailbox instead of PHP's mail(). Fixes SPF/DKIM alignment
 * so messages sent "From" the domain's own mailbox aren't flagged as spam.
 *
 * Usage: smtp_send($to, $toName, $subject, $body, $replyTo = null, $replyToName = null)
 * Returns true on success, throws SmtpException with the server's response on failure.
 */

class SmtpException extends Exception {}

function smtp_read($socket) {
    $data = '';
    while ($line = fgets($socket, 515)) {
        $data .= $line;
        // Multi-line responses use "250-text"; the final line uses "250 text".
        if (isset($line[3]) && $line[3] === ' ') {
            break;
        }
    }
    return $data;
}

function smtp_expect($socket, $expectedCodes, $context) {
    $response = smtp_read($socket);
    $code = (int) substr($response, 0, 3);
    if (!in_array($code, $expectedCodes, true)) {
        throw new SmtpException("SMTP error during {$context}: {$response}");
    }
    return $response;
}

function smtp_command($socket, $command, $expectedCodes, $context) {
    fwrite($socket, $command . "\r\n");
    return smtp_expect($socket, $expectedCodes, $context);
}

function smtp_send($to, $toName, $subject, $body, $replyTo = null, $replyToName = null) {
    if (!defined('SMTP_HOST') || !defined('SMTP_USER') || !defined('SMTP_PASS')) {
        throw new SmtpException('SMTP not configured — mail-config.php missing or incomplete.');
    }

    $transport = SMTP_ENCRYPTION === 'ssl' ? 'ssl://' : '';
    $socket = @stream_socket_client(
        $transport . SMTP_HOST . ':' . SMTP_PORT,
        $errno,
        $errstr,
        15,
        STREAM_CLIENT_CONNECT
    );
    if (!$socket) {
        throw new SmtpException("Could not connect to SMTP server: {$errstr} ({$errno})");
    }
    stream_set_timeout($socket, 15);

    smtp_expect($socket, [220], 'connect');
    smtp_command($socket, 'EHLO ' . SMTP_HOST, [250], 'EHLO');

    if (SMTP_ENCRYPTION === 'tls') {
        smtp_command($socket, 'STARTTLS', [220], 'STARTTLS');
        if (!stream_socket_enable_crypto($socket, true, STREAM_CRYPTO_METHOD_TLS_CLIENT)) {
            throw new SmtpException('Failed to enable TLS.');
        }
        smtp_command($socket, 'EHLO ' . SMTP_HOST, [250], 'EHLO after STARTTLS');
    }

    smtp_command($socket, 'AUTH LOGIN', [334], 'AUTH LOGIN');
    smtp_command($socket, base64_encode(SMTP_USER), [334], 'AUTH username');
    smtp_command($socket, base64_encode(SMTP_PASS), [235], 'AUTH password');

    smtp_command($socket, 'MAIL FROM:<' . SMTP_USER . '>', [250], 'MAIL FROM');
    smtp_command($socket, 'RCPT TO:<' . $to . '>', [250, 251], 'RCPT TO');
    smtp_command($socket, 'DATA', [354], 'DATA');

    $fromHeader = 'AI Safety Council <' . SMTP_USER . '>';
    $toHeader = $toName ? "{$toName} <{$to}>" : $to;

    $headers = [
        'From: ' . $fromHeader,
        'To: ' . $toHeader,
        'Subject: ' . $subject,
        'Date: ' . date('r'),
        'Message-ID: <' . uniqid('', true) . '@' . preg_replace('/^smtp\./', '', SMTP_HOST) . '>',
        'Content-Type: text/plain; charset=UTF-8',
        'MIME-Version: 1.0',
    ];
    if ($replyTo) {
        $headers[] = 'Reply-To: ' . ($replyToName ? "{$replyToName} <{$replyTo}>" : $replyTo);
    }

    // Normalize to CRLF line endings and dot-stuff lines starting with "." per RFC 5321.
    $normalizedBody = str_replace("\r\n", "\n", $body);
    $normalizedBody = str_replace("\n", "\r\n", $normalizedBody);
    $escapedBody = preg_replace('/^\./m', '..', $normalizedBody);
    $message = implode("\r\n", $headers) . "\r\n\r\n" . $escapedBody . "\r\n.";

    smtp_command($socket, $message, [250], 'message body');
    fwrite($socket, "QUIT\r\n");
    fclose($socket);

    return true;
}
