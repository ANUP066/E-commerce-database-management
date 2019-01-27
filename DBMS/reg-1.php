<!DOCTYPE html>
<html>
<head>
	<title>Register/Sign-Up</title>
	<link href="bootstrap.css" rel="stylesheet" id="bootstrap-css">
	<link href="c.css" rel="stylesheet">
	<script src="bootstrap.js"></script>
	<script src="code.js"></script>
	<script src="j.js"></script>
	<script src="angular.js"></script>
</head>
<body>




	<div class="container">
    	<div class="row">
			<div class="col-md-6 col-md-offset-3">
				<div class="panel panel-login">
					<div class="panel-heading">
						<div class="row">
							<div class="col-xs-6">
								<a href="#" class="active" id="login-form-link">Login</a>
							</div>
							<div class="col-xs-6">
								<a href="#" id="register-form-link">Register</a>
							</div>
						</div>
						<hr>
					</div>
					<div class="panel-body">
						<div class="row">
							<div class="col-lg-12">
								<form id="login-form" name="sign-in" action="sign-in.php" method="post" role="form" style="display: block;">
									<div class="form-group">
										<input type="email" name="mail" id="username" tabindex="1" class="form-control" placeholder="Email" value="" required="required">
									</div>
									<div class="form-group">
										<input type="password" name="pass" id="password" tabindex="2" class="form-control" placeholder="Password" required="required">
									</div>
									
									<div class="form-group">
										<div class="row">
											<div class="col-sm-6 col-sm-offset-3 login">
												<input type="submit" name="login-submit" id="login-submit" tabindex="4" class="form-control btn btn-login" value="Log In">
											</div>
										</div>
									</div>
									
								</form>
								<form id="register-form" action="reg-1.php" method="post" role="form" style="display: none;">
									<div class="form-group">
										<input type="text" name="FirstName" id="username" tabindex="1" class="form-control" placeholder="First Name" value="" required="required">
									</div>
									<div class="form-group">
										<input type="text" name="LastName" id="username" tabindex="1" class="form-control" placeholder="Last Name" value="" required="required">
									</div>
									<div class="form-group">
										<textarea name="address" tabindex="1" class="form-control" placeholder="Address" value="" required="required"></textarea>
									</div>
									<div class="form-group" ng-app="myApp" ng-controller="myCtrl">
										<select name="Country">
												<option ng-repeat="x in names" value={{x}}>{{x}}</option>
										</select><br/>
									</div>
									<div class="form-group">
										<input type="email" name="email" id="email" tabindex="1" class="form-control" placeholder="Email Address" value="" required="required">
									</div>
									<div class="form-group">
										<input type="password" name="password" id="password" tabindex="2" class="form-control" placeholder="Password" required="required">
									</div>
									<div class="form-group">
										<div class="row">
											<div class="col-sm-6 col-sm-offset-3 register">
												<input type="submit" name="register-submit" id="register-submit" tabindex="4" class="form-control btn btn-register" value="Register Now">
											</div>
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
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

		$sql="INSERT INTO CUSTOMER (FirstName,LastName,Address,Country,email,password) VALUES ('".$_POST['FirstName']."','".$_POST['LastName']."','".$_POST['address']."','".$_POST['Country']."','".$_POST['email']."','".$_POST['password']."');";

		$result=mysqli_query($con,$sql);

		if(!$result)
		{
			echo "<h1 style='width: 50%;display: flex;justify-content: center;padding-bottom: 7%;margin-left: 25%;margin-right: auto;'>Please register again after some time</h1>" ;
			exit();
		}
		if($result)
		{
			echo "<h1 style='width: 70%;display: flex;justify-content: center;padding-bottom: 7%;margin-left: 16%;margin-right: auto;'>Please sign in now.</h1>" ;
		}

		$sql="SELECT Customer_id FROM CUSTOMER WHERE email='".$_POST['email']."'";
		$c_result=mysqli_query($con,$sql);

		while ($row = mysqli_fetch_array($c_result))
		{
			$i=0;

			foreach($row as $key=>$value) 
			{
				if($i%2!=0)
				{
					$c_id=$value;
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