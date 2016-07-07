<?php 
session_start();
 ob_start();
  include_once 'conn.php';
  include 'ip.php';
  
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
    window.location="backoffice-adm-type.php";
}
 
</script>
<body>
<?php 
  
			if(isset($_POST['input-name']) && isset($_POST['input-name-th'])){
 
				 $s_id = $_SESSION["member_id"];
				$s_user = $_SESSION["member_username"];
	 
			 	 $name_eng = $_POST['input-name'];	
				$name2 =$_POST['input-name-th'];
				$ty = $_POST['input-type'];				 
				$timepost =  date('d-M-y H.i.s');		
			  $paths = "../images/types/";
			  $img_time = date('dmYHis');
			  
			/* if( $_FILES['fileu']['tmp_name'] != null ){			 
		      $filename =   $_FILES["fileu"]["name"];
			   // $filename =  $name_place.$_FILES["fileu"]["name"];
			  $images = $_FILES["fileu"]["tmp_name"];
			  $images_file = $_FILES["fileu"]["type"];
	  
			if( $images_file == "image/gif" )
			{
			$ext = ".gif";
			  $bn = basename( $filename,$ext ); 
			}
			if (($images_file=="image/jpg")||($images_file=="image/jpeg")||($images_file=="image/pjpeg"))
			{
			$ext = ".jpg";
			  $bn = basename( $filename,$ext ); 
			}
			if( $images_file =="image/png"){
				$ext = ".png";
				 $bn = basename( $filename,$ext ); 
			}
		  
			 $width=600; 
		     $b_new_images = $img_time.$bn.$ext;
			 $new_images =  $img_time.$bn.$ext;
			 
			$new_name_images_base = $b_new_images;
			$size=GetimageSize($images);
			$height=round($width*$size[1]/$size[0]);
			 if( $images_file == "image/gif" )
			{
			$images_orig = ImageCreateFromGIF($images);
			}
			if (($images_file=="image/jpg")||($images_file=="image/jpeg")||($images_file=="image/pjpeg"))
			{
			$images_orig = ImageCreateFromJPEG($images);
			}
			if( $images_file == "image/png" ) 
			{
			 $images_orig = imagecreatefrompng($images);
			}
			$photoX = ImagesX($images_orig);
			$photoY = ImagesY($images_orig);
			$images_fin = ImageCreateTrueColor($width, $height);
			ImageCopyResampled($images_fin, $images_orig, 0, 0, 0, 0, $width+1, $height+1, $photoX, $photoY);
	 
			  $path = $paths.$new_images;
			switch ($images_file) {
				case 'image/jpeg':
				  imagejpeg($images_fin, $path, 100);
				  break;
				case 'image/png':
				  imagepng($images_fin, $path, 0);
				  break;
				case 'image/gif':
				  imagegif($images_fin, $path);
				  break;
				default:
				  exit;
				  break;
			  }
			ImageDestroy($images_orig);
			ImageDestroy($images_fin); 
			
				$nameimages1 = $new_name_images_base;
				}
				  else {
				 $nameimages1 = NULL;
				}/*************************************************************/
	    	 	$nameimages1 = NULL;
				$insert ="INSERT INTO type_product(id,name_eng,name_th,id_type,icon_img)";
				$insert .= "VALUES(NULL,'$name_eng','$name2','$ty','$nameimages1')";
				$add = mysqli_query($connect, $insert); 
				 echo "<script>setTimeout('Redirect()', 2000);</script>";  
			 
	 }else{
		  echo "<script>setTimeout('Redirect()', 2000);</script>";  
	 }
 
 
?>
</body>
</html>