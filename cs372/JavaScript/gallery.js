document.addEventListener("DOMContentLoaded", function () {
    const galleryContainer = document.getElementById("gallery-container");
    const imageFolder = "../Images/gallery/"; // Adjust the path as needed

    // List of images (You need a backend service to fetch files dynamically)
    const imageList = [
        "foundation4.jpeg",
        "foundation2.jpeg",
        "foundation3.jpeg",
        "foundation1.jpeg",
        "foundation5.jpeg",
        "foundation6.jpeg",
        "foundation7.jpeg",
        "foundation8.png"
        ]; 

    imageList.forEach((image, index) => {
        // Create a Bootstrap grid column
        const col = document.createElement("div");
        col.className = "col-md-4";

        // Create an anchor tag for modal functionality
        const link = document.createElement("a");
        link.href = `${imageFolder}${image}`;
        link.setAttribute("data-bs-toggle", "modal");
        link.setAttribute("data-bs-target", `#imageModal${index + 1}`);

        // Create the image element
        const img = document.createElement("img");
        img.src = `${imageFolder}${image}`;
        img.className = "img-fluid rounded shadow-sm";
        img.alt = `Project ${index + 1}`;

        // Append elements
        link.appendChild(img);
        col.appendChild(link);
        galleryContainer.appendChild(col);

        // Create the modal for viewing larger images
        createModal(index + 1, `${imageFolder}${image}`);
    });

    // Function to create modals dynamically
    function createModal(id, imgSrc) {
        const modalHTML = `
            <div class="modal fade" id="imageModal${id}" tabindex="-1">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <img src="${imgSrc}" class="img-fluid" alt="Project ${id}">
                    </div>
                </div>
            </div>
        `;
        document.body.insertAdjacentHTML("beforeend", modalHTML);
    }
});
