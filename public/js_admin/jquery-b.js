(function( $ ){
   $.fn.myfunction = function() {
	   var ww = $(window).width(); 
	    $(window).resize(function() {
			 
			if(ww<1024){
			//$('body').prepend("<div class='effectex'></div>");
			//$('.effectex').html('Pay for Moblie Verion At E-mail<br/>infinity8spy@gmail.com<br/> web delveloper');
			}
		});
		 if(ww<1024){
			//$('body').prepend("<div class='effectex'></div>");
			//$('.effectex').html('Pay for Moblie Verion At E-mail<br/>infinity8spy@gmail.com<br/> web delveloper');
			}
     // alert('hello world');
      return this;
   }; 
   //$('#my_div').myfunction();
})( jQuery );