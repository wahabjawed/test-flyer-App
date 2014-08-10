<?php
	
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept');		

include 'headers/connect_database.php';      
		
		
		$name = $_GET['name'];
		$tel = $_GET['tel'];
		$address = $_GET['address'];
		$zip = $_GET['zip'];
		$city = $_GET['city'];
		$email = $_GET['email'];
		$interest = $_GET['interest'];
		$haveSystem = $_GET['haveSystem'];
		$rate = $_GET['rate'];
		$cdate = $_GET['cdate'];
		$systemQuoted = $_GET['systemQuoted'];
		$user_id = $_GET['huser_id'];
		
		
					$query = "INSERT INTO `data`(`name`, `tel`, `address`, `city`, `zipcode`, `email`, `interest`, `havesystem`, `cdate`, `rate`, `systemquote`, `datauserid`) VALUES ('$name','$tel','$address','$city','$zip','$email','$interest','$haveSystem','$cdate','$rate','$systemQuoted','$user_id')";
			$result = mysqli_query($con,$query)
			or die ("Couldn’t execute query.");
		
			if(mysqli_num_rows($result)>0){
			
			$data="Yes";
			
			}else{
			
			$data="No";	
				
			}
			
			echo "$data";
?>