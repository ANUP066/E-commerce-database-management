Dyson
<!DOCTYPE html>
<html>
<head>
	<title>Admin Panel</title>
	<style type="text/css">
		#h2 {
			position: relative;
			left: 40%;
			font-family: helvetica;
			font-size: 35px;
			text-transform: uppercase;
			width: 25%;
		}
		form {
			display: block;
		    margin-left: auto;
    		margin-right: auto;
    		width: 75%;
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
		table {
			font-family: helvetica;
			font-size: 17px;
			border: 2px solid black;
			display: block;
		    margin-left: auto;
    		margin-right: auto;
    		width: 75%;
		}
		tr {
			height: 55px;
			border: 2px solid black;
		}
		tr:hover {
			background-color: LightGray;
			
		}
		tr:nth-child(odd) {
			background-color: LightGray;
		}
		td,th {
			text-align: center;
			/*border: 2px solid black;
			height: 55px;*/
			width: 15%;
			padding: 10px;
		}
	</style>
	<!--<script src="angular.js"></script>-->
</head>
<body>
	<h2 id="h2">Admin Panel</h2>
	<form action="admin.php" method="POST" name="myForm"> 
		<input type="text" name="query" id="input" placeholder="Type Query Here" required></input>
		<input type="submit" id="sub" value="Run"/>
	</form>
	<?php
		$host='localhost';
		$user='root';
		$pass='';
		$db='E-Commerce_try';
		
		$con=mysqli_connect($host,$user,$pass,$db);
		if($con)
			//echo "Connection Successful<br /><br /><br />";
		
		if(!empty($_POST['query']))
		{	$sql=$_POST['query'];
			$result=mysqli_query($con,$sql);
		
			if(!$result)
				echo "Query UnSuccessful" . mysql_error();
				
			if ($result = mysqli_query($con, $sql)) {
				
				echo "<br /><br /><br /><table>";
				echo "<tr><th>Customer ID</th><th>FirstName</th><th>LastName</th><th>Address</th><th>Country</th></tr>";
				
				/* fetch associative array */
				while ($row = mysqli_fetch_array($result)) {
					//echo "Customer_id :".$row['Customer_id']."<br> ".
					//"FirstName : ".$row['FirstName'] ."<br> ".
					//"LastName : ".$row['LastName'] ."<br> ".
					//"--------------------------------<br>";
					//printf ("%s (%s)\n", $row[0], $row[1]);
					
					//only for select
					
					echo "<tr><td>".$row['Customer_id'].
					"</td><td>".$row['FirstName'].
					"</td><td>".$row['LastName'].
					"</td><td>".$row['Address'].
					"</td><td>".$row['Country'].
					"</td></tr>";
				}
				
				echo "</table>";

				/* free result set */
				mysqli_free_result($result);
			}
			
			 /*while($row = mysqli_fetch_assoc($result)) {
					//echo "Customer_id :{$row['Customer_id']}  <br> "."FirstName : {$row['FirstName']} <br> "."LastName : {$row['LastName']} <br> "."--------------------------------<br>";
					printf ("%s (%s)\n", $row[0], $row[1]); 
		    }*/
		}
        		
        mysqli_close($con);
			
	?>
</body>
</html>
























