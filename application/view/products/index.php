<div class="row">
	<?php
	foreach ($products as $i => $prod) 
	{
		$name = ($_SESSION["Lang"] == "en")? "name_eng" : "name_th";
		$detail = ($_SESSION["Lang"] == "en")? "details" : "detail_th";
		$img = explode(",", str_replace(" ", "%20", $prod["img_file"]));

		?>
		<div class="col-sm-4 col-lg-3 col-md-4">
			<div class="thumbnail">
				<a href="<?=$_URL;?>products/product_detail/<?=$prod["code_product"];?>"><img src="<?=URL;?>images/upload/<?=$img[0];?>" alt=""></a>
				<div class="caption cap-prod text-center">
					<a href="<?=$_URL;?>products/product_detail/<?=$prod["code_product"];?>" class="text-elip"><?=$prod[$name];?></a>
					<h2 class="prod-price"><?=$prod["costs"];?></h2>
					
					<p><button type="button" class="btn btn-black btn-sm text-uppercase" name="btn-add-prod" id="prod<?=$prod["id"];?>"><?=_ADD_TO_BAG;?></button></p>
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
	<!--
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