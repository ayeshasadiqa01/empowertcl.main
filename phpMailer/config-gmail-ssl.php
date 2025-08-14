<?php
/**
 * Gmail Configuration with SSL (Port 465)
 * Alternative configuration that might work better
 */

return [
    'host' => 'smtp.gmail.com', // Gmail SMTP
    'username' => 'fareedahmadbutt10@gmail.com', // Your Gmail address
    'password' => 'your-gmail-password', // Your Gmail password
    'port' => 465, // SSL port (alternative to 587)
    'encryption' => 'ssl', // SSL instead of TLS
    'from_email' => 'fareedahmadbutt10@gmail.com', // Sender email
    'from_name' => 'EmpowerTech Consulting LLC', // Sender name
    'to_email' => 'info@empowertcl.com', // Recipient email
    'to_name' => 'EmpowerTech Consulting' // Recipient name
];
?>
