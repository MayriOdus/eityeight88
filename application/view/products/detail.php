<?php

$img_prod = explode(",", str_replace(" ", "%20", $product["img_file"]));
$color_prod = explode(",", $product["color_prod"]);
$name = ($_SESSION["Lang"] == "en")? "name_eng" : "name_th";
$detail = ($_SESSION["Lang"] == "en")? "details" : "detail_th";

?>

<div class="row">

	<form id="basket-form" name="basket-form">

		<input type="hidden" name="hidid" id="hidid" value="<?=$product["id"];?>">
		<div class="  col-sm-6 col-md-6 text-center">
			
			<div id="carousel-example-generic" class="carousel slide" data-ride="carousel" data-interval="5000">	
				<!-- Wrapper for slides -->
				<div class="carousel-inner" role="listbox">            
					
					<?php
					$j = 0;
					foreach ($img_prod as $i => $img) 
					{	
						$j++;

						if($j == 1)
						{
							continue;
						}

						$act = ($i == 1)? "active" : "";
						?>
						<div class="item <?=$act;?>">
							<div align="center" class="img-slide-res">
								  <img class="img-responsive" src="<?=URL;?>images/upload/<?=$img;?>">
							</div>
						</div>
						<?php
					}
					?>

				</div> 
			</div> 

			<!-- Controls -->
			<a class="left carousel-control" style="color: #000;" href="#carousel-example-generic" role="button" data-slide="prev">
				<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
				<span class="sr-only">Previous</span>
			</a>
			<a class="right carousel-control" style="color: #000;" href="#carousel-example-generic" role="button" data-slide="next">
				<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
				<span class="sr-only">Next</span>
			</a>
			
		</div>

		<div class="visible-xs">
			<div class="clearfix"></div>
		</div>

		<div class="col-lg-6 col-md-6 col-sm-6">
			<div class="well product-short-detail">
				<div class="row">
					<div class="the-list">
						<h3 class="col-xs-12">
							<?=$product[$name];?>
						</h3>
					</div>
					<div class="the-list">
						<h3 class="col-xs-12">
							<!-- <span class="price-old">$169</span> -->
							<?php
							if( !empty($product["sale_cost"]) )
							{ 
								echo "<span  style='text-decoration:line-through; color:#CCC;'>".$product["costs"]."</span>";
								echo "&nbsp;<span  style='text-decoration:underline;'> Sale ".$product["sale_cost"].'</span>';	
							}
							else
							{ 
								echo "<span style='text-decoration:underline;'>".$product["costs"]."</span>";
							}
							?>
						</h3>
					</div>
					<div class="the-list">
						<div class="col-xs-4"><?=_AVAILABILITY;?></div>
						<div class="col-xs-8">
							<!-- <span class="red">OUT OF STOCK</span> -->

							<span class="green"><?=$product["stocks"];?> <?=_ITEMS_IN_STOCK;?></span>
						</div>
					</div>
					<?php
					if( empty($color_prod[0]) )
					{
						$dsp = "display:none;";
					}
					?>
					<div class="the-list" style="<?=$dsp;?>">
						<div class="col-xs-4">Color</div>
						<div class="col-xs-8">
							<select class="form-control" name="color_code" id="color_code">
								<option value=""> -- Select Color -- </option>
								<?php
								foreach ($color_prod as $color) 
								{
									echo '<option value="'.$color.'" style="background-color:'.$color.'">'.$color.'</option>';
								}
								?>
							</select>
						</div>
					</div>
					
					<div class="clearfix"></div>

					<div class="the-list">

						<div class="col-xs-12">
							<p><?=$product[$detail];?></p>
						</div>
						
						<div class="col-xs-12">

							<b><?=_WEIGHT;?> : <?=$product["weights"];?> / <?php echo !empty($product["stocks"]) && $product["stocks"] != 0? _IN_STOCK : _SOLD_OUT;?> </b>
						</div>
					</div>
					<br>
					<hr>
					<div class="col-xs-12 input-qty-detail">
						<div class="input-group bootstrap-touchspin spinner">
							<span class="input-group-btn data-dwn">
								<button class="btn btn-white bootstrap-touchspin-down" type="button">-</button>
							</span>
							<span class="input-group-addon bootstrap-touchspin-prefix" style="display: none;"></span>
							<input type="text" class="form-control input-qty text-center" name="input-qty" id="input-qty" value="1" sp-min="1" sp-max="<?=$product["stocks"];?>" readonly required>
							<span class="input-group-addon bootstrap-touchspin-postfix" style="display: none;"></span>
							<span class="input-group-btn data-up">
								<button class="btn btn-white bootstrap-touchspin-up" type="button">+</button>
							</span>
						</div>
						<button type="submit" class="btn btn-white pull-left"><i class="fa fa-shopping-cart"></i> <?=_ADD_TO_BAG;?></button>
					</div>
					<br><br>
					<hr>
					<br>
					<div class="col-xs-12 input-qty-detail">
						<div class="col-xs-4 col-md-offset-2" style="margin-top: 5px;"><?=_ENTER_SERIAL_NUMBER;?></div>
						<div class="input-group col-xs-6 col-md-4">
							<input type="text" class="form-control text-center" name="input-serial" id="input-serial">
							<span class="input-group-btn data-up">
								<button class="btn btn-white" id="btn-chk-serial" type="button"><?=_GO;?>!</button>
							</span>
						</div>
					</div>

					<div class="clearfix"></div><br>
					
				</div>
			</div>
		</div>

		<div class="clearfix"></div><br clear="all">

	</form>

</div>