<!DOCTYPE html>
<html>
<head>
	<title>Register/Sign-Up</title>
	<style>
		body {
			font-family: helvetica;
		}
		.reg,.sign-in {
			display: block;
			width: 35%;
			display: flex;
			justify-content: center;
			border: 2px solid black;
			margin-top: 10%;
			margin-left: 10%;
		}
		.sign-in {
			margin-top: -30%;
			margin-left: 60%;	
		}
		span {
			display: block;
			padding-bottom: 7%;
			/*margin-left: 25%;
			/*margin-right: auto;*/
		}
	</style>
	<script src="angular.js"></script>
</head>
<body>
	<div class="reg" ng-app="myApp" ng-controller="myCtrl">
		<form name="register" method="POST" action="reg.php">
			<span>FirstName<input type="text" name="FirstName" required></input></span>
			<span>LastName<input type="text" name="LastName" required></input></span>
			<span>Address<textarea name="address" cols=35 rows=6></textarea></span>
			<span>Country
			<select name="Country">
				<option ng-repeat="x in names" value={{x}}>{{x}}</option>
			</select><br/></span>
			<span>Email&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="email" name="email" required></input></span>
			<span>Password<input type="password" name="password" required></input></span>
			<span><input type="submit" name="sub" value="Submit" /></span>
		</form>
	</div>

	<div class="sign-in">
		<form name="sign-in" method="POST" action="sign-in.php">
			<span>Email&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="email" name="mail" required></input></span>
			<span>Password<input type="password" name="pass" required></input></span>
			<span><input type="submit" name="sub" value="Submit" /></span>
		</form>
	</div>
	<script>
		var app = angular.module('myApp', []);
		app.controller('myCtrl', function($scope) {
    		$scope.names = ['Afghanistan', 'Albania', 'Algeria', 'Andorra', 'Angola', 'Anguilla', 'Antigua & Barbuda', 'Argentina', 'Armenia', 'Australia', 'Austria', 'Azerbaijan', 'Bahamas', 'Bahrain', 'Bangladesh', 'Barbados', 'Belarus', 'Belgium', 'Belize', 'Benin', 'Bermuda', 'Bhutan', 'Bolivia', 'Bosnia & Herzegovina', 'Botswana', 'Brazil', 'Brunei Darussalam', 'Bulgaria', 'Burkina Faso', 'Myanmar', 'Burundi', 'Cambodia', 'Cameroon', 'Canada', 'Cape Verde', 'Cayman Islands', 'Central African Republic', 'Chad', 'Chile', 'China', 'Colombia', 'Comoros', 'Congo', 'Costa Rica', 'Croatia', 'Cuba', 'Cyprus', 'Czech Republic', 'Democratic Republic of the Congo', 'Denmark', 'Djibouti', 'Dominican Republic', 'Dominica', 'Ecuador', 'Egypt', 'El Salvador', 'Equatorial Guinea', 'Eritrea', 'Estonia', 'Ethiopia', 'Fiji', 'Finland', 'France', 'French Guiana', 'Gabon', 'Gambia', 'Georgia', 'Germany', 'Ghana', 'Great Britain', 'Greece', 'Grenada', 'Guadeloupe', 'Guatemala', 'Guinea', 'Guinea-Bissau', 'Guyana', 'Haiti', 'Honduras', 'Hungary', 'Iceland', 'India', 'Indonesia', 'Iran', 'Iraq', 'Israel and the Occupied Territories', 'Italy', "Ivory Coast", 'Jamaica', 'Japan', 'Jordan', 'Kazakhstan', 'Kenya', 'Kosovo', 'Kuwait', 'Kyrgyzstan', 'Laos', 'Latvia', 'Lebanon', 'Lesotho', 'Liberia', 'Libya', 'Liechtenstein', 'Lithuania', 'Luxembourg', 'Republic of Macedonia', 'Madagascar', 'Malawi', 'Malaysia', 'Maldives', 'Mali', 'Malta', 'Martinique', 'Mauritania', 'Mauritius', 'Mayotte', 'Mexico', 'Moldova, Republic of', 'Monaco', 'Mongolia', 'Montenegro', 'Montserrat', 'Morocco', 'Mozambique', 'Namibia', 'Nepal', 'Netherlands', 'New Zealand', 'Nicaragua', 'Niger', 'Nigeria', 'North Korea', 'Norway', 'Oman', 'Pacific Islands', 'Pakistan', 'Panama', 'Papua New Guinea', 'Paraguay', 'Peru', 'Philippines', 'Poland', 'Portugal', 'Puerto Rico', 'Qatar', 'Reunion', 'Romania', 'Russian Federation', 'Rwanda', 'Saint Kitts and Nevis', 'Saint Lucia', "Saint Vincent's & Grenadines", 'Samoa', 'Sao Tome and Principe', 'Saudi Arabia', 'Senegal', 'Serbia', 'Seychelles', 'Sierra Leone', 'Singapore', 'Slovakia', 'Slovenia', 'Solomon Islands', 'Somalia', 'South Africa', 'South Korea', 'South Sudan', 'Spain', 'Sri Lanka', 'Sudan', 'Suriname', 'Swaziland', 'Sweden', 'Switzerland', 'Syria', 'Tajikistan', 'Tanzania', 'Thailand', 'Timor Leste', 'Togo', 'Trinidad & Tobago', 'Tunisia', 'Turkey', 'Turkmenistan', 'Turks & Caicos Islands', 'Uganda', 'Ukraine', 'United Arab Emirates', 'USA', 'Uruguay', 'Uzbekistan', 'Venezuela', 'Vietnam', 'Virgin Islands (UK)', 'Virgin Islands (US)', 'Yemen', 'Zambia', 'Zimbabwe'];
		});
</script>
<?php

	$host='localhost';
	$user='root';
	$pass='';
	$db='E-Commerce_try';
		
	$con=mysqli_connect($host,$user,$pass,$db);

	if(!empty($_POST['FirstName']))
	{
		//echo $_POST['FirstName'].",".$_POST['LastName'].",".$_POST['address'].",".$_POST['Country'].",".$_POST['email'].",".$_POST['password'];

		$sql="INSERT INTO CUSTOMER (FirstName,LastName,Address,Country,email,password) VALUES ('".$_POST['FirstName']."','".$_POST['LastName']."','".$_POST['address']."','".$_POST['Country']."','".$_POST['email']."','".$_POST['password']."');";

		$result=mysqli_query($con,$sql);

		if(!$result)
		{
			echo "<h1 style='width: 50%;display: block;padding-bottom: 7%;margin-left: 25%;margin-right: auto;'>Please register again after some time</h1>" ;
			exit();
		}
		if($result)
		{
			echo "<h1 style='width: 50%;display: block;padding-bottom: 7%;margin-left: 16%;margin-right: auto;'>Please sign in now.</h1>" ;
			//exit();
		}

		$sql="SELECT Customer_id FROM CUSTOMER WHERE email='".$_POST['email']."'";
		$c_result=mysqli_query($con,$sql);

		//print_r(mysqli_fetch_array($c_result));

		while ($row = mysqli_fetch_array($c_result))
		{
			$i=0;

			foreach($row as $key=>$value) 
			{
				if($i%2!=0)
				{
					$c_id=$value;
					//echo $value." ";
				}
				$i=$i+1;
			}
		}

		$sql="INSERT INTO CART(Total_Cost,Customer_id) VALUES (0,".$c_id.");";
		$cart_result=mysqli_query($con,$sql);
				
	}

	if(!empty($_POST['mail']))
	{
		$email=$_POST['mail'];
		$password=$_POST['pass'];

		//echo $_POST['FirstName'].",".$_POST['LastName'].",".$_POST['address'].",".$_POST['Country'].",".$_POST['email'].",".$_POST['password'];

		$query = "SELECT * FROM CUSTOMER WHERE email='$email' AND password='$password'";
		$results = mysqli_query($con, $query);

		if (mysqli_num_rows($results) == 1) {
			echo "<h1 style='width: 50%;display: block;padding-bottom: 7%;margin-left: 56%;margin-right: auto;'>Success</h1>";
			$_SESSION['email'] = $email;
			$_SESSION['set']=1;
			$_SESSION['success'] = "You are now logged in";
			header('location: log-in.php');
			exit();
		}else {
			echo "<h1 style='width: 50%;display: block;padding-bottom: 7%;margin-left: 56%;margin-right: auto;'>Wrong credentials.</h1>" ;
			exit();
		}

				
	}

	$myfile = fopen("newfile.txt", "w");
	$txt=1;
	fwrite($myfile, $txt);
	fclose($myfile);

?>
</body>
</html>