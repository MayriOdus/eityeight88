

<div class="row">
	<div class="col-xs-12 col-sm-6 contact">
		<div class="hd">CONTACT US</div>

		<div class="row">
            <div class=" col-sm-12 col-md-12">
                <h2 class=""><strong>88(THAILAND) CO.,LTD.</strong></h2>
            </div>
        </div>

        <div class="row">
            <div class=" col-sm-5 col-md-5 ">
                <p><i class="fa fa-phone"></i>CALL CENTER 085-5516196</p>
            </div>
            <div class="col-sm-6 col-md-6">
                <p><i class="fa fa-envelope"></i>&nbsp;EMAIL VER88OFFICIAL@GMAIL.COM</p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 ">
                <p>Mon-Fri 10.00 am - 6.00 pm / Lunch Hours 12.00 pm - 1.00 pm
                 <br>Closed on Sat, Sun and Holidays(Thailand Standard Time)</p>
            </div>
        </div>

        <div class="row ">
            <div class=" col-sm-12 col-md-12 ">
                <p>OFFICIAL LINE ACCOUNT</p>
                <div>LINE ID: <a href="http://line.me/ti/p/@eityeight88"><span class="helvethaica_xcond_med">eityeight88</span></a></div>
            </div>
        </div>
        <div class="row ">
            <div class=" col-sm-6 col-md-6 ">
                <input type="image" src="<?=URL;?>img/line-code.jpg" class="img-responsive" style="width: 66%;">
            </div>
        </div>
	</div>

	<div class="col-xs-12 col-sm-6">
		<div>
			<form id="contact-form" name="contact-form" class="contact-form">
				<div class="row">
					<div class="col-md-12" style="fonts-size:24px;">
						<div class="form-group ">
							<label for="name"><?=_NAME;?></label>
							<input type="text" class="form-control" id="userName" name="userName" required><!--required="required" -->
						</div>
						<div class="form-group">
							<label for="email"><?=_EMAIL_ADDRESS;?></label>
							<div class="input-group">
							<span class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span>  
								</span>
								<input type="email" name="email" class="form-control" id="email" required></div>
						</div>
						<div class="form-group">
							<label for="subject"><?=_SUBJECT;?></label>
							<input id="subject" name="subject" type="text" class="form-control" value="" required>
							
						</div>
						<div class="form-group">
							<label for="name"><?=_MESSAGE;?></label>
							<textarea name="message" id="message" class="form-control" rows="9" cols="25" required></textarea>
								
						</div>
						<div id="message-info"></div>

					</div>
					<div class="col-md-12">
						<button type="submit" id="btn-send-contact" class="btn btn-white sharp"><?=_SEND_MESSAGE;?></button>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>