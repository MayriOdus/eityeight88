<?php  
	
	
	$host = "localhost";
	$username ="root"; 
	$password =""; 
	$dbname ="eityeight_local_db"; 
	
	 
	date_default_timezone_set("Asia/Bangkok");
  
	$connect = mysqli_connect($host,$username,$password,$dbname);

	// Check connection
	if (mysqli_connect_errno())
	{
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}

	mysqli_set_charset($connect,"utf8");

	if (!$connect)
	{
		echo "Can't connect to Database.";
		mysqli_close($connect); 
		exit();
	}
	 
?>