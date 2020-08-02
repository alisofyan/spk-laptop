$(document).ready(function(){
    // popup tambah kriteria
    $('.popup-btn').click(function(){ 
        var popupBlock = $('#'+$(this).data('popup'));
        popupBlock.addClass('active')
        .find('.fade-out').click(function(){
            popupBlock.css('opacity','0').find('.popup-content').css('margin-top','350px');        
            setTimeout(function(){
            $('.popup').removeClass('active');
            popupBlock.css('opacity','').find('.popup-content').css('margin-top','');
            }, 600);
        });
    });

    // add class pages
    if ($('body .about-us').length) {
        $('body').removeClass('home-index-index');
        $('body').addClass('about-us-index');
    }
    if ($('body .home').length) {
        $('body').removeClass('about-us-index');
        $('body').addClass('home-index-index');
    }



    // popup hasil
    $('.hasil .open-popup').click(function(){ 
        $('.hasil .sidebar').show();
    });
    $('.hasil .cancel.alternatif').click(function(){ 
        $('.hasil .sidebar').hide();
    });
});