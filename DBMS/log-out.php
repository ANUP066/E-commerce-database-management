<?php

	session_start();
	echo $_SESSION['C_ID'];

	$host='localhost';
	$user='root';
	$pass='';
	$db='E-Commerce_try';
		
	$con=mysqli_connect($host,$user,$pass,$db);

	$sql="SELECT SUM(Cost) FROM CART_ITEM WHERE Customer_id=".$_SESSION['C_ID'].";";

	$results = mysqli_query($con, $sql);

	//print_r($results);
	$row = mysqli_fetch_array($results); 
	//print_r($row);

	$i=0;
		
	foreach($row as $key=>$value) 
	{
		if($i%2!=0)
			$sum=$value;
		$i=$i+1;
	}

	$sql="UPDATE CART SET Total_Cost=".$sum." WHERE Customer_id=".$_SESSION['C_ID'].";";
	$results = mysqli_query($con, $sql);

	session_destroy();
	header('Location:reg-1.php');

?>