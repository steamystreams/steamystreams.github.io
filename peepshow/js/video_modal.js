jQuery.fn.center = function() {
    this.css("position", "absolute");
    this.css("top", Math.max(0, (($(window).height() - $(this).outerHeight()) / 2) + $(window).scrollTop()) + "px");
    this.css("left", Math.max(0, (($(window).width() - $(this).outerWidth()) / 2) + $(window).scrollLeft()) + "px");
    return this;
}


$(document).ready(function() {

    $(".video").css({
        "width": $("#player").css("width"),
        "height": $("#player").css("height")
    });

    $(".button").click(function() {
        $(".video-wrapper").fadeIn('fast', function() {
            $(".video").fadeIn();
            $(".video").center();
        });

    });

    $(".video-wrapper").click(function(e) {
        if ($(e.target).is(".video-wrapper")) {
            $(".video").fadeOut(function() {
                $(".video-wrapper").fadeOut(function() {
                    $(".video, .video-wrapper").css({
                        'display': 'none'
                    });
                    var src = $("#player").attr("src");
                    $("#player").attr("src", "");
                    $("#player").attr("src", src);
                });
            });
        }
    });

    $(document).keyup(function(e) {
        var isShown = $(".video-wrapper").css("display");

        if (isShown !== "none" && e.which == 27) {
            $(".video-wrapper").click();
        }

    });

});

// knot modal
jQuery.fn.center = function() {
    this.css("position", "absolute");
    this.css("top", Math.max(0, (($(window).height() - $(this).outerHeight()) / 2) + $(window).scrollTop()) + "px");
    this.css("left", Math.max(0, (($(window).width() - $(this).outerWidth()) / 2) + $(window).scrollLeft()) + "px");
    return this;
}


$(document).ready(function() {

    $(".knot_video").css({
        "width": $("#player").css("width"),
        "height": $("#player").css("height")
    });

    $(".knot_button").click(function() {
        $(".video-wrapper").fadeIn('fast', function() {
            $(".video").fadeIn();
            $(".video").center();
        });

    });

    $(".video-wrapper").click(function(e) {
        if ($(e.target).is(".video-wrapper")) {
            $(".knot_video").fadeOut(function() {
                $(".video-wrapper").fadeOut(function() {
                    $(".knot_video, .video-wrapper").css({
                        'display': 'none'
                    });
                    var src = $("#player").attr("src");
                    $("#player").attr("src", "");
                    $("#player").attr("src", src);
                });
            });
        }
    });

    $(document).keyup(function(e) {
        var isShown = $(".video-wrapper").css("display");

        if (isShown !== "none" && e.which == 27) {
            $(".video-wrapper").click();
        }

    });

});

// blind modal
jQuery.fn.center = function() {
    this.css("position", "absolute");
    this.css("top", Math.max(0, (($(window).height() - $(this).outerHeight()) / 2) + $(window).scrollTop()) + "px");
    this.css("left", Math.max(0, (($(window).width() - $(this).outerWidth()) / 2) + $(window).scrollLeft()) + "px");
    return this;
}


$(document).ready(function() {

    $(".blind_video").css({
        "width": $("#player").css("width"),
        "height": $("#player").css("height")
    });

    $(".knot_button").click(function() {
        $(".video-wrapper").fadeIn('fast', function() {
            $(".video").fadeIn();
            $(".video").center();
        });

    });

    $(".video-wrapper").click(function(e) {
        if ($(e.target).is(".video-wrapper")) {
            $(".blind_video").fadeOut(function() {
                $(".video-wrapper").fadeOut(function() {
                    $(".blind_video, .video-wrapper").css({
                        'display': 'none'
                    });
                    var src = $("#player").attr("src");
                    $("#player").attr("src", "");
                    $("#player").attr("src", src);
                });
            });
        }
    });

    $(document).keyup(function(e) {
        var isShown = $(".video-wrapper").css("display");

        if (isShown !== "none" && e.which == 27) {
            $(".video-wrapper").click();
        }

    });

});