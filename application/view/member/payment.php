
<div class='container'>

	<div class="row">  
		<div class="col-xs-12 col-md-12 col-lg-12">
 
			<div class=" row " style="border-bottom:1px dotted #000; margin-top:20px;">
				<div class="col-sm-2 col-md-2"><div style="padding-top:25px;">
					<img src="<?=URL;?>img/logo1.jpg" class="img-responsive"/>
				</div>
			</div>
			<div class="col-sm-10 col-md-10">
				<h1 class=""><strong>88(THAILAND) CO.,LTD.</strong></h1>
				<h3><p class="">795 Folsom Ave, Suite 600 San Francisco, CA 94107<br/>Mon-Fri 10.00 am – 6.00 pm / Lunch Hours 12.00 pm – 1.00 pm<br/>Closed on Sat, Sun and Holidays&nbsp;(Thailand Standard Time)</p></h3>
			</div>
		</div>
		<br/>

		<p class='h2'><strong>Payment Bill</strong></p>

		<div class="table-responsive">
			<table class="table">
				<thead>
					<tr>
						<th class="h3 prod_name">Code Payment</th>
						<th class="h3 prod_name">Code Product</th>
						<th class="h3 prod_name">Color</th>
						<th class="h3 prod_name">QTY</th>
						<th class="h3 prod_name">Sale</th>
					</tr>
				</thead>
				<tbody>

				<?php

				$totalcost1 = array();
				$totalcost2 = array();

				foreach ($bill as $b) 
				{
					?>
					<tr>
						<td class='col-md-2'><?=$b["chk_pay"];?></td>
						<td class='col-md-2'><?=$b["code_product"];?></td>
						<td class='col-md-2'><div class='shade_cricle' style='background-color:<?=$b["color_code"];?>'>&nbsp;</div><?=$b["color_code"];?></td>
						<td class='col-md-2'><?=$b["qty"];?></td>
						<?php
						if( !empty($b["sale_cost"]) )
						{
							$pric = "<p style='text-decoration:line-through; color:#CCC;'>".number_format((int)$b["costs"])."</p><span>".number_format((int)$b["sale_cost"])."</span>";//bg-color1
							$ipr = $b["costs"] * $b["qty"];
							$ipr2 = $b["sale_cost"] * $b["qty"];
							$totalcost1[] = $ipr;
							$totalcost2[] = $ipr2;
						}
						else
						{
							$pric ="<p>".number_format((int)$b["costs"])."</p>";
							$ipr = $b["costs"] * $b["qty"];
							$totalcost1[] = $ipr;
							//	echo  $totalcost1[0];
						}		
						?>
						<td class='col-md-2'><?=$pric;?></td>
					</tr>
					<?php
				}
				?>

				</tbody>
				<tfoot>
					<tr style="background-color:#000000; color:#FFF;">
						<th colspan="4" align="cener"><p class="h4">&nbsp;Total</p></th>
						<th>
						<?php
							$tc = "";
							if( !empty($totalcost2) )
							{
								$val = array_sum($totalcost1); 
								$val2 = array_sum($totalcost2); 
								$tc ="<p style='text-decoration:line-through; color:#CCC;'>".number_format($val)."</p><span style='text-decoration:underline;'>".number_format($val2)."</span>";//bg-color1
								$hidval = $val2;
								
							}
							else
							{
								if(!empty($totalcost1))
								{
									$val = array_sum($totalcost1); 
									$tc ="<p style='text-decoration:underline;'>".number_format($val)."</p></span>";//bg-color1
									$hidval = $val;
								}
							}		
	 						echo  $tc;	
	 					?>
	 					</th>	 
					</tr>
				</tfoot>
			</table>
		</div>
	</div>

	<div class="col-md-12">
		<h3><a href="#" onclick="window.print();"><span class="glyphicon glyphicon-print"></span>&nbsp;Print</a></h3>
	</div>

</div> <!-- right -->

