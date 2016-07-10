<div class="row">
	<div class="col-lg-3 col-sm-6">

		<div class="card hovercard">
			<div class="cardheader">

			</div>
			<div class="avatar">
				<img alt="" src="<?=$logos;?>">
			</div>
			<div class="info">
				<div class="title">
					<a target="_blank" href="#"><?=$user["name"] . " " . $user["lastname"];?></a>
				</div>
				<div class="desc"><?=$user["tele"];?></div>
				<div class="desc"><?=$user["email"];?></div>
				<div class="desc"><?=$user["address"];?></div>
			</div>
			<div class="bottom">
				<a class="btn btn-black btn-sm" href="<?=$_URL;?>member/profile_edit">
					<i class="fa fa-cog" aria-hidden="true"></i>
				</a>
			</div>
		</div>

	</div>

	<div class="col-lg-9 col-sm-6">
		<div class="table-responsive" style="margin: 10px 0 20px 0;">
			<table class="table table-bordered table-striped">
			  <thead>
				<tr>
				  <th class="text-center">#</th>
				  <th><?=_PAYMENT_ID;?></th>
				  <th><?=_PRICE;?></th>
				  <th><?=_DATE_PAY;?></th>
				</tr>
			  </thead>
			  <tbody>
				<?php
				if( !empty( $buyer ) )
				{
					foreach( $buyer as $b )
					{
						$idc = $b['id'];
						$id_pay = $b['id_pay'];			 
						$cost = $b['cost'];
						$time = $b['timep'];

						?>
						<tr>
						  <td class="col-xs-1 text-center"><a href="<?=$_URL;?>member/paymentbill/<?=$id_pay;?>" target="_blank"><span class='glyphicon glyphicon-search'></a></td>
						  <td class="col-xs-6 text-left"><?=$id_pay;?></td>
						  <td class="col-xs-2 text-left">฿ <?=number_format($cost, 2, '.', ',');?></td>
						  <td class="col-xs-3 text-left"><?=$time;?></td>
						</tr>
						<?php
					}
				}
				?>
			  </tbody>
			</table>
		</div>
	</div>

</div>