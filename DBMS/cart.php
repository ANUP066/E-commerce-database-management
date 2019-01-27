<?php

	//echo "<input type='text' value='hello'></input>";

	session_start();

	echo $_POST['p_id']." ";
	echo $_SESSION['C_ID'];

	$host='localhost';
	$user='root';
	$pass='';
	$db='E-Commerce_try';
		
	$con=mysqli_connect($host,$user,$pass,$db);

	$sql="SELECT Price FROM PRODUCT WHERE Product_id=".$_POST['p_id'].";";
	$results = mysqli_query($con, $sql);

	while ($row = mysqli_fetch_array($results))
	{
		foreach($row as $key=>$value) 
		{
			if(strcmp($key,"Price")==0)
			{						
	
				echo " ".$value." ";
				$price=$value;
			
			}
		}
	}

	$sql="SELECT Cart_id FROM CART WHERE Customer_id=".$_SESSION['C_ID'].";";
	$results = mysqli_query($con, $sql);

	while ($row = mysqli_fetch_array($results))
	{
		foreach($row as $key=>$value) 
		{
			if(strcmp($key,"Cart_id")==0)
			{						
	
				echo " ".$value." ";
				$cart_id=$value;
			
			}
		}
	}

	//echo $price.",".$cart_id.",".$_POST['p_id'].",".$_SESSION['C_ID'];

	$sql="INSERT INTO CART_ITEM(Quantity,Cost,Cart_id,Product_id,Customer_id) VALUES (1,".$price.",".$cart_id.",".$_POST['p_id'].",".$_SESSION['C_ID'].");";
	$results = mysqli_query($con, $sql);


?>

<!DOCTYPE html>
<html>
<head>
	<title>Cart</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	 <!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="bootstrap.min.css">

	<!-- jQuery library -->
	<script src="jquery.min.js"></script>

	<!-- Latest compiled JavaScript -->
	<script src="bootstrap.min.js"></script>
	<script type="text/javascript" src="angular.js"></script>

	<style type="text/css">
		table {
			width: 90%;
			display: block;
			margin-left: auto;
			margin-right: auto;
			border: 2px solid black;
		}
		tr {
			border: 2px solid black;
		}
		tr:hover {
			background-color: DarkGray;
		}
		th,td {
			padding-left: 45px;
			padding-right: 45px;
		}
	</style>
</head>
<body>
	<table>
		<tr ng-app="myApp" ng-controller="myCtrl">
			<th ng-repeat="x in header">{{x}}</th>
		</tr>
		<?php

		//$sql="SELECT Product_Name,Price,Rating,Model FROM PRODUCT AS P WHERE P.Product_id IN(SELECT C.Product_id FROM CART_ITEM AS C);";
		$sql="SELECT Product_Name,Price,Rating,Model,B.Brand_Name,S.Supplier_Name FROM PRODUCT AS P,BRAND AS B,SUPPLIER AS S WHERE P.Product_id IN(SELECT C.Product_id FROM CART_ITEM AS C) AND P.Brand_id=B.Brand_id AND P.Supplier_id=S.Supplier_id;";
		$results = mysqli_query($con, $sql);

		//$i=0;
		while ($row = mysqli_fetch_array($results))
		{
			$i=0;
			echo "<tr>";
			foreach($row as $key=>$value) 
			{

				if($i%2!=0){					
					if(strcmp($key,"Price")==0)
					{
						echo "<td>
						<form>
						<span id='span-p".$i."'>".$value."</span>
						<input type='text' value='".$value."' style='display: none;' id='input-p".$i."'></input>
						</td>";
						$i=$i+1;
						continue;
					}
					if(strcmp($key,"Supplier_Name")==0)
					{	
						echo "<td>".$value."</td>";

						echo "<td>
						<span id='span-q".$i."'>1</span>
						<input type='text' value='1' style='display: none;' id='input-q".$i."'></input>
						<button onclick='up(this.id)' id='up-".$i."'>UP</button>
						<button onclick='down(this.id)' id='down-".$i."'>DOWN</button>
						</form>
						</td>";
						$i=$i+1;
						continue;
					}
					echo "<td>".$value."</td>";
					//$brand_name=$value;
				
				}
				$i=$i+1;
			}

			echo "</tr>";
		}

		echo "</table>";

		
	?>
	<script>
		var app = angular.module('myApp', []);
		app.controller('myCtrl', function($scope) {
    		$scope.header = ["Product Name","Price","Rating","Model","Brand","Supplier","Quantity"];
		});

	</script>
</body>
</html>