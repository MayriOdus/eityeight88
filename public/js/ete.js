var fixedTop = false;
var navbar_initialized = false;

var ete = (function( $, dc, w ) {
	
	"use strict";

	var eityeight = function () 
	{
		this.version = '1.0';
		this.masterlogin = false;
		this.init();
	};

	eityeight.prototype = {
		
		init : function()
		{
			var self = this;

			$(function() {
			
				self.init_login();
				self.init_register();
				self.init_editprofile();
				
				$('.carousel').bcSwipe({ threshold: 50 });

				//Function to animate slider captions 
				function doAnimations(elems)
				{
					//Cache the animationend event in a variable
					var animEndEv = 'webkitAnimationEnd animationend';

					elems.each(function ()
					{
						var $this = $(this),
							$animationType = $this.data('animation');
						$this.addClass($animationType).one(animEndEv, function ()
						{
							$this.removeClass($animationType);
						});
					});
				}

				//Variables on page load 
				var $myCarousel = $('#carousel-top'),
					$firstAnimatingElems = $myCarousel.find('.item:first').find("[data-animation ^= 'animated']");

				//Initialize carousel 
				$myCarousel.carousel();

				//Animate captions in first slide on page load 
				doAnimations($firstAnimatingElems);

				//Pause carousel  
				//$myCarousel.carousel('pause');

				//Other slides to be animated on carousel slide event 
				$myCarousel.on('slide.bs.carousel', function (e)
				{
					var $animatingElems = $(e.relatedTarget).find("[data-animation ^= 'animated']");
					doAnimations($animatingElems);
				});

				var window_width = $(window).width();

				$("#menu-toggle").click(function (e) {
					e.preventDefault();

					$(".main-panel").toggleClass("toggled-m");
					$("#min-tital").toggle();
					$("#full-tital").toggle();
					$(window).resize();
				});

				// Init navigation toggle for small screens
				if (window_width <= 991)
				{
					lbd.initRightMenu();
				}
				
				$("#carousel-top").css("height", $(".embed-responsive-item").eq(0).height());

			});

			// activate collapse right menu when the windows is resized
			$(w).resize(function ()
			{
				if ($(w).width() <= 991)
				{
					lbd.initRightMenu();
					$(".main-panel").removeClass("toggled-m");
					$("#min-tital").hide();
					$("#full-tital").show();
				}

				//$("#carousel-top").css("height", $(".embed-responsive-item").eq(0).height());

			});
		},

		init_login : function()
		{
			var self = this;
			
			// set binding event
			if( $("#login-form").length )
			{
				$("#login-form").on("submit", function(e) {
					
					e.preventDefault();

					self.do_login();

				});
			}
		},

		init_register : function()
		{
			var self = this;
			
			// set binding event
			if( $("#regis-form").length )
			{
				$("#regis-form").on("submit", function(e) {
					
					e.preventDefault();

					self.do_regis();

				});
			}
		},

		init_editprofile : function()
		{
			var bar = $('.bar');
			var percent = $('.percent');
			var status = $('#status');

			$('#edit-form').ajaxForm({
				complete: function(xhr) {
					status.html(xhr.responseText);
					console.log('sss');
				}
			}); 
		},

		do_login : function()
		{
			$.post(_URL+"member/ajax_getlogin", $("#login-form").serialize(), function(msg) {
				
				if( msg.SUCCESS )
				{
					window.location = _URL + "member/profile";
				}
				else
				{
					alert("email or password is wrong");
				}

			}, 'json');
		},

		do_regis : function()
		{
			$.post(_URL+"member/ajax_getregis", $("#regis-form").serialize(), function(msg) {
				
				if( msg.SUCCESS )
				{
					window.location = _URL;
				}
				else
				{
					alert("cannot process registeration");
				}

			}, 'json');
		}

	};

	return new eityeight();

})( jQuery, document, window );


var lbd = {
    misc:
    {
        navbar_menu_visible: 0
    },

    initRightMenu: function ()
    {
        if (!navbar_initialized)
        {
            $off_canvas_sidebar = $('nav').find('.navbar-collapse').first().clone(true);

            $sidebar = $('.sidebar');
            sidebar_bg_color = $sidebar.data('background-color');
            sidebar_active_color = $sidebar.data('active-color');

            $logo = $sidebar.find('.logo').first();

            logo_content = $logo[0] ? $logo[0].outerHTML :
            {};

            ul_content = '';

            // set the bg color and active color from the default sidebar to the off canvas sidebar;
            $off_canvas_sidebar.attr('data-background-color', sidebar_bg_color);
            $off_canvas_sidebar.attr('data-active-color', sidebar_active_color);

            $off_canvas_sidebar.addClass('off-canvas-sidebar');

            //add the content from the regular header to the right menu
            $off_canvas_sidebar.find(".qtrans_social_chooser a").each(function ()
            {
                content_buff = "<div class='col-xs-3 col-sm-3' style='font-size: 20px;'>" + $(this)[0].outerHTML + "</div>";
                ul_content = ul_content + content_buff;
            });

			ul_content = "<div style='margin:15px 0 40px 0;'>" + ul_content + "</div>";

            $off_canvas_sidebar.find(".qtrans_language_chooser a").each(function ()
            {
                content_buff = "<div class='col-xs-2 col-sm-2' style='font-size: 20px;margin-top:10px;'>" + $(this)[0].outerHTML + "</div>";
                ul_content = ul_content + content_buff.replace(/(<span>).*(<\/span>)/i,"&nbsp;&nbsp;&nbsp;");
            });

            // add the content from the sidebar to the right menu
            content_buff = $sidebar.find('.nav').html();
            ul_content = ul_content + '<li class="divider"></li>' + content_buff;

            ul_content = '<ul class="nav navbar-nav">' + ul_content + '</ul>';

            navbar_content = logo_content + ul_content;
            navbar_content = '<div class="sidebar-wrapper">' + navbar_content + '</div>';

            $off_canvas_sidebar.html(navbar_content);

            $('body').append($off_canvas_sidebar);

            $toggle = $('.navbar-toggle');

            $off_canvas_sidebar.find('a').removeClass('btn btn-round btn-default');
            $off_canvas_sidebar.find('button').removeClass('btn-round btn-fill btn-info btn-primary btn-success btn-danger btn-warning btn-neutral');
            $off_canvas_sidebar.find('button').addClass('btn-simple btn-block');

            $toggle.click(function ()
            {
                if (lbd.misc.navbar_menu_visible == 1)
                {
                    $('html').removeClass('nav-open');
                    lbd.misc.navbar_menu_visible = 0;
                    $('#bodyClick').remove();
                    setTimeout(function ()
                    {
                        $toggle.removeClass('toggled');
                    }, 400);

                }
                else
                {
                    setTimeout(function ()
                    {
                        $toggle.addClass('toggled');
                    }, 430);

                    div = '<div id="bodyClick"></div>';
                    $(div).appendTo("body").click(function ()
                    {
                        $('html').removeClass('nav-open');
                        lbd.misc.navbar_menu_visible = 0;
                        $('#bodyClick').remove();
                        setTimeout(function ()
                        {
                            $toggle.removeClass('toggled');
                        }, 400);
                    });

                    $('html').addClass('nav-open');
                    lbd.misc.navbar_menu_visible = 1;

                }
            });
            navbar_initialized = true;
        }
    }
};

function debounce(func, wait, immediate)
{
    var timeout;
    return function ()
    {
        var context = this,
            args = arguments;
        clearTimeout(timeout);
        timeout = setTimeout(function ()
        {
            timeout = null;
            if (!immediate) func.apply(context, args);
        }, wait);

        if (immediate && !timeout) func.apply(context, args);
    };
};


var tag = document.createElement('script');

tag.src = "//www.youtube.com/iframe_api";
var firstScriptTag = document.getElementsByTagName('script')[0];
firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

var player1,player2,player3,done;

function onYouTubeIframeAPIReady() {

	var option = {
		playerVars: {
			autoplay: 1,
			loop: 1,
			controls: 0,
			showinfo: 0,
			autohide: 1,
			modestbranding: 1
		},
		events: {
			'onReady': onPlayerReady/*,
			'onStateChange': onPlayerStateChange*/
		}
	};

	player1 = new YT.Player('video1', option);
	player2 = new YT.Player('video2', option);
	player3 = new YT.Player('video3', option);
	
}

function onPlayerStateChange(e) 
{
	if (e.data == YT.PlayerState.PLAYING && !done) {
	  setTimeout(stopVideo, 6000);
	  done = true;
	}
}

function onPlayerReady(e) 
{
	e.target.playVideo();
	e.target.mute();
}

function stopVideo() 
{
	player1.stopVideo();
}