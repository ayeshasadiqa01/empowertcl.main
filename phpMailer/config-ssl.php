<?php
/**
 * Alternative SSL Configuration for Gmail
 * Use this if the TLS configuration doesn't work
 */

return [
    'host' => 'smtp.gmail.com',
    'username' => 'fareedahmadbutt10@gmail.com',
    'password' => 'Fareed#10', // Replace with your App Password
    'port' => 465, // SSL port
    'encryption' => 'ssl', // SSL instead of TLS
    'from_email' => 'fareedahmadbutt10@gmail.com',
    'from_name' => 'EmpowerTech Consulting LLC',
    'to_email' => 'info@empowertcl.com',
    'to_name' => 'EmpowerTech Consulting'
];
?>
