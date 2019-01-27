<?php

	session_start();

	$host='localhost';
	$user='root';
	$pass='';
	$db='E-Commerce_try';
		
	$con=mysqli_connect($host,$user,$pass,$db);


	if (!empty($_POST['P_ID'])) {
		$sql="DELETE FROM CART_ITEM WHERE Product_id=".$_POST['P_ID']." AND Customer_id=".$_SESSION['C_ID'].";";
		$results = mysqli_query($con, $sql);
	}


	if (!empty($_POST['Increase']))
	{
		$sql="UPDATE CART_ITEM SET Quantity=Quantity+1 WHERE Product_id=".$_POST['p_id']." AND  Customer_id=".$_SESSION['C_ID'].";";
		$results = mysqli_query($con, $sql);

		$sql="SELECT Price FROM PRODUCT WHERE Product_id=".$_POST['p_id'].";";
		$results = mysqli_query($con, $sql);

		while ($row = mysqli_fetch_array($results))
		{
			foreach($row as $key=>$value) 
			{

				if (strcmp($key,"Price")==0) {
					$price=$value;
				}
			}
		}

		$sql="UPDATE CART_ITEM SET Cost=Cost+".$price." WHERE Product_id=".$_POST['p_id']." AND  Customer_id=".$_SESSION['C_ID'].";";
		$results = mysqli_query($con, $sql);

	}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Cart</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="stylesheet" href="bootstrap.min.css">

	<script src="jquery.min.js"></script>

	<script src="bootstrap.min.js"></script>
	<script type="text/javascript" src="angular.js"></script>

	<style type="text/css">
		body 
		{
			background-color: #b3ecff;
		}
		table {
			width: 90%;
			display: block;
			margin-left: auto;
			margin-right: auto;
			border: 2px solid black;
		}
		tr:hover {
			background-color: DarkGray;
		}
		th,td {
			padding-left: 45px;
			padding-right: 45px;
		}

		/*MOD here*/

		ul {
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

		#name {position: relative;margin-left: 92.8%;}
		#logout{position: relative;}
		#home{position: relative;}

	</style>
</head>
<body>
	<ul>
	  <?php 
	  	echo "<li><a id='name' href='profile.php'>".$_SESSION['C_NAME']."</a></li>";
	  ?>
	  <li id="home"><a href="log-in.php">Home</a></li>
	  <li id="logout"><a href="log-out.php">Log out</a></li>
	</ul>
	<br /><br /><br /><br />
	<table>
		<tr ng-app="myApp" ng-controller="myCtrl">
			<th ng-repeat="x in header">{{x}}</th>
		</tr>
		<?php

		$sql="SELECT Product_id,Product_Name,Price,Rating,Model,B.Brand_Name,S.Supplier_Name FROM PRODUCT AS P,BRAND AS B,SUPPLIER AS S WHERE P.Product_id IN(SELECT C.Product_id FROM CART_ITEM AS C WHERE Customer_id=".$_SESSION['C_ID'].") AND P.Brand_id=B.Brand_id AND P.Supplier_id=S.Supplier_id;";
		$results = mysqli_query($con, $sql);

		$j=1;
		while ($row = mysqli_fetch_array($results))
		{
			$i=0;
			echo "<tr>";
			foreach($row as $key=>$value) 
			{

				if (strcmp($key,"Product_id")==0) {
					$P_ID=$value;
					$i=$i+1;
					continue;
				}

				if($i%2!=0){					
					
					echo "<td>".$value."</td>";
				
				}
				$i=$i+1;
			}

			if (!empty($_POST['p_id']))
			{

				$sql="SELECT Quantity FROM CART_ITEM  WHERE Product_id=".$_POST['p_id']." AND  Customer_id=".$_SESSION['C_ID'].";";
				$q_results = mysqli_query($con, $sql);

				while ($q_row = mysqli_fetch_array($q_results))
				{
					$i=0;

					foreach($q_row as $key=>$value) 
					{
						if(strcmp($key,"Quantity")==0)
						{
							echo "<td>".$value;
						}
					}
				}
			}
			else
			{
				//echo "<td>1";
				$sql="SELECT DISTINCT Quantity FROM CART_ITEM  WHERE Product_id=".$P_ID." AND  Customer_id=".$_SESSION['C_ID'].";";
				$q_results = mysqli_query($con, $sql);

				while ($q_row = mysqli_fetch_array($q_results))
				{
					$i=0;

					foreach($q_row as $key=>$value) 
					{
						if(strcmp($key,"Quantity")==0)
						{
							echo "<td>".$value;
						}
					}
				}	
			}

			echo "
			<form name='myForm0' action='add_to_cart.php' method='POST'>
				<input type='text' style='display : none;' name='p_id' value=".$P_ID." readonly='readonly'></input>
				<!--<input type='number' name='quantity' id='quantity".$j."' value='1' min='1' onchange='update(this.id)'></input>-->
				<input type='text' style='display : none;' name='Increase' value='1' readonly='readonly'></input>
				<input type='submit' value='+'></input>
			</form>

			<form name='myForm' action='add_to_cart.php' method='POST'>
				<input type='text' style='display : none;' name='P_ID' value=".$P_ID." readonly='readonly'></input>
				<input type='submit' value='X'></input>
			</form>
			</td></tr>";
			$j=$j+1;
		}

		echo "</table>";

		$sql="SELECT SUM(Cost) FROM CART_ITEM WHERE Customer_id=".$_SESSION['C_ID'].";";

		$results = mysqli_query($con, $sql);

		//print_r($results);
		$row = mysqli_fetch_array($results); 
		//print_r($row);

		$i=0;
			
		foreach($row as $key=>$value) 
		{
			if($i%2!=0)
			{
				$sum=$value;
				$_SESSION['Total_Cost']=$value;
			}
			$i=$i+1;
		}


		echo "<span style='margin-left: 85%;'>Total Cost : ".$sum."</span>";

		echo "<a href='order.php'><button style='margin-left: 84%;background-color: #4CAF50; /* Green */border: none;color: white;padding: 15px 32px;text-align: center;text-decoration: none;display: inline-block;font-size: 16px;'>Place Order</button></a>";

	?>
	<script>
		var app = angular.module('myApp', []);
		app.controller('myCtrl', function($scope) {
    		$scope.header = ["Product Name","Price","Rating","Model","Brand","Supplier","Quantity"];
		});

		function update(i){

				var quantity=document.getElementById(i);
				var tr=quantity.parentNode.parentNode.parentNode;
				var price=tr.children[1];
				var p=price.textContent;

				price.textContent=parseInt(price.textContent)+parseInt(p);
		}
	</script>
</body>
</html>