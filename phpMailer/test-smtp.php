<?php
/**
 * SMTP Test Script
 * Use this to test your SMTP connection and identify issues
 */

require_once __DIR__ . '/PHPMailer.php';
require_once __DIR__ . '/SMTP.php';
require_once __DIR__ . '/Exception.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Load configuration
$config = require __DIR__ . '/config.php';

echo "<h2>SMTP Connection Test</h2>";
echo "<p>Testing connection to: " . $config['host'] . ":" . $config['port'] . "</p>";

try {
    $mail = new PHPMailer(true);
    
    // Enable debug output
    $mail->SMTPDebug = 2; // Enable verbose debug output
    $mail->Debugoutput = 'html'; // Format debug output as HTML
    
    // Server settings
    $mail->isSMTP();
    $mail->Host       = $config['host'];
    $mail->SMTPAuth   = true;
    $mail->Username   = $config['username'];
    $mail->Password   = $config['password'];
    $mail->SMTPSecure = $config['encryption'];
    $mail->Port       = $config['port'];
    
    // Test connection
    echo "<h3>Attempting to connect...</h3>";
    
    if ($mail->smtpConnect()) {
        echo "<p style='color: green;'>✅ SMTP connection successful!</p>";
        
        // Test authentication
        echo "<h3>Testing authentication...</h3>";
        if ($mail->smtpConnect()) {
            echo "<p style='color: green;'>✅ Authentication successful!</p>";
            
            // Test sending a simple email
            echo "<h3>Testing email sending...</h3>";
            
            $mail->setFrom($config['from_email'], $config['from_name']);
            $mail->addAddress($config['to_email'], $config['to_name']);
            $mail->Subject = 'SMTP Test - EmpowerTech Consulting';
            $mail->Body    = 'This is a test email to verify SMTP configuration is working correctly.';
            
            if ($mail->send()) {
                echo "<p style='color: green;'>✅ Test email sent successfully!</p>";
                echo "<p>Check your inbox at: " . $config['to_email'] . "</p>";
            } else {
                echo "<p style='color: red;'>❌ Failed to send test email: " . $mail->ErrorInfo . "</p>";
            }
        } else {
            echo "<p style='color: red;'>❌ Authentication failed!</p>";
        }
    } else {
        echo "<p style='color: red;'>❌ SMTP connection failed!</p>";
    }
    
} catch (Exception $e) {
    echo "<p style='color: red;'>❌ Error: " . $e->getMessage() . "</p>";
}

echo "<hr>";
echo "<h3>Troubleshooting Tips:</h3>";
echo "<ul>";
echo "<li><strong>For Gmail:</strong> Make sure you're using an App Password, not your regular password</li>";
echo "<li><strong>2FA Required:</strong> Enable 2-Factor Authentication on your Gmail account</li>";
echo "<li><strong>App Password:</strong> Generate one at Google Account → Security → 2-Step Verification → App passwords</li>";
echo "<li><strong>Less Secure Apps:</strong> This option is no longer available for Gmail</li>";
echo "<li><strong>Port:</strong> Try port 465 with SSL if 587 with TLS doesn't work</li>";
echo "</ul>";

echo "<h3>Current Configuration:</h3>";
echo "<pre>";
echo "Host: " . $config['host'] . "\n";
echo "Port: " . $config['port'] . "\n";
echo "Encryption: " . $config['encryption'] . "\n";
echo "Username: " . $config['username'] . "\n";
echo "From Email: " . $config['from_email'] . "\n";
echo "To Email: " . $config['to_email'] . "\n";
echo "</pre>";
?>
