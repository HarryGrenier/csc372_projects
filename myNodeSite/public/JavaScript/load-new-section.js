$(document).ready(function () {
    let loaded = false;
    
    $(window).on("scroll", function () {
        let scrollTop = $(this).scrollTop();
        let triggerPoint = $("#ajax-section").offset().top - $(window).height() + 100;
        
        if (!loaded && scrollTop > triggerPoint) {
            $("#ajax-section").hide().load("../data/new-content-section.html", function () {
                $(this).fadeIn(2000);
            });
            loaded = true;
        }
    });
});
