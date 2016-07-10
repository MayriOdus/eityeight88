 <?php  
	session_start();
	ob_start();
	include("conn.php");
   // tb compare  id id_car cokie_id  timep
   
//	$cok = $_COOKIE['authorization'];
	 
 
 ?>
<html>
<head>
 
    <?php  include("headhtml.php") ?>
 
	<script>
	
	function Redirect()
{
    window.location="wishlist.php";
}
	/*
function validate() {
	var valid = true;	
	$(".demoInputBox").css('background-color','');
	$(".info").html('');
	
	if(!$("#userName").val()) {
		 	
		$("#userName-info").html("(required)");//"(required)";
		$("#userName").css('background-color','#FFFFDF');
		valid = false;
	}
	
	 
	 
	 
	 
	if(!$("#userEmail").val()) {
		$("#userEmail-info").html("(required)");
		$("#userEmail").css('background-color','#FFFFDF');
		valid = false;
	}
	 
	if(!$("#userEmail").val().match(/^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/)) {
		$("#userEmail-info").html("(invalid)");
		$("#userEmail").css('background-color','#FFFFDF');
		valid = false;
	}
	  
	
	return valid;
	}
  function sendpay() {
	 
	var valid;	
	valid = validate();
	if(valid != false) {
	  alert (valid);
		 var str = $( "#frm" ).serialize();
		 alert (str);
		jQuery.ajax({
		url: "savetranfer.php",
		data:str,		//data:'pw='+$("#txtNewPassword").val()+'&hidemail='+$("#hidemail").val(),
		type: "POST",
		cache: false,
		success:function(data){		 
			$("#payment").html(data);
		},
		error:function (){}
		});
		 
		}
	}
	*/
$(document).ready(function(){
	/* $("a.delcom").on('click', function() {
	 //alert($(this).attr('title'));
		 var p_id = $(this).attr('title');	 
		 if(p_id!='')		{ 
	 	//  alert(p_id);
		 $.ajax({
				type:"post",
				url:"delcompare.php",		 
				data:'id='+p_id ,
				cache: false,
				success:function(data){
				 $("#results").html(data);
				// setTimeout(Redirect(),2000);
				}
			});
		  } 
		 
		 });
	 
	 var windowSizeArray = [ "width=800,height=600,resizable=yes,scrollbars=yes","width=300,height=400,scrollbars=yes" ];
	    $('.sender').click(function (event){
	//new window
                    var url = $(this).attr("href");
                    var windowName = "popUp";//$(this).attr("name");
                    var windowSize = windowSizeArray[$(this).attr("rel")];
 
                    window.open(url, windowName, windowSize); 
                    event.preventDefault();
 
                }); 
				*/
	}); //ready
  
	$(window).load(function() {
	      
       
	});
 function printFunction() {
    window.print();
	}
  </script>
</head>
 

<body>
 <div id="wrapper">
  <!-- Header ----------------------------------------------------------------------------------------------->
  <?php  
 //  include("inc_header.php");
  //$cokget = $_GET['c'];
  $pay = $_GET['ip']; 
  $talk = 'en';
  $strSQL ="SELECT * FROM compare WHERE chk_pay='$pay'"; 
 $objQuery = mysqli_query($connect, $strSQL) or die ($error);
  $Num_Rows = mysqli_num_rows($objQuery);
  
?>
<div id="#content">	 
      <div class='container'>
	 <div class="row">  
    <div class="col-xs-12 col-md-12 col-lg-12">
	 
	 <?php 
	 
	// $talk = $_SESSION["lang"];
		 /*
				 $headtxt = "สั่งซื้อสินค้า";
				 $txtcode = "รหัสสินค้า";
				 $tytxt= "ประเภท";
				 $coltxt= "สี";
				 $costtxt1="ราคา";
				 $costtxt2="ลดเหลือ";
				 $qtytxt="จำนวน";
				 $detxt="รายละเอียด";
				 $removetxt="ยกเลิกสินค้า";
				 
			}else if(empty($talk)){		*/	
				 $headtxt = "Payment Bill";		
				 $txtcode = "Code Payment";
				 
				  $protxt = "Code Product";
				 $tytxt= "Type";
				 $coltxt= "Color";
				 $costtxt1="COST";
				 $costtxt2="Sale";
				 $qtytxt="QTY";
				 $detxt="Detail";
				 $removetxt="REMOVE"; /*
			}else{
				$headtxt = "Payment Bill";
				 $txtcode = "Code Payment";
				 $protxt = "Code Product";
				 $tytxt= "Type";
				 $coltxt= "Color";
				 $costtxt1="COST";
				 $costtxt2="Sale";
				 $qtytxt="QTY";
				 $detxt="Detail";
				 $removetxt="REMOVE";
			}*/
	echo '<div class=" row " style="border-bottom:1px dotted #000; margin-top:20px;">';
	echo '<div class="col-md-2"><div style="padding-top:25px;"><img src="../images/logo1.jpg" class="img-responsive"/></div></div>';
	echo '<div class="col-md-10"><h2 class="quark-font1">88(THAILAND) CO.,LTD.</h2>';               
	//echo '<div class=" col-sm-12 col-md-12 ">';
    echo '<p class="quark-font2">795 Folsom Ave, Suite 600 San Francisco, CA 94107<br/>';
	echo 'Mon-Fri 10.00 am – 6.00 pm / Lunch Hours 12.00 pm – 1.00 pm<br/>Closed on Sat, Sun and Holidays&nbsp;(Thailand Standard Time)';
	echo '</p></div></div>';
				 
	echo '<br/>';
	 echo  "<p class='h4 quark-font1'>".$headtxt."</p>";
	 echo '<div class="table-responsive">';
	 echo '<table class="table">';
	 echo '<thead>';
	 echo '<tr><th class="quark-font1">'.$txtcode.'</th>';
	 echo '<th class="quark-font1">'.$protxt.'</th>';
	 echo '<th class="quark-font1">'.$coltxt.'</th>';
	 echo '<th class="quark-font1">'.$qtytxt.'</th>';
	 echo '<th class="quark-font1">'.$costtxt2.'</th>';
	
	// echo '<th class="text-center">Seller</th>';
	// echo '<th class="text-center quark-font1">'.$removetxt.'</th>';
	 echo '</thead><tbody>';
	 echo '</tr>';
	//echo '<thead><tr class="bgred" ><th colspan="6">Compare Car</th></tr></thead><tbody>';
while($compare = mysqli_fetch_array($objQuery))
{	
	//tb compare  id id_car cokie_id dates
		$idcompare = $compare ['id'];
		$id_pro = $compare ['id_product'];
		$icok = $compare['cokie'];
		$ccolor = $compare['color_code'];
		$cqty = $compare['qty'];
		$pay_id = $compare['chk_pay'];
		//$itme_pay[] = $idcompare;
		 
//compare table arning: Illegal string offset 'timep' indistant
	  $productSQL ="SELECT * FROM product WHERE  id ='$id_pro'";
		$uQuery = mysqli_query($connect, $productSQL) or die ($error);
		while($info = mysqli_fetch_array($uQuery))
		{
			  //format product detail
			$pid = $info['id'];
		 	$icode = $info['code_product'];
		    $inameth= $info['name_th'];
		    $inamee= $info['name_eng'];
			$itype= $info['types'];
			$icolor= $info['id_color'];
			$iweight= $info['weights'];
			$iprice= $info['costs'];
			$iamo= $info['amo'];
			$isale= $info['sale_cost'];
			$istocks= $info['stocks'];
			$ipost= $info['post_id'];
			$idetails= $info['details'];
			$idetail_th= $info['detail_th'];
			$iopendate= $info['opendate'];
			//$itimep= $info['timep'];
			
		 /*
			$upSQL ="SELECT * FROM upload_data WHERE prod_id='$icode'  limit 1 ";
			$QueryP = mysqli_query($connect, $upSQL);
			$count_pic = mysqli_num_rows($QueryP);
			// ID 	file_name 	post_id 	times
			if($count_pic==1){
				while($objP = mysqli_fetch_array($QueryP)){
				  $pphoto = $objP["file_name"];
				  $pho = '<img src="images/upload/'.$pphoto.'" width="100" class="img-responsive"/>';
				}
			}else{
				 $pho = '<img src="images/image_placeholder.png" width="100" class="img-responsive"/>';
			}*/
		}
		/* if( $talk =="th" ){
			 //format product detail
			$gname = $inameth;
			$gdetails = $idetail_th;	
		 }else if( $talk =="en" ){ */
			// $gname = $inamee;
			//$gdetails = $idetails;
		// }
			
			 echo '<tr>';
	  
		/*echo "<td class='col-md-1'>";		 
//		 $string = preg_replace('/\s+/', '', $imodels); space cut
		echo '<a href="product-detail.php?id='.$pid.'" >'.$pho.'</a>';	
		echo "</td>";*/
		echo "<td class='col-md-2'>".$pay_id."</td>";
		echo "<td class='col-md-2'><p>".$icode."</p></td>";
		//cde name  detail		 
		echo "<td class='col-md-2'><div class='shade_cricle' style='background-color:".$ccolor.";'>&nbsp;</div>".$ccolor."</td>";
		if(!empty($isale)){
			$pric ="<p style='text-decoration:line-through; color:#CCC;'>".number_format($iprice)."</p><span>".number_format($isale)."</span>";//bg-color1
			$ipr = $iprice*$cqty;
			$ipr2 = $isale*$cqty;
			$totalcost1[] = $ipr;
			$totalcost2[] = $ipr2;
			 
			 
		}else{
			$pric ="<p>".number_format((int)$iprice)."</p>";
			$ipr = $iprice*$cqty;
			$totalcost1[] = $ipr;
			//	echo  $totalcost1[0];

		}
		echo "<td class='col-md-2'>".$cqty."</td>";
		echo "<td class='col-md-2'>".$pric."</td>";
	 
		
	// echo "<td class='text-center col-md-2'><a id='fav' title='".$idcompare."' class='delcom btn' ><span class='glyphicon glyphicon-remove'></span></a></td>";		 
		echo ' </tr>';
		
		}	
		echo '</tbody><tfoot>';
		echo '<tr style="background-color:#000000; color:#FFF;">'; // total 
		echo '<th colspan="4" align="cener"><p class="h4">&nbsp;Total</p></th>';			 
		echo '<th>';	
		if(!empty($isale)){
			
			if(!empty($totalcost2)){
			$val = array_sum($totalcost1); 
			$val2 = array_sum($totalcost2); 
			$tc ="<p style='text-decoration:line-through; color:#CCC;'>".number_format($val)."</p><span style='text-decoration:underline;'>".number_format($val2)."</span>";//bg-color1
			$hidval = $val2;
			}else{
				$tc="";
			}
		}else{
			 if(!empty($totalcost1)){
			$val = array_sum($totalcost1); 
			$tc ="<p style='text-decoration:underline;'>".number_format($val)."</p></span>";//bg-color1
			$hidval = $val;
			 }else{
				 $tc="";
			 }
		}		
		 echo  $tc;		 
		echo '</th>';
		echo '</tr>';
		echo "</tfoot></table>"; 
		echo '</div>';
		//onclick="printFunction();"
?>
		  
		  </div>
		  <div class="col-md-12"><a href="#" onclick="printFunction();"><span class="glyphicon glyphicon-print"></span>&nbsp;print</a></div>
	 </div> <!-- right -->
 
 </div><!-- content -->
<!-- Footer ----------------------------------------------------------------------------------------------->
  <?php  // include("footer.php");?>
<!-- /Footer -->
 
</div><!-- warpper -->  	 
</body>
</html>