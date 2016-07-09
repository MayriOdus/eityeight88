<?php
//$img = explode(",", str_replace(" ", "%20", $basket["img"]));
$name = ($_SESSION["Lang"] == "en")? "name_eng" : "name_th";
?>

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
              <?php

              $totalcost1 = array();
              $totalcost2 = array();

              foreach ($basket as $i => $bask)
              {
                ?>
                <tr>
                  <td class="col-xs-2">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close" name="btn-delete-item" id="<?=$bask["id"];?>"><span aria-hidden="true">×</span></button>
                    <span class="cartImage"><img src="<?=URL;?>images/upload/<?=str_replace(" ", "%20", $bask["img"]);?>" width="100" class="img-responsive"></span>
                  </td>
                  <td class="col-xs-4"><?=$bask[$name];?></td>

                  <?php
                  if( !empty($bask["sale_cost"]) )
                  {
                    $pric = "<p style='text-decoration:line-through; color:#CCC;'>฿ ".number_format($bask["costs"])."</p><span>฿ ".number_format($bask["sale_cost"])."</span>";//bg-color1
                    $ipr = $bask["costs"] * $bask["qty"];
                    $ipr2 = $bask["sale_cost"] * $bask["qty"];
                    $totalcost1[] = $ipr;
                    $totalcost2[] = $ipr2;
                    $txtSubTotal = "<p style='text-decoration:line-through; color:#CCC;'>฿ ".number_format($ipr)."</p><span>฿ ".number_format($ipr2)."</span>";
                  }
                  else
                  {
                    $pric ="<p>฿ ".number_format((int)$bask["costs"])."</p>";
                    $ipr = $bask["costs"] * $bask["qty"];
                    $totalcost1[] = $ipr;
                    $txtSubTotal ="<p>฿ ".number_format($ipr)."</p>";
                  }
                  ?>
                  <td class="col-xs-2"><?=$pric;?></td>
                  <td class="col-xs-2"><input type="text" placeholder="<?=$bask["qty"];?>" disabled></td>
                  <td class="col-xs-2"><?=$txtSubTotal;?></td>
                </tr>

                <?php           
              }
              ?>
            </tbody>
          </table>
        </div>

        <div class=" totalAmountArea">
          <div class="row ">
            <div class="col-sm-4 col-sm-offset-8 col-xs-12">
              <?php
              $tc = "";
              if(!empty($totalcost2))
              {
                $pay1 = array_sum($totalcost1);
                $pay2 = array_sum($totalcost2);
                $subtotal =  $pay1 - $pay2; 
                $tc .= "<span style='text-decoration:line-through; color:#333;'>".number_format($pay1, 2, '.', ',')."</span>&nbsp;<span class='bg-color-sale' style=' color:#FFFFFF; ' >&nbsp;Sale ".number_format($pay2, 2, '.', ',')."= ".number_format($subtotal, 2, '.', ',')."</span>";
              }
              else if(empty($totalcost2))
              {
                if(isset($totalcost1))
                {
                  $pay1 = array_sum($totalcost1);
                  $subtotal = $pay1;
                  $tc .= "<span >".number_format($pay1, 2, '.', ',')."</span>";//.$txtcostnovat;
                }
              } 

              $hidval1 =  $subtotal*(7/100);
              $totalval = $subtotal + $hidval1; 

              ?>
              <ul class="list-unstyled">
                <li>Sub Total <span><?=$tc;?></span></li>
                <li>Vat 7% <span>฿ <?=number_format($hidval1, 2, '.', ',');?></span></li>
                <li>Grand Total <span class="grandTotal">฿ <?=number_format($totalval, 2, '.', ',');?></span></li>
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