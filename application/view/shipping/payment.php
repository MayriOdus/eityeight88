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
                <th><?=_PRODUCT_NAME;?></th>
                <th><?=_PRICE;?></th>
                <th><?=_QUANTITY;?></th>
                <th><?=_SUB_TOTAL;?></th>
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
                    <span class="cartImage">
                      <a href="<?=$_URL;?>products/product_detail/<?=$bask["code_product"];?>">
                        <img src="<?=URL;?>images/upload/<?=str_replace(" ", "%20", $bask["img"]);?>" width="100" class="img-responsive">
                      </a>
                    </span>
                  </td>
                  <td class="col-xs-4"><a href="<?=$_URL;?>products/product_detail/<?=$bask["code_product"];?>"><?=$bask[$name];?></a></td>

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
                <li><?=_SUB_TOTAL;?> <span><?=$tc;?></span></li>
                <li><?=_VAT;?> 7% <span>฿ <?=number_format($hidval1, 2, '.', ',');?></span></li>
                <li><?=_GRAND_TOTAL;?> <span class="grandTotal">฿ <?=number_format($totalval, 2, '.', ',');?></span></li>
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
        <p class="h1 quark-font1"><?=_TRANSFER_PAYMENT;?></p>
        #<?=_ID_PAYMENT;?> :<?=$paymentId;?>
        <form id="payment-form" name="payment-form" action="<?=URL;?>shipping/add_payment" method="POST" enctype="multipart/form-data">

            <input name="input-idpost" id="input-idpost" type="hidden" class="form-control" value="<?=$paymentId;?>">
            <input name="input-val" id="input-val" type="hidden" class="form-control" value="<?=$totalval;?>">

            <ul class="list-group">
                <li class="list-group-item">
                    <div class="row">
                        <div class="col-xs-12 col-md-6">
                            <label><?=_FIRST_NAME;?> *</label>
                            <input type="text" name="userName" id="userName" value="<?=$firstname;?>" class="form-control" placeholder="<?=_FIRST_NAME;?>" required>
                        </div>
                        <div class="col-xs-12 col-md-6">
                            <label><?=_LAST_NAME;?> *</label>
                            <br>
                            <input type="text" name="lname" id="lname" value="<?=$lastname;?>" class="form-control" placeholder="<?=_LAST_NAME;?>" required>
                        </div>
                    </div>
                </li>

                <li class="list-group-item">
                    <div class=" row margin-b">
                        <div class="col-xs-12  col-md-12">
                            <label><?=_TELEPHONE;?> *</label>
                            <br>
                            <input type="text" name="userTele" id="Tele" class="form-control" placeholder="<?=_TELEPHONE;?>" value="<?=$tel;?>" required>
                        </div>
                    </div>
                </li>
                <li class="list-group-item">
                    <div class="row">
                        <div class="col-xs-12  col-md-12">
                            <label><?=_EMAIL_ADDRESS;?> *</label><span id="userEmail-info" class="info"></span>
                            <br>
                            <!-- class="color1"-->
                            <input type="email" name="userEmail" id="userEmail" class="form-control" value="<?=$email;?>" placeholder="<?=_EMAIL_ADDRESS;?>" required>
                        </div>
                    </div>
                </li>

                <li class="list-group-item">
                    <div class="row">
                        <div class="col-md-12">
                            <p><?=_ADDRESS;?></p>
                            <textarea id="input-add" name="input-add" rows="4" class="form-control"><?=$address;?></textarea>
                        </div>
                    </div>
                </li>

                <li class="list-group-item">
                    <div class="row">
                        <div class="col-md-3 col-lg-3">
                            <p><?=_CERTIFICATE_PAYMENT;?>
                                <br><?=_IMAGE_ONLY;?></p>
                        </div>
                        <!-- statement To apply for a transfer -->
                        <div class="col-md-9 col-lg-9">
                            <input name="files[]" type="file" id="input_clone" required>
                        </div>
                    </div>
                </li>
                <li class="list-group-item">
                    <div class="row">
                        <div class="col-md-12 text-right">
                            <?php
                            if( !isset($_SESSION["member_ns"]) || empty($_SESSION["member_ns"]) )
                            {
                              echo '<a href="'.$_URL.'member/register" class="btn btn-white sharp" >'._REGISTER.'</a>';
                            }
                            else
                            {
                              echo '<button type="submit" id="submitBtn" class="btn btn-white sharp">'._PAYMENT.'</button>';
                            }
                            ?>
                            
                        </div>
                    </div>
                </li>
            </ul>

        </form>

    </div>
    <!-- cart -->
</div>