
<div class="row c-form">
    <div class="col-md-12">
        <form>
            <div class="row">
                <div class=" col-sm-12 col-md-12">
                    <h2 class="quark-font1">88(THAILAND) CO.,LTD.</h2>
                </div>
            </div>
            <!-- <abbr title="Phone">
                    P:</abbr> -->
            <div class="row ">
                <div class=" col-sm-6 col-md-6 ">
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
        </form>
    </div>
</div>

<div class="row">
	<div class="col-md-12">
	  
			<form id="formcontact">
				<div class="row">
					<div class="col-md-6" style="fonts-size:24px;">
						<div class="form-group ">
							<label for="name"><?=_NAME;?></label>
							<input type="text" class="form-control" id="userName" name="userName"><!--required="required" -->
						</div>
						<div class="form-group">
							<label for="email"><?=_EMAIL_ADDRESS;?></label>
							<div class="input-group">
							<span class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span>  
								</span>
								<input type="email" name="email" class="form-control" id="email"></div>
						</div>
						<div class="form-group">
							<label for="subject"><?=_SUBJECT;?></label>
							<input id="subject" name="subject" type="text" class="form-control" value="">
							
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label for="name"><?=_MESSAGE;?></label>
							<textarea name="message" id="message" class="form-control" rows="9" cols="25"></textarea>
								
						</div>
						<div id="message-info"></div>
					</div>
					<div class="col-md-12">
						<button type="button" id="submitBtn" class="btn btn-white sharp" onclick="sendContact();"><?=_SEND_MESSAGE;?></button>
					</div>
				</div>
			</form>
	   
	</div><!-- -->
	
</div>