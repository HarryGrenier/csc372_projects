const express = require('express');
const path = require('path');

const app = express();
const PORT = 1337;

// Path to the public directory
const publicDir = path.join(__dirname, 'public');

// Serve static assets from specific folders
app.use('/css', express.static(path.join(publicDir, 'css')));
app.use('/images', express.static(path.join(publicDir, 'Images')));
app.use('/js', express.static(path.join(publicDir, 'JavaScript')));
app.use('/data', express.static(path.join(publicDir, 'data')));

// Serve static HTML pages
app.get('/', (req, res) => {
    res.sendFile(path.join(publicDir, 'index.html'));
});

app.get('/index', (req, res) => {
    res.sendFile(path.join(publicDir, 'index.html'));
});

app.get('/about', (req, res) => {
    res.sendFile(path.join(publicDir, 'about.html'));
});

app.get('/contact', (req, res) => {
    res.sendFile(path.join(publicDir, 'contact.html'));
});

app.get('/gallery', (req, res) => {
    res.sendFile(path.join(publicDir, 'gallery.html'));
});

// Serve JS and CSS files (optional fallback)
app.use(express.static(publicDir));

// Catch-all 404 route
app.use((req, res) => {
    res.status(404).sendFile(path.join(publicDir, '404.html'));
});

// Start the server
app.listen(PORT, () => {
    console.log(`Express server running at: http://localhost:${PORT}`);
});
