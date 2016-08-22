<div id="wrapper">

	<?php
	require APP . 'view/_templates/admin/side_nav.php';
	?>

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
							<form id="form1" class="form-horizontal" method="post" enctype="multipart/form-data" role="form">


							<!--<div class="col-lg-4" style="left: 2%;z-index: 2;">
							
								<div class="row">
									
									<div class="text-center"><h4>Product</h4></div>

									<div class="text-center">
										<div class="form-group" style="padding:10px;">
											<input id="fileInput" name="fileInput[]" class="file" type="file" multiple data-preview-file-type="any" data-upload-url="#">
											<input type="hidden" name="txtfiles" id="txtfiles">
										</div>
									</div>

								</div>
							
							</div>-->

							<div class="col-lg-8">
								

								<div class="form-group">
									<label class="control-label col-sm-3" for="txtname_eng">Name(en) : </label>
									<div class="col-sm-9">
										<input type="text" class="form-control" id="txtname_eng" name="txtname_eng" placeholder="name" required>
									</div>
								</div>

								<div class="form-group">
									<label class="control-label col-sm-3" for="txtname_th">Name(th) : </label>
									<div class="col-sm-9">
										<input type="text" class="form-control" id="txtname_th" name="txtname_th" placeholder="ชื่อ">
									</div>
								</div>

								<div class="form-group">
									<label class="control-label col-sm-3" for="txtdetails">Detail(en) : </label>
									<div class="col-sm-9"> 
										<textarea class="form-control" id="txtdetails" name="txtdetails" rows="3" placeholder="Detail(en)"></textarea>
									</div>
								</div>

								<div class="form-group">
									<label class="control-label col-sm-3" for="txtdetail_th">Detail(th) : </label>
									<div class="col-sm-9"> 
										<textarea class="form-control" id="txtdetail_th" name="txtdetail_th" rows="3" placeholder="Detail(th)"></textarea>
									</div>
								</div>

								<div class="form-group">
									<label class="control-label col-sm-3" for="txtcosts">Price : </label>
									<div class="col-sm-9"> 
										<input type="text" class="form-control" id="txtcosts" name="txtcosts" placeholder="Price">
									</div>
								</div>

								<div class="form-group">
									<label class="control-label col-sm-3" for="txtweights">Weight : </label>
									<div class="col-sm-9"> 
										<input type="text" class="form-control" id="txtweights" name="txtweights" placeholder="Weight">
									</div>
								</div>

								<div class="form-group">
									<label class="control-label col-sm-3" for="txtstocks">QTY : </label>
									<div class="col-sm-9">
										<?php
										if( $mode == 'add' )
										{
											?>
											<input type="text" class="form-control" id="txtstocks" name="txtstocks" pattern="[0-9]+" placeholder="QTY" required>
											<?php
										}
										else
										{
											?>
											<div class="input-group">
												<input type="text" class="form-control" id="txtstocks" name="txtstocks" pattern="[0-9]+" placeholder="QTY" required>
												<span class="input-group-btn">
													<button class="btn btn-primary" id="btn-viewcode" type="button" c="<?=$product["id"];?>">View Code</button>
												</span>
												<?php
												if( $cont["cnt"] == 0 )
												{
												?>
												<span class="input-group-btn">
													<button class="btn btn-secondary" id="btn-gencode" type="button" c="<?=$product["id"];?>">Gen Code</button>
												</span>
												<?php
												}
												else
												{
												?>
												<span class="input-group-btn">
													<button class="btn btn-secondary" id="btn-cleargen" type="button" c="<?=$product["id"];?>">Clear Code</button>
												</span>
												<?php
												}
												?>
											</div>
											<?php
										}
										?>


									</div>
								</div>

								<div class="form-group"> 
									<div class="col-sm-offset-3 col-sm-9">
										<input type="submit" class="btn btn-primary" id="btn-save" value="Save">
										
									</div>
								</div>

							</div>
							
							</form>


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