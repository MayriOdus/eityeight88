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
				<div class="caption text-center">
					<h4><a href="<?=$_URL;?>products/product_detail/<?=$prod["code_product"];?>" class="text-elip"><?=$prod[$name];?></a></h4>
					<h4><?=$prod["costs"];?></h4>
					<p class="text-elip"><?=$prod[$detail];?></p>
					<p><button type="button" class="btn btn-black btn-sm" name="btn-add-prod" id="prod<?=$prod["id"];?>"><?=_ADD_TO_BAG;?></button></p>
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


</div>