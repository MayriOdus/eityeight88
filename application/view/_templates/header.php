

<div class="row pull-left" style="padding:10px;">

	<div class="res-logo logo" >
		<a href="<?=$_URL;?>">
			<img alt="<?=$_URL;?>" class="logo" src="<?=URL;?>img/logo.gif" style="max-width:95px;">
		</a>
	</div>

</div>

<div class="row">
	
	<nav class="navbar">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar bar1"></span>
					<span class="icon-bar bar2"></span>
					<span class="icon-bar bar3"></span>
				</button>
				<a class="navbar-brand" href="#"></a>

				<div class="pull-right res-basket" style="display:none;">
					<ul class="hoption">
						<li>
							<?php
							if( isset($_SESSION["member_name"]) && !empty($_SESSION["member_name"]) )
							{
								?>
								<a href="<?=$_URL;?>member/profile/<?=$_SESSION["member_ns"];?>" class="hsc"><?=$_SESSION["member_name"];?></a><a href="<?=$_URL;?>member/logout"><?=_LOGOUT;?></a>
								<?php
							}
							else
							{
								?>
								<a href="<?=$_URL;?>member/login" class="hsc"><?=_LOGIN;?></a><a href="<?=$_URL;?>member/register"><?=_REGISTER;?></a>
								<?php
							}
							?>
						</li>
						<li>
							<a href="<?=$_URL;?>shipping/payment" class="hsc"><?=_SHIPPING_BAG;?></a>
						</li>
					</ul>
				</div>

			</div>
			
			
			<div class="collapse navbar-collapse">


				<div class="row fix-top-hd">

					<div class="container">
						<ul class="hoption">
							
							<li>
								<ul class="qtrans_social_chooser" id="qsocial-chooser">

									<li class="active" style="border:none;">
										<a href="https://www.facebook.com/ver.88officialThai?ref=bookmarks"  target="_blank" class="btn btn-social-icon btn-facebook">
											<i class="fa fa-facebook"></i>
										</a>
										<!-- <a href="#" data-toggle="modal" data-target=".soci-line" class="btn btn-social-icon btn-twitter"> -->
										<a href="http://line.me/ti/p/@eityeight" target="_blank" class="btn btn-social-icon" title="Line">
											<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Layer_1" x="0px" y="0px" viewBox="0 0 377.764 377.764" enable-background="new 0 0 377.764 377.764" xml:space="preserve">
											  <path fill-rule="evenodd" clip-rule="evenodd" fill="#fff" d="M77.315 0h223.133c42.523 0 77.315 34.792 77.315 77.315v223.133c0 42.523-34.792 77.315-77.315 77.315H77.315C34.792 377.764 0 342.972 0 300.448V77.315C0 34.792 34.792 0 77.315 0z"/>
											  <path fill-rule="evenodd" clip-rule="evenodd" fill="#000" d="M188.515 62.576c76.543 0 138.593 49.687 138.593 110.979 0 21.409-7.576 41.398-20.691 58.351 -0.649 0.965-1.497 2.031-2.566 3.209l-0.081 0.088c-4.48 5.36-9.525 10.392-15.072 15.037 -38.326 35.425-101.41 77.601-109.736 71.094 -7.238-5.656 11.921-33.321-10.183-37.925 -1.542-0.177-3.08-0.367-4.605-0.583l-0.029-0.002v-0.002c-64.921-9.223-114.222-54.634-114.222-109.267C49.921 112.263 111.972 62.576 188.515 62.576z"/>
											  <path fill-rule="evenodd" clip-rule="evenodd" fill="#fff" d="M108.103 208.954h0.465 0.138 27.349c3.976 0 7.228-3.253 7.228-7.229v-0.603c0-3.976-3.252-7.228-7.228-7.228h-20.121v-45.779c0-3.976-3.252-7.228-7.228-7.228h-0.603c-3.976 0-7.228 3.252-7.228 7.228v53.609C100.875 205.701 104.127 208.954 108.103 208.954L108.103 208.954zM281.308 175.351v-0.603c0-3.976-3.253-7.228-7.229-7.228h-20.12v-11.445h20.12c3.976 0 7.229-3.252 7.229-7.228v-0.603c0-3.976-3.253-7.228-7.229-7.228H246.73h-0.138 -0.465c-3.976 0-7.228 3.252-7.228 7.228v53.609c0 3.976 3.252 7.229 7.228 7.229h0.465 0.138 27.349c3.976 0 7.229-3.253 7.229-7.229v-0.603c0-3.976-3.253-7.228-7.229-7.228h-20.12v-11.445h20.12C278.055 182.579 281.308 179.326 281.308 175.351L281.308 175.351zM227.553 206.799l0.002-0.003c1.29-1.308 2.09-3.1 2.09-5.07v-53.609c0-3.976-3.252-7.228-7.229-7.228h-0.603c-3.976 0-7.228 3.252-7.228 7.228v31.469l-26.126-35.042c-1.248-2.179-3.598-3.655-6.276-3.655h-0.603c-3.976 0-7.229 3.252-7.229 7.228v53.609c0 3.976 3.252 7.229 7.229 7.229h0.603c3.976 0 7.228-3.253 7.228-7.229v-32.058l26.314 35.941c0.162 0.252 0.339 0.494 0.53 0.724l0.001 0.002c0.723 0.986 1.712 1.662 2.814 2.075 0.847 0.35 1.773 0.544 2.742 0.544h0.603c1.218 0 2.367-0.306 3.377-0.844C226.515 207.766 227.124 207.322 227.553 206.799L227.553 206.799zM156.345 208.954h0.603c3.976 0 7.228-3.253 7.228-7.229v-53.609c0-3.976-3.252-7.228-7.228-7.228h-0.603c-3.976 0-7.229 3.252-7.229 7.228v53.609C149.116 205.701 152.369 208.954 156.345 208.954z"/>
											</svg>
										</a>

										<a href="https://instagram.com/ver88official/"  target="_blank" class="btn btn-social-icon btn-instagram">
											<i class="fa fa-instagram"></i>
										</a>
										<a href="https://www.youtube.com/channel/UCchLAlGdRStLn5RolkZeWaw/feed"  target="_blank" class="btn btn-social-icon btn-youtube-play">
											<i class="fa fa-youtube-play"></i>
										</a>
									</li>

								</ul>
							</li>

							<li style="display:none;">
								<?php
								if( isset($_SESSION["member_name"]) && !empty($_SESSION["member_name"]) )
								{
									?>
									<a href="<?=$_URL;?>member/profile/<?=$_SESSION["member_ns"];?>" class="hsc"><?=$_SESSION["member_name"];?></a><a href="<?=$_URL;?>member/logout"><?=_LOGOUT;?></a>
									<?php
								}
								else
								{
									?>
									<a href="<?=$_URL;?>member/login" class="hsc"><?=_LOGIN;?></a><a href="<?=$_URL;?>member/register"><?=_REGISTER;?></a>
									<?php
								}
								?>
							</li>

							<li style="display:none;">
								<a href="<?=$_URL;?>shipping/payment" class="hsc"><?=_SHIPPING_BAG;?></a>
							</li>

							<li>
								<ul class="qtrans_language_chooser" id="qtranslate-chooser">
									<?php
									$RequestURI = ( $_SERVER['REQUEST_URI'] == "/" )? "/en/" : $_SERVER['REQUEST_URI'];
									?>
									<li class="active"><a href="<?="http://".$_SERVER['HTTP_HOST'].str_replace("th", "en", $RequestURI);?>" class="qtrans_flag_en qtrans_flag_and_text" title="English"><span>English</span></a>
									</li>
									<li><a href="<?="http://".$_SERVER['HTTP_HOST'].str_replace("/en", "/th", $RequestURI);?>" class="qtrans_flag_th qtrans_flag_and_text" title="ภาษาไทย"><span>ภาษาไทย</span></a>
									</li>
								</ul>
								<div class="qtrans_widget_end"></div>
							</li>
						</ul>
						</div>

				</div>


				<div id="header" class="sidebar">
					
					<div class="row">
						<a href="<?=$_URL;?>">
							<img alt="<?=$_URL;?>" class="logo" src="<?=URL;?>img/logo.gif" style="max-width:95px;">
						</a>
					</div>

					<div class="row">

						<div class="nav hnavi">
							<ul class="menu">
								<li class="cat-item"><a href="<?=$_URL;?>" title="<?=_HOME;?>"><?=_HOME;?></a>
								</li>
								<li class="cat-item cat-item-27"><a href="<?=$_URL;?>about" title="<?=_ABOUT_US;?>"><?=_ABOUT_US;?></a>
								</li>
								<li class="cat-item cat-item-26"><a href="<?=$_URL;?>products" title="<?=_PRODUCTS;?>"><?=_PRODUCTS;?></a>
								</li>
								<li class="cat-item"><a href="<?=$_URL;?>contact" title="<?=_CONTACT_US;?>"><?=_CONTACT_US;?></a>
								</li>
								<li class="cat-item cat-item-26 text-center"><div class="securitycode"><a class="sec-a" href="<?=$_URL;?>products/checkserial" title="<?=_SECURITY_CODE_CHECKING;?>"><?=_SECURITY_CODE_CHECKING;?></a></div>
								</li>
							</ul>

						</div>
					</div>
					<!--.hright-->
				</div>

			</div>
		</div>
	</nav>

</div>

