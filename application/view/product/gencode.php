<div id="wrapper">

	<!-- Page Content -->
	<div id="page-wrapper">
		<div class="container-fluid">
			<div class="row">
				<div class="col-lg-12">
					<h1 class="page-header"><?=$title;?></h1>
				</div>
				<!-- /.col-lg-12 -->
			</div>
			<!-- /.row -->

			<div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
							<div class="row">
								<div class="col-lg-6">Form</div>
							</div>

                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">

							
							<div class="col-lg-12">
								

								<div class="form-group" id="gname">
									<label class="control-label col-sm-3" for="txtname_eng">NAME : </label>
									<div class="col-sm-9">
										<input type="text" class="form-control" id="txtname_eng" name="txtname_eng" placeholder="name" value="<?=$product["name_eng"];?>">
									</div>
								</div>

								<div class="form-group" id="sbtn">
									<label class="control-label col-sm-3">Button Group : </label>
									<div class="col-sm-9" id="btn-group"></div>
								</div>

								
								<div class="form-group">
									<label class="control-label col-sm-3" for="txtserial">CODE : </label>
									<div class="col-sm-9" id="divSerial"> 
										<?php
										if( isset($serial) && count($serial) )
										{
											$mx = count($serial);

											if( $mx >= 10000 )
											{
												$limmit = ceil($mx / 10);
												
												$serial = array_chunk($serial, $limmit, true);
												
												foreach( $serial as $x => $ser )
												{
												?>
												<div class="row">
												<label class="control-label col-sm-3" for="txtserial"><?=(($x * $limmit) + 1);?> - <?=($x * $limmit) + $limmit;?> : </label>
												<table id="table2excel<?=$x;?>" class="table table-condensed">
													<tr><th width="10">#</th><th>Serial Number</th></tr>
												<?php
												
												foreach( $ser as $i => $s )
												{
													echo "<tr><td>".($i+1)."</td><td>" . $s["code_serial"] . "</td></tr>";
												}
											
												?>
												</table>

												<div class="col-sm-offset-3 col-sm-9">
													<input type="submit" class="btn btn-primary" name="btn-print" for="table2excel<?=$x;?>" n="<?=(($x * $limmit) + 1);?> - <?=($x * $limmit) + $limmit;?>" value="Print">
													<input type="submit" class="btn btn-primary" name="btn-excel" for="table2excel<?=$x;?>" n="<?=(($x * $limmit) + 1);?> - <?=($x * $limmit) + $limmit;?>" value="PDF">
												</div>

												</div>
												<?php
												}
											}
											else
											{
												?>
												<div class="row">
												<table id="table2excel" class="table table-condensed">
													<tr><th width="10">#</th><th>Serial Number</th></tr>
													<?php
													
													foreach( $serial as $i => $s )
													{
														echo "<tr><td>".($i+1)."</td><td>" . $s["code_serial"] . "</td></tr>";
													}
												
													?>
												</table>

												<div class="col-sm-offset-3 col-sm-9">
													<input type="submit" class="btn btn-primary" name="btn-print" for="table2excel" n="" value="Print">
													<input type="submit" class="btn btn-primary" name="btn-excel" for="table2excel" n="" value="PDF">
												</div>

												</div>
												<?php
											}
										}
										else
										{
											$max = $product["stocks"];
											$i = 1;
											$x = 0;
											$c = 1;
											$chuck = ceil($max / 10);
											$vsql = '';
											
											if( $max >= 10000 )
											{
												?>
												<div class="row">
												<label class="control-label col-sm-3" for="txtserial"><?=(($x * $chuck) + 1);?> - <?=($x * $chuck) + $chuck;?> : </label>
												<table id="table2excel<?=$x;?>" class="table table-condensed">
													<tr><th width="10">#</th><th>Serial Number</th></tr>
												<?php
												$x++;
												while( $i <= $max )
												{
													$code = md5($i.$product["id"]);
													echo "<tr><td>".$i."</td><td>" . substr($code, 0, 13) . "</td></tr>";


													if( ($i % $chuck) == 0 || $i == $max )
													{
														?>
														</table>

														<div class="col-sm-offset-3 col-sm-9">
															<input type="submit" class="btn btn-primary" name="btn-print" for="table2excel<?=($c-1);?>" n="<?=((($c-1) * $chuck) + 1);?> - <?=(($c-1) * $chuck) + $chuck;?>" value="Print">
															<input type="submit" class="btn btn-primary" name="btn-excel" for="table2excel<?=($c-1);?>" n="<?=((($c-1) * $chuck) + 1);?> - <?=(($c-1) * $chuck) + $chuck;?>" value="Excel">
														</div>

														</div>
														

														<?php
														if( $i != $max )
														{
															?>
														<div class="row">
														<label class="control-label col-sm-3" for="txtserial"><?=(($c * $chuck) + 1);?> - <?=($c * $chuck) + $chuck;?> : </label>
														<table id="table2excel<?=$c;?>" class="table table-condensed">
															<tr><th width="10">#</th><th>Serial Number</th></tr>
															<?php
															$c++;
														}
													}
													
													$i++;
													$x++;
												}
											}
											else
											{
												?>
												<div class="row">
												<table id="table2excel" class="table table-condensed">
													<tr><th width="10">#</th><th>Serial Number</th></tr>
													<?php
													while( $i <= $max )
													{
														$code = md5($i.$product["id"]);
														echo "<tr><td>".$i."</td><td>" . substr($code, 0, 13) . "</td></tr>";
														$i++;
													}
													?>
												</table>

												<div class="col-sm-offset-3 col-sm-9">
													<input type="submit" class="btn btn-primary" name="btn-print" for="table2excel" n="" value="Print">
													<input type="submit" class="btn btn-primary" name="btn-excel" for="table2excel" n="" value="PDF">
												</div>

												</div>
												<?php
											}
										}
										?>
									</div>
								</div>

								</div>

								<!-- <div class="form-group"> 
									<div class="col-sm-offset-3 col-sm-9">
										<input type="submit" class="btn btn-primary" id="btn-print" value="Print">
										<input type="submit" class="btn btn-primary" id="btn-excel" value="Excel">
									</div>
								</div> -->

							</div>
							


                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>

		</div>
		<!-- /.container-fluid -->
	</div>
	<!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->

<div class="modal fade bs-example-modal-sm" id="pleaseWaitDialog" data-backdrop="static"  role="dialog" aria-labelledby="mySmallModalLabel">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
		<div class="modal-header">
			<h4>Processing...</h4>
		</div>
		<div class="modal-body">
			<div class="progress progress-striped active">
				<div class="progress-bar" id="progress-bar" style="min-width: 0em; width: 0%;" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">
					0%
				</div>
			</div>
		</div>
    </div>
  </div>
</div>

<iframe id="txtArea1" style="display:none"></iframe>

<div class="clearfix"></div>

<script type="text/javascript">
<!--
	var 
		URL = "<?=URL;?>",
		mode = "<?=$mode;?>",
		c = "<?=$p;?>",
		pdata = <?=json_encode($product);?>;

//-->
</script>