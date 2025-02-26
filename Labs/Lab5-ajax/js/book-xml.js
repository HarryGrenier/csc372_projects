// Function to change the opacity of all images to 0.5
function changeImageOpacity() {
    const images = document.querySelectorAll('img');
    images.forEach(image => {
        image.style.opacity = '0.5';
    });
}

// Function to trigger Ajax request to load data from XML file
function loadXMLData(filePath, index) {
    const xhr = new XMLHttpRequest();
    const detailsDiv = document.getElementById('details');
    detailsDiv.innerHTML = '';

    xhr.onreadystatechange = function() {
        if (xhr.readyState === 4 && xhr.status === 200) {
            const xmlDoc = xhr.responseXML;
            const bookElements = xmlDoc.getElementsByTagName('book');
            if (bookElements.length > index) {
                const book = bookElements[index];
                const title = book.getElementsByTagName('title')[0].textContent;
                const author = book.getElementsByTagName('author')[0].textContent;
                const description = book.getElementsByTagName('description')[0].textContent;

                const titleElement = document.createElement('h2');
                titleElement.textContent = title;
                const authorElement = document.createElement('p');
                authorElement.textContent = `Author: ${author}`;
                const descriptionElement = document.createElement('p');
                descriptionElement.textContent = description;

                detailsDiv.appendChild(titleElement);
                detailsDiv.appendChild(authorElement);
                detailsDiv.appendChild(descriptionElement);
            }
        }
    };

    xhr.open('GET', filePath, true);
    xhr.send();
}

// Assign event listeners to images
document.getElementById('don-quixote').addEventListener('click', function() {
    loadXMLData('../data/bookdata.xml', 0);
    changeImageOpacity();
    this.style.opacity = '1';
});

document.getElementById('a-tale-of-two-cities').addEventListener('click', function() {
    loadXMLData('../data/bookdata.xml', 1);
    changeImageOpacity();
    this.style.opacity = '1';
});

document.getElementById('the-lord-of-the-rings').addEventListener('click', function() {
    loadXMLData('../data/bookdata.xml', 2);
    changeImageOpacity();
    this.style.opacity = '1';
});