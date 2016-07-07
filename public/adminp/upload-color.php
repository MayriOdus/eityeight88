<?php 
session_start();
 ob_start();
  include_once 'conn.php'; 
    include 'resize.php';
 ?>
 <html>
<head>
	<title> </title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
 
 
</head>
 <script type="text/javascript">
 
function Redirect()
{
    window.location="backoffice-adm-color.php"  ;
}
 
</script>
<body>
<?php 
  
			if(isset($_POST['input-name']) && isset($_POST['input-name-th'])){ 
				 $s_id = $_SESSION["member_id"];
				$s_user = $_SESSION["member_username"];	 
			 	 $name_eng = $_POST['input-name'];	
				$name2 =$_POST['input-name-th'];
				$code= $_POST['input-code'];				 
				$timepost =  date('d-M-y H.i.s');		
			//  $paths = "images/colors/";
			  $img_time = date('dmYHis');
	 
		if(!empty($_FILES['files']['name'][0])){
		 $n_title  =  '';//$_POST['name_clone'][0];
		$errors= array();
		foreach($_FILES['files']['tmp_name'] as $key => $tmp_name ){
	  	$file_name = $_FILES['files']['name'][$key];
	 
		$file_size =$_FILES['files']['size'][$key];
		$file_tmp =$_FILES['files']['tmp_name'][$key];
		$file_type=$_FILES['files']['type'][$key];	
		/* name title */
		$n_title  = '';// $_POST['name_clone'][$key];
		}
		
			$desired_dir="images/upload/color/";
		 
				$nameimages1 = resize($file_name,$file_type,$file_tmp,$desired_dir,60);
				} else {
				 $nameimages1 = NULL;
				}/*************************************************************/
	    	 	
				$insert ="INSERT INTO color_product(id,code_color,name_eng,name_th,icon_img)";
				$insert .= "VALUES(NULL,'$code','$name_eng','$name2','$nameimages1')";
				$add = mysqli_query($connect, $insert); 
		 	 echo "<script>setTimeout('Redirect()', 2000);</script>";  
				 
	 
	 
	 }else{
		  echo "<script>setTimeout('Redirect()', 2000);</script>";  
	 }
 
 
?>
</body>
</html>