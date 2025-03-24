// html-loader.js

document.addEventListener("DOMContentLoaded", function () {
    const loadButton = document.getElementById("load-content-btn");
    const contentContainer = document.getElementById("content-container");
    let contentLoaded = false;

    loadButton.addEventListener("click", function () {
        if (!contentLoaded) {
            let xhr = new XMLHttpRequest();
            xhr.open("GET", "../data/testimonial-data.html", true);

            xhr.onreadystatechange = function () {
                if (xhr.readyState === 4) {
                    if (xhr.status === 200) {
                        contentContainer.innerHTML = xhr.responseText;
                        loadButton.textContent = "Show Less Testimonials";
                        contentLoaded = true;
                    } else {
                        console.error("Failed to load content: " + xhr.status);
                    }
                }
            };
            
            xhr.send();
        } else {
            contentContainer.innerHTML = "";
            loadButton.textContent = "Load More Testimonials";
            contentLoaded = false;
        }
    });
});
