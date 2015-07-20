<?php

function CustomerAction()
{
	$request = Slim::getInstance()->request();
	$customer = json_decode($request->getBody());
	//echo '{"users": ' . json_encode($user) . '}';exit;
	$token=$customer->access_token;
	//echo '{"error":{"text":"'.$token.'"}}'; exit;
	if($customer->access_token	!=	"")
	{
		$status_token=validate_token($customer->access_token);
		//echo '{"error":{"text":"'.$status_token.'"}}'; exit;
		if($status_token=='valid')
		{
					   
            $sql = "INSERT INTO user_profile (firstname, lastname) VALUES ('".$customer->first_name."', '".$customer->last_name."' )";
					  
			$db_host="127.0.0.1";
			$db_user="root";
			$db_pass="";
			$db_name="myavazone_db";

			$db = new DB();
			$db->connect($db_host, $db_user, '', false, false, $db_name, 'tbl_');
			$res_q = $db->query($sql); 
			echo '{"apidata": "User Added Sucessfully."}';
			
			exit;
			break;
		
			//echo '{"error":{"text":'.mc_encrypt($user->password,$user->key).'}}';
			//echo '{"error":{"text":"Token is valid"}}'; 
	}
		else{
			echo '{"error":{"text":"Token is not valid"}}'; 
		}
	}
	else
	{
		echo '{"error":{"text":"Token is NULL"}}'; 
	}
	
	/*$user_details=array(
		'password_hash'	=>	mc_encrypt('admin@123','d0a7e7997b6d5fcd55f4b5c32611b87cd923e88837b63bf2941ef819dc8ca282')
	);*/
	
}
?>