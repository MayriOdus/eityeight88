<div class="row item-product-margin">
    <div class="col-xs-12 col-md-6  col-md-offset-3">

		<form method="post" id="regis-form" name="regis-form">
            <p class="h3 text-center"><?=_SIGNUP_FORM;?></p>
            <hr>
            <div class="row  margin-b">
                <div class="col-xs-12  col-md-12">
					<div class="form-group">
						<label><?=_EMAIL_ADDRESS;?></label><span id="userEmail-info" class="info"></span>
						<br>
						<input type="email" name="userEmail" id="userEmail" class="form-control" placeholder="<?=_EMAIL_ADDRESS;?>" required>
					</div>
				</div>
            </div>

            <div class="row  margin-b">

                <div class="col-xs-6 col-md-6">
					<div class="form-group">
						<label><?=_FIRST_NAME;?></label>
						<br>
						<input type="text" name="userName" id="userName" value="" class="form-control" placeholder="<?=_FIRST_NAME;?>" required>
					</div>
				</div>

                <div class="col-xs-6 col-md-6">
					<div class="form-group">
						<label><?=_LAST_NAME;?></label>
						<br>
						<input type="text" name="lname" id="lname" value="" class="form-control" placeholder="<?=_LAST_NAME;?>" required>
					</div>
                </div>

            </div>

            <div class=" row margin-b">
                <div class="col-xs-12  col-md-12">
					<div class="form-group">
						<label><?=_TELEPHONE;?></label>
						<br>
						<input type="text" name="userTele" id="userTele" class="form-control" required>
					</div>
                </div>
            </div>

            <div class="row  margin-b">
                <div class="col-xs-12  col-md-12">
					<div class="form-group">
						<label for="password"><?=_PASSWORD;?></label>
						<input type="password" name="password" id="pass" class="form-control" pattern=".{4,}" required>
					</div>
				</div>
            </div>
			
			<div class="row margin-b">
				<div class="col-xs-12  col-md-12">
					<!-- <div class="alert"><input type="checkbox">&nbsp;<span id="agreetext"></span></div> -->
					<button type="submit" id="submitBtn" name="signup" class="btn btn-black sharp btn-block"><?=_CREATE_ACCOUNT;?></button>
					<div id="status"></div>
				</div>
			</div>
		</form>

    </div>

</div>