<!DOCTYPE html>
<html>
<head>
	<title>Admin Panel</title>
	<style type="text/css">
		#h2 {
			display: flex;
			justify-content: center;
			font-family: helvetica;
			font-size: 35px;
			text-transform: uppercase;
			width: 100%;
		}
		#h1 {
			position: relative;
			left: 35%;
			font-family: helvetica;
			font-size: 28px;
			text-transform: uppercase;
			width: 500px;
		}
		form {
			display: block;
		    margin-left: auto;
    		margin-right: auto;
    		width: 75%;
    		font-family: helvetica;
    		/*border: 2px solid black;*/
		}
		#input {
			width: 90%;
			height: 40px;
		}
		#sub {
			height: 50px;
			width: 70px;
		}
		.rad {
			font-family: helvetica;
			font-size: 15px;
		    margin-left: auto;
    		margin-right: auto;
    		margin-bottom: 3%;
    		margin-top: 2%;
    		width: 8%;
		}
		table {
			font-family: helvetica;
			font-size: 17px;
			/*border: 2px solid black;*/
			display: block;
		    margin-left: auto;
    		margin-right: auto;
    		width: 75%;
		}
		tr {
			height: 55px;
			width: 100%;
			border: 2px solid black;
		}
		tr:hover {
			background-color: DarkGray;
			
		}
		tr:nth-child(odd) {
			background-color: LightGray;
		}
		tr:nth-child(odd):hover {
			background-color: DarkGray;
		}
		td,th {
			margin-left: 50px;
			text-align: center;
			width: 15%;
			max-width: 100%;
			padding: 10px;
		}
		span:hover {
			cursor: pointer;
			text-decoration: underline;
		}


		.accordion {
		    background-color: #eee;
		    color: #444;
		    cursor: pointer;
		    padding: 18px;
		    width: 100%;
		    text-align: left;
		    border: none;
		    outline: none;
		    transition: 0.4s;
		    margin-top: 50px;
		}

		.active, .accordion:hover {
		    background-color: #ccc;
		}

		.panel {
		    padding: 0 18px;
		    background-color: white;
		    display: none;
		    overflow: hidden;
		}
	</style>
	<script src="angular.js"></script>
</head>
<body>
	<h2 id="h2">Admin Panel</h2>
	<form action="admin3.php" method="POST" name="myForm"> 
		<input type="radio" class="rad" name="type" value="SELECT" >SELECT</input>
		<input type="radio" class="rad" name="type" value="UPDATE" >UPDATE</input>
		<input type="radio" class="rad" name="type" value="INSERT" >INSERT</input>
		<input type="radio" class="rad" name="type" value="CREATE" >CREATE</input>
		<input type="radio" class="rad" name="type" value="DELETE" >DELETE</input>
		<input type="radio" class="rad" name="type" value="DROP" >DROP</input>
		<div ng-app="myApp" ng-controller="myCtrl">
			<input type="text" name="query" id="input" placeholder="Type Query Here" autocomplete="off" required ng-model="test"></input>
			<input type="submit" id="sub" value="Run"/>
			<button class="accordion">Section 1</button>
			<div class="panel">
				<ul>
					<li ng-repeat='x in names | filter:test'>
						{{x}}
					</li>
				</ul>
			</div>
		</div>
	</form>
	<?php
		$host='localhost';
		$user='root';
		$pass='';
		$db='E-Commerce_try';
		
		$con=mysqli_connect($host,$user,$pass,$db);
		
		if(!empty($_POST['query']))
		{	

			$sql=$_POST['query'];
			$type=$_POST['type'];
			$result=mysqli_query($con,$sql);
		
			if(!$result)
			{
				echo "Query UnSuccessful".mysqli_error($result) ;
				exit();
			}
				
				
			echo "<br /><br /><br />";
			echo "<ul style='font-family: helvetica;margin-left: 15%;width: 50%;'><li>".$_POST['query']."</li></ul>";
			echo "<h1 id='h1'>Query Successful</h1>";
			
			if($type=="SELECT")
				{
					$row = mysqli_fetch_array($result);
					if(empty($row))
					{
						echo "<h1 id='h1'>No results returned</h1>";
						exit();
					}
					
					//echo $row;
					//print_r($row);
					echo "<table><tr>";
					$i=0;
					foreach($row as $key=>$value) 
					{
						if($i%2!=0)
							echo "<th>".$key."</th>";
						$i=$i+1;
					}
					echo "</tr><tr>";
					$i=0;
					
					foreach($row as $key=>$value) 
					{
						if($i%2!=0)
							echo "<td>".$value."</td>";
						$i=$i+1;
					}
					echo "</tr>";
					$i=0;
					
					while ($row = mysqli_fetch_array($result)) {					
						echo "<tr>";
						//print_r($row);
						$i=$i+1;
						
						foreach($row as $key=>$value) 
						{
							if($i%2!=0)
								echo "<td>".$value."</td>";
							$i=$i+1;
						}
						$i=0;
						echo "</tr>";
						
					}
				
					echo "</table><br /><br /><br />";
					mysqli_free_result($result);
			}
			
		}
				
		
		
    mysqli_close($con);
			
	?>
</body>
<script>
		var app = angular.module('myApp', []);
		app.controller('myCtrl', function($scope) {
    		$scope.names = ["SELECT * FROM CUSTOMER;",
    						"SELECT * FROM ORDERS;",
    						"SELECT DISTINCT P.Product_id,P.Product_Name,P.Price,P.Rating,P.Model,P.Brand_id,P.Supplier_id FROM PRODUCT AS P,BRAND AS B WHERE P.Price<=15000 AND P.Rating<=5 AND P.Brand_id=B.Brand_id AND B.Brand_Name='Classmate';",
    						"SELECT DISTINCT Brand_Name FROM BRAND AS B,CART_ITEM AS C ,PRODUCT AS P,CART,ORDERS AS O WHERE B.Brand_id=P.Brand_id AND P.Product_id=C.Product_id AND CART.Cart_id=O.Cart_id;","INSERT INTO CATEGORY(Category_Name) VALUES('Clothes');","INSERT INTO BRAND(Brand_Name) VALUES('Levi');","INSERT INTO BRAND_N_CATEGORY VALUES(3,3);","INSERT INTO PRODUCT(Product_Name,Price,Rating,Model,Brand_id,Supplier_id) VALUES('Jeans',3500,4,'Pencil cut',1,2);"];
		});
</script>
<script>
	var acc = document.getElementsByClassName("accordion");
var i;

for (i = 0; i < acc.length; i++) {
    acc[i].addEventListener("click", function(e) {
    	e.preventDefault();

        this.classList.toggle("active");

        var panel = this.nextElementSibling;
        if (panel.style.display === "block") {
            panel.style.display = "none";
        } else {
            panel.style.display = "block";
        }
    });
} 


	var input = document.getElementById("input");

	input.addEventListener("focus", function() {
		var panel=document.getElementsByClassName('panel');

		for (i = 0; i < panel.length; i++) {
			panel[i].style.display = "block";
		}

	});

</script>
</html>




				
