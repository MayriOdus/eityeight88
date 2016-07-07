<?php   
 
	$_SESSION["dir"] = "../";

	//cheang path css image  js only not include all php
	$dirroot = $_SESSION["dir"];
 
?>
 	 
<!-- Add fancyBox main JS and CSS files -->
<script type="text/javascript" src="../js_admin/fancyBox/source/jquery.fancybox.js?v=2.1.5"></script>
<link rel="stylesheet" type="text/css" href="../js_admin/fancyBox/source/jquery.fancybox.css?v=2.1.5" media="screen" />

<!-- Add Media helper (this is optional) -->
<script type="text/javascript" src="../js_admin/fancyBox/source/helpers/jquery.fancybox-media.js?v=1.0.6"></script>
<link rel="icon" type="image/png" sizes="32x32" href="../images/favicon-32x32.png">

<!-- <link rel="shortcut icon" type="image/png" href="images/icon.png"> -->
<link rel="shortcut icon"  href="../images/favicon2.ico"  type="image/x-icon" />
<link rel="stylesheet" type="text/css" href="../js_admin/SI-hover-effects/css/social.css" />

<!--[if lt IE 7]>
	<style type="text/css">
		#wrapper { height:100%; }
	</style>
<![endif]-->

<script type="text/javascript">
<!--

$(function() {

	cartload ();

	var pgurl = window.location.href.substr(window.location.href.lastIndexOf("/")+1);
	//alert(pgurl);

	$("#nav-head li a").each(function(){
		if($(this).attr("href") == pgurl)
		// $(this).addClass("active");
		$(this).addClass("active");

		//alert($(this).attr("href")); //class="active"
		return false; 
	});

	$(".fancybox").fancybox({
		openEffect	: 'none',
		closeEffect	: 'none'
	});

	$(".fancybox").fancybox({
		nextEffect: 'fade',
		prevEffect: 'fade',
		helpers:  {
			thumbs : {
				width: 50,
				height: 50
			}
		}	
	});

	$('.fancybox-media')
		.attr('rel', 'media-gallery')
		.fancybox({
			helpers : {
				media : {},
				buttons : {}
			}
		});

	var container = $( "#collapse1" );

	$('.nav-toggle').click(function(event){
		//get collapse content selector
		var collapse_content_selector = $(this).attr('href');					
		event.preventDefault();
		//make the collapse content to be shown or hide

		var toggle_switch = $(this);
		if ( container.is( ":visible" ) )
		{
			// Hide - slide up.
			container.slideUp("slow");
			//toggle_switch.html('Show');
		} 
		else 
		{
			// Show - slide down.
			container.slideDown("slow");
			//toggle_switch.html('Hide');
		}
	});

});

function Langu(tran)
{		
	var pge = window.location.href.substr(window.location.href.lastIndexOf("/")+1);
	var goUrl;
		 
	switch (tran) 
	{
		case "en": 
				goUrl = "../en/" + pge;
				window.location.href= goUrl;
			break;
		case "th":  
				goUrl = "../th/" + pge;
				window.location.href= goUrl;
			break; // it encounters this break so will not continue into 'case 2:'

		default:
			goUrl = "../en/" + pge;
			window.location.href= goUrl;
	}
} //function 
 
function cartload ()
{
	$('#loadcart').load("load_cart.php");// , {'group_no':track_load}
}

//-->
</script>
<?php  
	 
/*	
if( $talk =="th" ){
//	id 	code_product 	name_th 	name_eng 	types 	id_color 	weights 	costs 	amount 	sale_cost 	stocks 	post_id 	details 	detail_th 	opendate 	timep
$txt1 = "Makeup";
$txt2 = "Skin";
$txt3= "ข่าวสาร &amp;";
$txt4= "ออกระบบ";
$txt5="เข้าสู่ระบบ";
$txt6="เกี่ยวกับเรา";
$txt7="ติดต่อเรา";
$txt8="ช่องทางติดตาม";

}else if( $talk =="en" ){ */
$txt1 = "Makeup";
$txt2 = "Skin";
$txt3 = "New &amp; Events";
$txt4= "logout";
$txt5="Login";
$headtxt = "Shopping Cart";		
$txtcode = "Code product";
$tytxt= "Type";
$coltxt= "Color";
$costtxt1="Price";
$costtxt2="Sale";
$qtytxt="QTY";
$detxt="Detail";
$removetxt="REMOVE";

$datahead = "";
 
if( isset($_SESSION["member_ns"]) )
{
	$is = $_SESSION["member_ns"];
	$idSQL ="SELECT * FROM users WHERE id ='$is'";
	$idQuery = mysqli_query($connect, $idSQL); //or die ($error)
	$cok_num = mysqli_num_rows($idQuery);
	if($cok_num > 0)
	{
		while($idResult = mysqli_fetch_array($idQuery))
		{
			$idlogin = $idResult['id_user'];
			$usn = $idResult['id'];
			$uname = $idResult['username'];
			$lname = $idResult['lastname'];
			$pass = $idResult['password'];
			$act2 = $idResult['activecode2'];
			$emailn = $idResult['email'];
			$typeu = $idResult['type_user'];		 
			$_SESSION["member_ns"] = $idResult['id'];
			$_SESSION["member_id"] = $idResult['id_user'];
			$_SESSION["member_username"] = $idResult['username'];
			$_SESSION["type"] = $idResult['type_user'];	   
			$ns = $_SESSION["member_ns"]; 
		}

		$datahead .="<li><a href='backoffice-adm.php'>".$uname."'s</a></li>";
		$datahead .="<li><a href='remove-sess.php'>".$txt4."</a></li>";			 
	} 
}
else
{					
	$datahead .= "<li><a href='../en/'>".$txt5."</a></li>"; 
}	
?> 

<!-- Custom styles for this template -->

<link rel="stylesheet" href="../font-awesome/css/font-awesome.min.css">
	  
<div class="navbar navbar-default-my navbar-fixed-top hidden-xs">
	<div class="navbar-inner">
		<div class="container" style="background-color: #EDEDED; border-bottom:1px solid #FFFFFF;" >    <!-- #F04E23; --> 
			<div class="row">	  

				<div class="col-xs-12 col-sm-8 col-md-9">
					<ul class="nav navbar-nav">
						<li><a href="../index.php"><span class="glyphicon glyphicon-home"></span></a></li>
						<?php 	echo $datahead ; ?>			 
					</ul>
				</div> 
				<div class="col-xs-12 col-sm-4 col-md-3" style="padding-top:10px;"><p class="h4" style="color:#000000;">Menagement Page</p></div>
			</div>
		</div>
	</div><!-- div innner	  -->
</div> 
  
 
<div style="margin-top:50px;"><div>  
   