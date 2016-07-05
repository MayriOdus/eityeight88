<div class="row">
            <div class="col-xs-12">
              <div class="cartListInner">
                <form action="#">
                  <div class="table-responsive">
                    <table class="table">
                      <thead>
                        <tr>
                          <th></th>
                          <th>Product Name</th>
                          <th>Price</th>
                          <th>Quantity</th>
                          <th>Sub Total</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td class="col-xs-2">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                            <span class="cartImage"><img src="<?=URL;?>img/products/p01.png" width="100" class="img-responsive"></span>
                          </td>
                          <td class="col-xs-4">VER. 88 Bounce Up Pact SPF 50 PA+++</td>
                          <td class="col-xs-2">฿ 99.00</td>
                          <td class="col-xs-2"><input type="text" placeholder="1"></td>
                          <td class="col-xs-2">฿ 99.00</td>
                        </tr>
                        <tr>
                          <td class="col-xs-2">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                            <span class="cartImage"><img src="<?=URL;?>img/products/p02.png" width="100" class="img-responsive"></span>
                          </td>
                          <td class="col-xs-4">VER. 88 Bounce Up Pact SPF 50 PA+++</td>
                          <td class="col-xs-2">฿ 99.00</td>
                          <td class="col-xs-2"><input type="text" placeholder="1"></td>
                          <td class="col-xs-2">฿ 99.00</td>
                        </tr>
                        <tr>
                          <td class="col-xs-2">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                            <span class="cartImage"><img src="<?=URL;?>img/products/p04.png" width="100" class="img-responsive"></span>
                          </td>
                          <td class="col-xs-4">VER. 88 Bounce Up Pact SPF 50 PA+++</td>
                          <td class="col-xs-2">฿ 99.00</td>
                          <td class="col-xs-2"><input type="text" placeholder="1"></td>
                          <td class="col-xs-2">฿ 99.00</td>
                        </tr>
                      </tbody>
                    </table>
                  </div>

                  <div class=" totalAmountArea">
                    <div class="row ">
                      <div class="col-sm-4 col-sm-offset-8 col-xs-12">
                        <ul class="list-unstyled">
                          <li>Sub Total <span>฿ 792.00</span></li>
                          <li>Vat 7% <span>฿ 18.00</span></li>
                          <li>Grand Total <span class="grandTotal">฿ 810.00</span></li>
                        </ul>
                      </div>
                    </div>
                  </div>

                </form>
              </div>
            </div>
          </div>





<div class="row maring-wishlist">
    <div class="col-md-10 col-md-offset-1">
        <p class="h3 quark-font1">Tranfer Payment</p>
        #ID Payment :06071648403
        <form id="frm" action="savetranfer.php" method="POST" enctype="multipart/form-data">
            <input id="input-idpost" name="input-idpost" type="hidden" class="form-control" value="06071648403">
            <input name="input-val" type="hidden" class="form-control" value="1765.5">

            <ul class="list-group">
                <li class="list-group-item">
                    <div class="row">
                        <div class="col-xs-12 col-md-6">
                            <label>First Name *</label>
                            <input type="text" name="userName" id="userName" value="test" class="form-control" placeholder="First Name">
                        </div>
                        <div class="col-xs-12 col-md-6">
                            <label>Last Name *</label>
                            <br>
                            <input type="text" name="lname" id="lname" value="test" class="form-control" placeholder="Last Name">
                        </div>
                    </div>
                </li>

                <li class="list-group-item">
                    <div class=" row margin-b">
                        <div class="col-xs-12  col-md-12">
                            <label>Telephone *</label>
                            <br>
                            <input type="text" name="userTele" id="Tele" class="form-control" value="123456">
                        </div>
                    </div>
                </li>
                <li class="list-group-item">
                    <div class="row">
                        <div class="col-xs-12  col-md-12">
                            <label>Email Address *</label><span id="userEmail-info" class="info"></span>
                            <br>
                            <!-- class="color1"-->
                            <input type="text" name="userEmail" id="userEmail" class="form-control" value="test@test.com" placeholder="Email Address">
                        </div>
                    </div>
                </li>

                <li class="list-group-item">
                    <div class="row">
                        <div class="col-md-12">
                            <p>Address</p>
                            <textarea id="input-add" name="input-add" rows="4" class="form-control">test</textarea>
                        </div>
                    </div>
                </li>

                <li class="list-group-item">
                    <div class="row">
                        <div class="col-md-3 col-lg-3">
                            <p>Certificate Payment
                                <br>Image Only</p>
                        </div>
                        <!-- statement To apply for a transfer -->
                        <div class="col-md-9 col-lg-9">
                            <input name="files[]" type="file" id="input_clone">
                        </div>
                    </div>
                </li>
                <li class="list-group-item">
                    <div class="row">
                        <div class="col-md-12 text-right">
                            <button id="submitBtn" class="btn btn-white sharp">Payment</button>
                        </div>
                    </div>
                </li>
            </ul>

        </form>

    </div>
    <!-- cart -->
</div>