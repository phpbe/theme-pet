$(document).ready(function () {
    $.ajaxSetup({cache: false});

    $(document).ajaxStart(function(){
        $('#ajax-loader').fadeIn();
    }).ajaxStop(function(){
        $('#ajax-loader').fadeOut();
    });

    $('#overlay').click(function(){
        let classNames = $('html').attr('class').split(" ");
        if (classNames.length > 0) {
            let className;
            for (let x in classNames) {
                className = classNames[x];
                if (className.substr(0, 8) == "js-open-") {
                    $("html").removeClass(className);
                }
            }
        }
    });


    let $gotoTop = $("#goto-top");
    let gotoTop = false;

    let $header = $("#header");
    let header = true;

    let lastScrollTop = 0;
    $(window).scroll(function(){
        let currentScrollTop = $(this).scrollTop();

        if (currentScrollTop > 120) {
            // 向下滚动
            if (currentScrollTop > lastScrollTop) {
                if (header) {
                    header = false;
                    $header.addClass("header-hide");
                }
            } else { // 向上滚动
                if (!header) {
                    header = true;
                    $header.removeClass("header-hide");
                }
            }
        }


        if (currentScrollTop > 300){
            if (!gotoTop) {
                gotoTop = true;
                $gotoTop.fadeIn();
            }
        } else {
            if (gotoTop) {
                gotoTop = false;
                $gotoTop.fadeOut();
            }
        }

        lastScrollTop = currentScrollTop;
    });

    $gotoTop.click(function () {
        $('html,body').animate({scrollTop:0},500);
    });
});


function reload() {
    window.location.reload();
}
