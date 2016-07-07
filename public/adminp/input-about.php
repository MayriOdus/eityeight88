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
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
   <title> </title>	
     
        <?php  include("headhtml.php") ?>
	<!--  <script src="../js_admin/ckeditor/ckeditor.js"></script> -->
 
	 
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
		 
		 $sql="SELECT * FROM about";
		$data = mysqli_query($connect, $sql) or die('Could not get data: ' . mysql_error());
		$num = mysqli_num_rows($data);
		if($num==0){
			//echo "None";
			 $query="INSERT INTO about(id,txt1,txt2,timep,img)";
			 $query.="VALUES('1','','','','');";		 
			 mysqli_query($connect, $query);	
		}
		while($about = mysqli_fetch_array($data)){
			$txt1 = $about['txt1'];
			$txt2 = $about['txt2'];
			 
		}
		
		 
  ?>
  <form action="edit-about.php" method="POST" enctype="multipart/form-data">
    <ul class="list-group">
		  
			  <li class="list-group-item">
			   <div class="row">
			  <div class="col-md-3 ">About Us Eng</div>
                <div class="col-md-8 "><textarea  id="input-other" name="input-other" rows="5" class="form-control"><?php if(!empty($txt2)){
				//	 $string1 = preg_replace('/\s+/', '',$txt1);
				$string1 = $txt1;
					echo $string1;
				}?></textarea> 
				</div>	
				 
				</div>
			  </li>
			  <li class="list-group-item">
			   <div class="row">
			  <div class="col-md-3">เกี่ยวกับเรา </div>
                <div class="col-md-8">		 
				 <textarea  id="input-other2" name="input-other2" rows="5" class="form-control"><?php if(!empty($txt2)){
				//	 $string2 = preg_replace('/\s+/', '',$txt2);
						$string2 = $txt2;
					echo $string2;
				}?></textarea> 
				</div>	
				 
				</div>
			  </li>
		<!-- 	 <li class="list-group-item">
				<div class="row">
				<div class="col-md-3"><p>Images</p></div>
				<div class="col-md-5">
				 <?php  /*
				  if(!empty($img)){
					
					echo '<div style="width:80%;"><img src="images/'.$img.'" class="img-responsive"/></div><br/>';
				}*/
				 ?>
				<input type="file" name="files[]" id="input_clone" />
				</div>	
				<div class="col-md-4">&nbsp;</div>				
				</div>
			</li>-->
 
	 <li class="list-group-item">
	  
				 <div class="row" align="center"><button id="submitBtn"   class="btn btn-white sharp" >Edit About</button> </div>
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
		});
		CKEDITOR.replace( 'input-other2', {
				fullPage: true,
				allowedContent: true,
				extraPlugins: 'wysiwygarea'
		}); */
	</script>
  </body>
</html>