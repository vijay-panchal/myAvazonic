<?php
function UserAction()
{
	$request = Slim::getInstance()->request();
	
	$user = json_decode($request->getBody());
	
	
	//echo '{"users": ' . json_encode($user) . '}';exit;
	$token=$user->access_token;
	//echo '{"error":{"text":"'.$token.'"}}'; exit;
	if($user->access_token	!=	"")
	{
		$status_token=validate_token($user->access_token);
		
		//echo '{"error":{"text":"'.$status_token.'"}}'; exit;
		if($status_token=='valid')
		{
			//update_token($user->access_token);
			//echo '{"error":{"text":"'.$user->cmd.'"}}'; exit;
			switch($user->cmd){
				case 'user_login':
						$params=array(
							'username'		=> $user->username
						);
						
						$get_user=GetvalidUserDetails($params);
						
						if($get_user==null) 
						{
							echo '{"error": "Username and password is invalid"}';
						}
						else{
						
							//echo '{"error":{"text":"'.$get_user.'"}}'; exit;
							//echo '{"error":{"text":'.json_encode($get_user).'}}'; exit;
							$hash_password=md5($user->password);
							
							//	echo '{"error":{"text":"'.$get_user->hash_password.'"}}'; exit;
							//	echo '{"error":{"text":"hi"}}'; 
							//	echo '{"error":{"text":"'.$get_user->hash_password.'"}}'; exit;
							
							if($hash_password==$get_user->hash_password)
							{
								if($get_user->is_active=="Y")
								{
									echo '{"error":"","apidata": '.json_encode($get_user).'}';
									
								}
								else{
									echo '{"error": "User is not active"}';
									
								}
							}
							else{
								echo '{"error": "password is invalid"}';
								
							}
						}
						
						exit;
						
						break;
			}
			
			
				
			//echo '{"error":{"text":'.mc_encrypt($user->password,$user->key).'}}';
			
			echo '{"error":{"text":"Token is valid"}}'; 
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


function validate_token($token) {
	$sql = "SELECT * FROM access_token WHERE token='".$token."'";
	//echo '{"error":{"text":"'. $sql .'"}}'; exit;
	try {
		$db=Dbconnection();
		$res_q = $db->query($sql); 
		$res=$db->fetch_array($res_q);
		//echo '{"error":{"text":"'.$res['token'].'"}}'; exit;
		//return print_r($res); 
		//return $res;
		$db = null;
		
		if($res['token']==$token)
		{
			return 'valid';
		}
		else{
			return 'not valid';
		}
		exit;
	} catch(Exception $e) {
		echo '{"error":{"text":'. $e->getMessage() .'}}'; 
	}
}


function GetvalidUserDetails($param)
{
	
	try {
		$sql_qry = " SELECT * 
				     FROM users u
				     WHERE 1 ";
		if(isset($param['username']) && $param['username']!='')
		{
			$username=trim($param['username']);
			$sql_qry .= " AND (username='".$username."' OR mobile = '".$username."' OR email = '".$username."')";
		}
	    
		//echo '{"error":{"text":"heleo"}}'; exit;

		$db = Dbconnection();
		
        $res_q = $db->query($sql_qry); 
		//echo '{"error":{"text":"'.$db->num_rows.'"}}'; exit;
		if($db->num_rows > 0)
		{
			$res_array = $db->fetch_all_array($res_q);  
			//echo '{"error":{"text":'.json_encode($res_array).'}}'; exit;
			$res_ar = json_decode(json_encode($res_array), FALSE);
			$res=$res_ar[0];
		}
		else{
			
			$res=null;
		}
		
		$db = null;
		return $res;
		
	} catch(Exception $e) {
		echo '{"error":{"text":"'. $e->getMessage() .'"}}'; exit;
	}
}
?>