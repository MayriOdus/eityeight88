<?php

$img_prod = explode(",", str_replace(" ", "%20", $product["img_file"]));
$color_prod = explode(",", $product["color_prod"]);
$name = ($_SESSION["Lang"] == "en")? "name_eng" : "name_th";
$detail = ($_SESSION["Lang"] == "en")? "details" : "detail_th";

?>


<div class="row">
    <div class="col-sm-6">
        <div id="carousel" class="carousel slide" data-ride="carousel">

        	<div class="top-nav-slider">
	        	<a class="" data-target="#carousel" href="#carousel" role="button" data-slide="prev">
		            <span class="glyphicon glyphicon-chevron-left"></span>
		        </a>
		        <a class="" data-target="#carousel" href="#carousel" role="button" data-slide="next">
		            <span class="glyphicon glyphicon-chevron-right"></span>
		        </a>
	        </div>

            <div class="carousel-inner product-image">
                <div class="item active" data-thumb="0">
                    <img src="<?=URL;?>images/upload/<?=$img_prod[0];?>">
                </div>
                <div class="item" data-thumb="0">
                    <img src="http://placehold.it/350x250/00ffff/000&amp;text=Product+Image+2">
                </div>
                <div class="item" data-thumb="0">
                    <img src="http://placehold.it/350x250/ff00ff/fff&amp;text=Product+Image+3">
                </div>
                <div class="item" data-thumb="0">
                    <img src="http://placehold.it/350x250/ffff00/000&amp;text=Product+Image+4">
                </div>
                <div class="item" data-thumb="1">
                    <img src="http://placehold.it/350x250/7B1C8E/fff&amp;text=Product+Image+5">
                </div>
                <div class="item" data-thumb="1">
                    <img src="http://placehold.it/350x250/9EF383/000&amp;text=Product+Image+6">
                </div>
                <div class="item" data-thumb="1">
                    <img src="http://placehold.it/350x250/D64908/fff&amp;text=Product+Image+7">
                </div>
                <div class="item" data-thumb="1">
                    <img src="http://placehold.it/350x250/E3A3A1/000&amp;text=Product+Image+8">
                </div>
            </div>
        </div> 
	    <div class="clearfix">
	        <div id="thumbcarousel" class="carousel slide" data-interval="false">
	            <div class="carousel-inner">
	                <div class="item active">
	                    <div data-target="#carousel" data-slide-to="0" class="thumb"><img src="http://placehold.it/100/e8117f/fff&amp;text=Product+Main"></div>
	                    <div data-target="#carousel" data-slide-to="1" class="thumb"><img src="http://placehold.it/100/00ffff/000&amp;text=Product+Image+2"></div>
	                    <div data-target="#carousel" data-slide-to="2" class="thumb"><img src="http://placehold.it/100/ff00ff/fff&amp;text=Product+Image+3"></div>
	                    <div data-target="#carousel" data-slide-to="3" class="thumb"><img src="http://placehold.it/100/ffff00/000&amp;text=Product+Image+4"></div>
	                </div><!-- /item -->
	                <div class="item">
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
        <h1 class="p-bb"><?=$product[$name];?></h1>

        <div class="amount p-bb h1">฿&nbsp;270</div>

        <div class="p-detail">Some product subhead
      		<p>Product description goes here.  Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim.</p>
	        <p>Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus.</p>
		</div>
	</div> <!-- /col-sm-6 -->
</div> <!-- /row -->


<div class="col-md-12 product-tabs">
	<ul id="myTab" class="nav nav-tabs">
      <li class=""><a href="#info" data-toggle="tab">More Info</a></li>
      <li class=""><a href="#review" data-toggle="tab">Review</a></li>
      <li class="active"><a href="#related" data-toggle="tab">Related Items</a></li>
    </ul>
    <div id="myTabContent" class="tab-content">
      <div class="tab-pane fade" id="info">
		<p>Howdy, I'm in Section 1. Etiam luctus, tellus sed varius facilisis, turpis nisl mollis metus, adipiscing scelerisque felis dui ac lacus.
		Etiam luctus, tellus sed varius facilisis, turpis nisl mollis metus, adipiscing scelerisque felis dui ac lacus.</p>
      </div>
      <div class="tab-pane fade" id="review">
		<p>Howdy, I'm in Section 2. Etiam luctus, tellus sed varius facilisis, turpis nisl mollis metus, adipiscing scelerisque felis dui ac lacus.
		Etiam luctus, tellus sed varius facilisis, turpis nisl mollis metus, adipiscing scelerisque felis dui ac lacus.</p>
      </div>
      <div class="tab-pane fade active in" id="related">
        <div class="row">
			<ul class="thumbnails list-unstyled">
			  <li class="col-md-4 col-sm-4">
				<div class="thumbnail">
				  <a href="detail.html"><img src="img/manuk.jpg" class="img-responsive" alt="detail dodolan manuk"></a>
				  <div class="caption-details">
					<h5>Border Canary</h5>
					<span class="price">$200</span>
				  </div>
				</div>
			  </li>
			  <li class="col-md-4 col-sm-4">
				<div class="thumbnail">
				  <a href="detail.html"><img src="img/manuk.jpg" class="img-responsive" alt="detail dodolan manuk"></a>
				  <div class="caption-details">
					<h5>Border Canary</h5>
					<span class="price">$200</span>
				  </div>
				</div>
			  </li>
			  <li class="col-md-4 col-sm-4">
				<div class="thumbnail">
				  <a href="detail.html"><img src="img/manuk.jpg" class="img-responsive" alt="detail dodolan manuk"></a>
				  <div class="caption-details">
					<h5>Border Canary</h5>
					<span class="price">$200</span>
				  </div>
				</div>
			  </li>
			</ul>
		</div>
      </div>
    </div>

</div>







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