/**
 * Contact Form with Google Identity Integration
 * Handles Gmail account detection and switching like empowertcl.com
 */

// Global variables
let googleUser = null;

// Handle the Google Identity response
function handleCredentialResponse(response) {
    try {
        // Decode the JWT token to get the user's email
        const responsePayload = JSON.parse(atob(response.credential.split('.')[1]));
        const userEmail = responsePayload.email;
        
        // Store the user
        googleUser = responsePayload;
        
        // Update the UI
        updateEmailDisplay(userEmail);
        
        // Hide the sign-in container if it's visible
        const signInContainer = document.getElementById('googleSignInContainer');
        if (signInContainer) {
            signInContainer.style.display = 'none';
        }
        
        // Show the switch account link
        const switchAccount = document.getElementById('switchAccount');
        if (switchAccount) {
            switchAccount.style.display = 'inline';
        }
        
    } catch (error) {
        console.error('Error handling Google Identity response:', error);
    }
}

// Update the email display
function updateEmailDisplay(email) {
    const userEmailElement = document.getElementById('userEmail');
    const emailInput = document.querySelector('input[name="entry.1065046570"]');
    
    if (userEmailElement) {
        userEmailElement.textContent = email;
        userEmailElement.style.color = '#202124';
        userEmailElement.style.fontStyle = 'normal';
    }
    
    if (emailInput) {
        emailInput.value = email;
    }
}

// Initialize Google Identity Services
function initGoogleSignIn() {
    // Check if Google Identity Services is available
    if (window.google && google.accounts) {
        // Initialize the Google Identity Services
        google.accounts.id.initialize({
            client_id: 'YOUR_GOOGLE_CLIENT_ID', // Replace with your actual client ID
            callback: handleCredentialResponse,
            auto_select: true,
            context: 'signin',
            ux_mode: 'popup',
            itp_support: true
        });
        
        // Try to sign in silently
        google.accounts.id.prompt((notification) => {
            if (notification.isNotDisplayed() || notification.isSkippedMoment()) {
                // Show the sign-in button if automatic sign-in fails
                renderSignInButton();
            }
        });
        
        // Add click handler for switch account
        const switchAccount = document.getElementById('switchAccount');
        if (switchAccount) {
            switchAccount.addEventListener('click', function(e) {
                e.preventDefault();
                google.accounts.id.disableAutoSelect();
                google.accounts.id.prompt();
                renderSignInButton();
            });
        }
        
    } else {
        console.error('Google Identity Services not available');
    }
}

// Render the Google Sign-In button
function renderSignInButton() {
    const container = document.getElementById('googleSignInContainer');
    if (!container) return;
    
    // Clear the container
    container.innerHTML = '';
    container.style.display = 'block';
    
    // Render the button
    google.accounts.id.renderButton(container, {
        type: 'standard',
        theme: 'outline',
        size: 'large',
        text: 'signin_with',
        shape: 'rectangular',
        logo_alignment: 'left',
        width: container.offsetWidth
    });
}

// Initialize when the page loads
window.onload = function() {
    // Initialize Google Sign-In
    initGoogleSignIn();
    
    // Add form submission handler
    const contactForm = document.getElementById('contactForm');
    if (contactForm) {
        contactForm.addEventListener('submit', function(e) {
            const emailInput = document.querySelector('input[name="entry.1065046570"]');
            if (emailInput && !emailInput.value) {
                e.preventDefault();
                alert('Please sign in with your Google account to continue.');
                return false;
            }
        });
    }
};
