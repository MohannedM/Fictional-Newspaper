(function ($) {
    'use strict';

    var browserWindow = $(window);

    // :: 1.0 Preloader Active Code
    browserWindow.on('load', function () {
        $('#preloader').fadeOut('slow', function () {
            $(this).remove();
        });
    });

    // :: 2.0 Newsticker Active Code
    $.simpleTicker($("#breakingNewsTicker"), {
        speed: 1000,
        delay: 3000,
        easing: 'swing',
        effectType: 'roll'
    });
    $.simpleTicker($("#internationalTicker"), {
        speed: 1000,
        delay: 4000,
        easing: 'swing',
        effectType: 'roll'
    });

    // :: 3.0 Nav Active Code
    if ($.fn.classyNav) {
        $('#newspaperNav').classyNav();
    }

    // :: 4.0 Gallery Active Code
    if ($.fn.magnificPopup) {
        $('.videoPlayer').magnificPopup({
            type: 'iframe'
        });
    }

    // :: 5.0 ScrollUp Active Code
    if ($.fn.scrollUp) {
        browserWindow.scrollUp({
            scrollSpeed: 1500,
            scrollText: '<i class="fa fa-angle-up"></i>'
        });
    }

    // :: 6.0 CouterUp Active Code
    if ($.fn.counterUp) {
        $('.counter').counterUp({
            delay: 10,
            time: 2000
        });
    }

    // :: 7.0 Sticky Active Code
    if ($.fn.sticky) {
        $("#stickyMenu").sticky({
            topSpacing: 0
        });
    }

    // :: 8.0 wow Active Code
    if (browserWindow.width() > 767) {
        new WOW().init();
    }

    // :: 9.0 prevent default a click
    $('a[href="#"]').click(function ($) {
        $.preventDefault()
    });

    $('.post-like').on('click', eventDispatcher);

    function eventDispatcher(e){
        var currentLike = $(e.target).closest(".post-like");

        if(currentLike.attr('data-exists') == 'yes'){
            removeLike(currentLike);
        } else{
            addLike(currentLike);
        }
    }
    
    function addLike(currentLike){
        $.ajax({
            type: 'POST',
            beforeSend: function(xhr){
                xhr.setRequestHeader('X-WP-Nonce', newsData.nonce);
            },
            url: newsData.root_url + 'wp-json/newspaper/v1/likes',
            data: {post_id: currentLike.attr('data-postid')},
            success: function(response){
                currentLike.attr('data-exists', 'yes');
                var likeCount = parseInt(currentLike.find('.like-count').html(), 10);
                likeCount++;
                currentLike.find('.like-count').html(likeCount);
                currentLike.attr('data-likeid', response);
            },
            error: function(response){
                alert(response.responseText);
            }

        });

    }


    function removeLike(currentLike){
        $.ajax({
            type: 'DELETE',
            beforeSend: function(xhr){
                xhr.setRequestHeader('X-WP-Nonce', newsData.nonce);
            },
            url: newsData.root_url + 'wp-json/newspaper/v1/likes',
            data: {like_id: currentLike.attr('data-likeid')},
            success: function(response){
                currentLike.attr('data-exists', 'no');
                var likeCount = parseInt(currentLike.find('.like-count').html(), 10);
                likeCount--;
                currentLike.find('.like-count').html(likeCount);
                currentLike.attr('data-likeid', '');
            },
            error: function(response){
                alert(response.responseText);
            }

        });
    }

})(jQuery);