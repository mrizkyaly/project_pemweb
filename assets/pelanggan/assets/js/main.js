$(document).ready(function () {
    // Sidebar
    $("#sidebar").mCustomScrollbar({
        theme: "minimal"
    });

    $('#dismiss1, .overlay').on('click', function () {
        $('#sidebar1').removeClass('active');
        $('.overlay').removeClass('active');
    });

    $('#sidebarCollapse1').on('click', function () {
        $('#sidebar1').addClass('active');
        $('.overlay').addClass('active');
        $('.collapse.in').toggleClass('in');
        $('a[aria-expanded=true]').attr('aria-expanded', 'false');
    });

    $('#dismiss2, .overlay').on('click', function () {
        $('#sidebar2').removeClass('active');
        $('.overlay').removeClass('active');
    });

    $('#sidebarCollapse2').on('click', function () {
        $('#sidebar2').addClass('active');
        $('.overlay').addClass('active');
        $('.collapse.in').toggleClass('in');
        $('a[aria-expanded=true]').attr('aria-expanded', 'false');
    });

    // Scroll
    $(window).on('scroll', function () {
        if ($(window).scrollTop() > 10) {
            $('.navbar').addClass('active');
        } else {
            $('.navbar').removeClass('active');
        }
    });

});