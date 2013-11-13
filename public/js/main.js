
$.each({

    page_init: function(){
        alert("test");
        $('.global-header .login button, .global-header .documentation button').button();
        //$('.global-header .login, .global-header .documentation').hover(function() { $(this).addClass("hover"); });

        $(document).on('mouseenter','.hoverable',function(){
            clearTimeout($(this).data('my-timeout'));
            $(this).addClass('hover');
            var that=this;
            setTimeout(function(){ $(that).find('input:text').eq(0).focus(); },100);
        }).on('mouseleave','.hoverable',function(){
            var that=this;
            $(that).data('my-timeout',setTimeout(function(){ $(that).removeClass('hover'); },500));
        });

        var a = $(document).height();
        var b = "hide";

        $('.baseline').css("height",a);
        $('.baseline a').click(function(){

            if (b == "show") {
                $(this).text("Show Grid").parent().removeClass("show").addClass("hide");
                b = "hide";
            } else {
                $(this).text("Hide Grid").parent().removeClass("hide").addClass("show");
                b = "show";
            }

        });
    }


},$.univ._import);
