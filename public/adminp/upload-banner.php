<?php 
session_start();
 ob_start();
  include_once 'conn.php';
  // include 'resize.php';
  
 ?>
 <html>
<head>
	<title> </title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
 
 
</head>
 <script type="text/javascript">
 
function Redirect(id)
{
    window.location="backoffice-adm-banner.php";
}
 
</script>
<body>
<?php 
  
 if(isset($_SESSION["member_id"])){
 
		 $s_id = $_SESSION["member_id"];
		 $s_user = $_SESSION["member_username"];	 
		  $name  = $_POST['cat']	;	// $_POST['input-name']				  
		  $timepost =  date('d-M-y H.i.s');		
		 
		 $img_time = date('dmY His');
			  
		 if(!empty($_FILES['files']['name'])){
		 
		 	
			 
			 
				  $img_time =  date('dmyyHis');
				   $filenamenews = $img_time.$_FILES['files']['name'];
				   $desired_dir="../images/banner/".$filenamenews;
				   if (is_uploaded_file($_FILES['files']['tmp_name']) && $_FILES['files']['error']==0) {
				$path = $desired_dir;
				if (!file_exists($path)) {
				  if (move_uploaded_file($_FILES['files']['tmp_name'], $path)) {
					echo "The file was uploaded successfully.";
					
				  } else {
					echo "The file was not uploaded successfully.";
				  }
				   
					 $insert ="INSERT INTO banners(id,img,descript,timep)";
					  $insert .= "VALUES(NULL,'$filenamenews','$name','$img_time')";
					 mysqli_query($connect, $insert);	
				 echo "<script>setTimeout('Redirect()', 2000);</script>";   
				} else {
				  echo "File already exists. Please upload another file.";
				  echo "<script>setTimeout('Redirect()', 2000);</script>";  
				}
			  } else {
				echo "The file was not uploaded successfully.";
				echo "(Error Code:" . $_FILES['files']['error'] . ")";
				echo "<script>setTimeout('Redirect()', 2000);</script>";  
			  }
		//  id 	img 	descript 	timep
		
		}
 
}else{
			 echo "<script>setTimeout('Redirect()', 2000);</script>";  
	 
 }
?>
</body>
</html>