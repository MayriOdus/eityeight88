 <?php  
session_start();
ob_start();

include_once 'conn.php';
if(!isset($_SESSION["type_user"]))
{		
	if($_SESSION["type_user"]!="admin")
	{
		header ("Location:../en/login-form.php");
	}
} 
?>
 
<!DOCTYPE html>
<html>
<head>
 
	

	<?php  include("headhtml.php") ?>
   
</head>

<script type="text/javascript">
<!--

function admin()
{
	window.location = "backoffice-adm.php";
} 

function Redirect()
{
	window.location = "../en/login-form.php";
}

function changed() 
{
	var str = $( "form" ).serialize();

	$.ajax({
		url: "changeCountry.php",
		data: str,
		type: "POST",
		success:function(data){
			$("#status").html(data);
			timer = setTimeout(function () {
				$('#status').fadeOut();
			}, 3000);
		}
	});
}

//-->
</script>

<body>

<?php  

header ("Cache-Control:no-cache");


include("inc_header.php");

?>
   
<div class='container'>
<div class="row">
	<?php 

		include("badmin.php");
	  
		$strSQL ="SELECT * FROM product ";
		$pagep = "";
		//$pagep = "&nis=".$iuser."&nse=".$usn;
		//$strSQL .= "id_users ='".$iuser."' and visible='1'" ;	 
		//$pagep = "&nis=".$iuser."&nse=".$usn;

		$error = '<div align="center"><div class="alert" style="margin-top:200px;"><p class="h3">ค้นหาไม่พบ</p>';
		$error .='<a id="aback" href="javascript:void(0);"><p>กลับไปหน้าค้นหา</p></a></div></div>';

		$objQuery = mysqli_query($connect, $strSQL) or die ($error) ; //or die ($error)
		$Num_Rows = mysqli_num_rows($objQuery);
		$Per_Page = 8;   // Per Page item get form database
	 
		if (!isset($_GET['Page'])) 
		{
			$Page = 1;
		} 
		else 
		{
			$Page = $_GET['Page'];
		}

		$Prev_Page = $Page-1;
		$Next_Page = $Page+1;
		$Page_Start = (($Per_Page*$Page)-$Per_Page);

		if($Num_Rows <= $Per_Page)
		{
			$Num_Pages = 1;
		}
		else if(($Num_Rows % $Per_Page)==0)
		{
			$Num_Pages = ($Num_Rows/$Per_Page) ;
		}
		else
		{
			$Num_Pages = ($Num_Rows/$Per_Page)+1;
			$Num_Pages = (int)$Num_Pages;
		}

		$strSQL .=" LIMIT $Page_Start , $Per_Page";
		$objQuery  = mysqli_query($connect, $strSQL);

	?>
	  
   </div><!--row -->
   
   
	<div class="clearfix"></div> 

	<!-- Table -->
	<div class="row">
		<div class="col-md-12" style="border:1px solid #000; margin-top:-11px;">
			<p class="h4">Product<a href="input-data.php" class="btn btn-white sharp pull-right">Input Products</a></p>
			<div class="table-responsive">
			<table class="table ">
				<thead>
					<tr>
						<th class="col-md-1">Date</th>
						<th class="col-md-2">Code Product</th>
						<th class="col-md-3">Name Eng</th>
						<th class="col-md-3">ชื่อ</th>
						<th class="col-md-2">Price</th>
						<th class="col-md-1">#</th>

					</tr>
				</thead>
				<tbody>

				<?php 
				while( $info = mysqli_fetch_array($objQuery) )
				{ 
				// id,code_product,name_th,name_eng,types,id_color,weights,costs,amount,sale_cost,stocks,post_id,details,opendate,timep
					$id = $info['id'];
					$i1 = $info['code_product'];
					$i2= $info['name_eng'];
					$i3= $info['name_th'];
					$i4= $info['costs'];	
					$i5= $info['amo'];
					$id_post = $info['post_id'];
					$timep = $info['timep'];
					 
					echo '<tr>';
					echo '<td><span class="small">'.$timep.'</span></td>';
					echo '<td><span class="small">'.$i1.'</span></td>';
					echo '<td><span class="small">'.$i2.'</span></td>';
					echo '<td><span class="small">'.$i3.'</span></td>';
					echo '<td><span class="small">'.$i4.'</span></td>';	 
					echo '<td><a href="delp.php?id='.$id.'" class="btn btn-danger btn-xs">remove</a></td> ';
					echo ' </tr>';
					//<a href="change-logo.php?id='.$id_post.'" class="btn btn-warning btn-xs">Change</a>&nbsp;
				}
				?>
				</tbody>
			</table>
		</div>
	</div><!-- panel -->
</div>

<div class="row">
	<div class='col-md-12'> 
		<p> Total <?php  echo $Num_Rows;?> Record : <?php  echo $Num_Pages;?> Page :
		<?php 
		if($Prev_Page)
		{
			echo " <a href='$_SERVER[SCRIPT_NAME]?Page=$Prev_Page".$pagep."' class='btn btn-my2' ><span class='glyphicon glyphicon-backward'></span></a> ";
		}

		for($i=1; $i<=$Num_Pages; $i++)
		{
			if($i != $Page)
			{
				echo "<a href='$_SERVER[SCRIPT_NAME]?Page=$i".$pagep."' class='btn btn-my2'>$i</a>";
			}
			else
			{
				echo "<span class='btn disabled' ><b> $i </b></span>";//<span class='btn btn-default disabled' >
			}
		}

		if($Page != $Num_Pages)
		{
			echo " <a href ='$_SERVER[SCRIPT_NAME]?Page=$Next_Page".$pagep."' class='btn btn-my2'><span class='glyphicon glyphicon-forward'></span></a> ";
		}

		mysqli_close($connect);
		 
		?>
		</p>
	</div>
</div><!-- pagi -->
	 
</div>
 
</body>
</html>