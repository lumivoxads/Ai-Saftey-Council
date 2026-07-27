<?php
/**
 * AI Safety Council — contact form handler.
 * Receives the contact.html form POST, emails the team at info@aisafetycouncil.co.uk,
 * and sends a confirmation email back to the submitter.
 *
 * Deploy: this file just needs to sit alongside the other .html files on Hostinger —
 * no dependencies, uses PHP's built-in mail(). If deliverability becomes an issue,
 * swap send_mail() below for SMTP auth (e.g. PHPMailer) using the info@ mailbox creds.
 */

header('Content-Type: application/json');

$TEAM_EMAIL = 'info@aisafetycouncil.co.uk';
$SITE_NAME  = 'AI Safety Council';
$FROM_EMAIL = 'no-reply@aisafetycouncil.co.uk'; // must be a domain the sending server is allowed to use

function respond($ok, $message) {
    http_response_code($ok ? 200 : 400);
    echo json_encode(['ok' => $ok, 'message' => $message]);
    exit;
}

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    respond(false, 'Invalid request method.');
}

// Honeypot — real users never fill this field, bots usually do.
if (!empty($_POST['website'])) {
    respond(true, 'Thanks — your message has been sent.'); // pretend success, drop silently
}

$first_name   = trim($_POST['first_name']   ?? '');
$last_name    = trim($_POST['last_name']    ?? '');
$email        = trim($_POST['email']        ?? '');
$organization = trim($_POST['organization'] ?? '');
$subject      = trim($_POST['subject']      ?? 'General enquiry');
$message      = trim($_POST['message']      ?? '');

if ($first_name === '' || $last_name === '' || $message === '') {
    respond(false, 'Please fill in your name and message.');
}
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    respond(false, 'Please enter a valid email address.');
}

$full_name = $first_name . ' ' . $last_name;

// Strip header-injection characters from anything that lands in a header.
function clean_header($value) {
    return str_replace(["\r", "\n"], '', $value);
}

function send_mail($to, $subject, $body, $headers) {
    return mail($to, $subject, $body, implode("\r\n", $headers));
}

// --- 1) Notify the team ---
$team_subject = '[Contact form] ' . clean_header($subject) . ' — ' . clean_header($full_name);
$team_body = "New contact form submission\n\n"
    . "Name: {$full_name}\n"
    . "Email: {$email}\n"
    . "Organization: " . ($organization !== '' ? $organization : '—') . "\n"
    . "Subject: {$subject}\n\n"
    . "Message:\n{$message}\n";
$team_headers = [
    'From: ' . $SITE_NAME . ' <' . $FROM_EMAIL . '>',
    'Reply-To: ' . clean_header($full_name) . ' <' . clean_header($email) . '>',
    'Content-Type: text/plain; charset=UTF-8',
];
$team_sent = send_mail($TEAM_EMAIL, $team_subject, $team_body, $team_headers);

// --- 2) Confirm to the submitter ---
$user_subject = "We've received your message — {$SITE_NAME}";
$user_body = "Hi {$first_name},\n\n"
    . "Thanks for contacting the AI Safety Council. We've received your message and typically respond within two business days.\n\n"
    . "Your message:\n\"{$message}\"\n\n"
    . "If this is urgent, reply directly to this email.\n\n"
    . "— {$SITE_NAME}\n";
$user_headers = [
    'From: ' . $SITE_NAME . ' <' . $FROM_EMAIL . '>',
    'Reply-To: ' . $TEAM_EMAIL,
    'Content-Type: text/plain; charset=UTF-8',
];
$user_sent = send_mail($email, $user_subject, $user_body, $user_headers);

if ($team_sent) {
    respond(true, "Thanks {$first_name} — your message has been sent. We'll be in touch within two business days.");
}

respond(false, 'Something went wrong sending your message. Please try again or email ' . $TEAM_EMAIL . ' directly.');
