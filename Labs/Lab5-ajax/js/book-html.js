// Function to change the opacity of all images to 0.5
function changeImageOpacity() {
    const images = document.querySelectorAll('img');
    images.forEach(image => {
        image.style.opacity = '0.5';
    });
}

// Function to load HTML data via Ajax
function loadHtmlData(filePath) {
    const xhr = new XMLHttpRequest();
    xhr.open('GET', filePath, true);
    xhr.onload = function() {
        if (xhr.status === 200) {
            document.getElementById('details').innerHTML = xhr.responseText;
        }
    };
    xhr.send();
}

// Event listener for "Don Quixote" image
document.getElementById('don-quixote').addEventListener('click', function() {
    loadHtmlData('../data/cervantes-data.html');
    changeImageOpacity();
    this.style.opacity = '1';
});

// Event listener for "A Tale of Two Cities" image
document.getElementById('a-tale-of-two-cities').addEventListener('click', function() {
    loadHtmlData('../data/dickens-data.html');
    changeImageOpacity();
    this.style.opacity = '1';
});

// Event listener for "The Lord of the Rings" image
document.getElementById('the-lord-of-the-rings').addEventListener('click', function() {
    loadHtmlData('../data/tolkien-data.html');
    changeImageOpacity();
    this.style.opacity = '1';
});