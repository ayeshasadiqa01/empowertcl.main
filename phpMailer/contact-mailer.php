<?php
require_once __DIR__ . '/PHPMailer.php';
require_once __DIR__ . '/SMTP.php';
require_once __DIR__ . '/Exception.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class ContactMailer {
    private $mail;
    private $config;
    
    public function __construct() {
        $this->mail = new PHPMailer(true);
        
        // Load configuration
        $configFile = __DIR__ . '/config.php';
        if (file_exists($configFile)) {
            $this->config = require $configFile;
        } else {
            // Fallback configuration
            $this->config = [
                'host' => 'smtp.gmail.com',
                'username' => 'your-email@gmail.com',
                'password' => 'your-app-password',
                'port' => 587,
                'encryption' => 'tls',
                'from_email' => 'your-email@gmail.com',
                'from_name' => 'EmpowerTech Consulting LLC',
                'to_email' => 'info@empowertcl.com',
                'to_name' => 'EmpowerTech Consulting'
            ];
        }
    }
    
    public function sendContactEmail($data) {
        try {
            // Server settings
            $this->mail->isSMTP();
            $this->mail->Host       = $this->config['host'];
            $this->mail->SMTPAuth   = true;
            $this->mail->Username   = $this->config['username'];
            $this->mail->Password   = $this->config['password'];
            $this->mail->SMTPSecure = $this->config['encryption'];
            $this->mail->Port       = $this->config['port'];
            
            // Recipients
            // Use the recipient chosen by the user, or fallback to default
            $recipient_email = !empty($data['recipient']) ? $data['recipient'] : $this->config['to_email'];
            $this->mail->addAddress($recipient_email, $this->config['to_name']);
            
            // Set sender - Gmail requires using authenticated email
            $this->mail->setFrom($this->config['from_email'], $data['name'] . ' via EmpowerTech Consulting');
            
            // Add reply-to so responses go to the user
            if (isset($data['email']) && filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
                $this->mail->addReplyTo($data['email'], $data['name'] ?? '');
            }
            
            // Content
            $this->mail->isHTML(true);
            $this->mail->Subject = 'New Contact Form Message - EmpowerTech Consulting';
            $this->mail->Body    = $this->generateEmailBody($data);
            $this->mail->AltBody = $this->generatePlainTextBody($data);
            
            $this->mail->send();
            return ['success' => true, 'message' => 'Message sent successfully!'];
            
        } catch (Exception $e) {
            return ['success' => false, 'message' => 'Message could not be sent. Error: ' . $this->mail->ErrorInfo];
        }
    }
    
    private function generateEmailBody($data) {
        $html = '<h2>New Contact Form Submission</h2>';
        $html .= '<table style="width: 100%; border-collapse: collapse;">';
        
        foreach ($data as $key => $value) {
            if (!empty($value)) {
                $html .= '<tr style="border-bottom: 1px solid #eee;">';
                $html .= '<td style="padding: 8px; font-weight: bold;">' . ucfirst(str_replace('_', ' ', $key)) . '</td>';
                $html .= '<td style="padding: 8px;">' . nl2br(htmlspecialchars($value)) . '</td>';
                $html .= '</tr>';
            }
        }
        
        $html .= '</table>';
        $html .= '<p><strong>Submitted at:</strong> ' . date('Y-m-d H:i:s') . '</p>';
        
        return $html;
    }
    
    private function generatePlainTextBody($data) {
        $text = "New Contact Form Submission\n\n";
        
        foreach ($data as $key => $value) {
            if (!empty($value)) {
                $text .= ucfirst(str_replace('_', ' ', $key)) . ": " . $value . "\n";
            }
        }
        
        $text .= "\nSubmitted at: " . date('Y-m-d H:i:s');
        
        return $text;
    }
}

// Handle AJAX requests
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['ajax'])) {
    header('Content-Type: application/json');
    
    // Validate required fields
    $required_fields = ['name', 'email', 'message'];
    $missing_fields = [];
    
    foreach ($required_fields as $field) {
        if (empty($_POST[$field])) {
            $missing_fields[] = $field;
        }
    }
    
    if (!empty($missing_fields)) {
        echo json_encode([
            'success' => false, 
            'message' => 'Please fill in all required fields: ' . implode(', ', $missing_fields)
        ]);
        exit;
    }
    
    // Validate email
    if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        echo json_encode([
            'success' => false, 
            'message' => 'Please enter a valid email address.'
        ]);
        exit;
    }
    
    $data = [
        'name' => trim($_POST['name'] ?? ''),
        'email' => trim($_POST['email'] ?? ''),
        'phone' => trim($_POST['phone'] ?? ''),
        'company' => trim($_POST['company'] ?? ''),
        'service' => trim($_POST['service'] ?? ''),
        'recipient' => trim($_POST['recipient'] ?? ''),
        'message' => trim($_POST['message'] ?? '')
    ];
    
    $mailer = new ContactMailer();
    $result = $mailer->sendContactEmail($data);
    
    echo json_encode($result);
    exit;
}
?>
