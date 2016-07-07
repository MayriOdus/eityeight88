<?php 

session_start();
ob_start();

include_once 'conn.php';

if( empty($_SESSION["type_user"]) )
{		
	if( $_SESSION["type_user"] != "admin" )
	{
		header ("Location:../en/login-form.php");
	}
} 

?>

<!DOCTYPE html>
<html lang="en">
<head>
     
<?php  include("headhtml.php");?>

 

<script type="text/javascript">
<!--

function Redirect()
{
	window.location="index.php";
}

function Redirectch(email)
{
	window.location="formch.php?emu="+email;
}
  
$(document).ready(function(){

	$(".datepicker").datepicker({ dateFormat: 'dd MM yy' }); //mm/dd/yy
 
	$('#add-btn').click(function(){ //'.add_field'

		var input = $('#input_clone');
		var clone = input.clone(true);			
		clone.removeAttr ('id');
		clone.val('');
		clone.appendTo('.input_holder'); 
		
		var name = $('#name_clone');
		var clonename = name.clone(true);
		clonename.removeAttr ('id');
		clonename.val(''); 
		
		clonename.appendTo('.input_holder'); 
		
		 $('#input-num').val(parseInt($('#input-num').val())+1);
		// clonename.attr('name', 'textname'+ $('#input-num').val());
		// clonename.val( 'textname'+$('#input-num').val());
		   if($('#input-num').val()==10){
			 //  $('#add-btn').addClass("disabled")
			  $('#add-btn').hide();
		   } 
	});

	$('#remove-btn').click(function(){ //'.remove_field'
	
		if($('.input_holder input:last-child').attr('id') != 'input_clone'){
			  $('.input_holder input:last-child').remove();
				 $('#input-num').val(parseInt($('#input-num').val())-1);
					//alert($('#input-num').val());
					$('#add-btn').show();		
		}	//	alert($('#input-num').val());
	});	 
	
	$("#post_country").on('change', function() {
		getval(this);
	});
		
});

function getval(sel) 
{			 
 
	var str = sel.value;
	jQuery.ajax({
	url: "select-city.php",				 
	data:'cou='+str,
	type: "POST",
	success:function(data){
		$("#div_city").html(data);
		//settimeout(Redirect(),2000);
	},
	 error:function (){} 

	});
}

//-->
</script>

</head>
<body>

     
     
<!-- Header ----------------------------------------------------------------------------------------------->
<?php  include("inc_header.php");?>
<!-- /Header -->  

<?php  

if(isset($_SESSION["type"]))
{
	if( $_SESSION["type"] == "users") 
	{
		echo "<script>Redirect();</script>"; 	
	}	
}

?>
  <div class="container">
 
  <div style="margin-top:50px;">
  <?php 
		/* menu */  
		$sqlnews="SELECT * FROM product";
		$datanews = mysqli_query($connect, $sqlnews) or die('Could not get data: ' . mysql_error());
		$id_news= mysqli_num_rows($datanews);
		$id_news2=$id_news+1; 
		$code =  $id_news2.date("dmyis");
  ?>
  <form action="upload.php" method="POST" enctype="multipart/form-data">
    <ul class="list-group">
			 <input id="input-idpost" name="input-idpost" type="hidden" class="form-control"  value="<?php  echo $code;?>" >
			 <input id="input-idpost" name="input-idpost" type="hidden" class="form-control"  value="<?php  echo $code;?>" >
			    <li class="list-group-item">
			   <div class="row">
			  <div class="col-md-3 ">Product Name</div>
                <div class="col-md-5 "><input id="input-model" name="input-model" type="text" class="form-control" value="" ></div>	
				<div class="col-md-4 "><span class="label label-danger">*</span></div>
				</div>
			  </li>
			  <li class="list-group-item">
			   <div class="row">
			  <div class="col-md-3 ">ชื่อผลิตภัณท์ ภาษาไทย</div>
                <div class="col-md-5 "><input id="input-model2" name="input-model2" type="text" class="form-control"    value="" ></div>	
				<div class="col-md-4  "><span class="label label-danger">*</span></div>
				</div>
			  </li>
	 
			    <li class="list-group-item">
			   <div class="row">
			  <div class="col-md-3 col-lg-3">รหัสสินค้า</div>			 
                <div class="col-md-5 col-lg-5"> <input id="idproduct"  name="input-idprod" type="text" class="form-control" placeholder=""  value="" ></div>	
				  <div class="col-md-4 col-lg-4"><span class="label label-danger">*</span></div>
				</div>
			  </li>
			   <li class="list-group-item">
			   <div class="row">
			  <div class="col-md-3 col-lg-3">ชนิดสินค้า</div>			 
                <div class="col-md-5 col-lg-5"> 				 
				<select class="form-control" id="post_type" name="post_type">
				<option value="">SELECT</option>
				<?php 
		
				$prosql = "select * from type_product";
				$proQuery  = mysqli_query($connect, $prosql);
				while($Result = mysqli_fetch_array($proQuery))
				{	
					$i = $Result["id"];
					$idtype = $Result['id_type'];
					$ide = $Result['name_eng'];
					echo '<option value="'.$idtype.'">'.$ide.'</option>';
					}  
				?>
			 
				</select> 
				 
				</div>	
				  <div class="col-md-4 col-lg-4">&nbsp;</div>
				</div>
			  </li>
			  <li class="list-group-item">
			   <div class="row">
			  <div class="col-md-3 ">สี</div>			 
                <div class="col-md-9"> 
				  <?php 
				 
		$con_user = "SELECT * FROM color_product ";
		$cousql = mysqli_query($connect, $con_user) or die('Could not get data: ' . mysql_error());
		while($infocu = mysqli_fetch_array($cousql)){
			 $idt = $infocu['id'];			 
			 $c_code = $infocu['code_color'];
			 $nameng = $infocu['name_eng'];
		  
			echo '<label class="checkbox-inline"><input type="checkbox" name="cb[]" value="'.$c_code.'">';
			//echo "<p style='background-color:".$c_code.">".$c_code."</p>";
			echo $c_code;	
			echo '<div style="background-color:'.$c_code.';">&nbsp;</div>';
			echo '</label>';  
 
				}
 
			echo '<input  name="hidcolor" type="hidden"  value="'.$code.'" >';		
					 
			 
				 ?>
				</div>	
				  
				</div>
			  </li>
			  <li class="list-group-item">
			   <div class="row">
			  <div class="col-md-3 col-lg-3">ราคาปกติ</div>
                <div class="col-md-5 col-lg-5"><input  name="input-price" type="text" class="form-control" placeholder="Number(0)" value=""></div>	
				  <div class="col-md-4 col-lg-4">&nbsp; </div>
				</div>
			  </li>
			   <li class="list-group-item">
			   <div class="row">
			  <div class="col-md-3 col-lg-3">ราคาโปรโมชั่น (SALE)</div>
                <div class="col-md-5 col-lg-5"><input name="input-price2" type="text" class="form-control" placeholder="Number(0)" value=""></div>	
				  <div class="col-md-4 col-lg-4">&nbsp; </div>
				</div>
			  </li>
				<li class="list-group-item">
			   <div class="row">
			  <div class="col-md-3 ">น้ำหนักสินค้า</div>
                <div class="col-md-5"><input  name="input-weight" type="text" class="form-control" placeholder="Number(0)" value=""></div>	
				  <div class="col-md-4">&nbsp;</div>
				</div>
			  </li> 
			  <li class="list-group-item">
			   <div class="row">
			  <div class="col-md-3">วันที่เปิดขาย</div>
                <div class="col-md-5 "><input  name="input-open" type="text" class="form-control datepicker" value=""></div>	
				  <div class="col-md-4 ">&nbsp; </div>
				</div>
			  </li>
			  <li class="list-group-item">
			   <div class="row">
			  <div class="col-md-3 ">จำนวนสินค้า Stock</div>
                <div class="col-md-2 "> <label class="radio-inline"><input type="radio" name="Radio1" id="Radio1" value="1" checked>มี</label><label class="radio-inline"><input type="radio" name="Radio1" id="radio2" value="0">ไม่มี</label></div>	
				  <div class="col-md-3"><input type="text" name="input-amount" id="amountxt" class="form-control " placeholder="ใส่จำนวนสินค้าที่มีอยู่  Number (0000)" value=""></div>
				</div>
			  </li>
			   <li class="list-group-item">
			   <div class="row">
			  <div class="col-md-3">Detail Eng</div>
                <div class="col-md-5 ">
				 
				 <textarea  id="input-other" name="input-other" rows="4" class="form-control"  maxlength="700" ></textarea> 
				</div>	
				 <div class="col-md-4 col-lg-4"></div>			<!-- &nbsp;limit 500 characters -->
				</div>
			  </li>
			   <li class="list-group-item">
			   <div class="row">
			  <div class="col-md-3">รายละเอียด</div>
                <div class="col-md-5 ">
				 
				 <textarea   name="input-other2" rows="4" class="form-control" maxlength="700" ></textarea> 
				</div>	
				 <div class="col-md-4 col-lg-4"></div>			<!-- &nbsp;limit 500 characters -->
				</div>
			  </li>
			  <li class="list-group-item">
			   <div class="row">
			  <div class="col-md-3 "><p class="h3">สินค้าขาย  best saller</p></div>
                <div class="col-md-2 "><label class="radio-inline"><input type="radio" name="Radio2"   value="0" checked>ไม่แสดง</label><input type="radio" name="Radio2"  value="1" >แสดง</label><label class="radio-inline"></div>	
				  <div class="col-md-3"> </div>
				</div>
			  </li>
			 <li class="list-group-item">
			  <!--  <input type="file" name="files[]"/>  multiple -->
			
	<div class="input_holder">
	  <p >Adds Image More</p>
		<input type="file" name="files[]" id="input_clone" /> 
		<input type="text"   id="name_clone" name="name_clone[]"  placeholder="Description Images"   />
	</div>
		<input id="input-num" name="input-num" type="hidden" value="1" > <!--num text box images -->
		<input id="input-post" name="input-post" type="hidden" value="<?php  echo $id_news2; ?>" >
		<br/>
		
		<div>
	
	 <span id="add-btn" class="btn btn-black sharp"><span class="glyphicon glyphicon-plus"></span></span>
	  <span id="remove-btn" class="btn btn-black sharp"><span class="glyphicon glyphicon-minus"></span></span>
		</div>
 			</li>
	 <li class="list-group-item"> 
				 <div class="row">
				 <div style="width:30%; float:none; margin-left:auto; margin-right:auto;">
			<!-- 	<button  name="submit" class="btn btn-block btn-success " />input</button> -->
				
	<div ><button id="submitBtn" class="btn btn-white sharp" >Send Data</button></div>
				</div>
				 </div>
	 </li>
	</ul>
	</form>
   </div>
    
	</div>
 
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
	
 
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="../js_admin/bootstrap.min.js"></script>
    <script src="../js_admin/holder.js"></script>
	
  </body>
</html>