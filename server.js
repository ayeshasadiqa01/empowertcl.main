const express = require('express');
const path = require('path');
const app = express();
const port = 8000;

// Middleware
app.use(express.static('assets'));
app.use(express.urlencoded({ extended: true }));
app.use(express.json());

// Set view engine to handle HTML files
app.engine('html', require('fs').readFileSync);
app.set('view engine', 'html');

// Helper function to include header and footer
function renderPage(filePath, res) {
    const fs = require('fs');
    
    try {
        const header = fs.readFileSync('includes/header.html', 'utf8');
        const footer = fs.readFileSync('includes/footer.html', 'utf8');
        const content = fs.readFileSync(filePath, 'utf8');
        
        // Replace PHP includes with actual content
        const fullPage = content
            .replace('<?php include \'includes/header.php\'; ?>', header)
            .replace('<?php include \'includes/footer.php\'; ?>', footer);
        
        res.send(fullPage);
    } catch (error) {
        res.status(500).send('Error loading page');
    }
}

// Routes
app.get('/', (req, res) => {
    renderPage('index.html', res);
});

app.get('/about', (req, res) => {
    renderPage('about.html', res);
});

app.get('/services', (req, res) => {
    renderPage('services.html', res);
});

app.get('/research', (req, res) => {
    renderPage('research.html', res);
});

app.get('/contact', (req, res) => {
    renderPage('contact.html', res);
});

// Handle contact form submission
app.post('/process_contact', (req, res) => {
    const { name, email, company, phone, service, message, newsletter } = req.body;
    
    // Basic email validation
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    
    if (emailRegex.test(email)) {
        // In a real application, you would:
        // 1. Send email to your team
        // 2. Save to database
        // 3. Send confirmation email to user
        
        // For this demo, we'll redirect with a success message
        res.redirect('/contact?status=success');
    } else {
        res.redirect('/contact?status=error');
    }
});

app.listen(port, () => {
    console.log(`Server running at http://localhost:${port}`);
});