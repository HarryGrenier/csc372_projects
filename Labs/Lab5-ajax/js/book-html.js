//SET OPACITY TO 0.5


function dimImages() {
   let images = document.querySelectorAll("img");
   images.forEach(img => {
       img.style.opacity = "0.5";
   });
}


// Call the function to apply the effect
dimImages();


//LOAD HTML FILE


function loadHTML(filePath) {
   // Create an XMLHttpRequest object
   let xhr = new XMLHttpRequest();


   // Define what happens when the response is loaded
   xhr.onreadystatechange = function() {
       if (xhr.readyState === 4) { // Request is complete
           if (xhr.status === 200) { // Success
               document.getElementById("details").innerHTML = xhr.responseText;
           let images = document.querySelectorAll("img");
           images.forEach(img => {
               img.addEventListener("click", function() {
                   images.forEach(i => i.style.opacity = "0.5"); // Reset all images
                   this.style.opacity = "1"; // Set opacity of the clicked image
               });
           });
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
