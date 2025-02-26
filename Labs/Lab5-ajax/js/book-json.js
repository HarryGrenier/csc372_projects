// Select all images and set their opacity to 0.5
function setAllImagesOpacity(opacity) {
    document.querySelectorAll('#book img').forEach(img => {
        img.style.opacity = opacity;
    });
}

// Function to fetch JSON data and update details
function loadBookDetails(jsonFile, index) {
    let xhr = new XMLHttpRequest();
    xhr.open('GET', jsonFile, true);
    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            let data = JSON.parse(xhr.responseText);
            let books = data.books;
            let detailsDiv = document.getElementById("details");
            
            if (books[index]) {
                let book = books[index];
                let bookDetails = `
                    <h3>${book.title}</h3>
                    <p><strong>Author:</strong> ${book.author}</p>
                    <p><strong>Copies Sold:</strong> ${book.sold} million</p>
                    <p>${book.description}</p>
                `;
                detailsDiv.innerHTML = bookDetails;
            } else {
                detailsDiv.innerHTML = "<p>Book details not found.</p>";
            }
        }
    };
    xhr.send();
}

// Assign event listeners to images
window.onload = function () {
    document.getElementById("don-quixote-img").addEventListener("click", function () {
        setAllImagesOpacity(0.5);
        this.style.opacity = 1;
        loadBookDetails("../data/books.json", 0);
    });

    document.getElementById("two-cities-img").addEventListener("click", function () {
        setAllImagesOpacity(0.5);
        this.style.opacity = 1;
        loadBookDetails("../data/books.json", 1);
    });

    document.getElementById("lotr-img").addEventListener("click", function () {
        setAllImagesOpacity(0.5);
        this.style.opacity = 1;
        loadBookDetails("../data/books.json", 2);
    });
};
