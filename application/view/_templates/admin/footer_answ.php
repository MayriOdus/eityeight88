
<!-- 
<footer>
	<p>
		<span style="text-align:left;float:left">&copy; 2015 <a href="http:www.skylineadventure.com" alt="Skyline Adventure">Skyline Adventure</a></span>
	</p>
</footer> -->


<!-- start: JavaScript-->
	<script src="<?=URL;?>js/jquery-1.9.1.min.js"></script>
	<script src="<?=URL;?>js/jquery-migrate-1.0.0.min.js"></script>
	<script src="<?=URL;?>js/jquery-ui-1.10.0.custom.min.js"></script>
	<script src="<?=URL;?>js/jquery.ui.touch-punch.js"></script>
	<script src="<?=URL;?>js/modernizr.js"></script>
	<script src="<?=URL;?>js/bootstrap.min.js"></script>
	<script src="<?=URL;?>js/jquery.cookie.js"></script>
	<script src='<?=URL;?>js/fullcalendar.min.js'></script>
	<script src='<?=URL;?>js/jquery.dataTables.min.js'></script>
	<script src='<?=URL;?>js/dataTables.bootstrap.min.js'></script>
	<script src='<?=URL;?>js/dataTables.responsive.min.js'></script>
	<script src="<?=URL;?>js/excanvas.js"></script>
	<script src="<?=URL;?>js/jquery.form.js"></script>
	<script src="<?=URL;?>js/jquery.flot.js"></script>
	<script src="<?=URL;?>js/jquery.flot.pie.js"></script>
	<script src="<?=URL;?>js/jquery.flot.stack.js"></script>
	<script src="<?=URL;?>js/jquery.flot.resize.min.js"></script>
	<script src="<?=URL;?>js/jquery.chosen.min.js"></script>
	<script src="<?=URL;?>js/jquery.uniform.min.js"></script>
	<script src="<?=URL;?>js/jquery.cleditor.min.js"></script>
	<script src="<?=URL;?>js/jquery.noty.js"></script>
	<script src="<?=URL;?>js/jquery.elfinder.min.js"></script>
	<script src="<?=URL;?>js/jquery.raty.min.js"></script>
	<script src="<?=URL;?>js/jquery.iphone.toggle.js"></script>
	<script src="<?=URL;?>js/jquery.uploadify-3.1.min.js"></script>
	<script src="<?=URL;?>js/jquery.gritter.min.js"></script>
	<script src="<?=URL;?>js/jquery.imagesloaded.js"></script>
	<script src="<?=URL;?>js/jquery.masonry.min.js"></script>
	<script src="<?=URL;?>js/jquery.knob.modified.js"></script>
	<script src="<?=URL;?>js/jquery.sparkline.min.js"></script>
	<script src="<?=URL;?>js/counter.js"></script>
	<script src="<?=URL;?>js/retina.js"></script>
	<script src="<?=URL;?>js/custom.js"></script>


	<script src="<?=URL;?>js/sur.custom.js"></script>
	<script src="<?=URL;?>js/sur.<?=$scripts;?>.js"></script>
<!-- end: JavaScript-->
	
	<script type="text/javascript">
	<!--

		if( $(".show-choice").length )
		{
			$("input[type=radio]").click(function() {

				var point, total_point = 0;
				$(".show-choice").find('input[type=radio]:checked').each(function() {
					point = this.value.split("@_@");
					total_point += parseInt(point[0]);
					console.log(total_point);

					$("span[name=bx_total_point]").html(total_point);
				});

			});
		}

	//-->
	</script>

</body>
</html>
