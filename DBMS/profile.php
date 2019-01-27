<?php
	
	$host='localhost';
	$user='root';
	$pass='';
	$db='E-Commerce_try';
		
	$con=mysqli_connect($host,$user,$pass,$db);

	session_start();

	if(!empty($_POST['FirstName']))
	{
		$sql="UPDATE CUSTOMER SET FirstName='".$_POST['FirstName']."',LastName='".$_POST['LastName']."',Address='".$_POST['Address']."',Country='".$_POST['Country']."',email='".$_POST['email']."' WHERE Customer_id=".$_SESSION['C_ID'].";";
		$results = mysqli_query($con, $sql);
	}

	$query = "SELECT FirstName FROM CUSTOMER WHERE Customer_id=".$_SESSION['C_ID'].";";
	$results = mysqli_query($con, $query);

			while ($row = mysqli_fetch_array($results))
			{	
				//print_r($row);
				foreach($row as $key=>$value) 
				{
					if(strcmp($key,"FirstName")==0)
					{						
					
						//echo $value;
						$c_name=$value;
						//echo $c_name;
					
					}
				}
			}

			$_SESSION['C_NAME']=$c_name;

?>

<!DOCTYPE html>
<html>
<head>
	<title>Profile</title>
	<style type="text/css">
		body {
			background-color: #b3ecff;
			margin: 0;
			padding: 0;
			font-family: helvetica;
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
			font-size: 15px;
		}

		li a:hover {
		    background-color: yellow;
		}

		#name {position: relative;margin-left: 92%;}
		#logout{position: relative;}
		#home{position: relative;}

		#profile {
			padding: 140px 0;
    		border: 3px solid green;
    		text-align: center;
		}


		input:focus ~ #floating-label-1,input:not(:focus):valid ~ #floating-label-1{
		  top: 70px;
		  bottom: 10px;
		  left: 70px;
		  font-size: 11px;
		  opacity: 1;
		}
		input:focus ~ #floating-label-2,input:not(:focus):valid ~ #floating-label-2{
		  top: 135px;
		  bottom: 10px;
		  left: 70px;
		  font-size: 11px;
		  opacity: 1;
		}
		textarea:focus ~ #floating-label-3,textarea:not(:focus):valid ~ #floating-label-3{
		  top: 205px;
		  bottom: 10px;
		  left: 70px;
		  font-size: 11px;
		  opacity: 1;
		}
		input:focus ~ #floating-label-5,input:not(:focus):valid ~ #floating-label-5{
		  top: 395px;
		  bottom: 10px;
		  left: 70px;
		  font-size: 11px;
		  opacity: 1;
		}


		.inputText {
		  font-size: 14px;
		  width: 250px;
		  height: 35px;
		  border: 0px;
		  margin: 15px;
		}
		textarea {
		  font-size: 14px;
		  width: 250px;
		  height: 75px;	
		  border: 0px;
		  margin: 15px;
		}

		#floating-label-1 {
		  position: absolute;
		  pointer-events: none;
		  left: 75px;
		  top: 93px;
		  transition: 0.2s ease all;
		}

		 #floating-label-2 {
		  position: absolute;
		  pointer-events: none;
		  left: 75px;
		  top: 160px;
		  transition: 0.2s ease all;
		 }
		  #floating-label-3 {
		  position: absolute;
		  pointer-events: none;
		  left: 75px;
		  top: 220px;
		  transition: 0.2s ease all;	
		}
		 #floating-label-5 {
		  position: absolute;
		  pointer-events: none;
		  left: 75px;
		  top: 417px;
		  transition: 0.2s ease all;	
		 }

		 #edit-submit {
		 	background-color: #4CAF50;
		 	/* Green */border: none;
		 	color: white;
		 	padding: 15px 32px;
		 	text-align: center;
		 	text-decoration: none;
		 	display: inline-block;
		 	font-size: 16px;
		 }
		 #edit-form {
		 	position: absolute;
		 	width: 30%;
		 	border: 2px solid green;
		 	display: none;
		 	justify-content: center;
		 	padding: 70px 0;
		 	background-color: Gray;
		 	/*height: 500px;*/
		 }
		 #close {
		 	position: absolute;
		 	top: 20px;
		 	left: 400px;
		 }
	</style>
	<script src="angular.js"></script>
</head>
<body>
	<ul>
		<?php 
		 	//echo "<li><a>".$_SESSION['C_ID']."</a></li>";
			echo "<li><a id='name'>".$_SESSION['C_NAME']."</a></li>";
		?>
		<li id="home"><a href="log-in.php">Home</a></li>
		<li id="cart"><a href="add_to_cart.php">Cart</a></li>
		<li id="logout"><a href="log-out.php">Log out</a></li>
	</ul>
	<div style="display: flex;justify-content: center;">
		<div id="edit-form" ng-app="myApp" ng-controller="myCtrl">
			<form action="profile.php" method="POST">
				<div><input type="text" name="FirstName" class="inputText" required="required" />
				<span class="floating-label" id="floating-label-1">FirstName</span></div>
				<div><input type="text" name="LastName" class="inputText" required="required" />
				<span class="floating-label" id="floating-label-2">LastName</span></div>
				<div><textarea name="Address" cols=65 rows=7 required="required" ></textarea>
				<span class="floating-label" id="floating-label-3">Address</span></div>
				<div><select name="Country" class="inputText" required="required">
					<option ng-repeat="x in names" value={{x}}>{{x}}</option>
				</select><br/></div>
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<div><input type="email" name="email" class="inputText" required="required" />
				<span class="floating-label" id="floating-label-5">Email</span></div>
				<input type="submit" name="submit" id="edit-submit" />
				<button id="close" onclick="var editform=document.getElementById('edit-form');editform.setAttribute('style','display: none;');">X</button>
			</form>
		</div>
	</div>
	<div id="profile">

		<?php	
			$sql="SELECT C.FirstName,C.LastName,C.Address,C.Country,C.email,R.Total_Cost FROM CUSTOMER AS C,CART AS R WHERE C.Customer_id=R.Customer_id AND C.Customer_id=".$_SESSION['C_ID'].";";
			$results = mysqli_query($con, $sql);

			while ($row = mysqli_fetch_array($results))
			{	
				$i=0;

				echo "<br/>";
				foreach($row as $key=>$value) 
				{

					if($i%2!=0)
						echo "<span class='details'>".$key.": ".$value."<br/></span>";
					$i=$i+1;
				}
			}
		?>
		<button id='edit' style='background-color: #4CAF50; /* Green */border: none;color: white;padding: 15px 32px;text-align: center;text-decoration: none;display: inline-block;font-size: 16px;' onclick="var editform=document.getElementById('edit-form');editform.setAttribute('style','display: flex;');">EDIT</button>
	</div>
</body>
<script>
		var app = angular.module('myApp', []);
		app.controller('myCtrl', function($scope) {
    		$scope.names = ['Afghanistan', 'Albania', 'Algeria', 'Andorra', 'Angola', 'Anguilla', 'Antigua & Barbuda', 'Argentina', 'Armenia', 'Australia', 'Austria', 'Azerbaijan', 'Bahamas', 'Bahrain', 'Bangladesh', 'Barbados', 'Belarus', 'Belgium', 'Belize', 'Benin', 'Bermuda', 'Bhutan', 'Bolivia', 'Bosnia & Herzegovina', 'Botswana', 'Brazil', 'Brunei Darussalam', 'Bulgaria', 'Burkina Faso', 'Myanmar', 'Burundi', 'Cambodia', 'Cameroon', 'Canada', 'Cape Verde', 'Cayman Islands', 'Central African Republic', 'Chad', 'Chile', 'China', 'Colombia', 'Comoros', 'Congo', 'Costa Rica', 'Croatia', 'Cuba', 'Cyprus', 'Czech Republic', 'Democratic Republic of the Congo', 'Denmark', 'Djibouti', 'Dominican Republic', 'Dominica', 'Ecuador', 'Egypt', 'El Salvador', 'Equatorial Guinea', 'Eritrea', 'Estonia', 'Ethiopia', 'Fiji', 'Finland', 'France', 'French Guiana', 'Gabon', 'Gambia', 'Georgia', 'Germany', 'Ghana', 'Great Britain', 'Greece', 'Grenada', 'Guadeloupe', 'Guatemala', 'Guinea', 'Guinea-Bissau', 'Guyana', 'Haiti', 'Honduras', 'Hungary', 'Iceland', 'India', 'Indonesia', 'Iran', 'Iraq', 'Israel and the Occupied Territories', 'Italy', "Ivory Coast", 'Jamaica', 'Japan', 'Jordan', 'Kazakhstan', 'Kenya', 'Kosovo', 'Kuwait', 'Kyrgyzstan', 'Laos', 'Latvia', 'Lebanon', 'Lesotho', 'Liberia', 'Libya', 'Liechtenstein', 'Lithuania', 'Luxembourg', 'Republic of Macedonia', 'Madagascar', 'Malawi', 'Malaysia', 'Maldives', 'Mali', 'Malta', 'Martinique', 'Mauritania', 'Mauritius', 'Mayotte', 'Mexico', 'Moldova, Republic of', 'Monaco', 'Mongolia', 'Montenegro', 'Montserrat', 'Morocco', 'Mozambique', 'Namibia', 'Nepal', 'Netherlands', 'New Zealand', 'Nicaragua', 'Niger', 'Nigeria', 'North Korea', 'Norway', 'Oman', 'Pacific Islands', 'Pakistan', 'Panama', 'Papua New Guinea', 'Paraguay', 'Peru', 'Philippines', 'Poland', 'Portugal', 'Puerto Rico', 'Qatar', 'Reunion', 'Romania', 'Russian Federation', 'Rwanda', 'Saint Kitts and Nevis', 'Saint Lucia', "Saint Vincent's & Grenadines", 'Samoa', 'Sao Tome and Principe', 'Saudi Arabia', 'Senegal', 'Serbia', 'Seychelles', 'Sierra Leone', 'Singapore', 'Slovakia', 'Slovenia', 'Solomon Islands', 'Somalia', 'South Africa', 'South Korea', 'South Sudan', 'Spain', 'Sri Lanka', 'Sudan', 'Suriname', 'Swaziland', 'Sweden', 'Switzerland', 'Syria', 'Tajikistan', 'Tanzania', 'Thailand', 'Timor Leste', 'Togo', 'Trinidad & Tobago', 'Tunisia', 'Turkey', 'Turkmenistan', 'Turks & Caicos Islands', 'Uganda', 'Ukraine', 'United Arab Emirates', 'USA', 'Uruguay', 'Uzbekistan', 'Venezuela', 'Vietnam', 'Virgin Islands (UK)', 'Virgin Islands (US)', 'Yemen', 'Zambia', 'Zimbabwe'];
		});
</script>
</html>