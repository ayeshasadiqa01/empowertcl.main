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
    
    <!-- Form message styles -->
    <style>
        #formMessage {
            padding: 15px;
            margin: 20px 0;
            border-radius: 8px;
            font-weight: 500;
            display: none;
            animation: slideIn 0.3s ease-out;
        }
        
        #formMessage.success {
            background-color: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }
        
        #formMessage.error {
            background-color: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }
        
        .submit-button:disabled {
            opacity: 0.6;
            cursor: not-allowed;
        }
        
        @keyframes slideIn {
            from {
                opacity: 0;
                transform: translateY(-10px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
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
        <div class="container" style="max-width: none; padding: 0;">
            <div class="contact-content" style="display: flex; gap: 2rem; padding: 2rem;">
                <div class="contact-info">
                    <h2>We'd Love to Hear from You!</h2>
                    <p>At EmpowerTech Consulting LLC, we are here to help private healthcare practices streamline operations, integrate systems, and improve overall efficiency. Whether you're looking for automation solutions, EHR integrations, or process consulting, our team is ready to support you every step of the way.</p>
                    
                    <div class="consultation-info">
                        <h3>Get in Touch</h3>
                        <p><strong>We offer free consultations to discuss your unique needs and challenges.</strong> Use the form below or reach out through any of the following methods:</p>
                    </div>
                    
                    <div class="contact-methods">
                        <div class="contact-method">
                            <div class="method-icon">
                                <i class="fas fa-phone"></i>
                            </div>
                            <div class="method-info">
                                <h4>Call Us</h4>
                                <p>+1 703-721-8411</p>
                                <span>Free consultation available</span>
                            </div>
                        </div>
                        
                        <div class="contact-method">
                            <div class="method-icon">
                                <i class="fas fa-envelope"></i>
                            </div>
                            <div class="method-info">
                                <h4>Email Us</h4>
                                <p>info@empowertcl.com</p>
                                <span>We'll respond within 24 hours</span>
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
                
                <div class="contact-form-container" style="min-width: 450px; flex: 0 0 auto;">
                    <h1 style="text-align: left;">Contact Us</h1>
                    <p class="form-description" style="text-align: left;">We offer free consultations to discuss your unique needs and challenges. Use the form below or reach out through any of the following methods:</p>
                    
                    <!-- Message container for AJAX responses -->
                    <div id="formMessage"></div>
                    
                    <form id="contactForm" class="contact-form" method="POST" action="phpMailer/contact-mailer.php" style="text-align: left;">
                        <div class="form-group">
                            <label for="name">Your Name <span class="required">*</span></label>
                            <input type="text" id="name" name="name" required>
                            <div class="field-error" id="name-error"></div>
                        </div>
                        
                        <div class="form-group">
                            <label for="email">Your Email <span class="required">*</span></label>
                            <input type="email" id="email" name="email" required>
                            <div class="field-error" id="email-error"></div>
                        </div>
                        
                        <div class="form-group">
                            <label for="phone">Phone Number</label>
                            <input type="tel" id="phone" name="phone">
                            <div class="field-error" id="phone-error"></div>
                        </div>
                        
                        <div class="form-group">
                            <label for="message">Your Message <span class="required">*</span></label>
                            <textarea id="message" name="message" rows="5" placeholder="Tell us about your healthcare practice and how we can help streamline your operations..." required></textarea>
                            <div class="field-error" id="message-error"></div>
                        </div>
                        <input type="hidden" name="📋 Quick Reply" value="Hi [name], Thank you for your interest in EmpowerTech Consulting. I would be pleased to schedule a complimentary consultation to discuss your healthcare practice optimization needs. When would be convenient for a 15-30 minute call? Best regards, Wasim Ahmad, Founder & CEO">
                        
                        <div class="form-actions">
                            <button type="button" class="clear-button">Clear Form</button>
                            <button type="submit" id="submitBtn" class="submit-button">
                                <span class="btn-text">Send Message</span>
                                <span class="btn-spinner" style="display: none;">⟳ Sending...</span>
                            </button>
                        </div>
                        
                        <!-- AJAX flag -->
                        <input type="hidden" name="ajax" value="1">
                        
                        <div class="form-footer">
                            <p class="form-note">Your information is secure and will not be shared with third parties.</p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- Map Section -->

    <?php include 'includes/footer.php'; ?>
    
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- Contact Form Script -->
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        const messageDiv = document.getElementById('formMessage');
        const form = document.getElementById('contactForm');
        const submitBtn = document.getElementById('submitBtn');
        const btnText = submitBtn.querySelector('.btn-text');
        const btnSpinner = submitBtn.querySelector('.btn-spinner');
        
        // Check if form was successfully submitted
        const urlParams = new URLSearchParams(window.location.search);
        if (urlParams.get('sent') === '1') {
            messageDiv.innerHTML = '🎉 Thank you! Your message has been sent successfully. We will get back to you within 24 hours to discuss your healthcare practice needs.';
            messageDiv.className = 'success';
            messageDiv.style.display = 'block';
            
            // Scroll to message
            messageDiv.scrollIntoView({ 
                behavior: 'smooth', 
                block: 'center' 
            });
            
            // Auto-hide after 10 seconds
            setTimeout(() => {
                messageDiv.style.opacity = '0';
                setTimeout(() => {
                    messageDiv.style.display = 'none';
                    messageDiv.style.opacity = '1';
                }, 300);
            }, 10000);
            
            // Clean URL
            window.history.replaceState({}, document.title, window.location.pathname);
        }
        
        // Form submission handler with AJAX
        form.addEventListener('submit', function(e) {
            e.preventDefault();
            
            // Validate form
            if (!validateForm()) {
                return false;
            }
            
            // Show loading state
            submitBtn.disabled = true;
            btnText.style.display = 'none';
            btnSpinner.style.display = 'inline';
            
            // Show sending message
            messageDiv.innerHTML = '📤 Sending your professional inquiry...';
            messageDiv.className = 'success';
            messageDiv.style.display = 'block';
            
            // Prepare form data
            const formData = new FormData(form);
            formData.append('ajax', '1');
            
            // Send AJAX request
            fetch('phpMailer/contact-mailer.php', {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    messageDiv.innerHTML = '🎉 Thank you! Your message has been sent successfully. We will get back to you within 24 hours to discuss your healthcare practice needs.';
                    messageDiv.className = 'success';
                    form.reset();
                } else {
                    messageDiv.innerHTML = '❌ ' + data.message;
                    messageDiv.className = 'error';
                }
                messageDiv.style.display = 'block';
                
                // Scroll to message
                messageDiv.scrollIntoView({ 
                    behavior: 'smooth', 
                    block: 'center' 
                });
            })
            .catch(error => {
                console.error('Error:', error);
                messageDiv.innerHTML = '❌ An error occurred while sending your message. Please try again or contact us directly.';
                messageDiv.className = 'error';
                messageDiv.style.display = 'block';
            })
            .finally(() => {
                // Reset button state
                submitBtn.disabled = false;
                btnText.style.display = 'inline';
                btnSpinner.style.display = 'none';
            });
        });
        
        // Form validation function
        function validateForm() {
            let isValid = true;
            const requiredFields = form.querySelectorAll('input[required], textarea[required]');
            
            requiredFields.forEach(function(field) {
                if (field.value.trim() === '') {
                    field.style.borderColor = '#dc3545';
                    isValid = false;
                } else {
                    field.style.borderColor = '#28a745';
                }
            });
            
            // Email validation
            const emailField = document.getElementById('email');
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (emailField.value && !emailRegex.test(emailField.value)) {
                emailField.style.borderColor = '#dc3545';
                isValid = false;
            }
            
            if (!isValid) {
                messageDiv.innerHTML = '❌ Please fill in all required fields correctly.';
                messageDiv.className = 'error';
                messageDiv.style.display = 'block';
            }
            
            return isValid;
        }
        
        // Clear form functionality  
        const clearBtn = document.querySelector('.clear-button');
        clearBtn.addEventListener('click', function(e) {
            e.preventDefault();
            if (confirm('Are you sure you want to clear all form data?')) {
                form.reset();
                messageDiv.style.display = 'none';
                
                // Reset field borders
                const allFields = form.querySelectorAll('input, textarea');
                allFields.forEach(field => {
                    field.style.borderColor = '';
                });
            }
        });
        
        // Real-time validation
        const requiredFields = form.querySelectorAll('input[required], textarea[required]');
        requiredFields.forEach(function(field) {
            field.addEventListener('blur', function() {
                if (this.value.trim() === '') {
                    this.style.borderColor = '#dc3545';
                } else {
                    this.style.borderColor = '#28a745';
                }
            });
            
            field.addEventListener('input', function() {
                if (this.style.borderColor === 'rgb(220, 53, 69)' && this.value.trim() !== '') {
                    this.style.borderColor = '';
                }
            });
        });
        
        // Email validation
        const emailField = document.getElementById('email');
        emailField.addEventListener('blur', function() {
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (this.value && !emailRegex.test(this.value)) {
                this.style.borderColor = '#dc3545';
            } else if (this.value) {
                this.style.borderColor = '#28a745';
            }
        });
    });
    </script>
    
    <!-- Custom Scripts -->
    <script src="js/script.js"></script>
</body>
</html>