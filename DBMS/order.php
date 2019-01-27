<?php

	$host='localhost';
	$user='root';
	$pass='';
	$db='E-Commerce_try';
		
	$con=mysqli_connect($host,$user,$pass,$db);


	session_start();
	
	$sql="SELECT CURDATE()";
	$results = mysqli_query($con, $sql);
			
	//print_r($row);
	
	$i=0;
			
	while ($row = mysqli_fetch_array($results)) {					
			//print_r($row);
		$i=$i+1;
						
		foreach($row as $key=>$value) 
		{
			if($i%2!=0)
				$today=$value;
			$i=$i+1;
		}
		$i=0;
					
	}
				
	mysqli_free_result($results);			

	$sql="SELECT Cart_id FROM CART WHERE Customer_id=".$_SESSION['C_ID'].";";
	$results = mysqli_query($con, $sql);

	while ($row = mysqli_fetch_array($results))
	{
		foreach($row as $key=>$value) 
		{
			if(strcmp($key,"Cart_id")==0)
			{						
		
				$cart_id=$value;
				$_SESSION['cart_id']=$cart_id;
				
			}
		}
	}


	$myfile = fopen("newfile.txt", "r");
	$content=fread($myfile,filesize("newfile.txt"));


	if(empty($_POST['mode']) and $content=='1')
	{

		$sql="INSERT INTO ORDERS (Sch_date,Total_Cost,Cart_id) VALUES ('".$today."',".$_SESSION['Total_Cost'].",".$_SESSION['cart_id'].");";
		$results = mysqli_query($con, $sql);

		fclose($myfile);
	}

	$sql="SELECT Order_id FROM ORDERS WHERE Cart_id=".$_SESSION['cart_id'].";";
	$results = mysqli_query($con, $sql);

	$row = mysqli_fetch_array($results); 
	//print_r($row);

	$i=0;
		

	while ($row = mysqli_fetch_array($results))
	{	
		foreach($row as $key=>$value) 
		{
			if(strcmp($key,"Order_id")==0)
			{
				$order_id=$value;
				$_SESSION['order_id']=$value;
				
			}
			$i=$i+1;
		}
	}


	$myfile = fopen("newfile.txt", "r");
	$content=fread($myfile,filesize("newfile.txt"));


	if(empty($_POST['mode']) and $content=='1')
	{
		echo "<div id='mode'>
				<form action='order.php' method='POST'>
					<p>Select mode of payment</p>
					<p><input type='radio' name='mode' value='Cash'>Cash</input></p>
					<p><input type='radio' name='mode' value='Card'>Card</input></p>
					<p><input type='radio' name='mode' value='Net Banking'>Net Banking</input></p>
					<input type='submit' name='sub'>
				</form>
			</div>";

		fclose($myfile);

		$myfile = fopen("newfile.txt", "w");
		$txt=0;
		fwrite($myfile, $txt);
		fclose($myfile);
	}
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Orders/Payment</title>
	</head>
	<style>
		#mode {
			font-family: helvetica;
			position: absolute;
			height: 40%;
			display: flex;
			justify-content: center;
			margin-left: 35%;
			margin-top: 10%;
			/*transform: translate(25%,50%);*/
			border: 2px solid black;
			background-color: white;
			width: 30%;
		}
		body {
			padding: 0;
			margin: 0;
			background-color: #b3ecff;
			font-family: helvetica;
		}
		table {
			width: 66%;
			display: block;
			margin-left: auto;
			margin-right: auto;
			margin-bottom: 3%;
			border: 2px solid black;
		}
		tr {
			height: 50px;
		}
		tr:hover {
			background-color: DarkGray;
		}
		th,td {
			padding-left: 45px;
			padding-right: 45px;
			font-size: 17px;
		}



		ul {
			font-family: helvetica;
		    list-style-type: none;
		    margin: 0;
		    padding: 0;
		    overflow: hidden;
		    background-color: #333;
		}

		li {
		    float: left;
		}

		li a {
		    display: inline-block;
		    color: white;
		    text-align: center;
		    padding: 14px 16px;
		    text-decoration: none;
		}

		li a:hover {
		    background-color: yellow;
		}

		#name {position: relative;margin-left: 1050px;}
		#logout{position: relative;}
		#home{position: relative;}
		</style>
	<body id="body">
		<ul>
		  <?php 
		  	echo "<li><a id='name' href='profile.php'>".$_SESSION['C_NAME']."</a></li>";
		  ?>
		  <li id="cart"><a href="add_to_cart.php">Cart</a></li>
		  <li id="logout"><a href="log-out.php">Log out</a></li>
		</ul>
	</body>
	<script type="text/javascript">
		var mode=document.getElementById('mode');
		if (mode) {
			var body=document.getElementById('body');
			body.setAttribute("style","background-color: LightGray;");
		}

	
	</script>
</html>

<?php

	if(!empty($_POST['mode']))
	{

$sql="INSERT INTO PAYMENT(Amount,Mod_pay,Customer_id,Order_id) VALUES (".$_SESSION['Total_Cost'].",'".$_POST['mode']."',".$_SESSION['C_ID'].",".$order_id.");";
		$results = mysqli_query($con, $sql);
	

		$sql="SELECT DISTINCT P.Product_Name,S.Supplier_Name,Sh.Shipper_id,Sh.Shipper_Name,Total_Cost FROM PRODUCT AS P,SUPPLIER AS S,SHIPPER AS Sh,CART_ITEM AS C,CART WHERE C.Customer_id=".$_SESSION['C_ID']." AND CART.Customer_id=".$_SESSION['C_ID']." AND C.Product_id=P.Product_id AND P.Supplier_id=S.Supplier_id AND P.Supplier_id=Sh.Supplier_id;";
		$results = mysqli_query($con, $sql);

		echo "<br /><br /><br /><br /><table id='table'>";
		
		$row = mysqli_fetch_array($results);
		if(empty($row))
		{
			echo "<h1 id='h1'>No results returned</h1>";
			exit();
		}
			
		$i=0;
		foreach($row as $key=>$value) 
		{
			if($i%2!=0)
			{
				if(strcmp($key,"Shipper_id")==0)
				{
					$i=$i+1;
					continue;
				}
				echo "<th>".$key."</th>";
			}
			$i=$i+1;
		}
		echo "</tr><tr>";
		$i=0;
				
		foreach($row as $key=>$value) 
		{
			if($i%2!=0)
			{
				if(strcmp($key,"Shipper_id")==0)
				{
					$sql="INSERT INTO DELIVERY (Cart_id,Shipper_id) VALUES (".$_SESSION['cart_id'].",".$value.");";
					$delivery_results = mysqli_query($con, $sql);

					$i=$i+1;
					continue;
				}
				echo "<td>".$value."</td>";
			}
			$i=$i+1;
		}
		echo "</tr>";

		$i=0;

		while ($row = mysqli_fetch_array($results)) {					
			echo "<tr>";
			//print_r($row);

			$flag=1;

			foreach($row as $key=>$value) 
			{
				if(strcmp($key,"Shipper_id")==0)
				{
					$sql="INSERT INTO DELIVERY (Cart_id,Shipper_id) VALUES (".$_SESSION['cart_id'].",".$value.");";
					$delivery_results = mysqli_query($con, $sql);

					$i=$i+1;
					continue;
				}
				if($i%2!=0)
				{
					echo "<td>".$value."</td>";
				}
				$i=$i+1;
			}
			$i=0;
			echo "</tr>";
							
		}
		echo "</table>";

	}

	if(empty($_POST['delete']) and !empty($_POST['mode']))
		echo "<form action='cancel.php' method='POST'>
				<input type='text' name='delete' value='delete' style='display: none;' readonly></input>
				<input type='submit' value='Cancel Order' style='margin-left: 71%;cursor: pointer;background-color: #4CAF50; /* Green */border: none;color: white;padding: 15px 32px;text-align: center;text-decoration: none;display: inline-block;font-size: 16px;'></input>
			</form>";


?>
<script type="text/javascript">
	var table=document.getElementById('table');
	if(table) {
		//do nothing
	}
	else
	{
		document.write("<h1 style='width: 50%;display: flex;justify-content: center;padding-bottom: 7%;margin-left: 25%;margin-top: 15%;margin-right: auto;'>No Orders</h1>");
	}
</script>