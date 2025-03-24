// gallery-loader.js

document.addEventListener("DOMContentLoaded", function () {
    let xhr = new XMLHttpRequest();
    xhr.open("GET", "../data/image-data.xml", true);

    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            let xmlDoc = xhr.responseXML;
            let images = xmlDoc.getElementsByTagName("image");
            let galleryContainer = document.getElementById("gallery-container");
            galleryContainer.innerHTML = ""; // Clear existing content

            for (let i = 0; i < images.length; i++) {
                let src = images[i].getElementsByTagName("src")[0].textContent;
                let alt = images[i].getElementsByTagName("alt")[0].textContent;
                
                let col = document.createElement("div");
                col.className = "col-md-4 text-center mb-4";
                
                let img = document.createElement("img");
                img.src = src;
                img.alt = alt;
                img.className = "img-fluid rounded shadow-sm";
                

                
                col.appendChild(img);

                galleryContainer.appendChild(col);
            }
        }
    };
    
    xhr.send();
});