$.each({page_init:function(){alert("test");$(".global-header .login button, .global-header .documentation button").button();$(document).on("mouseenter",".hoverable",function(){clearTimeout($(this).data("my-timeout"));$(this).addClass("hover");var e=this;setTimeout(function(){$(e).find("input:text").eq(0).focus()},100)}).on("mouseleave",".hoverable",function(){var e=this;$(e).data("my-timeout",setTimeout(function(){$(e).removeClass("hover")},500))});var e=$(document).height(),t="hide";$(".baseline").css("height",e);$(".baseline a").click(function(){if(t=="show"){$(this).text("Show Grid").parent().removeClass("show").addClass("hide");t="hide"}else{$(this).text("Hide Grid").parent().removeClass("hide").addClass("show");t="show"}})}},$.univ._import);