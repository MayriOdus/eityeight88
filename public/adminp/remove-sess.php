<?php  

session_start();
ob_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>

<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title> </title>

    <!-- Bootstrap -->
<link href="../css/bootstrap.min.css" rel="stylesheet">
<link href="../font-awesome/css/font-awesome.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="../js_admin/html5shiv.js"></script>
      <script src="../js_admin/respond.min.js"></script>
    <![endif]-->
	 
 
<script src="../js_admin/jquery-1.10.2.js"></script>
<script src="../js_admin/bootstrap.js"></script>
<script type="text/javascript">

//-->
 
// jQuery URL redirection
$(document).ready( function() {
	url = "../index.php";
	$( location ).attr("href", url);
});

function Redirect()
{
	window.location="../index.php";
}

</script>
   
	 
</head>

 <body>
 <?php 
 
//unset($_SESSION["strName"]); // ลบบาง Session
//unset($_SESSION["strSiteName"]); // ลบบาง Session
 
//setcookie('authorization',"", time()-(60*60*24), "/");
//setcookie("authorization",$db_id);
setcookie("authorization","");
unset($_COOKIE['authorization']);
session_destroy(); // ลบ Session ทั้งหมด
ob_end_flush();
		 
echo "<script>setTimeout('Redirect()', 2000);</script>";  
?>

</body>
</html>