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
 
<html>
<head>
 
   <?php  include("headhtml.php") ?>
  
   
	 
</head>
<script>
  function admin(){
	   window.location="backoffice-adm.php";
	} 
	 
 function Redirect()
{
    window.location="../en/login-form.php";
}
	function changed() {
	//var valid;	
	 
	//valid = checkPasswordMatch()

	//if(valid) {
	//	alert (valid);
	var str = $( "form" ).serialize();
		jQuery.ajax({
		url: "changeCountry.php",
		data: str,
		type: "POST",
		success:function(data){
		 
		$("#status").html(data);
					 timer = setTimeout(function () {
                    $('#status').fadeOut();
					}, 3000);
		},
		error:function (){}
		});
		 
	//}
}
 
 
	 $(document).ready(function(){
	        
		
 
    });
	$(window).load(function() {
		 
       
	});
	</script>

<body>

  <?php  
   if(!isset($_SESSION["type_user"]))
	{		
		  if($_SESSION["type_user"]!="admin"){
			header ("Location:login-form.php");
		  }
	} 
	 /*setcookie("id");
	echo $cokid = $_COOKIE['id'];  
	 $auth = $_COOKIE['authorization'];
	//echo $auth;
	header ("Cache-Control:no-cache");
	//if(!$auth == "ok") {
	 if(empty($auth)) {
		header ("Location:login-form.php");
	//	echo "<script> Redirect();</script>"; 
		exit();
	}
	*/
 
 
   ?>
   
 
  <!-- Header ----------------------------------------------------------------------------------------------->
  <?php  include("inc_header.php");?>
<!-- /Header -->   
		 
      <div class='container'>
    <div class="row">
	<?php 
	  include("badmin.php");
  
		$strSQL ="SELECT * FROM about ";
		$pagep = "";
		//$pagep = "&nis=".$iuser."&nse=".$usn;
		//$strSQL .= "id_users ='".$iuser."' and visible='1'" ;	 
		//$pagep = "&nis=".$iuser."&nse=".$usn;
		 
	$error = '<div align="center"><div class="alert" style="margin-top:200px;"><p class="h3">ค้นหาไม่พบ</p>';
	$error .='<a id="aback" href="javascript:void(0);"><p>กลับไปหน้าค้นหา</p></a></div></div>';
 
  
	$objQuery = mysqli_query($connect, $strSQL) or die ($error) ; //or die ($error)
	$Num_Rows = mysqli_num_rows($objQuery);
$Per_Page = 8;   // Per Page item get form database
 
  if (!isset($_GET['Page'])) {
    $Page = 1;
} else {
    $Page = $_GET['Page'];
}

$Prev_Page = $Page-1;
$Next_Page = $Page+1;
$Page_Start = (($Per_Page*$Page)-$Per_Page);
 $Page_Start;
if($Num_Rows<=$Per_Page)
{
	$Num_Pages =1;
}
else if(($Num_Rows % $Per_Page)==0)
{
	$Num_Pages =($Num_Rows/$Per_Page) ;
}
else
{
	$Num_Pages =($Num_Rows/$Per_Page)+1;
	$Num_Pages = (int)$Num_Pages;
}
   $strSQL .=" LIMIT $Page_Start , $Per_Page";
	$objQuery  = mysqli_query($connect, $strSQL);
	
	?>
	  
   </div><!--row -->
   
   
   <div class="clearfix"></div>  <!--
   <div class="panel panel-default">
  <!-- Default panel contents 
  <div class="panel-heading">
  </div>
   
  <!-- Table -->
  <div class="row">
  <div class="col-md-12" style="border:1px solid #000; margin-top:-11px;">
  <p class="h4">Abouts<a href="input-about.php" class="btn btn-white sharp pull-right">Edit About Us</a></p>
  <div class="clearfix"></div>
  <div class="table-responsive">
  <table  >
              <tbody>
                
<?php 
while($info = mysqli_fetch_array($objQuery))
{ 
// id,code_product,name_th,name_eng,types,id_color,weights,costs,amount,sale_cost,stocks,post_id,details,opendate,timep
	$id = $info['id'];
	$i1 = $info['txt1'];
	$i2= $info['txt2'];
	$timep = $info['timep'];
 	 $img = $info['img'];
 	 
	echo '<tr>';
	echo '<td class="col-md-2" valign="top"><p><span class="small">'.$timep.'</span></p></td>';
	echo '<td class="col-md-8" valign="top"><p class="col-md-12 col-xs-12 col-sm-12" >'.$i1.'</p></td>';
	echo ' </tr><tr>';
	echo '<td class="col-md-2" valign="top"> </td>';
	echo '<td class="col-md-8" valign="top"><p class="col-md-12 col-xs-12 col-sm-12" >'.$i2.'</p></td>'; 
	echo '</tr>';
	//<a href="change-logo.php?id='.$id_post.'" class="btn btn-warning btn-xs">Change</a>&nbsp;
}
?>
  </tbody>
</table>
</div>
</div><!-- panel -->
  </div>
 
	 
	 
	 
	 </div>
 <!-- 
	 <script type="text/javascript">
			$(document).ready(function ($) {

				// delegate calls to data-toggle="lightbox"
				$(document).delegate('*[data-toggle="lightbox"]', 'click', function(event) {
					event.preventDefault();
					return $(this).ekkoLightbox({
						onShown: function() {
							if (window.console) {
								return console.log('Checking our the events huh?');
							}
						}
					});
				});

				//Programatically call
				$('#open-image').click(function (e) {
					e.preventDefault();
					$(this).ekkoLightbox();
				});
				$('#open-youtube').click(function (e) {
					e.preventDefault();
					$(this).ekkoLightbox();
				});
			});
		</script>
		-->
</body>
</html>