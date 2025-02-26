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
            loadXML("../data/book-data.xml", 0);
        });
    }
 });
 
 
 document.addEventListener("DOMContentLoaded", function() {
    let bookImage = document.getElementById("two-cities-img");
 
 
    if (bookImage) {
        bookImage.addEventListener("click", function() {
            loadXML("../data/book-data.xml", 1);
        });
    }
 });
 
 
 document.addEventListener("DOMContentLoaded", function() {
    let bookImage = document.getElementById("lotr-img");
 
 
    if (bookImage) {
        bookImage.addEventListener("click", function() {
            loadXML("../data/book-data.xml", 2);
        });
    }
 });
 
 
 function loadXML(filePath, index) {
    let xhr = new XMLHttpRequest();
 
 
    console.log("Loading XML file:", filePath);
 
 
    xhr.onreadystatechange = function() {
        if (xhr.readyState === 4) { // Request complete
            if (xhr.status === 200) { // Success
                let xmlDoc = xhr.responseXML;
                console.log(xmlDoc);
 
 
                if (xmlDoc) {
                    let books = xmlDoc.getElementsByTagName("book");
                    let detailsDiv = document.getElementById("details");
                    detailsDiv.innerHTML = ""; // Clear previous content
 
 
                    if (index >= 0 && index < books.length) {
                        let book = books[index]; // Get the specific book entry
 
 
                        // Extract data from the XML
                        let author = book.getElementsByTagName("author")[0]?.textContent || "Unknown Author";
                        let copiesSold = book.getElementsByTagName("sold")[0]?.textContent || "N/A";
                        let description = book.getElementsByTagName("description")[0]?.textContent || "No description available.";
 
 
                        // Create formatted HTML structure
                        detailsDiv.innerHTML = `
                            <p><strong>Author:</strong> ${author}</p>
                            <p><strong>Copies Sold:</strong> ${copiesSold}</p>
                            <p>${description}</p>
                        `;
 
 
                        // Reset opacity for all image
                        dimImages();
 
 
                        // Highlight the clicked image
                        let images = document.querySelectorAll("img");
                        images[index].style.opacity = "1";
 
 
                    } else {
                        console.error("Index out of range. Available books: " + books.length);
                        detailsDiv.innerHTML = "<p>Invalid index. No data available.</p>";
                    }
                } else {
                    console.error("Failed to parse XML.");
                }
            } else {
                console.error("Error loading file:", xhr.status, xhr.statusText);
            }
        }
    };
 
 
    xhr.open("GET", filePath, true);
    xhr.send();
 }
 
 
 