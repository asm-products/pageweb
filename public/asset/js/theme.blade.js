$(function() {			       
    /*	Theme hover */	
    $(window).load(function(){
        'use strict';
        $('.flexslider').flexslider({
            animation: "fade",
            start: function(slider){
                $('body').removeClass('loading');
            }
        });
    });
    
    $(window).load(function(){
        'use strict';
        $("a[data-pretty^='prettyPhoto']").prettyPhoto();
				
        $(".video:first a[data-pretty^='prettyPhoto']").prettyPhoto({
            animation_speed:'normal',
            theme:'pp_default',
            slideshow:3000, 
            autoplay_slideshow: false
        });
        $(".video:gt(0) a[data-pretty^='prettyPhoto']").prettyPhoto({
            animation_speed:'fast',
            slideshow:10000, 
            hideflash: true
        });
		
    });
    
    $('.theme-img-wrapper').hover(function(){
        $(".caption-wrapper", this).stop().animate({
            top:'0'
        },{
            queue:false,
            duration:300
        });
    }, function() {
        $(".caption-wrapper", this).stop().animate({
            top:'100%'
        },{
            queue:false,
            duration:300
        });
    });	 		
		
});
    
    