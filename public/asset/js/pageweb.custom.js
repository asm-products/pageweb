$(function() {
			   
    //////////     MOBILE CHECK    //////////   
    var iOS = /(iPad|iPhone|iPod)/g.test( navigator.userAgent );
    var android = /mobile|android/i.test (navigator.userAgent);
		
    if(iOS || android){
        $("html").addClass("isMobile");
        if(iOS) {
            $(".form-control").css("-webkit-appearance","caret");
        }
        $("select.input-sm,select.input-lg ").css("line-height","1.3");
    }
		
    var capletOverlay=$('<div id="caplet-overlay">');
    $.overlay=function(opacity){
        $("body").append(capletOverlay);
        capletOverlay.fadeTo( "slow" , opacity || 0.8 );
    }
    $.clearOverlay=function(){
        capletOverlay.fadeTo( "slow" , 0 ,function(){
            capletOverlay.remove();
        });
    }
		



    // Responsive nav
    selectnav('navigation', {
        label: 'NAVIGATE...',
        autoselect: false,
        nested: true,
        indent: "-"
    });

    //////////     TOP SEARCH     //////////
    $(".btn-header-search , .close-header-search").on('click',function(){
        var navSearch=$(".widget-top-search");
        navSearch.toggleClass("nav-top-search");
        if($(this).hasClass("close-header-search")){
            $.clearOverlay();
            return true;
        }
        //navSearch.find("input").focus();
        $.overlay(0.4);
    });
    $('.parallex').parallax("50%", 0.1, false);

    $(".animated").waypoint(function(direction) {
        var el=$(this),
        e=el.data("effect"),
        startTime=el.data("start");
        if(startTime){
            setTimeout(function () {
                el.toggleClass(e);
                el.toggleClass("showing");
            }, startTime );  
        }else{
            $(this).toggleClass(e);
            $(this).toggleClass("showing");
        }
    }, {
        offset: "90%"
    });

 
    $(window).scroll(function() {
        if ($(window).width() > 768 ) {
            if ($(window).scrollTop() > 70) {
                $('#header').addClass('fixedHeader');
            } else {
                $('#header').removeClass('fixedHeader');
            }
            if ($(window).scrollTop() > 500) {
                $('#header').addClass('colorHeader');
            } else {
                $('#header').removeClass('colorHeader');
            }
        }
    });

    $( window ).resize(function() {
        if ($(window).width() < 767 ) {
            $('#header').removeClass('fixedHeader');
        }
    });	
		
});
    
    