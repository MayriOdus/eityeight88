<div class="row item-product-margin">
    <div class="col-md-6 col-md-offset-3 col-lg-6 col-lg-offset-3 col-sm-6 col-sm-offset-3">
        <form method="post" id="login-form" name="login-form">
            <fieldset>
                <p class="quark-font2 h2">Welcome back! Sign in to access your account.</p>
                <p class="h3 quark-font1">Please Sign In</p>

                <!-- <hr class="colorgraph"> -->
                <hr>
                <div class="form-group">
                    <input type="email" name="member_username" id="email" class="form-control" placeholder="Email Address" required>
                </div>
                <div class="form-group">
                    <input type="password" name="member_password" id="password" class="form-control" placeholder="Password" required>
                </div>
                <hr>
                <div class="row">
                    <div class="col-xs-6 col-sm-6 col-md-6">
                        <input type="submit" class="btn btn-black btn-block sharp" id="btn-login" value="Login">
                    </div>
                    <div class="col-xs-6 col-sm-6 col-md-6">
                        <a href="<?=$_URL;?>member/register" class="btn btn-black btn-block sharp">Register</a>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                        <a href="<?=$_URL;?>member/forgot" class="btn btn-link">Forgot Password?</a>
                    </div>
                </div>
            </fieldset>
        </form>
    </div>


</div>