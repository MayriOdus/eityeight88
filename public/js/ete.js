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
				self.init_proddetail();
				self.init_payment();
				self.init_contact();
				
				$('.carousel').bcSwipe({ threshold: 50 });


				if( $("button[name=btn-add-prod]").length )
				{
					$("button[name=btn-add-prod]").click(function() {
						
						//self.add_basket_sp(this.id);
					});
				}
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
				
				$("#carousel-top").css("height", $(".embed-responsive-item").eq(0).height() + 12);
				$("#mocking").height( $(".prod-bx").eq(0).height() );
				//$('#carousel-top').css("height", "439px");



				




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


				$("#mocking").height( $(".prod-bx").eq(0).height() );
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
			$('#edit-form').ajaxForm({
				beforeSend: function() {
					waitingDialog.show('Processing...', {dialogSize: 'sm', progressType: 'warning'});
				},	
				success: function() {
					waitingDialog.hide();
				},
				complete: function(xhr) {
					
					var res = $.parseJSON(xhr.responseText);

					if( res.SUCCESS )
					{
						window.location = '';
					}
					else
					{
						alert("cannot update");
					}
				}
			}); 
		},

		init_proddetail : function()
		{
			var self = this;
			
			// set binding event
			if( $("#basket-form").length )
			{
				$("#basket-form").on("submit", function(e) {
					
					e.preventDefault();

					//self.add_basket();

				});
			}

			if( $("#btn-chk-serial").length )
			{
				$("#btn-chk-serial").click(function(){

					self.chk_serial( $("#input-serial").val(), $("#hidid").val() );

				});
				
			}

			if( $("#btn-chkall-serial").length )
			{
				$("#btn-chkall-serial").click(function(){

					self.chk_serial_all( $("#input-serial").val() );

				});
				
			}

			if( $('.spinner .data-up').length && $('.spinner .data-dwn').length )
			{
				$('.spinner .data-up').unbind().click(function() {

					var 
						$spin = $(this).parents('.spinner').find('input[type=text]'),
						smin = $spin.attr('sp-min'),
						smax = $spin.attr('sp-max'),
						sval = parseInt($spin.val(), 10);
				
					if( ! $spin.prop("disabled") )
					{
						smax > sval ? $spin.val( sval + 1) : sval;
						$spin.change();
					}
				});

				$('.spinner .data-dwn').unbind().click(function() {

					var 
						$spin = $(this).parents('.spinner').find('input[type=text]'),
						smin = $spin.attr('sp-min'),
						smax = $spin.attr('sp-max'),
						sval = parseInt($spin.val(), 10);
					
					if( ! $spin.prop("disabled") )
					{
						smin < sval ? $spin.val( sval - 1) : sval;
						$spin.change();
					}
				});

				var action;
				$('.spinner .data-up').mousedown(function () {

					var self = this; 

					action = setInterval(function(){
						var 
							$spin = $(self).parents('.spinner').find('input[type=text]'),
							smax = $spin.attr('sp-max'),
							sval = parseInt($spin.val(), 10);
						
						if( ! $spin.prop("disabled") )
						{
							smax > sval ? $spin.val( sval + 1) : sval;
							$spin.change();
						}
					}, 250);

				}).mouseup(function(){
					clearInterval(action);
				});

				$('.spinner .data-dwn').mousedown(function () {

					var self = this;

					action = setInterval(function(){
						var 
							$spin = $(self).parents('.spinner').find('input[type=text]'),
							smin = $spin.attr('sp-min'),
							sval = parseInt($spin.val(), 10);
						
						if( ! $spin.prop("disabled") )
						{
							smin < sval ? $spin.val( sval - 1) : sval;
							$spin.change();
						}
					}, 250);
				}).mouseup(function(){
					clearInterval(action);
				});	
			}
		},

		init_payment : function()
		{
			var self = this;

			if( $("button[name=btn-delete-item]").length )
			{
				$("button[name=btn-delete-item]").click(function(){

					self.del_basket(this);

				});
			}

			if( $('#payment-form').length )
			{
				$('#payment-form').ajaxForm({
					beforeSend: function() {
						waitingDialog.show('Processing...', {dialogSize: 'sm', progressType: 'warning'});
					},	
					success: function() {
						//waitingDialog.hide();
					},
					complete: function(xhr) {
						
						var res = $.parseJSON(xhr.responseText);

						if( res.SUCCESS )
						{
							waitingDialog.show('Thank you For Payment', {dialogSize: 'sm', progressType: 'success'});
							setTimeout(function(){

								window.location = _URL + "member/profile";

							}, 2000);
						}
						else
						{
							alert("cannot add payment");
						}
					}
				}); 
			}
		},

		init_contact : function()
		{
			var self = this;

			if( $("#contact-form").length )
			{
				$("#contact-form").on("submit", function(e) {
					
					e.preventDefault();

					self.add_custo_message();

				});
			}
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
		},

		add_basket : function()
		{
			$.post(_URL+"products/ajax_addbasket", $("#basket-form").serialize(), function(msg) {
				
				if( msg.SUCCESS )
				{
					window.location = _URL + "shipping/payment";
				}
				else
				{
					alert("cannot process basket");
				}

			}, 'json');
		},

		add_basket_sp : function(id)
		{
			$.post(_URL+"products/ajax_addbasket", { "hidid" : id.replace("prod", ""), "input-qty" : 1, "color_code" : ''}, function(msg) {
				
				if( msg.SUCCESS )
				{
					window.location = _URL + "shipping/payment";
				}
				else
				{
					alert("cannot process basket");
				}

			}, 'json');	
		},

		add_custo_message : function()
		{
			$.post(_URL+"contact/ajax_addmessage", $("#contact-form").serialize(), function(msg) {
				
				if( msg.SUCCESS )
				{
					$("#contact-form")[0].reset();
					waitingDialog.show('Thank you For Message', {dialogSize: 'sm', progressType: 'success'});
					setTimeout(function(){

						window.location = "";

					}, 2000);
				}
				else
				{
					alert("cannot process contact");
				}

			}, 'json');	
		},

		chk_serial : function(data, id)
		{
			$.post(_URL+"products/ajax_chkserial", { pdata : data, pid : id }, function(msg) {
				
				if( msg.FAKE )
				{
					alert("Fake !!")
				}
				else
				{
					alert("Real !!")
				}

			}, 'json');
		},

		chk_serial_all : function(data)
		{
			$.post(_URL+"products/ajax_chkserial_all", { pdata : data }, function(msg) {
				
				if( msg.FAKE )
				{
					$('#isfake').modal('show');
				}
				else if( msg.DUP )
				{
					$('#isdup').modal('show');
				}
				else if( !msg.FAKE )
				{
					$('#isreal').modal('show');
					//alert( "This is " + msg.PRODNAME )
				}
				

			}, 'json');
		},

		del_basket : function(obj)
		{
			$.post(_URL+"shipping/ajax_delbasket/"+obj.id, {}, function(msg) {
				
				if( msg.SUCCESS )
				{
					$(obj).parents("tr").hide('fast', function(){ $(this).remove(); });
				}
				else
				{
					alert("cannot process delete");
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

			ul_content = "<div class='row'>" + ul_content + "</div>";

			content_buff = '';
            $off_canvas_sidebar.find(".qtrans_language_chooser a").each(function ()
            {
                content_buff += ("<div class='col-xs-2 col-sm-2 res-language' style='font-size: 20px;margin-top:10px;'>" + $(this)[0].outerHTML + "</div>").replace(/(<span>).*(<\/span>)/i,"&nbsp;&nbsp;&nbsp;");
                //ul_content = ul_content + content_buff.replace(/(<span>).*(<\/span>)/i,"&nbsp;&nbsp;&nbsp;");
            });

            ul_content += "<div class='row'>" + content_buff + "</div>";

            // add the content from the sidebar to the right menu
            content_buff = $sidebar.find('.nav').html();
            ul_content = ul_content  + content_buff;

            ul_content = '<ul class="nav navbar-nav">' + ul_content + '</ul>';

            navbar_content = '<div class="col-xs-12" style="text-align: center;margin-bottom: 15px;margin-top: 10px;">' + logo_content + '</div>' + ul_content;
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
			modestbranding: 1,
			rel: 0
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

/**
 * Module for displaying "Waiting for..." dialog using Bootstrap
 *
 * @author Eugene Maslovich <ehpc@em42.ru>
 */

var waitingDialog = waitingDialog || (function ($) {
    'use strict';

	// Creating modal dialog's DOM
	var $dialog = $(
		'<div class="modal fade" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-hidden="true" style="padding-top:15%; overflow-y:visible;">' +
		'<div class="modal-dialog modal-m">' +
		'<div class="modal-content">' +
			'<div class="modal-header"><h3 style="margin:0;"></h3></div>' +
			'<div class="modal-body">' +
				'<div class="progress progress-striped active" style="margin-bottom:0;"><div class="progress-bar" style="width: 100%"></div></div>' +
			'</div>' +
		'</div></div></div>');

	return {
		/**
		 * Opens our dialog
		 * @param message Custom message
		 * @param options Custom options:
		 * 				  options.dialogSize - bootstrap postfix for dialog size, e.g. "sm", "m";
		 * 				  options.progressType - bootstrap postfix for progress bar type, e.g. "success", "warning".
		 */
		show: function (message, options) {
			// Assigning defaults
			if (typeof options === 'undefined') {
				options = {};
			}
			if (typeof message === 'undefined') {
				message = 'Loading';
			}
			var settings = $.extend({
				dialogSize: 'm',
				progressType: '',
				onHide: null // This callback runs after the dialog was hidden
			}, options);

			// Configuring dialog
			$dialog.find('.modal-dialog').attr('class', 'modal-dialog').addClass('modal-' + settings.dialogSize);
			$dialog.find('.progress-bar').attr('class', 'progress-bar');
			if (settings.progressType) {
				$dialog.find('.progress-bar').addClass('progress-bar-' + settings.progressType);
			}
			$dialog.find('h3').text(message);
			// Adding callbacks
			if (typeof settings.onHide === 'function') {
				$dialog.off('hidden.bs.modal').on('hidden.bs.modal', function (e) {
					settings.onHide.call($dialog);
				});
			}
			// Opening dialog
			$dialog.modal();
		},
		/**
		 * Closes dialog
		 */
		hide: function () {
			$dialog.modal('hide');
		}
	};

})(jQuery);
