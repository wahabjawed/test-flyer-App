<?php
	
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept');		
		include 'headers/connect_database.php';      // Connection to Mysql Database.
		//require_once('PHP/recaptchalib.php');   // Captcha Library.
		
		$user = $_GET['user'];
		
			
					$query = "select data_id,name,date_format(date(ddate),'%b %d %Y') as `dddate` from data  where datauserid  = '$user' order by ddate";
			$result = mysqli_query($con,$query)
			or die ("Couldn’t execute query.");

			
					$data="";
					$ddate="";
		while($row=mysqli_fetch_array($result))
		{
			
			if($row['dddate']==$ddate){
				$data = $data.",".$row['data_id']."#".$row['name'];
			}else{		
				$data = $data."^".$row['dddate'].",".$row['data_id']."#".$row['name'];
				$ddate=$row['dddate'];
			}
		}
			
			echo "$data";
?>