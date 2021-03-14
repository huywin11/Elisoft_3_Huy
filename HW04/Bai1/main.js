// A $( document ).ready() block.
$( document ).ready(function() {
    width = $( window ).width();
    if(width <= 751){
        $('.navigation-menu').addClass('is-mobile');
        $('.navigation-menu').removeClass('is-desktop');
        // $('.navigation-menu.is-mobile').show();
        $('.navigation-menu.is-mobile .main-menu li').hide();
        $('.navigation-menu.is-mobile .main-menu > li:first-child').css('display','none');
        //$('.navigation-menu.is-mobile .main-menu li #btn-menu-bar').show();
        $('.navigation-menu.is-mobile #btn-menu-bar').click(function(){
            $('.navigation-menu.is-mobile .main-menu li').toggle();
            $(this).show();
        });
    }
});
