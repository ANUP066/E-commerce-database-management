<?php

	$host='localhost';
	$user='root';
	$pass='';
	$db='E-Commerce_try';
		
	$con=mysqli_connect($host,$user,$pass,$db);

	session_start();

?>
<!DOCTYPE html>
<html>
<head>
	<title>Products</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	 <!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="bootstrap.min.css">

	<!-- jQuery library -->
	<script src="jquery.min.js"></script>

	<!-- Latest compiled JavaScript -->
	<script src="bootstrap.min.js"></script> 
	
	<style type="text/css">
		body {
			overflow-x: hidden;
			background-color: #b3ecff;
		}
		.search {
			position: relative; 
			height: 100px;
		}
		form>input {
			position: absolute;
			top: 50px;
			left: 50%;
			transform: translate(-50%, -50%);
		}
		.controls {
			/*display: none;*/
			position: fixed;
			background-color: DarkGray;
			width: 20%;
			height: 100%;
		}
		#h1 {
			margin-left: 20%;
		}
		table {
			margin-left: 20%;
		}
		td {
			padding: 5%;
			width: 25%;
		}
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

		.row1 {
			position: relative;
			height: 50px;
		}
		.submit {
			margin-top: -6.1%;
			width: 100%;
			height: 105%;
		}
	</style>
	<script src="angular.js"></script>
</head>
<body>
	<div id="fix">
		<ul>
		  <?php 
		  	echo "<li><a id='name' href='profile.php'>".$_SESSION['C_NAME']."</a></li>";
		  ?>
		  <li id="cart"><a href="add_to_cart.php">Cart</a></li>
		  <li id="logout"><a href="log-out.php">Log out</a></li>
		</ul>
		<div class="search col-sm-12">
			<form name="Search" class="s1" action="log-in.php" method="POST">
				<input type="text" name="search" class="col-sm-8" placeholder="Enter search item here" autocomplete="off" />
				<input type="submit" name="sub" value="Search" style="left: 86%;" />
			</form>
		</div>
		<div class="row" ng-app="myApp" ng-controller="myCtrl">
	   		<div class="col-sm-4 row1" style="background-color:lavender;border: 2px solid black;max-width: 100%;">
	   			<form action="log-in.php" method="POST">
	   				<input type="text" name="category" style="display: none;" value="Books" readonly="readonly"></input>
	   				<input type="submit" class="submit" value="Books" name="sub"></input>
	   			</form>
	   		</div>
	   		<div class="col-sm-4 row1" style="background-color:lavender;border: 2px solid black;max-width: 100%;">
	   			<form action="log-in.php" method="POST">
	   				<input type="text" name="category" style="display: none;" value="Phones" readonly="readonly"></input>
	   				<input type="submit" class="submit" value="Phones" name="sub"></input>
	   			</form>
	   		</div>
	   		<div class="col-sm-4 row1" style="background-color:lavender;border: 2px solid black;max-width: 100%;">
	   			<form action="log-in.php" method="POST">
	   				<input type="text" name="category" style="display: none;" value="Clothes" readonly="readonly"></input>
	   				<input type="submit" class="submit" value="Clothes" name="sub"></input>
	   			</form>
	   		</div>
		</div>
		<div class="controls">
			<form action="log-in.php" method="POST">
	   			<input type="range" name="price" id="price" min=1 max=100000 style="position: absolute;width: 90%;margin-left: 0.5%;" onchange="var price=document.getElementById('price');var display=document.getElementById('p');display.textContent=price.value;">
	   				<b>Price</b>
	   				<span id="p">
	   					<script type="text/javascript">var display=document.getElementById('p');display.textContent=price.value;</script>
	   				</span>
	   			</input>
	   			<?php 
	   				$sql="SELECT DISTINCT B.Brand_Name FROM PRODUCT AS P,BRAND AS B WHERE P.Brand_id=B.Brand_id;";
	   				$result=mysqli_query($con,$sql);


	   				echo "<p style='position: absolute;top: 100px;width: 100%;margin-left: 35%;'><b>Brands</b></p>";

	   				$row=mysqli_fetch_array($result);
	   				foreach($row as $key=>$value) 
					{
						if(strcmp($key,"Brand_Name")==0)
						{	
							echo "<p style='/*position: absolute;*/margin-top: 37%;width: 100%;margin-left: 27%;'><input type='radio' name='brand' value='".$value."'>".$value."</input></p>";
						}
					}

	   				while ($row=mysqli_fetch_array($result)) {
	   					foreach($row as $key=>$value) 
						{
							if(strcmp($key,"Brand_Name")==0)
							{	
								echo "<p style='/*position: absolute;*/margin-top: 3%;width: 100%;margin-left: 27%;'><input type='radio' name='brand' value='".$value."'>".$value."</input></p>";
							}
						}
	   				}
	   			?>
	   			<p><input type="range" name="rating" id="rating" min=1 max=5 style="position: absolute;width: 70%;margin-left: 25%;" onchange="var rating=document.getElementById('rating');var display=document.getElementById('p1');display.textContent=rating.value;">
	   				<b>Rating</b>
	   				<span id="p1">
	   					<script type="text/javascript">var display=document.getElementById('p1');display.textContent=rating.value;</script>
	   				</span>
	   			</input></p>
	   			<p><input type="submit" name="sub" value="Apply" style="margin-left: 35%;"></input></p>
	   		</form>
		</div>
	</div>
	<?php

		if (!empty($_POST['search'])) {
			$sql="SELECT DISTINCT P.Product_id,P.Product_Name,P.Price,P.Rating,P.Model,P.Brand_id,P.Supplier_id FROM PRODUCT AS P WHERE P.Product_Name='".$_POST['search']."';";
			$result=mysqli_query($con,$sql);

			if(!$result)
				{
					echo "Query UnSuccessful".mysqli_error($result) ;
					exit();
				}
				

				echo "<br/><br/><br/><table><tr>";			
				$row_count=1;
				$flag=0;

				while ($row = mysqli_fetch_array($result))
				{
					$flag=1;
					//print_r($row);
					if ($row_count==4) {
						$row_count=1;
						echo "</tr><tr>";
					}

					//print_r($row);
					echo "<td>";
					$i=0;

					foreach($row as $key=>$value) 
					{
						if($i%2!=0)
						{	
							if(strcmp($key,"Product_id")==0)
							{
								$p_id=$value;
							}

							if(strcmp($key,"Brand_id")==0)
							{
								$sql="SELECT Brand_Name FROM PRODUCT,BRAND WHERE PRODUCT.Brand_id=".$value." AND PRODUCT.Brand_id=BRAND.Brand_id";
								$b_result=mysqli_query($con,$sql);

								$b_row = mysqli_fetch_array($b_result);

								$j=0;
								foreach($b_row as $key1=>$value1) 
								{
									if($j%2!=0)
									{
										echo "<span>".$key1." : ".$value1."</span><br />";	
									}
									$j=$j+1;
								}

								//print_r($b_row);
								$i=$i+1;
								continue;
							}
							if(strcmp($key,"Supplier_id")==0)
							{
								$sql="SELECT Supplier_Name FROM PRODUCT,SUPPLIER WHERE PRODUCT.Supplier_id=".$value." AND PRODUCT.Supplier_id=SUPPLIER.Supplier_id";
								$s_result=mysqli_query($con,$sql);

								$s_row = mysqli_fetch_array($s_result);

								$j=0;
								foreach($s_row as $key1=>$value1) 
								{
									if($j%2!=0)
									{
										echo "<span>".$key1." : ".$value1."</span><br />";	
									}
									$j=$j+1;
								}

								//print_r($b_row);
								$i=$i+1;
								continue;
							}
							echo "<span>".$key." : ".$value."</span><br />";
						}
						$i=$i+1;
					}

					echo "<form action='log-in.php' method='POST'>
					<input type='text' name='p_id' value='".$p_id."' style='display: none;'></input>
					<input type='submit' style='display: none;'><button style='background-color: #4CAF50; /* Green */border: none;color: white;padding: 15px 32px;text-align: center;text-decoration: none;display: inline-block;font-size: 16px;'>ADD TO CART</button></input></form>";
					echo "</td>";

					$row_count=$row_count+1;
				}
				if ($flag==0) {
					echo "<h1 id='h1'>No products of that kind exist</h1>";
				}

				echo "</tr></table>";


		}


		if (!empty($_POST['price']) and !empty($_POST['rating'])) {
			if (!empty($_POST['brand'])) {
				$sql="SELECT DISTINCT P.Product_id,P.Product_Name,P.Price,P.Rating,P.Model,P.Brand_id,P.Supplier_id FROM PRODUCT AS P,BRAND AS B WHERE P.Price<=".$_POST['price']." AND P.Rating<=".$_POST['rating']." AND P.Brand_id=B.Brand_id AND B.Brand_Name='".$_POST['brand']."';";
				$result=mysqli_query($con,$sql);

				if(!$result)
				{
					echo "Query UnSuccessful".mysqli_error($result) ;
					exit();
				}
				
				echo "<br/><br/><br/><table><tr>";			
				$row_count=1;
				$flag=0;

				while ($row = mysqli_fetch_array($result))
				{
					$flag=1;
					//print_r($row);
					if ($row_count==4) {
						$row_count=1;
						echo "</tr><tr>";
					}

					//print_r($row);
					echo "<td>";
					$i=0;

					foreach($row as $key=>$value) 
					{
						if($i%2!=0)
						{	
							if(strcmp($key,"Product_id")==0)
							{
								$p_id=$value;
							}

							if(strcmp($key,"Brand_id")==0)
							{
								$sql="SELECT Brand_Name FROM PRODUCT,BRAND WHERE PRODUCT.Brand_id=".$value." AND PRODUCT.Brand_id=BRAND.Brand_id";
								$b_result=mysqli_query($con,$sql);

								$b_row = mysqli_fetch_array($b_result);

								$j=0;
								foreach($b_row as $key1=>$value1) 
								{
									if($j%2!=0)
									{
										echo "<span>".$key1." : ".$value1."</span><br />";	
									}
									$j=$j+1;
								}

								//print_r($b_row);
								$i=$i+1;
								continue;
							}
							if(strcmp($key,"Supplier_id")==0)
							{
								$sql="SELECT Supplier_Name FROM PRODUCT,SUPPLIER WHERE PRODUCT.Supplier_id=".$value." AND PRODUCT.Supplier_id=SUPPLIER.Supplier_id";
								$s_result=mysqli_query($con,$sql);

								$s_row = mysqli_fetch_array($s_result);

								$j=0;
								foreach($s_row as $key1=>$value1) 
								{
									if($j%2!=0)
									{
										echo "<span>".$key1." : ".$value1."</span><br />";	
									}
									$j=$j+1;
								}

								//print_r($b_row);
								$i=$i+1;
								continue;
							}
							echo "<span>".$key." : ".$value."</span><br />";
						}
						$i=$i+1;
					}

					echo "<form action='log-in.php' method='POST'>
					<input type='text' name='p_id' value='".$p_id."' style='display: none;'></input>
					<input type='submit' style='display: none;'><button style='background-color: #4CAF50; /* Green */border: none;color: white;padding: 15px 32px;text-align: center;text-decoration: none;display: inline-block;font-size: 16px;'>ADD TO CART</button></input></form>";
					echo "</td>";

					$row_count=$row_count+1;
				}
				if ($flag==0) {
					echo "<h1 id='h1'>No products of that kind exist</h1>";
				}

				echo "</tr></table>";
			}
			if (empty($_POST['brand'])) {
				$sql="SELECT DISTINCT P.Product_id,P.Product_Name,P.Price,P.Rating,P.Model,P.Brand_id,P.Supplier_id FROM PRODUCT AS P,BRAND AS B WHERE P.Price<=".$_POST['price']." AND P.Rating<=".$_POST['rating'].";";
				$result=mysqli_query($con,$sql);

				if(!$result)
				{
					echo "Query UnSuccessful".mysqli_error($result) ;
					exit();
				}
			
				echo "<br/><br/><br/><table><tr>";			
				$row_count=1;
				$flag=0;

				while ($row = mysqli_fetch_array($result))
				{
					$flag=1;
					//print_r($row);
					if ($row_count==4) {
						$row_count=1;
						echo "</tr><tr>";
					}

					//print_r($row);
					echo "<td>";
					$i=0;

					foreach($row as $key=>$value) 
					{
						if($i%2!=0)
						{	
							if(strcmp($key,"Product_id")==0)
							{
								$p_id=$value;
							}

							if(strcmp($key,"Brand_id")==0)
							{
								$sql="SELECT Brand_Name FROM PRODUCT,BRAND WHERE PRODUCT.Brand_id=".$value." AND PRODUCT.Brand_id=BRAND.Brand_id";
								$b_result=mysqli_query($con,$sql);

								$b_row = mysqli_fetch_array($b_result);

								$j=0;
								foreach($b_row as $key1=>$value1) 
								{
									if($j%2!=0)
									{
										echo "<span>".$key1." : ".$value1."</span><br />";	
									}
									$j=$j+1;
								}

								//print_r($b_row);
								$i=$i+1;
								continue;
							}
							if(strcmp($key,"Supplier_id")==0)
							{
								$sql="SELECT Supplier_Name FROM PRODUCT,SUPPLIER WHERE PRODUCT.Supplier_id=".$value." AND PRODUCT.Supplier_id=SUPPLIER.Supplier_id";
								$s_result=mysqli_query($con,$sql);

								$s_row = mysqli_fetch_array($s_result);

								$j=0;
								foreach($s_row as $key1=>$value1) 
								{
									if($j%2!=0)
									{
										echo "<span>".$key1." : ".$value1."</span><br />";	
									}
									$j=$j+1;
								}

								//print_r($b_row);
								$i=$i+1;
								continue;
							}
							echo "<span>".$key." : ".$value."</span><br />";
						}
						$i=$i+1;
					}

					echo "<form action='log-in.php' method='POST'>
					<input type='text' name='p_id' value='".$p_id."' style='display: none;'></input>
					<input type='submit' style='display: none;'><button style='background-color: #4CAF50; /* Green */border: none;color: white;padding: 15px 32px;text-align: center;text-decoration: none;display: inline-block;font-size: 16px;'>ADD TO CART</button></input></form>";
					echo "</td>";

					$row_count=$row_count+1;
				}
				if ($flag==0) {
					echo "<h1 id='h1'>No products of that kind exist</h1>";
				}

				echo "</tr></table>";
			}
		}

		if (!empty($_POST['category'])) {
			$sql="SELECT P.Product_id,P.Product_Name,P.Price,P.Rating,P.Model,P.Brand_id,P.Supplier_id FROM PRODUCT AS P,BRAND_N_CATEGORY AS BC,CATEGORY AS C WHERE P.Brand_id=BC.Brand_id AND BC.Category_id=C.Category_id AND C.Category_Name='".$_POST['category']."';";
			$result=mysqli_query($con,$sql);

			if(!$result)
			{
				echo "Query UnSuccessful".mysqli_error($result) ;
				exit();
			}

			echo "<br/><br/><br/><table><tr>";			
			$row_count=1;

			$flag=0;

			while ($row = mysqli_fetch_array($result))
			{
				$flag=1;

				if ($row_count==4) {
					$row_count=1;
					echo "</tr><tr>";
				}

				//print_r($row);
				echo "<td>";
				$i=0;

				foreach($row as $key=>$value) 
				{
					if($i%2!=0)
					{	
						if(strcmp($key,"Product_id")==0)
						{
							$p_id=$value;
						}

						if(strcmp($key,"Brand_id")==0)
						{
							$sql="SELECT Brand_Name FROM PRODUCT,BRAND WHERE PRODUCT.Brand_id=".$value." AND PRODUCT.Brand_id=BRAND.Brand_id";
							$b_result=mysqli_query($con,$sql);

							$b_row = mysqli_fetch_array($b_result);

							$j=0;
							foreach($b_row as $key1=>$value1) 
							{
								if($j%2!=0)
								{
									echo "<span>".$key1." : ".$value1."</span><br />";	
								}
								$j=$j+1;
							}

							//print_r($b_row);
							$i=$i+1;
							continue;
						}
						if(strcmp($key,"Supplier_id")==0)
						{
							$sql="SELECT Supplier_Name FROM PRODUCT,SUPPLIER WHERE PRODUCT.Supplier_id=".$value." AND PRODUCT.Supplier_id=SUPPLIER.Supplier_id";
							$s_result=mysqli_query($con,$sql);

							$s_row = mysqli_fetch_array($s_result);

							$j=0;
							foreach($s_row as $key1=>$value1) 
							{
								if($j%2!=0)
								{
									echo "<span>".$key1." : ".$value1."</span><br />";	
								}
								$j=$j+1;
							}

							//print_r($b_row);
							$i=$i+1;
							continue;
						}
						echo "<span>".$key." : ".$value."</span><br />";
					}
					$i=$i+1;
				}

				echo "<form action='log-in.php' method='POST'>
				<input type='text' name='p_id' value='".$p_id."' style='display: none;'></input>
				<input type='submit' style='display: none;'><button style='background-color: #4CAF50; /* Green */border: none;color: white;padding: 15px 32px;text-align: center;text-decoration: none;display: inline-block;font-size: 16px;'>ADD TO CART</button></input></form>";
				echo "</td>";

				$row_count=$row_count+1;
			}
			if ($flag==0) {
				echo "<h1 id='h1'>No products of that kind exist</h1>";
			}

			echo "</tr></table>";

				}

	?>
	<div class="products">
	</div>
	<script>
		var app = angular.module('myApp', []);
		app.controller('myCtrl', function($scope) {
    		$scope.category = ["Books","Phones","Clothes"];
		});

		document.getElementsByClassName('col-sm-4').addEventListener('mouseover',function(){ alert("Hello World!"); });

		function cl(i)
		{
			var category=document.getElementById(i);

		}
		function price()
		{
			alert("Hi");
		}
	</script>
	<?php


	if (empty($_POST['category']) and empty($_POST['price']) and empty($_POST['rating']) and empty($_POST['search'])) {
	$sql="SELECT * FROM PRODUCT";
	$result=mysqli_query($con,$sql);
		
	if(!$result)
	{
		echo "Query UnSuccessful".mysqli_error($result) ;
		exit();
	}

	echo "<table><tr>";			
	$row_count=1;

	while ($row = mysqli_fetch_array($result))
	{
		if ($row_count==4) {
			$row_count=1;
			echo "</tr><tr>";
		}

		//print_r($row);
		echo "<td>";
		$i=0;

		foreach($row as $key=>$value) 
		{
			if($i%2!=0)
			{	
				if(strcmp($key,"Product_id")==0)
				{
					$p_id=$value;
				}

				if(strcmp($key,"Brand_id")==0)
				{
					$sql="SELECT Brand_Name FROM PRODUCT,BRAND WHERE PRODUCT.Brand_id=".$value." AND PRODUCT.Brand_id=BRAND.Brand_id";
					$b_result=mysqli_query($con,$sql);

					$b_row = mysqli_fetch_array($b_result);

					$j=0;
					foreach($b_row as $key1=>$value1) 
					{
						if($j%2!=0)
						{
							echo "<span>".$key1." : ".$value1."</span><br />";	
						}
						$j=$j+1;
					}

					//print_r($b_row);
					$i=$i+1;
					continue;
				}
				if(strcmp($key,"Supplier_id")==0)
				{
					$sql="SELECT Supplier_Name FROM PRODUCT,SUPPLIER WHERE PRODUCT.Supplier_id=".$value." AND PRODUCT.Supplier_id=SUPPLIER.Supplier_id";
					$s_result=mysqli_query($con,$sql);

					$s_row = mysqli_fetch_array($s_result);

					$j=0;
					foreach($s_row as $key1=>$value1) 
					{
						if($j%2!=0)
						{
							echo "<span>".$key1." : ".$value1."</span><br />";	
						}
						$j=$j+1;
					}

					//print_r($b_row);
					$i=$i+1;
					continue;
				}
				echo "<span>".$key." : ".$value."</span><br />";
			}
			$i=$i+1;
		}

		echo "<form action='log-in.php' method='POST'>
		<input type='text' name='p_id' value='".$p_id."' style='display: none;'></input>
		<input type='submit' style='display: none;'><button style='background-color: #4CAF50; /* Green */border: none;color: white;padding: 15px 32px;text-align: center;text-decoration: none;display: inline-block;font-size: 16px;'>ADD TO CART</button></input></form>";
		echo "</td>";

		$row_count=$row_count+1;
	}

	echo "</tr></table>";
}


	if (!empty($_POST['p_id'])) {
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
		
				echo "HI  ".$value." ";
				$cart_id=$value;
				$_SESSION['cart_id']=$cart_id;
				
			}
		}
	}

		$sql="INSERT INTO CART_ITEM(Quantity,Cost,Cart_id,Product_id,Customer_id) VALUES (1,".$price.",".$cart_id.",".$_POST['p_id'].",".$_SESSION['C_ID'].");";
		$results = mysqli_query($con, $sql);

	}

	?>
</body>
</html>