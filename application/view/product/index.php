<div id="wrapper">

	<?php
	require APP . 'view/_templates/admin/side_nav.php';
	?>

	<!-- Page Content -->
	<div id="page-wrapper">
		<div class="container-fluid">
			<div class="row">
				<div class="col-lg-12">
					<h1 class="page-header">Product</h1>
				</div>
				<!-- /.col-lg-12 -->
			</div>
			<!-- /.row -->

			<div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
							<div class="row">
                            <div class="col-lg-6">List</div>
							<!-- <div class="col-lg-6 text-right"><a href="product/add">New Product <i class="fa fa-plus"></i></a></div> -->
							</div>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="dataTable_wrapper">
                                <table class="table table-striped table-bordered dt-responsive" id="sdataTables" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th>Date</th>
                                            <th>Code Product</th>
                                            <th>Name Eng</th>
                                            <th>ชื่อ</th>
                                            <!-- <th>Price</th> -->
                                            <th>#</th>
                                        </tr>
                                    </thead>
                                    <tbody>
									<?php
										//print_r($product);exit;

										foreach( $product as $prod )
										{
									?>
                                        <tr class="odd gradeA">
                                            <td><?=$prod["timep"];?></td>
                                            <td><?=$prod["code_product"];?></td>
                                            <td><?=$prod["name_eng"];?></td>
                                            <td><?=$prod["name_th"];?></td>
                                            <!-- <td><?=$prod["costs"];?></td> -->
                                            <td class="center">
												<button type="button" class="btn btn-primary btn-xs" name="view-rec" c="<?=$prod["code_product"];?>">edit</button>
												<!-- <button type="button" class="btn btn-danger btn-xs" name="del-rec" c="<?=$prod["id"];?>">remove</button> -->
											</td>
                                        </tr>
									<?php
										}
									?>
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->

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


<div class="clearfix"></div>

<script type="text/javascript">
<!--
	var 
		URL = "<?=URL;?>",
		mode = "<?=$mode;?>";
//-->
</script>