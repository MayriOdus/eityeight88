
	
<div class="row">
	<div class="col-md-10 col-md-offset-1">
		<div id="carousel-top" class="carousel slide"  data-interval="15000">	
			<!-- Wrapper for slides -->
			<div class="carousel-inner" role="listbox">            

				<div class="item active">
					<div class="embed-responsive embed-responsive-16by9">
						<iframe class="embed-responsive-item" id="video1" src="//www.youtube.com/embed/V9G5vil03-s?playlist=V9G5vil03-s&enablejsapi=1&rel=0"></iframe>
					</div>
				</div> 

				<div class="item">
					<div class="embed-responsive embed-responsive-16by9">
						<iframe class="embed-responsive-item" id="video2" src="//www.youtube.com/embed/hcysusFTpdU?playlist=hcysusFTpdU&enablejsapi=1&rel=0"></iframe>
					</div>
				</div>

				<div class="item">
					<div class="embed-responsive embed-responsive-16by9">
						<iframe class="embed-responsive-item" id="video3" src="//www.youtube.com/embed/zHnTKKZu4sM?playlist=zHnTKKZu4sM&enablejsapi=1&rel=0"></iframe>
					</div>
				</div>
				<?php
				foreach ($banner as $bn) 
				{
					?>
					<div class="item">
						<div align="center" class="img-slide-res">
							  <img class="img-responsive" src="<?=URL;?>images/banner/<?=$bn["img"];?>">
						</div>
					</div>
					<?php
				}
				?>
			</div>
		</div>

		<!-- Controls -->
		<a class="left carousel-control" href="#carousel-top" role="button" data-slide="prev">
			<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
			<span class="sr-only">Previous</span>
		</a>
		<a class="right carousel-control" href="#carousel-top" role="button" data-slide="next">
			<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
			<span class="sr-only">Next</span>
		</a>

	</div>
</div>

<!-- <div class="row">
	<div class="col-md-8 panal-box2">
		<ol class="carousel-indicators">
			<li data-target="#carousel-top" data-slide-to="0"></li>
			<li data-target="#carousel-top" data-slide-to="1"></li>
		</ol>
	</div>
</div> -->


<div class="row">
	
	<div class="col-md-10 col-md-offset-1 nopadd">

		<div class="col-xs-6 col-sm-3 col-md-3 small-bx padd16">
			<a href="<?=$_URL;?>products"><img src="<?=URL;?>img/AW-88-Button-Wed-04.gif" class="img-list"></a>
		</div>
		<div class="col-xs-6 col-sm-3 col-md-3 small-bx padd16 ">
			<a href="<?=$_URL;?>products"><img src="<?=URL;?>img/AW-88-Button-Wed-01.gif" class="img-list"></a>
		</div>
		<div class="col-xs-6 col-sm-3 col-md-3 small-bx padd16">
			<a href="<?=$_URL;?>products"><img src="<?=URL;?>img/AW-88-Button-Wed-02.gif" class="img-list"></a>
		</div>
		<div class="col-xs-6 col-sm-3 col-md-3 small-bx padd16">
			<a href="<?=$_URL;?>products"><img src="<?=URL;?>img/AW-88-Button-Wed-03.gif" class="img-list"></a>
		</div>
		
	</div>

</div>

<br>

<div class="row sep-line"></div>	

<br>

<div class="row">
	<?php
	foreach ($products as $i => $prod) 
	{
		$name = ($_SESSION["Lang"] == "en")? "name_eng" : "name_th";
		$detail = ($_SESSION["Lang"] == "en")? "details" : "detail_th";
		$img = explode(",", str_replace(" ", "%20", $prod["img_file"]));

		?>
		<div class="col-sm-4 col-lg-4 col-md-4 prod-bx">
			<div class="thumbnail">
				<a href="<?=$_URL;?>products/product_detail/<?=$prod["code_product"];?>"><img src="<?=URL;?>images/upload/<?=$img[0];?>" alt=""></a>
				<div class="caption cap-prod text-center">
					<a href="<?=$_URL;?>products/product_detail/<?=$prod["code_product"];?>" class="text-elip"><?=$prod[$name];?></a>
					<div class="d-read-more">
					<a href="<?=$_URL;?>products/product_detail/<?=$prod["code_product"];?>">
						<button type="button" class="btn btn-black btn-sm text-uppercase btn-read-more" name="btn-add-prod" id="prod<?=$prod["id"];?>">
							<?=_READ_MORE;?>
						</button>
					</a>
					</div>
				</div>
				<!-- <div class="ratings">
					<p class="pull-right">15 reviews</p>
					<p>
						<span class="glyphicon glyphicon-star"></span>
						<span class="glyphicon glyphicon-star"></span>
						<span class="glyphicon glyphicon-star"></span>
						<span class="glyphicon glyphicon-star"></span>
						<span class="glyphicon glyphicon-star"></span>
					</p>
				</div> -->
			</div>
		</div>
		<?php
	}
	?>

	<!--<div class="col-sm-4 col-lg-4 col-md-4 mocking" id="mocking"></div>
	
	<div class="col-sm-4 col-lg-3 col-md-4">
		<div class="thumbnail">
			<img src="<?=URL;?>img/Gif-Dewy-2.gif" alt="">
			<div class="caption text-center">
				<h4><a href="<?=$_URL;?>products/product_detail">EITY EIGHT DEWY FACE GLOW</a></h4>
				<h4>฿650</h4>
				<p>Shine Bright Radiance Finish.</p>
				<p><button type="button" class="btn btn-black btn-sm">ADD TO CART</button></p>
			</div>
		</div>
	</div>

	<div class="col-sm-4 col-lg-3 col-md-4">
		<div class="thumbnail">
			<img src="<?=URL;?>img/Gif-Liquid-Foundation-and-Brush.gif" alt="">
			<div class="caption text-center">
				<h4><a href="<?=$_URL;?>products/product_detail">EITY EIGHT LIQUID FOUNDATION</a></h4>
				<h4>฿990</h4>
				<p>NO.21 , NO.23 </p>
				<p><button type="button" class="btn btn-black btn-sm">ADD TO CART</button></p>
			</div>
		</div>
	</div>

	<div class="col-sm-4 col-lg-3 col-md-4">
		<div class="thumbnail">
			<img src="<?=URL;?>img/Gif-Lips-Box.gif" alt="">
			<div class="caption text-center">
				<h4><a href="<?=$_URL;?>products/product_detail">VER.88</a></h4>
				<h4>฿990</h4>
				<p>HOLIDAY LIP PENCIL SET</p>
				<p><button type="button" class="btn btn-black btn-sm">ADD TO CART</button></p>
			</div>
		</div>
	</div>

	<div class="col-sm-4 col-lg-3 col-md-4">
		<div class="thumbnail">
			<img src="<?=URL;?>img/Gif-Mirror.gif" alt="">
			<div class="caption text-center">
				<h4><a href="<?=$_URL;?>products/product_detail">MINI MIRROR ORANGE NEON</a></h4>
				<h4> N/A </h4>
				<p>NOT FOR SALE</p>
				<p><button type="button" class="btn btn-black btn-sm" disabled>ADD TO CART</button></p>
			</div>
		</div>
	</div>-->


</div>





