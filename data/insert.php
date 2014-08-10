<?php
	
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept');		

include 'headers/connect_database.php';      
		
		
		$name = $_POST['name'];
		$tel = $_POST['tel'];
		$address = $_POST['address'];
		$zip = $_POST['zip'];
		$city = $_POST['city'];
		$email = $_POST['email'];
		$interest = $_POST['interest'];
		$haveSystem = $_POST['haveSystem'];
		$rate = $_POST['rate'];
		$cdate = $_POST['cdate'];
		$systemQuoted = $_POST['systemQuoted'];
		$user_id = $_POST['huser_id'];
		
		
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