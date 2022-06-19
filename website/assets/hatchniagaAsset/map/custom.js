
jQuery(document).ready(function($) {
    
    $('#menu-icon').click(function(){
        if($('#menu-hidden').is(":visible")){
            $('#menu-icon').removeClass('open');
            $('#menu-hidden').slideUp();    
        }else{
            $('#menu-hidden').slideDown();    
            $('#menu-icon').addClass('open');
        }  
    });
    
    $('.pop-up-click').click(function(){
        $(this).addClass('pop-up-active');
        $('.pop-up-z-index').css('z-index','999');
        $($('.pop-up-active').closest('.standard_section')[0]).css('z-index','9999');
        $($('.pop-up-click').closest('.standard_section')).not($('.pop-up-active').closest('.standard_section')[0]).css('z-index','9');
    });
    
    $(".pop-up-click").each(function(index, element){
        $(element).attr("data-member", index + 1);
    });
    
    $('.cross-item').live("click", function(){
        $($(this).closest('.pop-up-click')[0]).removeClass('pop-up-active');
    });
    
    $(".team-pop-up .right").live("click", function(){
        memberActual = parseInt($(this).closest(".pop-up-click").attr("data-member"));
        memberNext = memberActual + 1;
        $($(this).closest(".pop-up-click")[0]).removeClass("pop-up-active");
        
        $(document).find("[data-member='" + memberNext + "']").addClass("pop-up-active");
        $($('.pop-up-active').closest('.standard_section')[0]).css('z-index','9999');
        $($('.pop-up-click').closest('.standard_section')).not($('.pop-up-active').closest('.standard_section')[0]).css('z-index','9');
        
    });
    $(".team-pop-up .left").live("click", function(){
        memberActual = parseInt($(this).closest(".pop-up-click").attr("data-member"));
        memberNext = memberActual - 1;
        $($(this).closest(".pop-up-click")[0]).removeClass("pop-up-active");
        
        $(document).find("[data-member='" + memberNext + "']").addClass("pop-up-active");
        $($('.pop-up-active').closest('.standard_section')[0]).css('z-index','9999');
        $($('.pop-up-click').closest('.standard_section')).not($('.pop-up-active').closest('.standard_section')[0]).css('z-index','9');
        
    });
    
    
    $('header#top nav ul li a').click(function(){
        $('header#top nav #menu-icon').removeClass('open');
        $('header#top nav #menu-hidden').slideUp(1000);                             
   });

});

