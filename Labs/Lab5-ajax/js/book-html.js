// Function to dim all images to opacity 0.5
function dimImages() {
    let images = document.querySelectorAll("img");
    images.forEach(img => {
        img.style.opacity = "0.5"; // Set all images to dimmed
    });
 }
 
 
 // Call dimImages() on page load
 window.onload = function() {
    dimImages();
 };
 
 
 // Function to load the HTML file and highlight the clicked image
 function loadHTML(filePath, clickedImg) {
    // Create an XMLHttpRequest object
    let xhr = new XMLHttpRequest();
 
 
    // Define what happens when the response is loaded
    xhr.onload = function() {
        if (xhr.readyState === 4) { // Request is complete
            if (xhr.status === 200) { // Success
                document.getElementById("details").innerHTML = xhr.responseText;
 
 
                // Reset opacity for all images
                dimImages();
 
 
                // Set clicked image's opacity to 1
                clickedImg.style.opacity = "1";
            } else {
                console.error("Error loading file:", xhr.status, xhr.statusText);
            }
        }
    };
 
 
    // Prepare the GET request
    xhr.open("GET", filePath, true);
 
 
    // Send the request
    xhr.send();
 }
 
 document.getElementById('don-quixote').addEventListener('click', function() {
    loadHTML('../data/cervantes-data.html', this);
    changeImageOpacity();
    this.style.opacity = '1';
});

document.getElementById('a-tale-of-two-cities').addEventListener('click', function() {
    loadHTML('../data/dickens-data.html', this);
    changeImageOpacity();
    this.style.opacity = '1';
});

document.getElementById('the-lord-of-the-rings').addEventListener('click', function() {
    loadHTML('../data/tolkien-data.html', this);
    changeImageOpacity();
    this.style.opacity = '1';
});