
<?php 
session_start();
 ob_start();
  include_once 'conn.php';
   include 'resize.php';
  
 ?>
 <html>
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
 <link href="font-awesome-4.3.0/css/font-awesome.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="../js_admin/html5shiv.js"></script>
      <script src="../js_admin/respond.min.js"></script>
    <![endif]-->
</head>
 <script type="text/javascript">
 
function Redirect(n)
{
 //  alert(n);
   
   window.location="backoffice-adm-about.php";
   
}
 
  
</script>
<body>
<?php 
  
				$value ="";
				if(isset($_POST['input-other'])){				 
				 	$a1= $_POST['input-other'];
					$value .= "txt1 = '$a1'"; 
				}
				if(isset($_POST['input-other2'])){
				 	$a2= $_POST['input-other2'];
					$value .= ",txt2 = '$a2' "; 
				}
				/* if(!empty($_FILES['files']['name'][0])){
			 $n_title  =  '';//$_POST['name_clone'][0];
			$errors= array();
			foreach($_FILES['files']['tmp_name'] as $key => $tmp_name ){
			$file_name = $_FILES['files']['name'][$key];
		 
			$file_size =$_FILES['files']['size'][$key];
			$file_tmp =$_FILES['files']['tmp_name'][$key];
			$file_type=$_FILES['files']['type'][$key];	
			// name title  
			$n_title  = '';// $_POST['name_clone'][$key];
			}
		
			$desired_dir="images/";
		 
				$nameimages1 = resize($file_name,$file_type,$file_tmp,$desired_dir,800);
				} else {
				 $nameimages1 = NULL;
				}*/
			if(isset($nameimages1)){
				$value .= ",img = '$nameimages1' ";
			} 
			$timepost =  date('d-M-y h.i.s');
				$value .=  ",timep='$timepost'";
	$update = "UPDATE about SET ";	 
	$update .=$value;
	$update .= " WHERE id = '1' ";
	 mysqli_query($connect, $update);
	//$n =  $_SESSION["member_ns"];
	
	 echo "<script>setTimeout('Redirect()', 1000);</script>"; 
	 echo "<div align='center' style='padding-top:10%; '><p class='h4'>processing...</p><img src='../images/loader2.gif'></div>";
	 
?>

</body>
</html>