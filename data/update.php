<?php
	
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept');		

include 'headers/connect_database.php';      
		
		
		$ID = $_GET['ID'];
		$status = $_GET['status'];
		
		
					$query = "update `data` set `status` = '${status}' where `data_id`=${ID}";
			$result = mysqli_query($con,$query)
			or die ("Couldn’t execute query.");
		
			
			$data="Yes";
			
			
			echo "$data";
?>