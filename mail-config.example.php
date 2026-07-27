<?php
/**
 * Copy this file to mail-config.php (same directory) and fill in the real
 * mailbox credentials. mail-config.php is gitignored — it must be uploaded
 * directly to the server (Hostinger File Manager or FTP), never committed.
 *
 * Get these values from Hostinger: hPanel → Emails → info@aisafetycouncil.co.uk
 * → Connect apps & devices (SMTP host/port) — username is the full mailbox
 * address, password is the mailbox password.
 */

define('SMTP_HOST', 'smtp.hostinger.com');
define('SMTP_PORT', 465);           // 465 = implicit SSL, 587 = STARTTLS
define('SMTP_ENCRYPTION', 'ssl');   // 'ssl' for port 465, 'tls' for port 587
define('SMTP_USER', 'info@aisafetycouncil.co.uk');
define('SMTP_PASS', 'REPLACE_WITH_REAL_MAILBOX_PASSWORD');
