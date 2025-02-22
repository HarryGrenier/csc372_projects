$(document).ready(function () {
    let text = $(".hero-title").text();
    $(".hero-title").html(""); // Clear text initially

    let i = 0;
    function typeWriter() {
        if (i < text.length) {
            $(".hero-title").append(text.charAt(i));
            i++;
            setTimeout(typeWriter, 50);
        }
    }

    setTimeout(typeWriter, 500); // Delay before typing starts
});
