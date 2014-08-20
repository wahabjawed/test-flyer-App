<?php
	
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept');		
		include 'headers/connect_database.php';      // Connection to Mysql Database.
		//require_once('PHP/recaptchalib.php');   // Captcha Library.
		
		$id = $_GET['ID'];
		
			
					$query = "select * from data  where data_id  = '$id'";
			$result = mysqli_query($con,$query)
			or die ("Couldn’t execute query.");

			
					$data="";
			while($row=mysqli_fetch_row($result))
			{
			$data = implode(",",$row);
			}
			
			echo "$data";
?>