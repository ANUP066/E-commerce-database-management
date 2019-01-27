<?php

	$host='localhost';
	$user='root';
	$pass='';
	$db='E-Commerce_try';
		
	$con=mysqli_connect($host,$user,$pass,$db);
	
	session_start();

	if (!empty($_POST['delete'])) {
		echo $_POST['delete'];

		echo $_SESSION['order_id'];
		$sql="DELETE FROM PAYMENT WHERE Order_id=".$_SESSION['order_id'].";";
		$results = mysqli_query($con, $sql);

		$sql="DELETE FROM ORDERS WHERE Order_id=".$_SESSION['order_id'].";";
		$results = mysqli_query($con, $sql);		  		
	}

	header('Location: order.php');


?>