<div class="row item-product-margin">
    <div class="col-md-6 col-md-offset-3 col-lg-6 col-lg-offset-3 col-sm-6 col-sm-offset-3">
        <form action="p_login.php" method="post">
            <fieldset>
                <p class="quark-font2 h2"><?=_CHECK_SERIAL;?></p>

                <!-- <hr class="colorgraph"> -->
                <hr>

                <div class="form-group">
                    <input type="text" name="input-serial" id="input-serial" class="form-control" placeholder="<?=_SERIAL_NUMBER;?>">
                </div>
               
                <hr>
                <div class="row">
                    <div class="col-xs-12">
                        <input type="button" class="btn btn-black btn-block sharp" id="btn-chkall-serial" value="<?=_VALIDATE;?>">
                    </div>
                </div>
            </fieldset>
        </form>
    </div>


</div>