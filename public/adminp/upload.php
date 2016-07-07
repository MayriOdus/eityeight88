<?php 
session_start();
 ob_start();
  include_once 'conn.php';
   include 'ip.php';
   include 'resize.php';
   // $ipaddress = $_SERVER['REMOTE_ADDR'];
   
 
 ?>
 <html>
<head>
 
   <script type="text/javascript">
 
function Redirect()
{
    window.location="input-data.php";
}
 function Redirect2(id)
{
    window.location="backoffice-adm.php";
}
</script>
  
</head>
 
<body>
<?php  
	 
	if($_POST['input-model'] && $_POST['input-model2']){
		$model = $_POST['input-model'];
		$model2 = $_POST['input-model2'];		 
		
		$prod_id =  $_POST['input-idprod'];
		$post_type = $_POST['post_type'];
		$gprice =$_POST['input-price'];	
		$gprice2 =$_POST['input-price2'];	
		$gweight= $_POST['input-weight'];
		$opensale = $_POST['input-open'];
		$radio =  $_POST["Radio1"];
		$radio2 =  $_POST["Radio2"];
		$amount = $_POST["input-amount"];
		$detail = $_POST['input-other'];
		$detail2 = $_POST['input-other2'];		
	 	$timepost =  date('d-M-y h.i.s');
		$id_post = $_POST['input-idpost'];
		
		$ids = $_SESSION["member_id"];
		$timepost2 =  date('dmyis');
		//$idc=  $_POST['hidcolor'];
		//$idcolor = $idc.$timepost2;
		$idcolor =  $_POST['hidcolor'];
		 
			 
	if(!empty($_FILES['files']['name'][0])){
		 $n_title  =  $_POST['name_clone'][0];
		$errors= array();
		foreach($_FILES['files']['tmp_name'] as $key => $tmp_name ){
	  	$file_name = $_FILES['files']['name'][$key];
	 
		$file_size =$_FILES['files']['size'][$key];
		$file_tmp =$_FILES['files']['tmp_name'][$key];
		$file_type=$_FILES['files']['type'][$key];	
		/* name title */
		$n_title  =  $_POST['name_clone'][$key];
		 
		
        $desired_dir="../images/upload/";
		$desired_dir2="../images/upload/zoom/";
		 
			if(empty($errors)==true){
				if(is_dir($desired_dir)==false){
					mkdir("$desired_dir", 0777);		// Create directory if it does not exist
				}
				if(is_dir("$desired_dir/".$file_name)==false){
			 
					
				}else{						 
					$new_dir="$desired_dir/".$file_name.time();
				}
			 $newimages = resize($file_name,$file_type,$file_tmp,$desired_dir,329);
			 $newimages2 = resize($file_name,$file_type,$file_tmp,$desired_dir2,700);
			 $query="INSERT INTO upload_data(id,file_name,post_id,times,prod_id,name_title)";
			 $query.="VALUES('','$newimages','$id_post','$timepost','$prod_id','$n_title');";		 
			mysqli_query($connect, $query);	
			}else{
                print_r($errors);
			}
		 
		
		}
	 //	echo "1";
		$queryContent ="INSERT INTO product(id,code_product,name_th,name_eng,types,id_color,weights,costs,amo,sale_cost,stocks,post_id,details,detail_th,opendate,shows,timep)";
	 	 $queryContent .="VALUES('','$prod_id','$model2','$model','$post_type','$idcolor','$gweight','$gprice','$amount','$gprice2','$radio','$id_post','$detail','$detail2','$opensale','$radio2','$timepost');";
		   mysqli_query($connect, $queryContent);
		 if(isset($_POST['cb'])){
			// Loop to store and display values of individual checked checkbox.
			/* $checkboxes = isset($_POST['checkbox']) ? $_POST['checkbox'] : array();
foreach($checkboxes as $value) {
    // here you can use $value
} */
				foreach($_POST['cb'] as $selected){
				 //echo  $selected."</br>";
				$queryCo ="INSERT INTO color_select(id,hid_code,post_id,prod_id,code_color)"; //product selected
				  $queryCo .="VALUES('','$idcolor','$id_post','$prod_id','$selected');";
				 mysqli_query($connect, $queryCo);
				}
			}
			if(empty($error)){
				//echo "Success";
			  echo "<script>setTimeout('Redirect2(".$ids.")', 2000);</script>";  
			  echo "<div align='center' style='padding-top:10%; padding-left:0%;'><p class='h4'>processing...</p><img src='../images/loader2.gif'></div>";
			}
		} else{
			//echo "2";
		  $queryContent ="INSERT INTO product(id,code_product,name_th,name_eng,types,id_color,weights,costs,amo,sale_cost,stocks,post_id,details,detail_th,opendate,shows,timep)";
		  $queryContent .="VALUES('','$prod_id','$model2','$model','$post_type','$idcolor','$gweight','$gprice','$amount','$gprice2','$radio','$id_post','$detail','$detail2','$opensale','$radio2','$timepost');";
		  mysqli_query($connect, $queryContent);
		  if(!empty($_POST['cb'])){
			// Loop to store and display values of individual checked checkbox.
				foreach($_POST['cb'] as $selected){
				//echo $selected."</br>";
				$queryCo ="INSERT INTO color_select(id,hid_code,post_id,prod_id,code_color)";
			$queryCo .="VALUES('','$idcolor','$id_post','$prod_id','$selected');";
				 mysqli_query($connect, $queryCo);
				}
			}
			if(empty($error)){
				//	  echo "Success";	
		 	 echo "<script>setTimeout('Redirect2()', 2000);</script>";  
			 echo "<div align='center' style='padding-top:10%; '><p class='h4'>processing...</p><img src='../images/loader2.gif'></div>";
			}
		}// images
			 
	}else{
		//echo "cant' input data ";
		   echo "<script>setTimeout(Redirect,2000);</script>";
		   echo "<div  align='center' style='padding-top:10%;  '><p class='h4'>processing...</p><img src='../images/loader2.gif'></div>";
	}
?>
 

 

</body>
</html>