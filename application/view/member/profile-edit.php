
<div class="row">

	<!-- left column -->

	<form class="form-horizontal" action="<?=URL;?>member/get_editprofile" method="POST" id="edit-form" name="edit-form" enctype="multipart/form-data">
		
		<input type="hidden" id="input-id" name="input-id" value="<?=$sid;?>" >
		<input type="hidden" id="hidimg" name="hidimg" value="<?=$logos;?>">

		<div class="col-md-4 col-sm-6 col-xs-12">
			<div class="text-center">
				<img src="<?=$logos;?>" class="avatar img-thumbnail" alt="avatar">
				<h6>Upload a different photo...</h6>
				<input type="file" name="input-mlogo[]" id="input-mlogo" class="text-center center-block well well-sm">
			</div>
		</div>

		<!-- edit column -->
		<div class="col-md-8 col-sm-6 col-xs-12 personal-info ">
			
			<h1 class="quark-font1">Personal info</h1>
			<div class="row sep-line"></div>
			<br>
			
			<div class="form-group">
				<label class="col-lg-3 control-label">Mobile Phone:</label>
				<div class="col-lg-8">
					<input class="form-control" value="<?=$user["tele"];?>" id="input-TelePhone" name="input-TelePhone" type="text">
				</div>
			</div>
			<div class="form-group">
				<label class="col-lg-3 control-label">Address:</label>
				<div class="col-lg-8">
					<textarea id="input-add" name="input-add" rows="4" class="form-control" autocomplete="off">
						<?=$user["address"];?>
					</textarea>
				</div>
			</div>

			<div class="form-group">
				<label class="col-md-3 control-label"></label>
				<div class="col-md-8">
					<input class="btn btn-black" value="Save Changes" type="submit">
					<span></span>
					<input class="btn btn-default" value="Cancel" type="reset">
				</div>
			</div>
		 
		</div>

	
	</form>

</div>