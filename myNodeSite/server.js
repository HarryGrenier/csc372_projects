const http = require('http');
const fs = require('fs');
const path = require('path');

const PORT = 1337;
const baseDir = path.join(__dirname, 'public');

// Common content types by extension
const mimeTypes = {
  '.html': 'text/html',
  '.css':  'text/css',
  '.js':   'application/javascript',
  '.png':  'image/png',
  '.jpg':  'image/jpeg',
  '.jpeg': 'image/jpeg',
  '.gif':  'image/gif',
  '.json': 'application/json',
  '.webp': 'image/webp',
  '.xml':  'text/xml',
  '.txt':  'text/plain'
};

function serveStaticFile(res, filePath, contentType, responseCode = 200) {
  fs.readFile(filePath, (err, data) => {
    if (err) {
      // If file not found, serve custom 404 page
      if (err.code === 'ENOENT') {
        fs.readFile(path.join(baseDir, '404.html'), (err404, data404) => {
          res.writeHead(404, { 'Content-Type': 'text/html' });
          res.end(err404 ? '404 - Not Found' : data404);
        });
      } else {
        res.writeHead(500, { 'Content-Type': 'text/plain' });
        res.end('500 - Internal Server Error');
      }
    } else {
      res.writeHead(responseCode, { 'Content-Type': contentType });
      res.end(data);
    }
  });
}

http.createServer((req, res) => {
  let safeUrl = req.url.replace(/\/?(?:\?.*)?$/, '').toLowerCase();

  let filePath = safeUrl === '' ? '/index.html' : safeUrl;

  if (path.extname(filePath) === '') {
    filePath += '.html';
  }

  const fullPath = path.join(baseDir, filePath);

  const ext = path.extname(fullPath);
  const contentType = mimeTypes[ext] || 'application/octet-stream';

  serveStaticFile(res, fullPath, contentType);

}).listen(PORT);

console.log(`Server running at http://localhost:${PORT}/`);
