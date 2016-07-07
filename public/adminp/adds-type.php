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
    
   <?php  include("headhtml.php") ?>
  
   
	 
 
	 
	<script>
	 
$(document).ready(function(){
	 
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
		 
		 
  ?><p class="h4">Adds Type Products</p>
  <form action="upload-logo.php" method="POST" enctype="multipart/form-data">
    <ul class="list-group">
			 
			  
	  <li class="list-group-item">
			   <div class="row">
			  <div class="col-md-3 col-lg-3"><p>Name</p></div>
                <div class="col-md-5 col-lg-5"><input id="input-name" name="input-name" type="text" class="form-control"  value="" ></div>	
				<div class="col-md-4 col-lg-4"></div>
				</div>
	 </li>			    
	  <li class="list-group-item">
			   <div class="row">
			  <div class="col-md-3 col-lg-3"><p>ชื่อชนิดภาษาไทย</p></div>
                <div class="col-md-5 col-lg-5"><input   name="input-name-th" type="text" class="form-control"  value="" ></div>	
				<div class="col-md-4 col-lg-4"></div>
				</div>
	 </li>
	<li class="list-group-item">
			   <div class="row">
			  <div class="col-md-3 col-lg-3"><p>Type Code</p></div>
                <div class="col-md-5 col-lg-5"><input  name="input-type" type="text" class="form-control"  value="" ></div>	
				<div class="col-md-4 col-lg-4"></div>
				</div>
	 </li>	   	 
	<!-- <li class="list-group-item">
				<div class="row">
				<div class="col-md-3 col-lg-3"><p>Images</p></div>
				<div class="col-md-9 col-lg-9"><input name="fileu" type="file" id="file"/></div>				 
				</div>
	  </li>
	  -->
 
			 
	 <li class="list-group-item">
				<div class="row">				
				<div class="col-md-3 col-md-offset-4" ><button class="btn btn-white sharp btn-block" >Adds</button></div>				 
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