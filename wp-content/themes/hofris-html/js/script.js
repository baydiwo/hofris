// script.js
// First we trigger the form submit event
$(window).load(function() {
    $('#slider').nivoSlider({
        effect: 'sliceDown',
        animSpeed: 500,                 // Slide transition speed
        pauseTime: 30000,
    });

    $('#login').on('click', function() {
        $('.ajax-login-register-login-container').toggle();
    });
    $('#register').on('click', function() {
        $('.ajax-login-register-register-container').show();
    });

    $('.fb-login-logo').html("&nbsp;");

    $('.goingup').on('click', function() {
        var body = $("html, body");
        body.stop().animate({scrollTop:0}, 'slow', 'swing');
    })

});

function hideUncategorized() {
    $( "a:contains('Uncategorized')" ).parent().css( "display", "none" );
}
hideUncategorized();

$(document).ready(function(){
    $(".youtube").colorbox({iframe:true, innerWidth:640, innerHeight:390});
    $('#mobile-menu').sidr({
        side: 'right',
        // onOpen : function
    });

    $("input").on("change", function() {
        this.setAttribute(
            "data-date",
            moment(this.value, "YYYY-MM-DD")
            .format( this.getAttribute("data-date-format") )
        )
    }).trigger("change")
});
