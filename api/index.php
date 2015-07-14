<?php

require 'Slim/Slim.php';

ini_set("log_errors", 1);
ini_set("error_log", "./error_log/php-error.log");
//error_log( "Hello, errors!" );

$app = new Slim();

$app->post('/users', 'UserAction');
$app->get('/users/:id',	'getUser');
/*
$app->get('/wines/search/:query', 'findByName');
$app->post('/wines', 'addWine');
$app->put('/wines/:id', 'updateWine');
$app->delete('/wines/:id',	'deleteWine');*/

$app->run();

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
		
		echo '{"error":{"text":'.json_encode($status_token).'}}'; exit;
		if($status_token=='valid')
		{
			//update_token($user->access_token);
			//echo '{"error":{"text":'.json_encode($user->cmd).'}}'; exit;
			switch($user->cmd){
				case 'user_login':
						$params=array(
							'username'		=> $user->username
						);
						$get_user=GetvalidUserDetails($params);
						
						$hash_password=md5($user->password);
						
						if($hash_password==$get_user->hash_password)
						{
							if($get_user->is_active=="Y")
							{
								echo '{"apidata": '.json_encode($get_user).'}';
							}
							else{
								echo '{"apidata": "User is not active"}';
							}
						}
						else{
							echo '{"apidata": "password is invalid"}';
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

function GetvalidUserDetails($param)
{
	try {
	$sql = "	SELECT * 
				FROM users u
				WHERE 1 ";
				if(isset($param['username']) && $param['username']!='')
				{
					$sql .= " AND username=:username";
				}
	
		$db = getConnection();
		$stmt = $db->prepare($sql);  
		if(isset($param['username']) && $param['username']!='')
		{
			$username=trim($param['username']);
			$stmt->bindParam("username", $username);
		}
		$stmt->execute();
		$res = $stmt->fetchObject();  
		$db = null;
		return $res;
		
	} catch(PDOException $e) {
		echo '{"error":{"text":'. $e->getMessage() .'}}'; 
	}
}

function mc_encrypt($encrypt, $key){
    $encrypt = serialize($encrypt);
    $iv = mcrypt_create_iv(mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_CBC), MCRYPT_DEV_URANDOM);
    $key = pack('H*', $key);
    $mac = hash_hmac('sha256', $encrypt, substr(bin2hex($key), -32));
    $passcrypt = mcrypt_encrypt(MCRYPT_RIJNDAEL_256, $key, $encrypt.$mac, MCRYPT_MODE_CBC, $iv);
    $encoded = base64_encode($passcrypt).'|'.base64_encode($iv);
    return $encoded;
}

// Decrypt Function
function mc_decrypt($decrypt, $key){
    $decrypt = explode('|', $decrypt.'|');
    $decoded = base64_decode($decrypt[0]);
    $iv = base64_decode($decrypt[1]);
    if(strlen($iv)!==mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_CBC)){ return false; }
    $key = pack('H*', $key);
    $decrypted = trim(mcrypt_decrypt(MCRYPT_RIJNDAEL_256, $key, $decoded, MCRYPT_MODE_CBC, $iv));
    $mac = substr($decrypted, -64);
    $decrypted = substr($decrypted, 0, -64);
    $calcmac = hash_hmac('sha256', $decrypted, substr(bin2hex($key), -32));
    if($calcmac!==$mac){ return false; }
    $decrypted = unserialize($decrypted);
    return $decrypted;
}


function validate_token($token) {
	$sql = "SELECT * FROM access_token WHERE token=':token'";
	echo '{"error":{"text":'. $sql .'}}'; exit;
	try {
		$db = getConnection();
		$stmt = $db->prepare($sql);  
		$stmt->bindParam("token", $token);
		$stmt->execute();
		$res = $stmt->fetchObject(); 
		//echo '{"error":{"text":'. $res .'}}'; exit;
		//return print_r($res); 
		$db = null;
		
		if(count($res)>0)
		{
			return 'valid';
		}
		else{
			return 'not valid';
		}
		exit;
	} catch(PDOException $e) {
		echo '{"error":{"text":'. $e->getMessage() .'}}'; 
	}
}

function addWine() {
	error_log('addWine\n', 3, '/var/tmp/php.log');
	$request = Slim::getInstance()->request();
	$wine = json_decode($request->getBody());
	$sql = "INSERT INTO wine (name, grapes, country, region, year, description) VALUES (:name, :grapes, :country, :region, :year, :description)";
	try {
		$db = getConnection();
		$stmt = $db->prepare($sql);  
		$stmt->bindParam("name", $wine->name);
		$stmt->bindParam("grapes", $wine->grapes);
		$stmt->bindParam("country", $wine->country);
		$stmt->bindParam("region", $wine->region);
		$stmt->bindParam("year", $wine->year);
		$stmt->bindParam("description", $wine->description);
		$stmt->execute();
		$wine->id = $db->lastInsertId();
		$db = null;
		echo json_encode($wine); 
	} catch(PDOException $e) {
		error_log($e->getMessage(), 3, '/var/tmp/php.log');
		echo '{"error":{"text":'. $e->getMessage() .'}}'; 
	}
}

function update_token($token) {
	$sql = "UPDATE access_token SET access_count=access_count+1 WHERE token=:token";
	try {
		$db = getConnection();
		$stmt = $db->prepare($sql);  
		$stmt->bindParam("token", $token);
		$stmt->execute();
		$db = null;
	} catch(PDOException $e) {
		echo '{"error":{"text":'. $e->getMessage() .'}}'; 
	}
}

function deleteWine($id) {
	$sql = "DELETE FROM wine WHERE id=:id";
	try {
		$db = getConnection();
		$stmt = $db->prepare($sql);  
		$stmt->bindParam("id", $id);
		$stmt->execute();
		$db = null;
	} catch(PDOException $e) {
		echo '{"error":{"text":'. $e->getMessage() .'}}'; 
	}
}

function findByName($query) {
	$sql = "SELECT * FROM wine WHERE UPPER(name) LIKE :query ORDER BY name";
	try {
		$db = getConnection();
		$stmt = $db->prepare($sql);
		$query = "%".$query."%";  
		$stmt->bindParam("query", $query);
		$stmt->execute();
		$wines = $stmt->fetchAll(PDO::FETCH_OBJ);
		$db = null;
		echo '{"wine": ' . json_encode($wines) . '}';
	} catch(PDOException $e) {
		echo '{"error":{"text":'. $e->getMessage() .'}}'; 
	}
}

function getConnection() {
	$dbhost="127.0.0.1";
	$dbuser="root";
	$dbpass="";
	$dbname="myavazone_db";
	/*$dbh = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbuser, $dbpass);	
	$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);*/
	$dbh
	return $dbh;
}

?>