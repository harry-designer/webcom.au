jQuery(document).ready(function($) {

    $(".tab_one_option").show();
    $(".tab_two_option").hide();
    $(".tab_three_option").hide();

    $(".tab_one_header a").click(function(e){
        e.preventDefault();
        $(".tab_one_option").slideToggle();
        $(".tab_two_option").hide();
        $(".tab_three_option").hide();
    });
    $(".tab_two_header a").click(function(e){
        e.preventDefault();
        $(".tab_two_option").slideToggle();
        $(".tab_one_option").hide();
        $(".tab_three_option").hide();
    });
    $(".tab_three_header a").click(function(e){
        e.preventDefault();
        $(".tab_three_option").slideToggle();
        $(".tab_one_option").hide();
        $(".tab_two_option").hide();
    });

    $(document).on('widget-updated widget-added', function(){

        $(".tab_one_option").show();
        $(".tab_two_option").hide();
        $(".tab_three_option").hide();

        $(".tab_one_header a").click(function(e){
            e.preventDefault();
            $(".tab_one_option").slideToggle();
            $(".tab_two_option").hide();
            $(".tab_three_option").hide();
        });
        $(".tab_two_header a").click(function(e){
            e.preventDefault();
            $(".tab_two_option").slideToggle();
            $(".tab_one_option").hide();
            $(".tab_three_option").hide();
        });
        $(".tab_three_header a").click(function(e){
            e.preventDefault();
            $(".tab_three_option").slideToggle();
            $(".tab_one_option").hide();
            $(".tab_two_option").hide();
        });

    });

});