

<div class="row item-product-margin">
    <div class="col-md-12">

		<div class="row">
			
			<div class="col-sm-6 col-md-6" style="font-size:40px;">
                <div id="carousel" class="carousel slide" data-ride="carousel" data-interval="2000">
                    <div class="carousel-inner product-image">
                        <div class="item active" data-thumb="0">
                            <img src="<?=URL;?>img/chkserial/01.jpg" style=" max-width: 293px;margin: auto;">
                        </div>
                        <div class="item" data-thumb="2">
                            <img src="<?=URL;?>img/chkserial/02.jpg" style=" max-width: 293px;margin: auto;">
                        </div>
                        <div class="item" data-thumb="3">
                            <img src="<?=URL;?>img/chkserial/03.jpg" style=" max-width: 293px;margin: auto;">
                        </div>
                        <div class="item" data-thumb="4">
                            <img src="<?=URL;?>img/chkserial/04.jpg" style=" max-width: 293px;margin: auto;">
                        </div>
                    </div>
                </div> 

                <!-- Controls -->
                <a class="left carousel-control" href="#carousel" role="button" data-slide="prev">
                    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="right carousel-control" href="#carousel" role="button" data-slide="next">
                    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>

			</div>

			<div class="col-sm-6 col-md-6">
				<form action="p_login.php" method="post" class="contact-form">
					<fieldset>

						<div class="contact">
							<div class="hd text-uppercase"><?=_CHECK_SERIAL;?></div>
						</div>

						<div class="form-group">
							<input type="text" name="input-serial" id="input-serial" class="form-control" placeholder="<?=_SERIAL_NUMBER;?>">
						</div>
					   
						<div class="row">
							<div class="col-xs-12">
								<input type="button" class="btn btn-black btn-block sharp" id="btn-chkall-serial" value="SEND">
							</div>
						</div>
					</fieldset>
				</form>
			</div>

		</div>	
		
		<br><br>
		<div class="row">
			<div class="col-sm-12 text-center" style="font-size:40px;">
                <div class="col-sm-12 col-md-12">
				    <img src="<?=URL;?>img/chkserial/06.jpg" class="img-responsive">
                </div>
			</div>
		</div>
    </div>
</div>





<div class="modal fade" id="isreal" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
        <div class="modal-body">
            <div class="row">
                <div class="col-xs-12 chkp text-center">
                    http://eityeight.com/
                </div>
            </div> 
            <div class="row">
                <div class="col-xs-12 chkp-sub text-center">
                    This is the product = Authenticity
                </div>
            </div>  
            <div class="row">
                <div class="col-xs-12 chkp-sub text-center">
                    Nomor kode ini benar = berarti produk ini asli
                </div>
            </div>   
            <div class="row">
                <div class="col-xs-12 chkp-sub text-center">
                    ผลิตภัณฑ์นี้เป็นผลิตภัณฑ์ = ของจริง
                </div>
            </div>   
        </div>
        <div class="modal-footer" style="padding: 10px;">
            <div class="row">
                <div class="col-xs-12 chkp-foot text-center">
                    <a href="#" data-dismiss="modal" style="color: #1260b1;">ตกลง</a>
                </div>
            </div> 
        </div>
    </div>
  </div>
</div>

<div class="modal fade" id="isfake" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
        <div class="modal-body">
            <div class="row">
                <div class="col-xs-12 chkp text-center">
                    http://eityeight.com/
                </div>
            </div> 
            <div class="row">
                <div class="col-xs-12 chkp-sub text-center">
                    Product code is not found = Fake
                </div>
            </div>  
            <div class="row">
                <div class="col-xs-12 chkp-sub text-center">
                    Nomor kode ini tidak ada = berarti produk ini palsu
                </div>
            </div>   
            <div class="row">
                <div class="col-xs-12 chkp-sub text-center">
                    ไม่พบรหัสผลิตภัณฑ์ = ของปลอม
                </div>
            </div>   
        </div>
        <div class="modal-footer" style="padding: 10px;">
            <div class="row">
                <div class="col-xs-12 chkp-foot text-center">
                    <a href="#" data-dismiss="modal" style="color: #1260b1;">ตกลง</a>
                </div>
            </div> 
        </div>
    </div>

    


  </div>
</div>

<div class="modal fade" id="isdup" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
        <div class="modal-body">
            <div class="row">
                <div class="col-xs-12 chkp text-center">
                    http://eityeight.com/
                </div>
            </div> 
            <div class="row">
                <div class="col-xs-12 chkp-sub text-center">
                    This product has already been checked = Rechecking
                </div>
            </div>  
            <div class="row">
                <div class="col-xs-12 chkp-sub text-center">
                    Nomor kode ini sudah terdaftar = berarti ini pemeriksaan ulang
                </div>
            </div>   
            <div class="row">
                <div class="col-xs-12 chkp-sub text-center">
                    มีการตรวจผลิตภัณฑ์นี้แล้ว = เช็คซ้ำ
                </div>
            </div>   
        </div>
        <div class="modal-footer" style="padding: 10px;">
            <div class="row">
                <div class="col-xs-12 chkp-foot text-center">
                    <a href="#" data-dismiss="modal" style="color: #1260b1;">ตกลง</a>
                </div>
            </div> 
        </div>
    </div>
    </div>
</div>