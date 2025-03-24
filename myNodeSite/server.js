const http = require('http');
const fs = require('fs');

const PORT = 1337;

function serveStaticFile(res, filePath, contentType, responseCode = 200) {
  fs.readFile(__dirname + filePath, (err, data) => {
    if (err) {
      res.writeHead(500, { 'Content-Type': 'text/plain' });
      res.end('500 - Internal Server Error');
    } else {
      res.writeHead(responseCode, { 'Content-Type': contentType });
      res.end(data);
    }
  });
}

http.createServer((req, res) => {
  let path = req.url.replace(/\/?(?:\?.*)?$/, '').toLowerCase();

  switch (path) {
    // HTML Pages (support both /page and /page.html)
    case '':
    case '/index':
    case '/index.html':
      serveStaticFile(res, '/public/index.html', 'text/html');
      break;

    case '/about':
    case '/about.html':
      serveStaticFile(res, '/public/about.html', 'text/html');
      break;

    case '/contact':
    case '/contact.html':
      serveStaticFile(res, '/public/contact.html', 'text/html');
      break;

    case '/gallery':
    case '/gallery.html':
      serveStaticFile(res, '/public/gallery.html', 'text/html');
      break;

    case '/404':
    case '/404.html':
      serveStaticFile(res, '/public/404.html', 'text/html');
      break;

    // CSS
    case '/css/styles.css':
      serveStaticFile(res, '/public/css/styles.css', 'text/css');
      break;

    // JavaScript
    case '/javascript/contact-loader.js':
      serveStaticFile(res, '/public/JavaScript/contact-loader.js', 'application/javascript');
      break;
    case '/javascript/gallery-loader.js':
      serveStaticFile(res, '/public/JavaScript/gallery-loader.js', 'application/javascript');
      break;
    case '/javascript/headerfade.js':
      serveStaticFile(res, '/public/JavaScript/headerfade.js', 'application/javascript');
      break;
    case '/javascript/html-loader.js':
      serveStaticFile(res, '/public/JavaScript/html-loader.js', 'application/javascript');
      break;
    case '/javascript/jquery-3.7.1.js':
      serveStaticFile(res, '/public/JavaScript/jquery-3.7.1.js', 'application/javascript');
      break;
    case '/javascript/load-new-section.js':
      serveStaticFile(res, '/public/JavaScript/load-new-section.js', 'application/javascript');
      break;
    case '/javascript/weather-loader.js':
      serveStaticFile(res, '/public/JavaScript/weather-loader.js', 'application/javascript');
      break;

    // Data
    case '/data/contact-data.json':
      serveStaticFile(res, '/public/data/contact-data.json', 'application/json');
      break;
    case '/data/image-data.xml':
      serveStaticFile(res, '/public/data/image-data.xml', 'text/xml');
      break;
    case '/data/new-content-section.html':
      serveStaticFile(res, '/public/data/new-content-section.html', 'text/html');
      break;
    case '/data/testimonial-data.html':
      serveStaticFile(res, '/public/data/testimonial-data.html', 'text/html');
      break;

    // Images (Root)
    case '/images/experience.png':
      serveStaticFile(res, '/public/Images/experience.png', 'image/png');
      break;
    case '/images/logo2.png':
      serveStaticFile(res, '/public/Images/Logo2.png', 'image/png');
      break;
    case '/images/mac.png':
      serveStaticFile(res, '/public/Images/mac.png', 'image/png');
      break;
    case '/images/quality.png':
      serveStaticFile(res, '/public/Images/quality.png', 'image/png');
      break;
    case '/images/reliability.png':
      serveStaticFile(res, '/public/Images/reliability.png', 'image/png');
      break;
    case '/images/truck.png':
      serveStaticFile(res, '/public/Images/Truck.png', 'image/png');
      break;

    // Gallery Images (WebP)
    case '/images/gallery/foundation1.webp':
    case '/images/gallery/foundation2.webp':
    case '/images/gallery/foundation3.webp':
    case '/images/gallery/foundation4.webp':
    case '/images/gallery/foundation5.webp':
    case '/images/gallery/foundation6.webp':
    case '/images/gallery/foundation7.webp':
    case '/images/gallery/foundation8.webp':
      serveStaticFile(res, `/public/Images${path.replace('/images', '')}`, 'image/webp');
      break;

    // 404 fallback
    default:
      serveStaticFile(res, '/public/404.html', 'text/html', 404);
      break;
  }
}).listen(PORT);

console.log(`Server running at: http://localhost:${PORT}/`);
