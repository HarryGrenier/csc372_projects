const express = require('express');
const exphbs = require('express-handlebars');
const path = require('path');

const app = express();
const PORT = 1337;

// Configure Handlebars with helpers and partials
const hbs = exphbs.create({
    defaultLayout: 'main',
    layoutsDir: path.join(__dirname, 'views/layouts'),
    partialsDir: path.join(__dirname, 'views/partials'),
    helpers: {
        eq: (a, b) => a === b // For active nav link highlighting
    }
});
app.engine('handlebars', hbs.engine);
app.set('view engine', 'handlebars');
app.set('views', path.join(__dirname, 'views'));

// Serve static assets
app.use('/css', express.static(path.join(__dirname, 'public/css')));
app.use('/images', express.static(path.join(__dirname, 'public/Images')));
app.use('/js', express.static(path.join(__dirname, 'public/JavaScript')));
app.use('/data', express.static(path.join(__dirname, 'public/data')));

// Home Page
app.get(['/', '/index'], (req, res) => {
    res.render('index', {
        title: 'Coastal Concrete',
        currentYear: new Date().getFullYear(),
        activePage: 'home'
    });
});

// About Page
app.get('/about', (req, res) => {
    res.render('about', {
        title: 'About - Coastal Concrete',
        currentYear: new Date().getFullYear(),
        activePage: 'about'
    });
});

// Contact Page
app.get('/contact', (req, res) => {
    res.render('contact', {
        title: 'Contact - Coastal Concrete',
        currentYear: new Date().getFullYear(),
        activePage: 'contact'
    });
});

// Gallery Page
app.get('/gallery', (req, res) => {
    res.render('gallery', {
        title: 'Gallery - Coastal Concrete',
        currentYear: new Date().getFullYear(),
        activePage: 'gallery'
    });
});

// 404 Error Page
app.use((req, res) => {
    res.status(404).render('404', {
        title: '404 - Page Not Found',
        currentYear: new Date().getFullYear()
    });
});

// 500 Error Page
app.use((err, req, res, next) => {
    console.error('💥 SERVER ERROR:', err.stack);
    res.status(500).render('500', {
        title: '500 - Server Error',
        currentYear: new Date().getFullYear()
    });
});

// Start Server
app.listen(PORT, () => {
    console.log(`Server running at http://localhost:${PORT}`);
});
