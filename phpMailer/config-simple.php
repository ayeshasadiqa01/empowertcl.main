<?php
/**
 * Simple Email Configuration - Uses hosting provider's mail server
 * No SMTP setup required - works with most hosting providers
 */

return [
    'host' => 'localhost', // Use local mail server
    'username' => '', // No username needed
    'password' => '', // No password needed
    'port' => 25, // Standard mail port
    'encryption' => '', // No encryption
    'from_email' => 'noreply@empowertcl.com', // From email
    'from_name' => 'EmpowerTech Consulting LLC', // Sender name
    'to_email' => 'info@empowertcl.com', // Recipient email
    'to_name' => 'EmpowerTech Consulting' // Recipient name
];
?>
