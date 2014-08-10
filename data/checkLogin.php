<?php
	
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept');		

include 'headers/connect_database.php';      
		
		
		$user = $_GET['user'];
		$pass = $_GET['password'];
		
		
					$query = "select * from user WHERE username = '$user' and password = '$pass'";
			$result = mysqli_query($con,$query)
			or die ("Couldn’t execute query.");
		
			if(mysqli_num_rows($result)>0){
			$row=mysqli_fetch_array($result);
			$data=$row['user_id'];
			
			}else{
			
			$data="No";	
				
			}
			
			echo "$data";
?>