// contact-loader.js

document.addEventListener("DOMContentLoaded", function () {
    fetch("../data/contact-data.json")
        .then(response => response.json())
        .then(data => {
            let contactContainer = document.getElementById("contact-container");
            contactContainer.innerHTML = ""; // Clear existing content

            data.contacts.forEach(contact => {
                let contactDiv = document.createElement("div");
                contactDiv.className = "contact-entry mb-3 p-3 border rounded shadow-sm";
                
                contactDiv.innerHTML = `
                    <h4 class='text-primary'>${contact.name}</h4>
                    <p><strong>${contact.role}</strong></p>
                    <p>📞 <a href='tel:${contact.phone}'>${contact.phone}</a></p>
                    <p>📧 <a href='mailto:${contact.email}'>${contact.email}</a></p>
                `;
                contactContainer.appendChild(contactDiv);
            });

            let mapContainer = document.getElementById("map-container");
            mapContainer.innerHTML = `
                <h4 class='text-center mb-3'>Our Location</h4>
                <div class='ratio ratio-16x9'>
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d11714.366066286174!2d-71.58456192669652!3d41.48021109554466!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89e5d6a6fd11fd91%3A0x74a08f04e2a5c9e0!2s3942%20Kingstown%20Rd%2C%20West%20Kingston%2C%20RI%2002892!5e0!3m2!1sen!2sus!4v1700000000000!5m2!1sen!2sus" 
                        width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy">
                    </iframe>
                </div>
            `;
        })
        .catch(error => console.error("Error loading contact data:", error));
});
