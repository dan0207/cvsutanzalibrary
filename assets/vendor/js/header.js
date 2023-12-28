
var previousScroll = 0;

$(window).scroll(function () {
    var currentScroll = $(this).scrollTop();

    if (currentScroll > previousScroll) {
        // Scrolling down
        $(".navbar").fadeOut();
    } else {
        // Scrolling up
        $(".navbar").fadeIn();
    }

    previousScroll = currentScroll;
});