<?php 
session_start();
 ob_start();
  include_once 'conn.php';
  if(empty($_SESSION["type_user"]))
	{		
		  if($_SESSION["type_user"]!="admin"){
			header ("Location:../en/login-form.php");
		  }
	} 
  
 ?>
<!DOCTYPE html>
<html lang="en">
  <head>
      <?php  include("headhtml.php") ?>
  
   
	 <script src="../js_admin/ckeditor/ckeditor.js"></script>
 
	 
	<script>
	
	 
 
	 
$(document).ready(function(){
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
       
	 
	//	 $("#vdo").attr("disabled", "disabled");
 
	/* $('input[type="checkbox"]').attr('checked', false);
        $('input[type="checkbox"]').click(function(){
            if($(this).prop("checked") == true){
                   $("#vdo").removeAttr("disabled");
			 
            }
            else if($(this).prop("checked") == false){
                $("#vdo").attr("disabled", "disabled");
				 
            }
        }); */
			
		 
});
 
	$(window).load(function() {
	   
       
	});
	//$( '#editor1' ).ckeditor(); // Use CKEDITOR.replace() if element is <textarea>.
	
  </script>
  </head>
  <body>
  
     <?php 
  
    if(empty( $_SESSION["member_ns"]) && empty($_SESSION["member_username"])){
	echo "<script>Redirect();</script>"; 
		
 }else{
	 //$by =  $_SESSION["member_username"];
	 
 }
   ?>
     
<!-- Header ----------------------------------------------------------------------------------------------->
  <?php  include("inc_header.php");?>
<!-- /Header -->  
  <div class="container">
 
  <div style="margin-top:50px;">
  
  <?php 
		/* menu */
		//$ty = $_GET['type'];
		 $sqlnews="SELECT * FROM content_news";
		$datanews = mysqli_query($connect, $sqlnews) or die('Could not get data: ' . mysql_error());
		$id_news= mysqli_num_rows($datanews);
		  $id_news2=$id_news+1; 
		$code =  $id_news2.date("dyis");
  ?>
  <form action="upload-news.php" method="POST" enctype="multipart/form-data">
    <ul class="list-group">
			 <input id="input-idpost" name="input-idpost" type="hidden" class="form-control"  value="<?php  echo $code;?>" >
			<!--  <input id="input-idpost" name="hid-types" type="hidden" class="form-control"  value="<?php  echo $ty;?>" > -->
			  
			 <li class="list-group-item">
			   <div class="row">
			  <div class="col-md-3 col-lg-3">Topic</div>
                <div class="col-md-5 col-lg-5"><input id="input-topic" name="input-topic" type="text" class="form-control"  value="" >						 
				</div>
				    <div class="col-md-4 col-lg-4"><span class="label label-danger">requirement</span></div>
			  </li> 
			<li class="list-group-item">
			   <div class="row">
			  <div class="col-md-3 col-lg-3">ชื่อหัวเรื่อง</div>
                <div class="col-md-5 col-lg-5"><input id="input-topic2" name="input-topic2" type="text" class="form-control"  value="" >						 
				</div>
				    <div class="col-md-4 col-lg-4"><span class="label label-danger">requirement</span></div>
			  </li> 
			   <li class="list-group-item">
			   <div class="row">
			  <div class="col-md-3 col-lg-3">Type News</div>
					<div class="col-md-5 col-lg-5"><select   name="post_type" class="form-control" required="required">
                                <option value="" selected="">SELECT</option>
                                <option value="1">New</option>
                                <option value="2">Reviews</option>
								<option value="3">Tip</option>
                                <option value="4">Gellery</option>
								<option value="5">Event</option>
								<option value="6">Promotion</option>
								 <option value="7">Clip Technic Makeup</option>
                            </select> 					 
				</div>
				    <div class="col-md-4 col-lg-4" ></div>
			  </li>
			  <li class="list-group-item">
			   <div class="row">
			  <div class="col-md-3 ">Detail</div>
                <div class="col-md-5 ">
		 
				 <textarea  id="input-other" name="input-other" rows="4" class="form-control"></textarea> 
				</div>	
				 <div class="col-md-4 "></div> 
				</div>
			  </li>
			  <li class="list-group-item">
			   <div class="row">
			  <div class="col-md-3">รายละเอียด</div>
                <div class="col-md-5">		 
				 <textarea  id="input-other2" name="input-other2" rows="4" class="form-control"></textarea> 
				</div>	
				 <div class="col-md-4"></div> 
				</div>
			  </li>
			  <li class="list-group-item">
			   <div class="row">
			  <div class="col-md-3"> Embed Vedio </div><!-- <input type="checkbox"> -->
                <div class="col-md-5">			 
				 <input id="vdo" name="vdo" type="text" class="form-control" placeholder="EX URL[ https://youtu.be/??????????  Share Youtube ]"  value="" ></div> 
				 <div class="col-md-4">Plase Adds image For Vedio</div> 
				</div>
			  </li>
			  
			 <li class="list-group-item">
			 
			
	<div class="input_holder">
	  <p >Adds Image More</p>
		<input type="file" name="files[]" id="input_clone" /> 
		<!-- <input type="text"   id="name_clone" name="name_clone[]"  placeholder="Description Images"   /> -->
	</div>
		<!-- <input id="input-num" name="input-num" type="hidden" value="1" > 
		<input id="input-post" name="input-post" type="hidden" value="<?php  echo $id_news2; ?>" >
		
		<br/>
		
		<div>
	
	 <span id="add-btn" class="btn btn-default"><span class="glyphicon glyphicon-plus"></span></span>
	  <span id="remove-btn" class="btn btn-default"><span class="glyphicon glyphicon-minus"></span></span>
		</div> -->
 			</li>
	 <li class="list-group-item">
	  
				 <div class="row" align="center"><button id="submitBtn" class="btn btn-white sharp" >Send Data</button> </div>
	 </li>
	</ul>
	</form>
   </div>
    
	</div>
 
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
	
 
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="../js_admin/bootstrap.min.js"></script>
    <script src="../js_admin/holder.js"></script>
	<script>
	 /*
	  CKEDITOR.replace( 'input-other', {
				fullPage: true,
				allowedContent: true,
				extraPlugins: 'wysiwygarea'
			} );
	   CKEDITOR.replace( 'input-other2' , {
				fullPage: true,
				allowedContent: true,
				extraPlugins: 'wysiwygarea'
			}); 
			*/
	</script>
  </body>
</html>