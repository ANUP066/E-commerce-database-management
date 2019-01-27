<?php

	$host='localhost';
	$user='root';
	$pass='';
	$db='E-Commerce_try';
		
	$con=mysqli_connect($host,$user,$pass,$db);



if(!empty($_POST['mail']))
	{
		$email=$_POST['mail'];
		$password=$_POST['pass'];


		$query = "SELECT * FROM CUSTOMER WHERE email='$email' AND password='$password'";
		$results = mysqli_query($con, $query);

		if (mysqli_num_rows($results) == 1) {
			echo "<h1 style='width: 50%;display: block;padding-bottom: 7%;margin-left: 56%;margin-right: auto;'>Success</h1>";

			session_start();
			
			$_SESSION['email'] = $email;
			$_SESSION['set']=1;

			while ($row = mysqli_fetch_array($results))
			{	
				print_r($row);
				foreach($row as $key=>$value) 
				{
					if(strcmp($key,"Customer_id")==0)
					{						
					
						//echo $value;
						$c_id=$value;
					
					}
					if(strcmp($key,"FirstName")==0)
					{						
					
						//echo $value;
						$c_name=$value;
						//echo $c_name;
					
					}
				}
			}

			$_SESSION['C_ID']=$c_id;
			$_SESSION['C_NAME']=$c_name;
			$_SESSION['success'] = "You are now logged in";
			header('location: log-in.php');
			exit();
		}else {
			echo "<h1 style='width: 50%;display: block;padding-bottom: 7%;margin-left: 56%;margin-right: auto;'>Wrong credentials.</h1>" ;
			exit();
		}

				
	}

?>