<?php 
session_start();
 ob_start();
  include_once 'conn.php';
  
   include 'resize.php';
    
 ?>
 <html>
    <meta charset="utf-8">
<head>
 
   <script type="text/javascript">
 
function Red(id)
{
    window.location="input-news.php?type="+id;
}
 function Redirect2(id)
{	
	window.location="backoffice-adm-news.php";
	/*if(id=="1"){
	window.location="backoffice-adm-news.php";
	}else if(id=="2"){
	window.location="backoffice-adm-gallery.php";	
	}else if(id=="3"){
	window.location="backoffice-adm-review.php";	
	}
	*/
}
</script>
  
</head>
 
<body>
<?php  
	$s_id = $_SESSION["member_id"];
	 $ids =  $_SESSION["member_ns"];
	 // $type = $_POST['hid-types']; 
	if(!empty($_POST['input-topic'])&&!empty($_POST['input-topic2'])){ 
		 
		$topic = $_POST['input-topic'];
		$topic2 = $_POST['input-topic2'];
		 $type =$_POST['post_type'];		
		$detail = $_POST['input-other'];
		$detail2 = $_POST['input-other2'];
		$id_post = $_POST['input-idpost']; 
	 	$timepost =  date('d-M-y h.i.s'); 
		$vdolink = $_POST['vdo'];
		 $taghtml =  "<ol><li><ul><br><hr><b><i><em><a>";
		  $aa = strip_tags($detail,$taghtml);
		   $bb = strip_tags($detail2,$taghtml);
	if(!empty($_FILES['files']['name'][0])){
		$n_title  = ''; //$_POST['name_clone'][0];
		$errors= array();
		foreach($_FILES['files']['tmp_name'] as $key => $tmp_name ){
	  	$file_name = $_FILES['files']['name'][$key];
	//	echo $key;
		$file_size =$_FILES['files']['size'][$key];
		$file_tmp =$_FILES['files']['tmp_name'][$key];
		$file_type=$_FILES['files']['type'][$key];	
		/* name title */
		  $n_title  =  '';// $_POST['name_clone'][$key];
		 
		
        $desired_dir="../images/upload/news/";
		 
        if(empty($errors)==true){
            if(is_dir($desired_dir)==false){
                mkdir("$desired_dir", 0777);		// Create directory if it does not exist
            }
            if(is_dir("$desired_dir/".$file_name)==false){
				//move_uploaded_file($file_tmp,"$desired_dir/".$file_name);
				 $newimages = resize($file_name,$file_type,$file_tmp,$desired_dir,600);
            }else{									// rename the file if another one exist
                $new_dir="$desired_dir/".$file_name.time();
               //  rename($file_tmp,$new_dir) ;				
            }
			//` id`, `post_id`, `brand_car`, `id_user`, `picture_name`, `times`
		 $query="INSERT INTO upload_data_news(id,file_name,post_id,times,name_title,types)";
		 $query.="VALUES('','$newimages','$id_post','$timepost','$n_title','$type');";		 
			mysqli_query($connect, $query);	
			 $queryContent ="INSERT INTO content_news(id,id_post,topice,topice_th,type_news,timep,details,details_th,vedios)";
			  $queryContent .="VALUES(NULL,'$id_post','$topic','$topic2','$type','$timepost','$aa','$bb','$vdolink ')";// $vdolink $detail2 $detail $timepost
			  mysqli_query($connect, $queryContent);
			}else{
                print_r($errors);
			}
		 		
		} 
		   echo "<script>setTimeout('Redirect2(".$type.")', 2000);</script>";
			echo "<div align='center' style='padding-top:10%; '><p class='h4'>processing...</p><img src='../images/loader2.gif'></div>";		   
		 
		} else{
	 // id 	id_post 	topice 	topice_th 	type_news 	timep 	details 	details_th 	vdolink 
	 $queryContent ="INSERT INTO content_news(id,id_post,topice,topice_th,type_news,timep,details,details_th,vdolink)";
	  $queryContent .="VALUES(NULL,'$id_post','$topic','$topic2','$type','$timepost','$aa',' $bb','$vdolink');";
	  mysqli_query($connect, $queryContent);
	   
	// echo "<script>setTimeout('Redirect2(".$type.")',1000);</script>"; 
		 echo "<div align='center' style='padding-top:10%; '><p class='h4'>processing...</p><img src='../images/loader2.gif'></div>";
		 
		}// images
			
	 
	}else{
	 
		echo "<script>setTimeout('Red(".$type.")',1000);</script>";
		 echo "<div align='center' style='padding-top:10%;'><p class='h4'>processing...</p><img src='../images/loader2.gif'><br/>cant' input data</div>";
	}
?> 

</body>
</html>