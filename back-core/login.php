<?php
require_once 'session.php';
require '../includes/_db.php';
global $db;

$user=$_POST["usuario"];
$password=$_POST["password"];	


	if(!$db->select("usuarios","*",["usr_email" => $user])){
		echo 2;
		return false;
	}elseif(
			!$db->select("usuarios","*",[
				"AND" => [
					"usr_email" => $user,
					"usr_password" => $password				
				]
			])
		){
		echo 0;
		return false;
	}
	$type=$db -> select("usuarios", "*", [ "AND" =>["usr_email" => $user, "usr_password" => $password]]);
	create_session($user,$type);

	$arr = array('status' => 1, 'type' => $type[0]["rol_id"]);
	//Aunque el content-type no sea un problema en la mayoría de casos, es recomendable especificarlo
    header('Content-type: application/json; charset=utf-8');
	echo json_encode($arr);
	return;	

?>
