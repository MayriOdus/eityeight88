<?php 
session_start();
 ob_start();
  include_once 'conn.php';
  if(!isset($_SESSION["type_user"]))
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
	  
   
	 <script src="../js_admin/colorpicker/boonep-jquery-hex-colorpicker/src/jquery-hex-colorpicker.js"></script>
	<link rel="stylesheet" href="../js_admin/colorpicker/boonep-jquery-hex-colorpicker/css/jquery-hex-colorpicker.css" />
<script type="text/javascript">
     
$(document).ready(function(){
	// $("#color-picker1").hexColorPicker();
  	$(".color").hexColorPicker({
		"size":5, //length of picker
		"pickerWidth":180, //width of picker (entire hexagonal area) in pixels
		"container":"dialog", //contain picker in standard div, or jquery-ui-dialog: "none", "dialog"
		"innerMargin":10, //margin between elements in pixels
		"style":"box", //block style for individual color options: "hex" or "box"
		"colorizeTarget":true, //colorize background and text of target input: true or false
         "selectCallback":false, //callback after a color were selected
         "submitCallback":false //callback after a color were submitted
		});
});
  
	$(window).load(function() {
	     
       
	});
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
		    
  ?>
   
  <p class="h4">Adds Color</p>
  <form action="upload-color.php" method="POST" enctype="multipart/form-data">
    <ul class="list-group">
			 
			  
	  <li class="list-group-item">
			   <div class="row">
			  <div class="col-md-3 col-lg-3"><p>Color Name</p></div>
                <div class="col-md-5 col-lg-5"><input id="input-name" name="input-name" type="text" class="form-control"  value="" ></div>	
				<div class="col-md-4 col-lg-4"></div>
				</div>
	 </li>			    
	  <li class="list-group-item">
			   <div class="row">
			  <div class="col-md-3 col-lg-3"><p>ชื่อภาษาไทย</p></div>
                <div class="col-md-5 col-lg-5"><input   name="input-name-th" type="text" class="form-control"  value="" ></div>	
				<div class="col-md-4 col-lg-4"></div>
				</div>
	 </li>
	<li class="list-group-item">
			   <div class="row">
			  <div class="col-md-3 col-lg-3"><p>Code</p></div>
                <div class="col-md-5 col-lg-5"><input class="color form-control" value="#CCCCCC" style="background-color:#CCCCCC; color:#666;" placeholder="" name="input-code"> </div>	 <!-- -->
				<div class="col-md-4 col-lg-4"></div>
				</div>
	 </li>	   	 
	<!-- <li class="list-group-item">
				<div class="row">
				<div class="col-md-3 col-lg-3"><p>Images</p></div>
				<div class="col-md-9 col-lg-9"><input type="file" name="files[]" id="input_clone" /> </div>				 
				</div>
	  </li>
	-->
			 
	 <li class="list-group-item">
				<div class="row">				
				<div class="col-md-3 col-md-offset-4" ><button class="btn btn-white sharp btn-block" >Create Color</button></div>				 
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