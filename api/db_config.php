<?php
function Dbconnection()
{
	$db_host="127.0.0.1";
	$db_user="root";
	$db_pass="";
	$db_name="myavazone_db";
	$db = new DB();
	$db->connect($db_host, $db_user, '', false, false, $db_name, 'tbl_');
	return $db;
}

?>