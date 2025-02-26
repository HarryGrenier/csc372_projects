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
 
 
 document.addEventListener("DOMContentLoaded", function() {
    let bookImage = document.getElementById("don-quixote-img");
 
 
    if (bookImage) {
        bookImage.addEventListener("click", function() {
            loadHTML("data/dickens-data.html", this);
        });
    }
 });
 
 
 document.addEventListener("DOMContentLoaded", function() {
    let bookImage = document.getElementById("two-cities-img");
 
 
    if (bookImage) {
        bookImage.addEventListener("click", function() {
            loadHTML("data/tolkien-data.html", this);
        });
    }
 });
 
 
 document.addEventListener("DOMContentLoaded", function() {
    let bookImage = document.getElementById("lotr-img");
 
 
    if (bookImage) {
        bookImage.addEventListener("click", function() {
            loadHTML("data/cervantes-data.html", this);
        });
    }
 });
 
 
 function loadHTML(filePath, clickedImg) {
    let xhr = new XMLHttpRequest();
 
 
    xhr.onload = function() {
        if (xhr.readyState === 4) { // Request is complete
            if (xhr.status === 200) { // Success
                document.getElementById("details").innerHTML = xhr.responseText;
 
 
                // Reset opacity for all images
                dimImages();
 
 
                clickedImg.style.opacity = "1";
            } else {
                console.error("Error loading file:", xhr.status, xhr.statusText);
            }
        }
    };
 
 
    xhr.open("GET", filePath, true);
    xhr.send();
 }
 