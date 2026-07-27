<?php
/**
 * AI Safety Council — contact form handler.
 * Receives the contact.html form POST, emails the team at info@aisafetycouncil.co.uk,
 * and sends a confirmation email back to the submitter.
 *
 * Deploy: needs mail-config.php in the same directory (copy mail-config.example.php,
 * fill in the real mailbox password, upload directly to the server — it's gitignored
 * and never committed). Sends via authenticated SMTP through the info@ mailbox itself
 * (see smtp-mailer.php) so messages carry proper SPF/DKIM alignment instead of landing
 * in spam, which is what happened when this used PHP's raw mail().
 */

header('Content-Type: application/json');

require_once __DIR__ . '/smtp-mailer.php';

if (file_exists(__DIR__ . '/mail-config.php')) {
    require_once __DIR__ . '/mail-config.php';
}

$TEAM_EMAIL = 'info@aisafetycouncil.co.uk';
$SITE_NAME  = 'AI Safety Council';

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

// --- 1) Notify the team ---
$team_subject = '[Contact form] ' . clean_header($subject) . ' — ' . clean_header($full_name);
$team_body = "New contact form submission\n\n"
    . "Name: {$full_name}\n"
    . "Email: {$email}\n"
    . "Organization: " . ($organization !== '' ? $organization : '—') . "\n"
    . "Subject: {$subject}\n\n"
    . "Message:\n{$message}\n";

// --- 2) Confirm to the submitter ---
$user_subject = "We've received your message — {$SITE_NAME}";
$user_body = "Hi {$first_name},\n\n"
    . "Thanks for contacting the AI Safety Council. We've received your message and typically respond within two business days.\n\n"
    . "Your message:\n\"{$message}\"\n\n"
    . "If this is urgent, reply directly to this email.\n\n"
    . "— {$SITE_NAME}\n";

try {
    smtp_send($TEAM_EMAIL, null, $team_subject, $team_body, $email, $full_name);
    try {
        smtp_send($email, $full_name, $user_subject, $user_body, $TEAM_EMAIL, $SITE_NAME);
    } catch (SmtpException $e) {
        error_log('Contact form confirmation email failed: ' . $e->getMessage());
        // Team was notified; a failed confirmation email isn't fatal to the submission.
    }
    respond(true, "Thanks {$first_name} — your message has been sent. We'll be in touch within two business days.");
} catch (SmtpException $e) {
    error_log('Contact form team notification failed: ' . $e->getMessage());
    respond(false, 'Something went wrong sending your message. Please try again or email ' . $TEAM_EMAIL . ' directly.');
}
