<div class="row item-product-margin">
    <div class="col-xs-12 col-md-6  col-md-offset-3">

		<form method="post" id="regis-form" name="regis-form">
            <p class="h3 text-center">Signup form</p>
            <hr>
            <div class="row  margin-b">
                <div class="col-xs-12  col-md-12">
					<div class="form-group">
						<label>Email Address</label><span id="userEmail-info" class="info"></span>
						<br>
						<input type="email" name="userEmail" id="userEmail" class="form-control" placeholder="Email Address" required>
					</div>
				</div>
            </div>

            <div class="row  margin-b">

                <div class="col-xs-6 col-md-6">
					<div class="form-group">
						<label>First Name</label>
						<br>
						<input type="text" name="userName" id="userName" value="" class="form-control" placeholder="First Name" required>
					</div>
				</div>

                <div class="col-xs-6 col-md-6">
					<div class="form-group">
						<label>Last Name</label>
						<br>
						<input type="text" name="lname" id="lname" value="" class="form-control" placeholder="Last Name" required>
					</div>
                </div>

            </div>

            <div class=" row margin-b">
                <div class="col-xs-12  col-md-12">
					<div class="form-group">
						<label>Telephone</label>
						<br>
						<input type="text" name="userTele" id="userTele" class="form-control" required>
					</div>
                </div>
            </div>

            <div class="row  margin-b">
                <div class="col-xs-12  col-md-12">
					<div class="form-group">
						<label for="password">Password</label>
						<input type="password" name="password" id="pass" class="form-control" pattern=".{4,}" required>
					</div>
				</div>
            </div>
			
			<div class="row margin-b">
				<div class="col-xs-12  col-md-12">
					<!-- <div class="alert"><input type="checkbox">&nbsp;<span id="agreetext"></span></div> -->
					<button type="submit" id="submitBtn" name="signup" class="btn btn-black sharp btn-block">Create Account</button>
					<div id="status"></div>
				</div>
			</div>
		</form>

    </div>

</div>