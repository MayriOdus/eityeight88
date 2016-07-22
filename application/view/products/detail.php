<?php

$img_prod = explode(",", str_replace(" ", "%20", $product["img_file"]));
$lang = ($_SESSION["Lang"] == "en")? "_eng" : "_th";
$name = ($_SESSION["Lang"] == "en")? "name_eng" : "name_th";
$detail = ($_SESSION["Lang"] == "en")? "details" : "detail_th";
$color_prod = explode(",", $product["color_" . $name]);

$shortinfo = $product["shortinfo" . $lang];
$spfeatures = $product["spfeatures" . $lang];
$howtouse = $product["howtouse" . $lang];
$ingredients = $product["ingredients" . $lang];
?>


<div class="row">
    <div class="col-sm-6">
        <div id="carousel" class="carousel slide" data-ride="carousel" data-interval="15000">

        	<div class="top-nav-slider">
	        	<a class="" data-target="#carousel" href="#carousel" role="button" data-slide="prev">
		            <span class="glyphicon glyphicon-chevron-left"></span>
		        </a>
		        <a class="" data-target="#carousel" href="#carousel" role="button" data-slide="next">
		            <span class="glyphicon glyphicon-chevron-right"></span>
		        </a>
	        </div>

            <div class="carousel-inner product-image">
            	<?php
				foreach ($img_prod as $i => $img) 
				{	
					$act = '';
					if( $i == 0 )
					{
						$act = "active";
					}
				?>
	                <div class="item <?=$act;?>" data-thumb="0">
	                    <img src="<?=URL;?>images/upload/<?=$img;?>" class="img-responsive">
	                </div>
                <?php
				}
                ?>
            </div>
        </div> 
	    <div class="clearfix">
	        <div id="thumbcarousel" class="carousel slide" data-interval="false">
	            <div class="carousel-inner">
	                <div class="item active">
	                	<?php
						foreach ($img_prod as $i => $img) 
						{	
							$act = '';
							if( $i == 0 )
							{
								$act = "active";
							}
						?>
			                <div data-target="#carousel" data-slide-to="<?=$i;?>" class="thumb">
		                    	<img src="<?=URL;?>images/upload/<?=$img;?>" class="img-responsive">
		                    </div>
		                <?php
						}
		                ?>
	                </div>
	                <!-- <div class="item">
	                    <div data-target="#carousel" data-slide-to="4" class="thumb"><img src="http://placehold.it/100/7B1C8E/fff&amp;text=Product+Image+5"></div>
	                    <div data-target="#carousel" data-slide-to="5" class="thumb"><img src="http://placehold.it/100/9EF383/000&amp;text=Product+Image+6"></div>
	                    <div data-target="#carousel" data-slide-to="6" class="thumb"><img src="http://placehold.it/100/D64908/fff&amp;text=Product+Image+7"></div>
	                    <div data-target="#carousel" data-slide-to="7" class="thumb"><img src="http://placehold.it/100/E3A3A1/000&amp;text=Product+Image+8"></div>
	                </div><!-- /item -->
	            </div><!-- /carousel-inner -->
	            <a class="left carousel-control" href="#thumbcarousel" role="button" data-slide="prev">
	                <span class="glyphicon glyphicon-chevron-left"></span>
	            </a>
	            <a class="right carousel-control" href="#thumbcarousel" role="button" data-slide="next">
	                <span class="glyphicon glyphicon-chevron-right"></span>
	            </a>
	        </div> <!-- /thumbcarousel -->
	    </div><!-- /clearfix -->
	</div> <!-- /col-sm-6 -->

    <div class="col-sm-6 product-detail-box">
        <h2 class="p-bb"><?=$product[$name];?></h2>
        <h3><?=$shortinfo;?></h3>

        <div class="amount p-bb h2">฿&nbsp;
        	<?php
			if( !empty($product["sale_cost"]) )
			{ 
				echo "<span  style='text-decoration:line-through; color:#CCC;'>".$product["costs"]."</span>";
				echo "&nbsp;<span  style=''> Sale ".$product["sale_cost"].'</span>';	
			}
			else
			{ 
				echo "<span style=''>".$product["costs"]."</span>";
			}
			?>
        </div>

        <div class="p-detail">
      		<p><?=$product[$detail];?></p>
		</div>

		<?php
		$dsp = ( !empty($color_prod[0]) )? "" : "display:none;";
		?>
		<div class="col-xs-12 col-sm-8" style="<?=$dsp;?>">
			<div class="form-group">
				<div class="input-group" style="width: 100%;"">
					<select class="form-control" name="color_code" id="color_code">
						<option value=""> <?=_COLOR;?> <?=count($color_prod);?> <?=_SHADE_IS_AVAILABLE;?> </option>
						<?php
						foreach ($color_prod as $color) 
						{
							echo '<option value="'.$color.'" style="background-color:'.$color.'">'.$color.'</option>';
						}
						?>
					</select>
				</div>
			</div>
		</div>

		<div class="col-xs-12 col-sm-8 product-tag">
			Tags <?=$product["tag"];?>
		</div>


	</div> <!-- /col-sm-6 -->
</div> <!-- /row -->


<div class="col-md-12 product-tabs">
	<ul id="myTab" class="nav nav-tabs">
      <li class="active"><a href="#spfeatures" data-toggle="tab"><?=_SPECIAL_FEATURES;?></a></li>
      <li class=""><a href="#howto" data-toggle="tab"><?=_HOW_TO_USE;?></a></li>
      <li class=""><a href="#ingredients" data-toggle="tab"><?=_INGREDIENTS;?></a></li>
    </ul>

    <div id="myTabContent" class="tab-content">

      <div class="tab-pane fade active in" id="spfeatures">
		<?=$spfeatures;?>
      </div>

      <div class="tab-pane fade" id="howto">
		<?=$howtouse;?>
      </div>

      <div class="tab-pane fade" id="ingredients">
        <div class="row">
		<?=$ingredients;?>
		</div>
      </div>

    </div>

</div>






<?php 
/*
?>
<div class="row">

	<form id="basket-form" name="basket-form" class="sform">

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
					<div class="the-list prod_name">
						<h1 class="col-xs-12">
							<?=$product[$name];?>
						</h1>
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
					<br>
					<hr>
					<div class="col-xs-12 input-qty-detail">
						<div class="col-xs-4 col-md-offset-2"><?=_ENTER_SERIAL_NUMBER;?></div>
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

<?php
*/
?>