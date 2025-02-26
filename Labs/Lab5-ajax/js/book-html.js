// Function to dim all images to opacity 0.5
function dimAllImages() {
    let images = document.querySelectorAll("img");
    images.forEach(img => {
        img.style.opacity = "0.5";
    });
}

function loadBookDetails(filePath, clickedImg) {
    let xhr = new XMLHttpRequest();

    xhr.onload = function() {
        if (xhr.readyState === 4 && xhr.status === 200) {
            document.getElementById("details").innerHTML = xhr.responseText;
            dimAllImages();
            clickedImg.style.opacity = "1";
        } else if (xhr.status !== 200) {
            console.error("Error loading file:", xhr.status, xhr.statusText);
        }
    };

    xhr.open("GET", filePath, true);
    xhr.send();
}

// Assign event listeners to book images
document.getElementById('don-quixote-img').addEventListener('click', function() {
    loadBookDetails('../data/cervantes-data.html', this);
});

document.getElementById('two-cities-img').addEventListener('click', function() {
    loadBookDetails('../data/dickens-data.html', this);
});

document.getElementById('lotr-img').addEventListener('click', function() {
    loadBookDetails('../data/tolkien-data.html', this);
});

// Call dimAllImages() on page load
window.onload = function() {
    dimAllImages();
};
