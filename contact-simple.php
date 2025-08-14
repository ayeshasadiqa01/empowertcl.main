<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us - EmpowerTech Consulting LLC</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/contact-enhanced.css">
    <link rel="stylesheet" href="css/footer.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="icon" type="image/png" href="images/favicon-32x32.png">
</head>
<body>
    <?php include 'includes/header.php'; ?>
    
    <!-- Page Header -->
    <section class="page-header">
        <div class="container">
            <h1>Contact Us</h1>
            <p>Ready to streamline your healthcare practice? Let's start the conversation with a free consultation.</p>
        </div>
    </section>

    <!-- Contact Section -->
    <section class="contact-section">
        <div class="container">
            <div class="contact-content">
                <div class="contact-info">
                    <h2>We'd Love to Hear from You!</h2>
                    <p>At EmpowerTech Consulting LLC, we are here to help private healthcare practices streamline operations, integrate systems, and improve overall efficiency.</p>
                    
                    <div class="contact-methods">
                        <div class="contact-method">
                            <div class="method-icon">
                                <i class="fas fa-phone"></i>
                            </div>
                            <div class="method-info">
                                <h4>Call Us</h4>
                                <p>+1 703-721-8411</p>
                            </div>
                        </div>
                        
                        <div class="contact-method">
                            <div class="method-icon">
                                <i class="fas fa-envelope"></i>
                            </div>
                            <div class="method-info">
                                <h4>Email Us</h4>
                                <p>info@empowertcl.com</p>
                            </div>
                        </div>
                        
                        <div class="contact-method">
                            <div class="method-icon">
                                <i class="fas fa-map-marker-alt"></i>
                            </div>
                            <div class="method-info">
                                <h4>Visit Us</h4>
                                <p>6731 Frontier Dr. #1024<br>Springfield, VA 22150<br>United States</p>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="contact-form-container">
                    <h1>Get in Touch</h1>
                    
                    <?php
                    // Simple form processing
                    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                        $name = $_POST['name'] ?? '';
                        $email = $_POST['email'] ?? '';
                        $phone = $_POST['phone'] ?? '';
                        $company = $_POST['company'] ?? '';
                        $service = $_POST['service'] ?? '';
                        $message = $_POST['message'] ?? '';
                        
                        // Basic validation
                        if (empty($name) || empty($email) || empty($message)) {
                            echo '<div style="background: #f8d7da; color: #721c24; padding: 10px; margin: 15px 0; border-radius: 6px; font-size: 14px;">Please fill in all required fields.</div>';
                        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                            echo '<div style="background: #f8d7da; color: #721c24; padding: 10px; margin: 15px 0; border-radius: 6px; font-size: 14px;">Please enter a valid email address.</div>';
                        } else {
                            // Send email using simple mail() function
                            $to = 'info@empowertcl.com';
                            $subject = 'New Contact Form Message - EmpowerTech Consulting';
                            
                            $email_body = "New Contact Form Submission\n\n";
                            $email_body .= "Name: " . $name . "\n";
                            $email_body .= "Email: " . $email . "\n";
                            $email_body .= "Phone: " . $phone . "\n";
                            $email_body .= "Company: " . $company . "\n";
                            $email_body .= "Service Interest: " . $service . "\n";
                            $email_body .= "Message: " . $message . "\n\n";
                            $email_body .= "Submitted at: " . date('Y-m-d H:i:s');
                            
                            $headers = "From: " . $email . "\r\n";
                            $headers .= "Reply-To: " . $email . "\r\n";
                            $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";
                            
                            if (mail($to, $subject, $email_body, $headers)) {
                                echo '<div style="background: #d4edda; color: #155724; padding: 10px; margin: 15px 0; border-radius: 6px; font-size: 14px;">Thank you! Your message has been sent successfully. We will get back to you within 24 hours.</div>';
                                // Clear form data
                                $name = $email = $phone = $company = $service = $message = '';
                            } else {
                                echo '<div style="background: #f8d7da; color: #721c24; padding: 10px; margin: 15px 0; border-radius: 6px; font-size: 14px;">Sorry, there was an error sending your message. Please try again or contact us directly.</div>';
                            }
                        }
                    }
                    ?>
                    
                    <form method="POST" class="contact-form">
                        <div class="form-group">
                            <label for="name">Your Name <span style="color: red;">*</span></label>
                            <input type="text" id="name" name="name" value="<?php echo htmlspecialchars($name ?? ''); ?>" required>
                        </div>
                        
                        <div class="form-group">
                            <label for="email">Your Email <span style="color: red;">*</span></label>
                            <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($email ?? ''); ?>" required>
                        </div>
                        
                        <div class="form-group">
                            <label for="phone">Phone Number</label>
                            <input type="tel" id="phone" name="phone" value="<?php echo htmlspecialchars($phone ?? ''); ?>">
                        </div>
                        
                        <div class="form-group">
                            <label for="message">Your Message <span style="color: red;">*</span></label>
                            <textarea id="message" name="message" rows="4" placeholder="Tell us about your healthcare practice and how we can help..." required><?php echo htmlspecialchars($message ?? ''); ?></textarea>
                        </div>
                        
                        <div class="form-actions">
                            <button type="submit" class="submit-button">Send Message</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- Map Section -->
    <section class="map-section">
        <div class="container">
            <div class="map-placeholder">
                <div class="map-content">
                    <i class="fas fa-map-marker-alt"></i>
                    <h3>Visit Our Office</h3>
                    <p>Located in Springfield, Virginia</p>
                </div>
            </div>
        </div>
    </section>

    <?php include 'includes/footer.php'; ?>
    
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- Custom Scripts -->
    <script src="js/script.js"></script>
</body>
</html>
